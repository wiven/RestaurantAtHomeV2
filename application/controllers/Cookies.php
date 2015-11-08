<?php
/**
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookies extends CI_Controller {

	/**
	 * Index Page for this controller.
		 * MARK: This page is set as the main controller!
	 */
	public function index()
	{

		$data_header = array(
			'page_title' => '',
			'additional_styles' => ''
		);

		$data_footer = array(
			'additional_scripts' => '<script src="'.public_url().'js/home.js"></script>',
		);

		$this->load->view('/common/header', $data_header);
		$this->load->view('/common/top_menu');
		$this->load->view('cookies');
		$this->load->view('/common/footer', $data_footer);
	}
}

/* EOF */
