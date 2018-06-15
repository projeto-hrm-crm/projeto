<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado extends CI_Controller {


	public function index()
	{
      return $this->estado->get();
	}

	public function create()
	{

	}

	public function edit()
	{

	}

	public function delete()
	{

	}

	/**
	* @author Tiago Villalobos
	* Retorna um array em json com as cidades de determinado estado
	* para popular o combobox na view de cadastro de pessoa
	*
	* @param integer $id o identificador do estado
	* @return mixed json com cidades[id_cidade, nome]
	*/
	public function get()
	{
		return $this->estado->get();
	}

}
