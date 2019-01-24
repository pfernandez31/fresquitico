<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');
require(APPPATH.'libraries/Format.php');
use Restserver\Libraries\REST_Controller;

//REST_Controller
class api extends REST_Controller {
	public function __construct() {
	    parent::__construct();
	    $this->load->model('frontend_model');
	 }
	public function index(){
		redirect(base_url('/'));
	}

	/*public function save_post(){
		$info = json_decode($this->post('info'));
		$infoMenores = $info->menores;
		$data = new StdClass();
        $this->relevos_model->SaveForm($info, $infoMenores);
        $data->enviado = true;
        $this->response($data);
	}

	public function consultar_get(){
		$cedula = $this->get('cedula');
        $data = $this->relevos_model->Consultar($cedula);
        $this->response($data);
	}

	public function detalle_get(){
		$id = $this->get('id');
        $data = $this->relevos_model->Detalle($cedula);
        $this->response($data);
	}*/
	

}