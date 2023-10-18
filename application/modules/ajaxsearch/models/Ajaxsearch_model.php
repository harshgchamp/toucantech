<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajaxsearch_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function get_profiles_list($search_term) { 
        $this->db->select('a.Firstname,a.Surname,b.emailaddress');
        $this->db->from('profiles AS a');
        $this->db->join('emails AS b', 'a.UserRefID = b.UserRefID');
        if ($search_term) {
            $this->db->where('a.Firstname', $search_term);
            $this->db->or_where('a.Surname', $search_term);
        } 
       return $this->db->get()->result_array();
    }

}
