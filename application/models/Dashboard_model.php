<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function get_activity_list($limit) {
        $this->db->select('a.id,a.activity,a.ip_address,a.created_at,b.full_name');
        $this->db->from('tbl_activity_logs AS a');
        $this->db->join('tbl_users AS b', 'a.user_id = b.id', 'left');
        $this->db->where('b.status', '1');
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->result_array();
    }

}
