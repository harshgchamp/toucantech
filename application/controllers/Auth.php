<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public $data = array();

    public function __construct() {

        parent::__construct();
        $this->load->model('Auth_Model', 'auth', true);
    }

    /*     * ***************Function login**********************************
     * @type            : Function
     * @function name   : login
     * @description     : Authenticatte when uset try lo login.
     *                    if autheticated redirected to logged in user dashboard.
     *                    Also set some session date for logged in user.
     * @param           : null
     * @return          : null
     * ********************************************************** */

    public function login() {
        if ($this->input->post()) {
            $data['email'] = $this->input->post('email', TRUE);
            $data['password'] = encrypt($this->input->post('password', TRUE));
            $login = $this->auth->get_single('tbl_users', array('status' => '1', 'email' => $data['email'], 'password' => $data['password']));

            if (!empty($login)) {
                // check user active status
                if (!$login['status']) {
                    $this->session->set_flashdata('error', $this->lang->line('user_active_status'));
                    redirect('login');
                }

                $this->session->set_userdata('id', $login['id']);  // main id of logged in user  
                $this->session->set_userdata('username', $login['full_name']);  // main id of logged in user  

                $this->auth->update('tbl_users', array('last_logged_in' => date('Y-m-d H:i:s')), array('id' => logged_in_user_id()));

                create_log($this->session->userdata('username') . ' has been loggeg in', '', 0, 'LOGGED_IN');
                success($this->lang->line('login_success'));
                redirect('admin/dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('error', $this->lang->line('invalid_login'));
                redirect('login', 'refresh');
            }
        }
        redirect('login', 'refresh');
    }

    public function logout() {
        create_log($this->session->userdata('username') . ' has been loggeg out', '', 0, 'LOGGED_OUT');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('login');
        exit;
    }

}
