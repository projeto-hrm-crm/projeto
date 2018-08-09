<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade extends PR_Controller {

	/**
	* @author: Tiago Villalobos
	* Construtor que recebe o nome do diretório aonde estão as views
	*/
	public function __construct()
	{
			parent::__construct('cidade');
	}

	public function index()
	{

	}

	public function create()
	{

	}

	public function edit()
	{
		$cidades = $this->cidade->get();
		foreach ($cidades as $key => $cidade) {
			$teste = mb_convert_case($cidade->nome, MB_CASE_TITLE, 'UTF-8');
			$this->cidade->update(['id_cidade'=>$cidade->id_cidade,'nome'=> $teste,'id_estado'=>$cidade->id_estado]);
		}

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
	public function filterByState($id)
	{
		echo json_encode($this->cidade->getByState($id));
	}


}
