<?php
class Sac extends CI_Controller {

    public function __construct()
  {
    parent::__construct();
    $user_id = $this->session->userdata('user_login');
    $url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $this->usuario->hasPermission($user_id, $url);
    $this->menus = $this->categoria->getUserMenu($user_id);
  }
  
    public function index(){
        $data['title'] = 'Solicitações SAC';
        $data['sac'] = $this->sac->get();

        loadTemplate('includes/header', 'sac/index', 'includes/footer', $data);
    }

    /**
    * @author: Rodrigo Alves
    * Página de cadastro.
    *
    */
    public function create() {
     
        $data = $this->input->post();

        if($data){

            $this->sac->insert($data);
            redirect('sac/index');

        }

        $data['title'] = 'Cadastrar SAC';
        loadTemplate('includes/header', 'sac/cadastrar', 'includes/footer', $data);
    }
    
    public function edit() {     

        $data['title'] = 'Editar SAC';
        loadTemplate('includes/header', 'sac/editar', 'includes/footer', $data);

    }    

    /**
    * @author: Rodrigo Alves
    * Este método tem como finalidade apagar uma ordem de SAC.
    *
    * @param integer $id_sac
    */
    public function delete($id_sac) {

    }
    

}
