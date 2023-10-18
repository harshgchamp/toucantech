<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model', 'dashboard', true);
        $this->data['title'] = 'Dashboard'; 
    }

    public function index() {
        $this->data['total_schools'] =  $this->dashboard->count_all('tbl_schools', array(''));
        $this->data['total_members'] = $this->dashboard->count_all('tbl_members', array(''));
        $this->data['total_active_schools'] = $this->dashboard->count_all('tbl_schools', array('status' => 1));
        $this->data['total_active_members'] = $this->dashboard->count_all('tbl_members', array('status' => 1));
        $this->data['activities'] = $this->dashboard->get_activity_list(5);
        $this->layout->view('admin/dashboard', $this->data);
    }

}
