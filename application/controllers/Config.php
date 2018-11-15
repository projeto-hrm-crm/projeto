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

	public function createCompany()
	{
		if(!$this->form_validation->run('config_company')) 
			echo json_encode($this->form_validation->error_array());
		else
			echo json_encode($this->configuration->createCompany($this->input->post()));
	}

	public function createProfile() 
	{
		if(!$this->form_validation->run('config_profile')) 
			echo json_encode($this->form_validation->error_array());
		else
			echo json_encode($this->configuration->createProfile($this->input->post()));
	}
    
      
    /**
    * @author Rodrigo
    * tela novo usuario
    **/
    public function new()
    {
        $data['title'] = 'Novo Cliente';
        loadTemplate('cadastro_cliente/header', 'cadastro_cliente/index', 'cadastro_cliente/footer', $data);
    }
}