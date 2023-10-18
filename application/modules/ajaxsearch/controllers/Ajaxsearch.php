<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends MY_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->_module_name = $this->router->fetch_module();
        $this->_controller_name = $this->router->fetch_class();
        $this->load->model('Ajaxsearch_model', 'ajax', true);
        $this->data['title'] = 'Ajax Search';
        $this->data['module_name'] = 'ajaxsearch';
        $this->data['controller_name'] = 'ajaxsearch';
    }

    public function index() {
        $this->layout->view($this->data['module_name'] . '/index', $this->data);
    }

    public function search() {
        if ($this->input->post()) {
            $search_term = $this->input->post('search_term');
            if ($search_term) {
                $records = $this->ajax->get_profiles_list($search_term);
                if ($records) {
                    echo json_encode($records);
                } else {
                    echo json_encode(['message' => 'No records found']);
                }
            } else {
                echo json_encode(['message' => 'No records found']);
            }
        }
        die;
    }

}
