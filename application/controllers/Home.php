<?php 
class Home extends CI_Controller 
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		
		loadTemplate(
        'includes/header',
        'home',
        'includes/footer',
        $data
      );
	}
}	