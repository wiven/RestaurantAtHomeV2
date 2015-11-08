<?php
/**
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

    /**
     * Index Page for this controller.
     * MARK: This page is set as the main controller!
     */
    public function index()
    {

        $lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        //die('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PATH_INFO']);
        die($lang);
    }
}

/* EOF */
