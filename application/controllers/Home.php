<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {

        $data_header = array(
            'page_title' => ' - Homeapge',
            'additional_styles' => ''
        );

        if (!empty(explode('.', (@$_SERVER['HTTP_HOST'] . @$_SERVER['PATH_INFO']))[1])) {
            $cur_url = explode('.', (@$_SERVER['HTTP_HOST'] . @$_SERVER['PATH_INFO']))[1];
        } else {
            $cur_url = explode('.', (@$_SERVER['HTTP_HOST'] . @$_SERVER['PATH_INFO']))[0];
        }

        $data_footer = array(
            'additional_scripts' => '<script src="' . public_url() . 'js/home.js"></script>
			<script src="' . public_url() . 'js/jquery.matchHeight.js"></script>',
            'current_url' => $cur_url
        );

        //die(var_dump(explode('/', (@$_SERVER['HTTP_HOST'].@$_SERVER['PATH_INFO']))));

        $this->load->view('/common/header', $data_header);
        $this->load->view('/common/top_menu');
        $this->load->view('home');
        $this->load->view('/common/footer', $data_footer);
    }
}

/* EOF */
