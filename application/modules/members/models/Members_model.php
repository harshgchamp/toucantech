<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Members_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function get_members_list($school_id = null, $country_iso = null) {
        $this->db->select('c.member_name,c.member_email,a.school_name,a.country_iso,b.status');
        $this->db->from('tbl_schools AS a');
        $this->db->join('tbl_member_school AS b', 'a.id = b.school_id', 'left');
        $this->db->join('tbl_members AS c', 'c.id = b.member_id', 'left');
        $this->db->where('a.status', '1');
        $this->db->where('b.status', '1');
        $this->db->where('c.status', '1');
        if ($school_id) {
            $this->db->where('a.id', $school_id);
        }
        if ($country_iso) {
            $this->db->where('a.country_iso', $country_iso);
        }
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->result_array();
    }
    
    
    function get_school_members() {
        $this->db->select("a.school_name, COUNT(b.id) as total_members");
        $this->db->from('tbl_schools AS a');
        $this->db->join('tbl_member_school AS b', 'a.id = b.school_id', 'left');
        $this->db->where('a.status', 1); 
        $this->db->group_by("a.id"); 
        $this->db->order_by("total_members", "desc");
        return $this->db->get()->result_array();
    }
    
    

}
