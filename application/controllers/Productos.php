<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productos extends CI_Controller {
	 public function __construct() {
	    parent::__construct();
	    Utils::no_cache();
	    $this->load->helper(array('form','url'));
	 }

	public function index(){
		$data['title'] = 'Fresquitico | Costa Rica';        

        $this->load->view('site/includes/header', $data);
        $this->load->view('site/includes/navbar');
        $this->load->view('site/pages/productos', $data);
        $this->load->view('site/includes/footer');
	}

	public function producto($id){
		$data['title'] = 'Fresquitico | Costa Rica';
		$data['id'] = $id;

        $this->load->view('site/includes/header', $data);
        $this->load->view('site/includes/navbar');
        $this->load->view('site/pages/producto', $data);
        $this->load->view('site/includes/footer');
	}


	

}