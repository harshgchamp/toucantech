<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends MY_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->data['title'] = 'Tools';
    }

    public function index() {
        $this->data['tools'] = array( 
            'task1' => array('module_slug' => "query", 'module_display_name' => "Query Task 1"),
            'task2' => array('module_slug' => "ajaxsearch", 'module_display_name' => "Ajax Search Task 2"),
            'task3' => array('module_slug' => "printnumber", 'module_display_name' => "Print Number Task 3"),
            'task4' => array('module_slug' => "comment", 'module_display_name' => "Comment Task 4"), 
            'task5' => array('module_slug' => "members", "module_display_name" => "School Members Task 5")
        );
        $this->layout->view('admin/tools', $this->data);
    }

}
