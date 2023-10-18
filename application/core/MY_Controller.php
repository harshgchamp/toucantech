<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!logged_in_user_id()) {
            redirect('welcome');
            exit;
        }
    }

    public function index() { 
    }

}
