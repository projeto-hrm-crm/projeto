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
		$estados = $this->estado->get();
		foreach ($estados as $key => $estado) {
			$teste = mb_convert_case($estado->nome, MB_CASE_TITLE, 'UTF-8');
			$this->estado->update(['id_estado'=>$estado->id_estado,'uf'=>$estado->uf,'nome'=> $teste,'id_pais'=>$estado->id_pais]);
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
	public function get()
	{
		return $this->estado->get();
	}

}
