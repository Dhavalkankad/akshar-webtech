<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mypages_model extends CI_Model
{

    function __construct() {}

    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from('home_page_details');
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

    function update_homepage_details($update_detail = array(), $where = array())
    {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update('home_page_details');
        return TRUE;
    }

    function get_about_rows($params = array())
    {
        $this->db->select('*');
        $this->db->from('about_page_details');
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

    function update_aboutpage_details($update_detail = array(), $where = array())
    {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update('about_page_details');
        return TRUE;
    }

    function get_policy_pages_rows($params = array())
    {
        $this->db->select('*');
        $this->db->from('policy_pages_details');
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

    function update_policy_pages_details($update_detail = array(), $where = array())
    {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update('policy_pages_details');
        return TRUE;
    }
}
