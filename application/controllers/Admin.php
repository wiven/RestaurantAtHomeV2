<?php
/**
 *  
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
         * MARK: This page is set as the main controller!
	 */
    public function index()
    {
        $this->load->view('/common_admin/header_admin');
        $this->load->view('/common_admin/top_menu_admin');
        $this->load->view('/admin/admin_overview');
        $this->load->view('/common_admin/footer_admin');
    }
    
    
    public function myrecipes()
    {
        $this->load->view('/common_admin/header_admin');
        $this->load->view('/common_admin/top_menu_admin');
        $this->load->view('/admin/admin_my_recipes');
        $this->load->view('/common_admin/footer_admin');
    }
        
    public function slotedit(){
        $this->load->view('/common_admin/header_admin');
        $this->load->view('/common_admin/top_menu_admin');
        $this->load->view('/admin/admin_edit_slot');
        $this->load->view('/common_admin/footer_admin');
    }
    
    public function actions(){
        $this->load->view('/common_admin/header_admin');
        $this->load->view('/common_admin/top_menu_admin');
        $this->load->view('/admin/admin_actions');
        $this->load->view('/common_admin/footer_admin');
    }
    
    public function profile(){
        $this->load->view('/common_admin/header_admin');
        $this->load->view('/common_admin/top_menu_admin');
        $this->load->view('/admin/admin_profile');
        $this->load->view('/common_admin/footer_admin');        
    }
    
    public function orders(){
        $this->load->view('/common_admin/header_admin');
        $this->load->view('/common_admin/top_menu_admin');
        $this->load->view('/admin/admin_orders');
        $this->load->view('/common_admin/footer_admin');        
    }
}

/* EOF */