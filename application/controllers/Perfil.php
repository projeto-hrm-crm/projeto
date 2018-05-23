<?php
class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_id = $this->session->userdata('user_login');
        $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $this->usuario->hasPermission($user_id, $currentUrl);
    }
    
    /**
    * @author: Rodrigo Alves
    * Página perfil administrador
    *
    */
    public function index(){
        
        
        $user_id = $this->session->userdata('user_login');
        
        $data['title'] = 'Meu Perfil';        
        //$data['info'] = ;
        
        loadTemplate('includes/header', 'perfil/index', 'includes/footer', $data);
        
    }

}
