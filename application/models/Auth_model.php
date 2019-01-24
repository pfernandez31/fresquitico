<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * 
     */

    public function Authentification() {
        $notif = array();
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');

        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario', $usuario);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row();
            $sess_data = array(
                'id' => $row->id,
                'usuario' => $row->usuario
            );
            $this->session->set_userdata('logged_in', $sess_data);
        } else {
            $notif['message'] = 'Usuario o Contraseña Incorrecta';
            $notif['type'] = 'danger';
        }

        return $notif;
    }




}
