<?php 

class Config extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [];
		echo json_encode($this->configuration->getModulesAndSubModules());
	}

	public function create() 
	{
		if(!$this->form_validation->run('candidato')) 
			echo json_encode($this->form_validation->error_array());
		else 
			echo json_encode($this->config->create($this->input->post()));
		
	}
}