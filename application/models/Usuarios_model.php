<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function login($username,$password){
      $this->db->where("usu_username", $username);
	  $this->db->where("usu_pasword", $password);

	  $resultados = $this->db->get("usuarios");
	  if ($resultados->num_rows() > 0) {
	  	return $resultados->row();
	  }
	  else{
	  	return false;
	  }
	}
}