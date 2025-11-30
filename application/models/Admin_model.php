<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct(){
        $this->table = 'admin';
    }

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
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

    function update_details($update_detail = array(), $where = array()) {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update('admin');
        return TRUE;
    }

    function email_exist($email = '', $user_id = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $email);
        $this->db->where('id != '.$user_id.'');
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

}
