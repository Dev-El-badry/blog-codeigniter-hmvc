<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * @property CI_Config $config
 * @property CI_Session $session
 */

class Front_Controller extends CI_Controller {

    /***
     * pages of site in menu
     */

    function __construct() {
        parent::__construct();
        $this->load_lang();
        $this->session->set_userdata("lang",'ar');
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