<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public $data = array();

    function __construct() {
        parent::__construct();
        $this->data['csrf'] = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
        );
    }

    public function index() {
        if (logged_in_user_id() ) {
            date_default_timezone_set('Europe/London');
            redirect('admin/dashboard');
        }
        $this->load->view('login', $this->data);
    }

}
