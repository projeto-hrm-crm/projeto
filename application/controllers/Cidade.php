<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade extends CI_Controller {

	
	public function index()
	{

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

	public function filterByState($id)
	{
		echo json_encode($this->cidade->getByState($id));
	}


}
