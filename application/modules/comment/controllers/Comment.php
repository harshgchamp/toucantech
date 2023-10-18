<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends MY_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->_module_name = $this->router->fetch_module();
        $this->_controller_name = $this->router->fetch_class(); 
        $this->data['title'] = 'Comment Task'; 
        $this->data['module_name'] = 'comment';
        $this->data['controller_name'] = 'comment';   
    }

    public function index() { 
        $this->layout->view($this->data['module_name'] . '/index', $this->data);
    } 
}
