<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PrintNumber extends MY_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->_module_name = $this->router->fetch_module();
        $this->_controller_name = $this->router->fetch_class(); 
        $this->data['title'] = 'Print Number Task'; 
        $this->data['module_name'] = 'printnumber';
        $this->data['controller_name'] = 'printnumber';   
    }

    public function index() { 
        $this->layout->view($this->data['module_name'] . '/index', $this->data);
    } 
}
