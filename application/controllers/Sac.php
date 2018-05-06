<?php
class Sac extends CI_Controller {

    public function __construct()
  {
    parent::__construct();
    $user_id = $this->session->userdata('user_login');
    $url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    // $this->usuario->hasPermission($user_id, $url);
    $this->menus = $this->menu->getUserMenu($user_id);
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
            if ($this->form_validation->run('sac')) {
               $array = array(
                 'id_produto' => $this->input->post('id_produto'),
                 'id_cliente' => $this->input->post('id_cliente'),
                 'abertura' => date("Y-m-d H:i:s"),
                 'fechamento' => 0,
                 'encerrado' => 0,
                 'titulo' => $this->input->post('titulo'),
                 'descricao' => $this->input->post('descricao'),
               );
               $this->sac->insert($array);
               $this->session->set_flashdata('success', 'Sac cadastrado com sucesso.');
               redirect('sac');
            }else{
               $this->session->set_flashdata('danger', 'Sac não pode ser cadastrado');
               redirect('sac');
            }
         }

        $data['title'] = 'Cadastrar SAC';
        $data['produtos'] = $this->produto->get();
        $data['clientes'] = $this->cliente->get();
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
       $this->sac->remove($id_sac);
       $this->session->set_flashdata('success', 'Sac deletado com sucesso.');
       redirect('sac');
    }


}
