<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        Utils::no_cache();
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('administrador'));
            exit;
        }
    }

    /**
     *     Sara1984      
     */
    public function index() {
        redirect(base_url('login/login'));
    }

    /**
     *           
     */
    public function login() {
        $data['title'] = 'Acceso Fresquitico Admin';
        $this->load->model('auth_model');

        if (count($_POST)) {
            $this->load->helper('security');
            $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean');

            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $data['notif'] = $this->auth_model->Authentification();
            }
        }

        if ($this->session->userdata('logged_in')) {
            redirect(base_url('administrador'));
            exit;
        }

        /*
         * Load view
         */
        $this->load->view('administrador/auth/includes/header', $data);
        $this->load->view('administrador/auth/login');
        $this->load->view('administrador/auth/includes/footer');
    }




    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect(base_url('login/login'));
    }

}
