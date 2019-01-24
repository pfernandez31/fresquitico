<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {
	 public function __construct() {
	    parent::__construct();
	    Utils::no_cache();
	    if (!$this->session->userdata('logged_in')) {
            redirect(base_url('Login/'));
            exit;
        }
	    $this->load->helper(array('form','url'));


	 }

	public function index(){
		$data['title'] = 'Area de Administración';        

        
        $this->load->view('administrador/includes/header', $data);
        $this->load->view('administrador/includes/navbar');
        $this->load->view('administrador/pages/index', $data);
        $this->load->view('administrador/includes/footer');
	} 


}