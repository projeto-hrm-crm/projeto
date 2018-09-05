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
            
            $this->endereco->update(
              [
                'cep'         => $this->input->post('cep'),
                'bairro'      => $this->input->post('bairro'),
                'logradouro'  => $this->input->post('logradouro'),
                'numero'      => $this->input->post('numero'), 
                'complemento' => $this->input->post('complemento'),
                'id_pessoa'   => $id_pessoa, 
                'estado'        => $this->input->post('estado'),
                'cidade'        => $this->input->post('cidade')
              ]
            );
            
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
       
       $data['assets'] = array(
        'js' => array(
          'thirdy_party/apicep.js',
        ),
    );

      loadTemplate('includes/header', 'perfil/editar', 'includes/footer', $data);
        
    }

    /**
     * @author Pedro Henrique Guimarães
     *
     * Faz o upload do curriculum
     *
     * @param void
     * @return void
     */
    public function fileUpload()
    {
            $config['upload_path']          =  'uploads/';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('curriculum')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('uploads/upload_error', $error);
                    loadTemplate('includes/header', 'uploads/upload_error', 'includes/footer', $error);
            } else{
                    $data = array('upload_data' => $this->upload->data());
                    loadTemplate('includes/header', 'uploads/upload_success', 'includes/footer', $data);
            }
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
