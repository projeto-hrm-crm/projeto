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
    * Página perfil do usuario
    *
    */
    public function index(){
        
        
        $typeUser = $this->usuario->getUserAccessGroup($this->session->userdata('user_login'));
        $user_id = $this->session->userdata('user_login');
        
        $data['title'] = 'Meu Perfil';         
        $data['pessoa'] = $this->usuario->getUserNameById($user_id);
        
        $id = $data['pessoa'][0]->id_pessoa;
       
        $data['endereco'] = $this->endereco->findAddress($id);
       
        $data['cidade'] = $this->cidade->getById($data['endereco'][0]->id_cidade);
        $data['estado'] = $this->estado->getById($data['cidade'][0]->id_estado);
        
        loadTemplate('includes/header', 'perfil/index', 'includes/footer', $data);
        
    }
   /**
    * @author: Rodrigo Alves
    * Editar dados cadastrais usuario
    *
    */
   public function edit(){        
        
      $typeUser = $this->usuario->getUserAccessGroup($this->session->userdata('user_login'));
      $user_id = $this->session->userdata('user_login');
      
      $data['pessoa'] = $this->usuario->getUserNameById($user_id);
        
      $id_pessoa = $data['pessoa'][0]->id_pessoa;
      
      $data = $this->input->post();
     
       if ($data)  {
         if ($this->form_validation->run('perfil'))
         {
            
            $this->pessoa->update([
               'nome' => $data['nome'],
               'email' => $data['email'],
               'id_pessoa'     => $id_pessoa
             ]);
            
            $this->usuario->update([
               'login' => $data['email'],
               'id_usuario'     => $user_id
             ]);
            
            $this->endereco->update([
              'cep'           => $data['cep'],
              'bairro'        => $data['bairro'],
              'logradouro'    => $data['logradouro'],
              'numero'        => $data['numero'],
              'complemento'   => $data['complemento'],
              'id_pessoa'     => $id_pessoa,
              'id_cidade'     => $data['id_cidade']
          ]);
            
           $this->session->set_flashdata('success', 'Perfil Atualizado Com Sucesso!');
           redirect('perfil');
         }else{
           $this->session->set_flashdata('danger', 'Perfil Não Pode Ser Atualizado!');
           redirect('perfil/editar/');
         }
       }
      

      $data['title'] = 'Editar Dados';         
      $data['pessoa'] = $this->usuario->getUserNameById($user_id);

      $id = $data['pessoa'][0]->id_pessoa;

      $data['endereco'] = $this->endereco->findAddress($id);

      $data['estado_atual'] = $this->cidade->findState($data['endereco'][0]->id_cidade);

      $data['estados'] =  $this->estado->get();
      $data['cidades'] = $this->cidade->getByState($data['estado_atual'][0]->id_estado);

      loadTemplate('includes/header', 'perfil/editar', 'includes/footer', $data);
        
    }
   
   /**
    * @author: Rodrigo Alves
    * Alterar senha do usuario
    *
    */
   public function changePassword(){
        
        
        $typeUser = $this->usuario->getUserAccessGroup($this->session->userdata('user_login'));
        $user_id = $this->session->userdata('user_login');        
               
        $data = $this->input->post();
      
         if ($data)  {
         if (($data['senha']==$data['senha-confirme']) and $data['senha'] and $data['senha-confirme']) {
            
            
            $this->usuario->changePassword([
               'senha' => $data['senha'],
               'id_usuario'     => $user_id
             ]);
            
           $this->session->set_flashdata('success', 'Senha atualizada com sucesso!');
           redirect('perfil');
         }else{
           $this->session->set_flashdata('danger', 'As senhas não conhecidem!');
           redirect('perfil/alterar-senha/');
         }
       }
      
         $data['title'] = 'Alterar Senha';  

         loadTemplate('includes/header', 'perfil/alterar-senha', 'includes/footer', $data);
        
    }

}
