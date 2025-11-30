<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

    function __construct() {}

    public function get_all_categories($params = [])
    {
        $this->db->select('categories.*');
        $this->db->from('categories');
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
                    $this->db->where('categories.id', $params['id']);
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

    public function insert_category($data = [])
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    public function update_category($update_detail = array(), $where = array())
    {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update('categories');
        return TRUE;
    }

    public function delete_category($id = "")
    {
        // delete subcategories first
        $this->db->where('parent_id', $id)->delete('categories');
        // delete category
        $this->db->where('id', $id)->delete('categories');
        return true;
    }

    public function get_main_categories()
    {
        return $this->db->where('parent_id', 0)->get('categories')->result_array();
    }

    public function get_subcategories($parent_id)
    {
        return $this->db->where('parent_id', $parent_id)->get('categories')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get('categories')->row_array();
    }

    public function is_name_exists($name, $parent_id, $exclude_id = null)
    {
        $this->db->where('LOWER(name)', strtolower($name));
        $this->db->where('parent_id', $parent_id);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->get('categories')->num_rows() > 0;
    }
}
