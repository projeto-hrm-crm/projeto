<?php
class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_id = $this->session->userdata('user_login');
        $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        //$this->usuario->hasPermission($user_id, $currentUrl);
    }
    
    /**
    * @author: Rodrigo Alves
    * Página perfil administrador
    *
    */
    public function index(){
        
        
        $typeUser = $this->usuario->getUserAccessGroup($this->session->userdata('user_login'));
        $pessoa = $this->cliente->getIdCliente($this->session->userdata('user_id_pessoa'));
        
        $data['title'] = 'Meu Perfil';         
        $data['perfil'] = $user_id;
        
        
        
        loadTemplate('includes/header', 'perfil/index', 'includes/footer', $data);
        
    }

}
