<?php 
class Home extends CI_Controller 
{
  public $menus;

  /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor. 
   */
  public function __construct()
  {
    parent::__construct();
    $user_id = $this->session->userdata('user_login');
    $url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $this->usuario->hasPermission($user_id, $url);
    $this->menus = $this->categoria->getUserMenu($user_id);
  }

	public function index()
	{
    $data['title'] = 'Dashboard';
    $data['menus'] = $this->menus;
		
		loadTemplate(
        'includes/header',
        'home',
        'includes/footer',
        $data
      );
	}
}	