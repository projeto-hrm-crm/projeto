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
		$data['modules'] = $this->config->getModulesAndSubModules();
		echo $data; 
	}

	public function create() 
	{
		if(!$this->form_validation->run('candidato')) 
			echo json_encode($this->form_validation->error_array());
		else 
			echo $this->config->create($this->input->post());
		
	}
}