<?php

class PessoaFisica extends CI_Model{

  public $nome;
  public $email;
  public $dataNascimento;
  public $sexo;

	public function __constructor(){
		parent::__constructor();
	}

	public function get(){
		$pessoa_fisica = $this->db->query("Select * from pessoa_fisica");
		return $pessoa_fisica->result();
	}

}
