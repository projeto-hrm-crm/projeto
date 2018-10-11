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
		$data['modules'] = $this->getModulesAndSubModules();

		loadTemplate('')

	}

	public function setConfigs()
	{

	}
}