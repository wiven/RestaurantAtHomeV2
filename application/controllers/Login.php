<?php

/**
 * Created by PhpStorm.
 * User: wiven
 * Date: 10/08/15
 * Time: 01:39
 */
class Login extends CI_Controller {

    public function index() {
        $data_header = array(
            'page_title' => ' - Login',
            'additional_styles' => ''
        );

        $data_content = array(
            'pretty_page_title' => ''
        );

        $data_footer = array(
            'additional_scripts' => "<script src='".public_url()."js/dashboardlogin.js'></script>
<script src='".public_url()."js/min/sha256.min.js'></script>"
        );

        $this->load->view('/dashboard/common/header', $data_header);
        $this->load->view('/dashboard/login', $data_content);
        $this->load->view('/dashboard/common/footer', $data_footer);
    }
}