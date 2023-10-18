<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends MY_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->_module_name = $this->router->fetch_module();
        $this->_controller_name = $this->router->fetch_class(); 
        $this->data['title'] = 'Query Task'; 
        $this->data['module_name'] = 'query';
        $this->data['controller_name'] = 'query';   
    }

    public function index() { 
        $this->layout->view($this->data['module_name'] . '/index', $this->data);
    } 
}
