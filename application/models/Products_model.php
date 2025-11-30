<?php defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{

    function __construct() {}

    function get_all_products($params = array())
    {
        $this->db->select('products.*');
        $this->db->from('products');
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
                    $this->db->where('products.id', $params['id']);
                }
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                if (array_key_exists("order_by", $params)) {
                    foreach ($params['order_by'] as $key => $val) {
                        $this->db->order_by($key, $val);
                    }
                }
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

    function insert_products($data = array())
    {
        $this->db->insert('products', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_products($update_detail = array(), $where = array())
    {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update('products');
        return TRUE;
    }

    function delete_products($where = array())
    {
        $this->db->where($where);
        $this->db->delete('products');
        return TRUE;
    }

    function insert_batch_products_details($data = array())
    {
        $this->db->insert_batch('products_details', $data);
        return true;
    }

    function update_batch_products_details($data = array(), $column_name = "")
    {
        $this->db->update_batch('products_details', $data, $column_name);
        return true;
    }

    function get_all_products_details($params = array())
    {
        $this->db->select('products_details.*');
        $this->db->from('products_details');
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
                    $this->db->where('products_details.id', $params['id']);
                }
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                if (array_key_exists("order_by", $params)) {
                    foreach ($params['order_by'] as $key => $val) {
                        $this->db->order_by($key, $val);
                    }
                }
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

    function delete_products_details($where = array())
    {
        $this->db->where($where);
        $this->db->delete('products_details');
        return TRUE;
    }

    function insert_products_images($data = array())
    {
        $this->db->insert('products_images', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function delete_products_images($where = array())
    {
        $this->db->where($where);
        $this->db->delete('products_images');
        return TRUE;
    }

    function get_products_images($params = array())
    {
        $this->db->select('*');
        $this->db->from('products_images');
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
                if (array_key_exists("order_by", $params)) {
                    foreach ($params['order_by'] as $key => $val) {
                        $this->db->order_by($key, $val);
                    }
                }
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

    function get_latest_products($params = array())
    {
        $this->db->select('*');
        $this->db->from('products');
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
                if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit'], $params['start']);
                } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit']);
                }
                $this->db->order_by('rand()');
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }
        return $result;
    }

    public function get_cart_item_by_user($user_id, $product_id)
    {
        return $this->db->get_where('carts', [
            'user_id'    => $user_id,
            'product_id' => $product_id
        ])->row();
    }

    public function insert_item($data)
    {
        return $this->db->insert('carts', $data);
    }

    public function update_qty($id, $qty)
    {
        return $this->db->where('id', $id)->update('carts', ['qty' => $qty]);
    }

    public function get_cart_count($user_id)
    {
        $this->db->select_sum('qty');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('carts')->row();
        return $result->qty ?? 0;
    }

    public function delete_item($cart_id)
    {
        return $this->db->where('id', $cart_id)->delete('carts');
    }

    // Clear all items for a user
    public function clear_cart($user_id)
    {
        return $this->db->where('user_id', $user_id)->delete('carts');
    }

    // Get all cart items for a user
    public function get_cart_items($user_id)
    {
        return $this->db->get_where('carts', ['user_id' => $user_id])->result();
    }
}
