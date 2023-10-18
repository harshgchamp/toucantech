<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends MY_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->_module_name = $this->router->fetch_module();
        $this->_controller_name = $this->router->fetch_class();
        $this->load->model('Members_model', 'members', true);
        $this->data['title'] = 'Members';
        $this->data['tbl_name'] = 'tbl_members';
        $this->data['module_name'] = 'members';
        $this->data['controller_name'] = 'members';
        $this->data['schools_list'] = $this->members->get_list('tbl_schools', array('status' => '1'), array('id', 'school_name'), '', '', 'id', 'ASC');
        $this->data['countries_iso_list'] = country_iso_list();
        $this->data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
    }

    public function index() {
        $this->data['records'] = $this->members->get_members_list(); 
        $this->data['school_members'] = $this->members->get_school_members();
        $this->layout->view($this->data['module_name'] . '/index', $this->data);
    }
    
    
    public function filterRecords() { 
        $school_id = $country_iso = null;
        if ($this->input->post()) {  
            $this->form_validation->set_rules('school_id', $this->lang->line('school_id'), 'trim|xss_clean');
            $this->form_validation->set_rules('country_iso', $this->lang->line('country_iso'), 'trim|xss_clean');
            if ($this->form_validation->run() === TRUE) {
                $school_id = $this->input->post('school_id');
                $country_iso = $this->input->post('country_iso'); 
                $this->data['post']['download_filter_btn'] = TRUE;
            }
        }
        $this->data['records'] = $this->members->get_members_list($school_id,$country_iso);
        
        if($this->input->post('download_btn_val')){
        // file name 
        $filename = 'members_list_'.date('Ymd').'.csv'; 
        header("Content-Description: Members Records"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; "); 
        // file creation 
        $file = fopen('php://output', 'w'); 
        $header = array("Name","Email","School"); 
        fputcsv($file, $header);
        foreach ($this->data['records'] as   $line){
          fputcsv($file,array($line['member_name'],$line['member_email'],$line['school_name'])); 
        }
        fclose($file); 
        exit; 
        }
   
        $this->data['post']['country_iso'] = $country_iso;
        $this->data['post']['school_id'] = $school_id;  
        $this->data['school_members'] = $this->members->get_school_members();
        $this->layout->view($this->data['module_name'] . '/index', $this->data);
    }

    public function member_email() {
        $col_name = "member_email";
        if ($this->input->post('edited_id') == '') {
            $exists = $this->members->duplicate_simple_id_check($this->data['tbl_name'], $col_name, $this->input->post('member_email'));
            if ($exists) {
                $this->form_validation->set_message('member_email', "Record Already Exists");
                return FALSE;
            } else {
                return TRUE;
            }
        } elseif ($this->input->post('edited_id') != '') {
            $edited_id = dec_val($this->input->post('edited_id'));
            $exists = $this->members->duplicate_simple_id_check($this->data['tbl_name'], $col_name, $this->input->post('member_email'), $edited_id);
            if ($exists) {
                $this->form_validation->set_message('member_email', "Record Already Exists");
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function add() {
        if ($this->input->post()) {
            // check_permission(ADD);   we can check whether logged-in user has priviledge or not
            $this->form_validation->set_rules('member_name', $this->lang->line('member_name'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('member_email', $this->lang->line('member_email'), 'trim|required|xss_clean|callback_member_email');
            $this->form_validation->set_rules('school_id[]', $this->lang->line('school_id'), 'required|xss_clean');

            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_data();
                $member_id = $this->members->insert($this->data['tbl_name'], $data);

                $school_arr = $this->input->post('school_id[]', true);
                if (count($school_arr) > 0) {
                    $member_school_data = $this->_get_member_school_data($member_id, $school_arr);
                    $this->members->insert_batch('tbl_member_school', $member_school_data);
                }
                if ($member_id) {
                    create_log($this->data['title'] . '  has been created : ' . $data['member_name'], $this->data['tbl_name'], $member_id, 'ADD');
                    success($this->lang->line('insert_success'));
                    redirect($this->data['module_name'], 'refresh');
                } else {
                    error($this->lang->line('insert_failed'));
                    $this->data['add'] = TRUE;
                    $this->data['post'] = $this->input->post();
                    $this->layout->view($this->data['module_name'] . '/add', $this->data);
                }
            } else {
                $this->data['post'] = $this->input->post();
                $this->data['add'] = TRUE;
                $this->layout->view($this->data['module_name'] . '/add', $this->data);
            }
        } else {
            $this->layout->view($this->data['module_name'] . '/add', $this->data);
        }
    }

    private function _get_posted_data() {
        $items = array();
        $items[] = 'member_name';
        $items[] = 'member_email';
        $data = elements($items, $this->input->post());
        $data['status'] = 1;
        return $data;
    }

    private function _get_member_school_data($member_id, $school_arr) {
        $data = array();
        foreach ($school_arr as $k => $v) {
            $data[] = array('member_id' => $member_id, "school_id" => $v, "status" => 1);
        }
        return $data;
    }

}
