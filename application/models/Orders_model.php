<?php defined('BASEPATH') or exit('No direct script access allowed');

class Orders_model extends CI_Model
{

    function __construct() {}

    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from('orders');
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params) || $params['returnType'] == 'single') {
                if (!empty($params['id'])) {
                    $this->db->where('id', $params['id']);
                }
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('id', 'desc');
                if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit'], $params['start']);
                } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit']);
                }
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }
        return $result;
    }

    function getOrderItemsRows($params = array())
    {
        $this->db->select('*');
        $this->db->from('order_items');
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params) || $params['returnType'] == 'single') {
                if (!empty($params['id'])) {
                    $this->db->where('id', $params['id']);
                }
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('id', 'desc');
                if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit'], $params['start']);
                } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit']);
                }
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }
        return $result;
    }

    public function create_order($orderData, $cartItems)
    {
        $this->db->insert('orders', $orderData);
        $order_id = $this->db->insert_id();

        foreach ($cartItems as $item) {
            $this->db->insert('order_items', [
                'order_id'      => $order_id,
                'product_id'    => $item->product_id,
                'product_name'  => $item->name,
                'amount'        => $item->price,
                'quantity'      => $item->qty,
                'subtotal'      => $item->price * $item->qty,
            ]);
        }

        return $order_id;
    }

    public function update_status($order_id, $update_details = [])
    {
        $this->db->where('id', $order_id);
        $this->db->update('orders', $update_details);
        return TRUE;
    }

    public function update_payment($order_id, $data)
    {
        $this->db->where('id', $order_id);
        $this->db->update('orders', $data);
        return TRUE;
    }
}
