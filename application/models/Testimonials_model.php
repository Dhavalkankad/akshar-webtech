<?php defined('BASEPATH') or exit('No direct script access allowed');

class Testimonials_model extends CI_Model
{

    function __construct() {}

    function get_all_testimonials($params = array())
    {
        $this->db->select('testimonials.*');
        $this->db->from('testimonials');
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
                    $this->db->where('testimonials.id', $params['id']);
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

    function insert_testimonials($data = array())
    {
        $this->db->insert('testimonials', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_testimonials($update_detail = array(), $where = array())
    {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update('testimonials');
        return TRUE;
    }

    function delete_testimonials($where = array())
    {
        $this->db->where($where);
        $this->db->delete('testimonials');
        return TRUE;
    }
}
