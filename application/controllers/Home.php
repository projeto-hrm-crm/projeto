<?php
class Home extends CI_Controller
{
  /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct()
  {
    parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      $this->usuario->hasPermission($user_id, $currentUrl);
  }

	public function index()
	{
    $data['title'] = 'Dashboard';
    $data['assets'] = [
      'js' => [
         'chartjs.min.js',
         'cliente/home-charts.js'
      ]
    ];

		loadTemplate(
        'includes/header',
        'home',
        'includes/footer',
        $data
      );
	}
}
