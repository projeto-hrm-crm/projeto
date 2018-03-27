<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	    $data = [];

	    $data['title'] = 'Página inicial';
		loadTemplate('includes/header', 'welcome_message', 'includes/footer', $data);
	}

}
