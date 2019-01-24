<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage extends CI_Controller {
	 public function __construct() {
	    parent::__construct();
	    Utils::no_cache();
	    $this->load->helper(array('form','url'));
	 }

	public function index(){
		$data['title'] = 'Fresquitico | Costa Rica';        

        $this->load->view('site/includes/header', $data);
        $this->load->view('site/includes/navbar');
        $this->load->view('site/pages/index', $data);
        $this->load->view('site/includes/footer');
	} 

	

}