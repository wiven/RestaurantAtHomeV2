<?php
/**
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {

    /**
     * Index Page for this controller.
     * MARK: This page is set as the main controller!
     */
    public function index() {
        if(!empty(explode('.', (@$_SERVER['HTTP_HOST'].@$_SERVER['PATH_INFO']))[1])) {
            $cur_url = explode('.', (@$_SERVER['HTTP_HOST'].@$_SERVER['PATH_INFO']))[1];
        } else {
            $cur_url = explode('.', (@$_SERVER['HTTP_HOST'].@$_SERVER['PATH_INFO']))[0];
        }

        $data_header = array(
            'page_title' => ' - Privacy',
            'additional_styles' => ''
        );

        $data_footer = array(
            'additional_scripts' => '',
            'current_url' => $cur_url
        );

        $this->load->view('/common/header', $data_header);
        $this->load->view('/common/top_menu');
        $this->load->view('privacy');
        $this->load->view('/common/footer', $data_footer);
    }
}

/* EOF */