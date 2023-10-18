<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('_d')) {

    function _d($data, $exit = TRUE) {
        print '<pre>';
        print_r($data);
        print '</pre>';
        if ($exit)
            exit;
    }

}

if (!function_exists('logged_in_user_id')) {

    function logged_in_user_id() {
        $logged_in_id = 0;
        $CI = & get_instance();
        if ($CI->session->userdata('id')) {
            $logged_in_id = $CI->session->userdata('id');
        }
        return $logged_in_id;
    }

}


if (!function_exists('success')) {

    function success($message) {
        $CI = & get_instance();
        $CI->session->set_userdata('success', $message);
        return true;
    }

}

if (!function_exists('error')) {

    function error($message) {
        $CI = & get_instance();
        $CI->session->set_userdata('error', $message);
        return true;
    }

}

if (!function_exists('warning')) {

    function warning($message) {
        $CI = & get_instance();
        $CI->session->set_userdata('warning', $message);
        return true;
    }

}

if (!function_exists('info')) {

    function info($message) {
        $CI = & get_instance();
        $CI->session->set_userdata('info', $message);
        return true;
    }

}
 
if (!function_exists('get_status')) {

    function get_status($status) {
        $ci = & get_instance();
        if ($status == 1) {
            return $ci->lang->line('active');
        } elseif ($status == 2) {
            return $ci->lang->line('in_active');
        } elseif ($status == 3) {
            return $ci->lang->line('trash');
        }
    } 
}


if (!function_exists('verify_email_format')) {

    function verify_email_format($email) {
        $email = trim($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return '';
        } else {
            return $email;
        }
    } 
}


if (!function_exists('create_log')) {

    function create_log($activity, $tbl_name = null, $record_id = 0, $action = null) {
        $ci = & get_instance();
        $data = array();
        $data['user_id'] = logged_in_user_id();
        if (!$data['user_id']) {
            return;
        } 
        $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $data['activity'] = $activity;
        $data['tbl_name'] = $tbl_name;
        $data['record_id'] = $record_id;
        $data['action'] = $action;
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s'); 
        $ci->db->insert('tbl_activity_logs', $data);
    }

}
 
if (!function_exists('get_record_status')) {

    function get_record_status($value) {
        if (isset($value) && $value == 1) {
            return "Active";
        } elseif (isset($value) && $value == 0) {
            return "Deactive";
        } else {
            return "Deactive";
        }
        return true;
    }

}
 
if (!function_exists('enc_val')) {

    function enc_val($value) {
        $security['encryption_key'] = 1111111111111111;
        $security['iv'] = 2456378494765434;
        $security['encryption_mechanism'] = "aes-256-cbc";
        $secret_key = $security['encryption_key'];
        $secret_iv = $security['iv'];
        $encrypt_method = $security['encryption_mechanism'];
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $result = openssl_encrypt($value, $encrypt_method, $key, 0, $iv);
        return $output = base64_encode($result);
    }

}


if (!function_exists('dec_val')) {

    function dec_val($value) {
        $security['encryption_key'] = 1111111111111111;
        $security['iv'] = 2456378494765434;
        $security['encryption_mechanism'] = "aes-256-cbc";
        $secret_key = $security['encryption_key'];
        $secret_iv = $security['iv'];
        $encrypt_method = $security['encryption_mechanism'];
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        return $output = openssl_decrypt(base64_decode($value), $encrypt_method, $key, 0, $iv);
    }

}


if (!function_exists('panel_date_show_format')) {

    function panel_date_show_format($value) {
        if (isset($value) && $value != '' && ($value == '0000-00-00 00:00:00' || $value == '0000-00-00' || $value == '1970-01-01' )) {
            return '-';
        } elseif (isset($value) && $value != '') {
            return date('d-m-Y', strtotime($value));
        } else {
            return '-';
        }
    } 
}
 

if (!function_exists('encrypt')) {

    function encrypt($string, $key = 1) {
        $result = '';
        for ($i = 0, $k = strlen($string); $i < $k; $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }

}

if (!function_exists('decrypt')) {

    function decrypt($string, $key = 1) {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0, $k = strlen($string); $i < $k; $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }

}
 

if (!function_exists('country_iso_list')) {
    function country_iso_list($value = NULL) { 
            $country_iso_list = array();
            $country_iso_list = array("AUS"=> "Australia","IND"=> "India","NZL"=> "New Zealand","GBR"=> "United Kingdom","USA"=> "United States of America");
            if($value) {
            return $country_iso_list[$value]; 
            }
            return $country_iso_list; 
    }
}
/*STRICT DATA ACCESS END*/