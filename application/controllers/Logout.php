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
        header('Location: '.base_url());
    }
}