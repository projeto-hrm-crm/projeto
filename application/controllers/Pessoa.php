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
	* salvar no campo e retornar um último id inserido.
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
			$this->db->insert('pessoa', $this->input->post());

			return $this->db->insert_id();
		}
	}

	public function edit()
	{

	}

	public function update()
	{

	}

	public function delete()
	{

	}

}
