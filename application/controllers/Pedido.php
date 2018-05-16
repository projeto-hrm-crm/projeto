<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

	/**
	* @author Tiago Villalobos
	* Lista com os pedidos
	*
	*
	*/
	public function index()
	{
		
	}


	/**
	* @author: Tiago Villalobos
	* Formulário para cadastro de pedidos
	*
	*/
  	public function create()
  	{
  		if($this->input->post())
  		{
  			print_r($this->input->post());
  		}
  		else
  		{
	  		$data['title']    = 'Pedido';
	  		$data['clientes'] = $this->cliente->get();
	  		$data['produtos'] = $this->produto->get();

	  		$data['assets'] = array(
	  			'css' => array(
	  				'lib/chosen/chosen.css'
	  			),
	  			'js' => array(
					'lib/chosen/chosen.jquery.min.js'
	  			),
	  		);

			loadTemplate(
				'includes/header',
				'pedido/cadastrar',
				'includes/footer',
				$data
			);
  		}
  	


  	}

	/**
	* @author: Tiago Villalobos
	* Utiliza um id para buscar uma pessoa no banco e preencher o formulário de edição
	* Retorna messagem de erro ou sucesso por flashdata que são inseridos em variáveis para facilitar o
	* trabalho na view.
	*
	* @param integer $id identificação da pessoa
	*/
	public function edit($id_pessoa)
	{

		

	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade remover um registro de pessoa do banco com base no id passado.
	* Seguindo a ordem de dependência.
	*
	* @param integer $id_pessoa
	*/
	public function delete($id_pessoa)
	{
		
	}

}
