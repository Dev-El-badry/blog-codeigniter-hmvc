<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * @property CI_Config $config
 * @property CI_Session $session
 */

class Base_Controller extends CI_Controller {

    /***
     * pages of site in menu
     */

    function __construct() {
        parent::__construct();
        $this->load_lang();
        $this->lang->load('admin/sidebar');
        $this->load->model('Mdl_site_info');
        
    }

    /**
     * return module language file
     */
    protected function load_lang() {

        if ($this->uri->segment(1) == 'en' ||
            $this->uri->segment(1) == 'ar'
        ) {
            $this->session->set_userdata("lang", $this->uri->segment(1));
            redirect($this->session->flashdata('redirectToCurrent'));
        }

       if ($this->session->userdata('lang') == "ar") {
            $lang = "arabic";
            $this->config->set_item('language',$lang);
            $this->session->set_userdata("lang",'ar');
        }else {
            $lang = "english";
            $this->config->set_item('language',$lang);
            $this->session->set_userdata("lang",'en');
        }

        //  $this->lang->load($moduleName, $lang);
    }

    function _check_admin_login_admin_details($username, $password) {
        $target_username = "admin";
        $target_password = "password";

        if($target_username == $username && $target_password == $password) {
            return TRUE;
        } else {
            return false;
        }

    }

    function _get_user_id() {
        
       $user_id = $this->session->userdata('user_id');
       if(!is_numeric($user_id)) {
           //get user_id from cookies
           $this->load->module('site_cookie');
           $user_id = $this->site_cookie->attempt_get_user_id();
       }

       return $user_id;
    }

    function _make_sure_is_admin() {
        $is_admin = TRUE;

        if($is_admin == 1) {
            return TRUE;
        } else {
            redirect(base_url().'Site/not_allowed');
        }
    }

   

    function pword_hashed($str) {
        $hased_string = password_hash($str, PASSWORD_BCRYPT, array('cost'=>12));
        return $hased_string;
    }

    function verfiy_password_hashed($password, $hash) {
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    function RandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }

}