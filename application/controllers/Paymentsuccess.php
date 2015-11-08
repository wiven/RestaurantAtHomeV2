<?php

class Paymentsuccess extends CI_Controller {
    public function index() {
        if(!empty(explode('.', (@$_SERVER['HTTP_HOST'].@$_SERVER['PATH_INFO']))[1])) {
            $cur_url = explode('.', (@$_SERVER['HTTP_HOST'].@$_SERVER['PATH_INFO']))[1];
        } else {
            $cur_url = explode('.', (@$_SERVER['HTTP_HOST'].@$_SERVER['PATH_INFO']))[0];
        }

        $data_header = array(
            'page_title' => ' - Betaling voltooid',
            'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/min/bootstrap_datepicker.min.css'>
            <link rel='stylesheet' href='".public_url()."css/min/bootstrap-timepicker.min.css'>"
        );

        $data_footer = array(
            'current_url' => $cur_url,
            'additional_scripts' => "<script src='".public_url()."js/min/bootstrap-datepicker.min.js'></script>
            <script src='".public_url()."js/min/bootstrap-datepicker.nl-BE.min.js'></script>
            <script src='".public_url()."js/paymentsuccess.js'></script>
            <script src='".public_url()."js/min/bootstrap-timepicker.min.js'></script>"
        );

        $this->load->view('/common/header', $data_header);
        $this->load->view('/common/top_menu');
        $this->load->view('paymentsuccess');
        $this->load->view('/common/footer', $data_footer);
    }
}