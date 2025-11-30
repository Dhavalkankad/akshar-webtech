<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    function __construct()
    {
        $this->table = 'users';
    }

    function getRows($params = array())
    {
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

    function insert($data = array())
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_details($update_detail = array(), $where = array())
    {
        $this->db->set($update_detail);
        $this->db->where($where);
        $this->db->update($this->table);
        return TRUE;
    }

    function email_exist($email = '', $user_id = '')
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $email);
        $this->db->where('id != ' . $user_id . '');
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function user_exists($email = '')
    {
        return $this->db->where('email', $email)->get($this->table)->row();
    }

    public function get_address($user_id, $type)
    {
        return $this->db->get_where('user_addresses', [
            'user_id' => $user_id,
            'type' => $type
        ])->row_array();
    }

    public function save_address($data)
    {
        $check = $this->db->get_where('user_addresses', [
            'user_id' => $data['user_id'],
            'type' => $data['type']
        ])->row_array();
        if ($check) {
            $this->db->where('id', $check['id']);
            return $this->db->update('user_addresses', $data);
        } else {
            return $this->db->insert('user_addresses', $data);
        }
    }

    function delete_address($where = array())
    {
        $this->db->where($where);
        $this->db->delete('user_addresses');
        return TRUE;
    }
}
