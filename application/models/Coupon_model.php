<?php defined('BASEPATH') or exit('No direct script access allowed');

class Coupon_model extends CI_Model
{

    function __construct() {}

    function get_all_coupon($params = array())
    {
        $this->db->select('coupons.*');
        $this->db->from('coupons');
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
                    $this->db->where('coupons.id', $params['id']);
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

    function insert_coupon($data = array())
    {
        $this->db->insert('coupons', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_coupon($update_detail = array(), $where = array())
    {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update('coupons');
        return TRUE;
    }

    function delete_coupon($where = array())
    {
        $this->db->where($where);
        $this->db->delete('coupons');
        return TRUE;
    }

    function coupons_exist($code = '', $id = '')
    {
        $this->db->select('*');
        $this->db->from('coupons');
        $this->db->where('code', $code);
        $this->db->where('id != ' . $id . '');
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_valid_coupon($code = '')
    {
        $today = date("Y-m-d");
        return $this->db->where("code", $code)->where("status", 1)->where("start_date <=", $today)->where("end_date >=", $today)->get("coupons")->row();
    }
}
