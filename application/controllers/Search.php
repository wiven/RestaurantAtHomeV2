<?php
/**
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 * Index Page for this controller.
		 * MARK: This page is set as the main controller!
	 */
	public function index() {
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

		switch ($lang){
			case "nl":
				$data_header = array(
					'page_title' => ' - Zoeken',
					'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/client_styles.css'>
					<link rel='stylesheet' href='".public_url()."css/sweetalert.css'>"
				);

				$data_footer = array(
					'additional_scripts' => "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
					<script src='".public_url()."js/search.js'></script>"
				);

				$this->load->view('/common/header', $data_header);
				$this->load->view('/common/top_menu_clients');
				$this->load->view('search');
				$this->load->view('/common/footer_clients', $data_footer);

				break;
			case "fr":
				$data_header = array(
					'page_title' => ' - Chercher',
					'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/client_styles.css'>"
				);

				$data_footer = array(
					'additional_scripts' => "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
					<script src='".public_url()."js/search.js'></script>"
				);

				$this->load->view('/common/header', $data_header);
				$this->load->view('/common/top_menu_clients');
				$this->load->view('search');
				$this->load->view('/common/footer_clients', $data_footer);

				break;
			case "en":
				$data_header = array(
					'page_title' => ' - Search',
					'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/client_styles.css'>"
				);

				$data_footer = array(
					'additional_scripts' => "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
					<script src='".public_url()."js/search.js'></script>"
				);

				$this->load->view('/common/header', $data_header);
				$this->load->view('/common/top_menu_clients');
				$this->load->view('search');
				$this->load->view('/common/footer_clients', $data_footer);

				break;
			default:
				$data_header = array(
					'page_title' => ' - Search',
					'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/client_styles.css'>"
				);

				$data_footer = array(
					'additional_scripts' => "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
					<script src='".public_url()."js/search.js'></script>"
				);

				$this->load->view('/common/header', $data_header);
				$this->load->view('/common/top_menu_clients');
				$this->load->view('search');
				$this->load->view('/common/footer_clients', $data_footer);

				break;
		}
	}

	public function restaurantdetail() {
		$data_header = array(
			'page_title' => ' - Restaurant',
			'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/client_styles.css'>"
		);

		$data_footer = array(
					'additional_scripts' => "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
					<script src='".public_url()."js/search.js'></script>
					<script src='".public_url()."js/restaurantdetail.js'></script>"
				);
		$this->load->view('/common/header', $data_header);
		$this->load->view('/common/top_menu_clients');
		$this->load->view('restaurantdetail');
		$this->load->view('/common/footer_clients', $data_footer);
	}
}

/* EOF */
