<?php

/**
 * Created by PhpStorm.
 * User: wiven
 * Date: 10/08/15
 * Time: 07:57
 */
class Logout extends CI_Controller {
    public function index() {
        @session_start();
        @session_destroy();

        $data_footer = array(
            'additional_scripts' => "<script src='".public_url()."js/dashboardlogout.js'></script>"
        );

        $this->load->view('/dashboard/common/footer', $data_footer);

        //TODO: session destroy + redirect to public homepage


        /*@session_start();
        @session_destroy();
        unset($_COOKIE['hash']);
        unset($_COOKIE['restoId']);
        unset($_COOKIE['username']);
        header('Location: '.base_url());*/
    }
}