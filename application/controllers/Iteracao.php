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
      
      $data['sac'] = $this->sac->getById($id);
      $data['iteracao'] = $this->iteracao->getBySac($id);
      $data['title'] = 'Mensagens';
        
      loadTemplate('includes/header', 'sac/iteracao', 'includes/footer', $data);
        
    }

    /**
    * @author: Rodrigo Alves
    * Página de cadastro.
    */
    public function create($id) {

      $user_id = $this->session->userdata('user_login');

      //Pega o tipo de usuario e pega id de pessoa do usuario
      $typeUser = $this->usuario->getUserAccessGroup($user_id);
      $data['pessoa'] = $this->usuario->getUserNameById($user_id);
      $id_pessoa = $data['pessoa'][0]->id_pessoa; 
      
       
      $data = $this->input->post();

      if($data){

         if ($this->form_validation->run('iteracao')) {
            $array = array(
              'mensagem' => $this->input->post('mensagem'),
              'data' => date("Y-m-d H:i:s"),
              'id_sac' => $id,              
              'id_pessoa' => $id_pessoa,
            );
             
            $this->sac->changeStatus(0, $id);
             
            $this->iteracao->insert($array);
            $this->session->set_flashdata('success', 'Sua resposta foi cadastrada com sucesso!');
            redirect('sac/iteracao/'.$id);

         }else{
            $this->session->set_flashdata('danger', 'Não foi possível enviar sua resposta!');
            redirect('sac/iteracao/'.$id);
         }
      }

     $data['title'] = 'Enviar Mensagem';
     $data['id'] = $id;
     
     loadTemplate('includes/header', 'sac/mensagem', 'includes/footer', $data);
    }

    
}
