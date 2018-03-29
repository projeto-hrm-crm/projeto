<?php

class PessoaFisica extends CI_Model{

	public function __constructor(){
		parent::__constructor();
	}

	public function get(){
		$clientes = $this->db->query("Select * from cliente");
		return $clientes->result();
	}


}
