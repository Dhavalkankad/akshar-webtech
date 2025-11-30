<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating_model extends CI_Model
{
    protected $table = 'product_ratings';

    public function __construct()
    {
        parent::__construct();
    }

    public function save_rating($data)
    {
        $product_id = (int)$data['product_id'];
        $user_id = (int)$data['user_id'];
        $rating = (int)$data['rating'];
        $review = isset($data['review']) ? $data['review'] : null;
        $order_id = isset($data['order_id']) ? (int)$data['order_id'] : null;

        if ($product_id <= 0 || $user_id <= 0 || $rating < 1 || $rating > 5) {
            return false;
        }

        $this->db->trans_start();

        if ($order_id) {
            $this->db->where('product_id', $product_id)
                ->where('user_id', $user_id)
                ->where('order_id', $order_id);
        } else {
            $this->db->where('product_id', $product_id)
                ->where('user_id', $user_id)
                ->where('order_id IS NULL', null, false);
        }
        $exists = $this->db->get($this->table)->row();

        $now = date('Y-m-d H:i:s');

        if ($exists) {
            $this->db->where('id', $exists->id)
                ->update($this->table, [
                    'rating' => $rating,
                    'review' => $review,
                    'updated_at' => $now
                ]);
            $id = $exists->id;
        } else {
            $this->db->insert($this->table, [
                'product_id' => $product_id,
                'user_id' => $user_id,
                'order_id' => $order_id,
                'rating' => $rating,
                'review' => $review,
                'created_at' => $now
            ]);
            $id = $this->db->insert_id();
        }

        $this->db->trans_complete();
        return $this->db->trans_status() ? $id : false;
    }

    public function user_already_rated_order($user_id, $product_id, $order_id = null)
    {
        $this->db->where('user_id', (int)$user_id)
            ->where('product_id', (int)$product_id);

        if ($order_id) {
            $this->db->where('order_id', (int)$order_id);
        } else {
            $this->db->where('order_id IS NULL', null, false);
        }

        return $this->db->count_all_results($this->table) > 0;
    }

    /**
     * Get product rating summary: average and count
     */
    public function get_product_summary($product_id)
    {
        $row = $this->db->select('AVG(rating) as avg_rating, COUNT(*) as total_ratings')
            ->where('product_id', (int)$product_id)
            ->get($this->table)
            ->row();
        return [
            'avg_rating' => $row->avg_rating ? round((float)$row->avg_rating, 2) : 0,
            'total_ratings' => (int)$row->total_ratings
        ];
    }

    /**
     * Check if user purchased the product (and optionally the specific order_id)
     * Implementation assumes orders & order_items tables exist.
     */
    public function user_purchased_product($user_id, $product_id)
    {
        // adjust table names/columns to match your schema
        $this->db->select('oi.order_id')
            ->from('order_items oi')
            ->join('orders o', 'o.id = oi.order_id')
            ->where('o.user_id', (int)$user_id)
            ->where('oi.product_id', (int)$product_id)
            ->where('o.status != ', 'failed'); // or whatever denotes finished
        $res = $this->db->get();
        return ($res->num_rows() > 0);
    }

    /**
     * Check if user already rated this product for a given order_id
     */
    public function user_rated_order($user_id, $product_id, $order_id = null)
    {
        $this->db->where('user_id', (int)$user_id)
            ->where('product_id', (int)$product_id);
        if ($order_id) {
            $this->db->where('order_id', (int)$order_id);
        }
        $res = $this->db->get($this->table);
        return ($res->num_rows() > 0);
    }

    /**
     * Return some recent reviews (optional)
     */
    public function get_recent_reviews($product_id, $limit = 5)
    {
        return $this->db->select('r.*, u.first_name as user_name')
            ->from($this->table . ' r')
            ->join('users u', 'u.id = r.user_id', 'left')
            ->where('r.product_id', (int)$product_id)
            ->order_by('r.created_at', 'desc')
            ->limit((int)$limit)
            ->get()
            ->result();
    }

    /**
     * Return counts of ratings grouped by star value (5..1).
     * Result: associative array like [5 => 10, 4 => 3, 3 => 0, 2 => 1, 1 => 2]
     */
    public function get_rating_counts($product_id)
    {
        $product_id = (int)$product_id;
        $rows = $this->db
            ->select('rating, COUNT(*) as cnt')
            ->from($this->table)
            ->where('product_id', $product_id)
            ->group_by('rating')
            ->get()
            ->result();

        // initialize with zeros for 5..1
        $counts = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
        foreach ($rows as $r) {
            $rating = (int)$r->rating;
            $counts[$rating] = (int)$r->cnt;
        }
        return $counts;
    }

    /**
     * Optional helper: total ratings by product (sum of counts)
     */
    public function get_total_ratings($product_id)
    {
        $row = $this->db->select('COUNT(*) as total')
            ->from($this->table)
            ->where('product_id', (int)$product_id)
            ->get()
            ->row();
        return $row ? (int)$row->total : 0;
    }
}
