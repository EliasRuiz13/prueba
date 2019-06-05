<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}
	public function index()
	{
		$this->load->view('admin/login');

	}
	public function login(){
       $username = $this->input->post("usu_nombre");
       $password = $this->input->post("usu_pass");
       $res = $this->Usuarios_model->login($username,sha1($password));

       if (!$res) {
            $this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
       	redirect(base_url());
       } else{
       	$data = array(
         'iUsuario' => $res->id,
       	 'usu_nombre' => $res->nombres,
       	 'idRoles' => $res->rol_id,
       	 'login' => TRUE);
       	$this->session->set_userdata($data);
       	redirect(base_url()."dashboard");
       }
	}
}