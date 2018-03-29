<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller {

	
	public function index()
	{
		loadTemplate('includes/header', 'test', 'includes/footer');		
	}

	public function create()
	{
		
	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade validar os campos de pessoa, 
	* e permitir que o model insira estes dados no banco.
	*
	* @return integer último id inserido no banco
	*/
	public function save()
	{
		if(!$this->form_validation->run())
		{
			$this->index();
		}
		else
		{
			$this->pessoa->insert();
		}
	}

	public function edit()
	{

	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade validar os campos de pessoa, 
	* e permitir que o model atualize este registro no banco.
	*
	*/
	public function update()
	{
		if(!$this->form_validation->run())
		{
			$this->index();
		}
		else
		{
			$this->pessoa->update();
		}
	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade remover um registro de pessoa do banco.
	*
	*/
	public function delete()
	{
		$this->pessoa->remove();
	}

}
