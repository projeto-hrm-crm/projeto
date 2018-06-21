<?php
class Iteracao extends CI_Controller {
  public function __construct()
  {
      parent::__construct();
       $user_id = $this->session->userdata('user_login');
       $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
       //$this->usuario->hasPermission($user_id, $currentUrl);
       
  }

    public function loadMensagem($id){
        
      //Pega o id de usuario da sessão
      $user_id = $this->session->userdata('user_login');
       
      //Pega o tipo de usuario
      $typeUser = $this->usuario->getUserAccessGroup($user_id);        
      $data['tipo'] = $typeUser;
      
      $data['sac'] = $this->sac->getById($id);
      $data['iteracao'] = $this->iteracao->getBySac($id);
      $data['title'] = 'Mensagens';
        
      loadTemplate('includes/header', 'sac/iteracao', 'includes/footer', $data);
        
    }

    /**
    * @author: Rodrigo Alves
    * Página de cadastro.
    */
    public function create() {

      $user_id = $this->session->userdata('user_login');

      //Pega o tipo de usuario e informações de pessoas
      $typeUser = $this->usuario->getUserAccessGroup($user_id);
      $data['pessoa'] = $this->usuario->getUserNameById($user_id);

      // Pegar informações de cliente
      $id_pessoa = $data['pessoa'][0]->id_pessoa; 
      $cliente = $this->cliente->getIdCliente($id_pessoa);      

      if($typeUser=="1"){
         $id_cliente = $this->input->post('id_cliente');
      }else {
         $id_cliente = $cliente[0]->id_cliente;
      }
       
      $data = $this->input->post();

      if($data){

         if ($this->form_validation->run('sac')) {
            $array = array(
              'id_produto' => $this->input->post('id_produto'),
              'id_cliente' => $id_cliente,
              'abertura' => date("Y-m-d H:i:s"),
              'fechamento' => 0,
              'encerrado' => 0,
              'titulo' => $this->input->post('titulo'),
              'descricao' => $this->input->post('descricao'),
            );

            $this->sac->insert($array);
            $this->session->set_flashdata('success', 'SAC cadastrado com sucesso!');
            redirect('sac');

         }else{
            $this->session->set_flashdata('danger', 'Não foi possível cadastrar SAC!');
            redirect('sac');
         }
      }

     $data['title'] = 'Cadastrar SAC';
     $data['produtos'] = $this->produto->get();
     $data['clientes'] = $this->cliente->get();
     $data['tipo'] = $typeUser;
     $data['assets'] = array(
            'js' => array(
            'lib/data-table/datatables.min.js',
            'lib/data-table/dataTables.bootstrap.min.js',
            'datatable.js',
            'confirm.modal.js',
         ),
      );
     loadTemplate('includes/header', 'sac/cadastrar', 'includes/footer', $data);
    }

    
}
