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
    **/
    public function index(){
      $typeUser = $this->usuario->getUserAccessGroup($this->session->userdata('user_login'));
      $user_id = $this->session->userdata('user_login');
      $data['pessoa'] = $this->usuario->getUserNameById($this->session->userdata('user_login'));
      $id_pessoa = $data['pessoa'][0]->id_pessoa;

      $data['title'] = 'Meu Perfil';


      $data['endereco'] = $this->endereco->findAddress($id_pessoa);

      $data['habilidades'] = $this->habilidade->get($id_pessoa);

      $data['curriculum'] = "";

      if($typeUser==5) {
         $curriculum = $this->candidato->findCurriculum($id_pessoa)[0]->curriculum;
         if($curriculum) {
            $data['curriculum'] = base_url()."uploads/".$curriculum;
         }
      }
      $data['tipoUsuario'] = $typeUser;

      $image = $this->pessoa->findImage($id_pessoa)[0]->imagem;

      if($image) {
         $data['imagem'] = base_url()."uploads/profileImage/".$image;
      }else{
         $data['imagem'] = base_url()."assets/images/theme/no-user.png";
      }


      $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js',
        ),
    );
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
    public function fileUpload() {

       $user_id = $this->session->userdata('user_login');

      //Pega o tipo de usuario e informações de pessoas
      $typeUser = $this->usuario->getUserAccessGroup($user_id);
      $data['pessoa'] = $this->usuario->getUserNameById($user_id);

      // Pegar informações de cliente
      $id_pessoa = $data['pessoa'][0]->id_pessoa;

      $oldFile = $this->candidato->findCurriculum($id_pessoa)[0]->curriculum;

      if($oldFile) {
         unlink('./uploads/'.$oldFile);
      }

       if (isset($_FILES['arquivo']))  {
         $arquivo    = $_FILES['arquivo'];
         $image_name = generateImageName($arquivo['name']);
         $configuracao = array(
            'upload_path'   => './uploads/',
            'allowed_types' => 'pdf|doc|docs',
            'file_name'     => $image_name,
            'max_size'      => '999999'
         );

         $this->load->library('upload');
         $this->upload->initialize($configuracao);

         if ($this->upload->do_upload('arquivo')){

            $array = array(
              'arquivo' => $image_name,
              'id_pessoa' => $id_pessoa,
            );

            $this->candidato->fileUpdate($array);

            $this->session->set_flashdata('success', 'Curriculum enviado com sucesso!');
            redirect('perfil');
         }
         else{
            $this->session->set_flashdata('danger', 'Não foi possivel enviar o arquivo! O arquivo de ter no máximo 2mb de tamanho  e possuir a extensão pdf, doc ou docx');
            redirect('perfil/enviar-curriculum');
         }

       }

       $data['title'] = 'Enviar Curriculum';
       loadTemplate('includes/header', 'perfil/enviar-curriculum', 'includes/footer', $data);

    }

   public function profileImage() {

      $user_id = $this->session->userdata('user_login');

      //Pega o tipo de usuario e informações de pessoas
      $typeUser = $this->usuario->getUserAccessGroup($user_id);
      $data['pessoa'] = $this->usuario->getUserNameById($user_id);

      // Pegar informações de cliente
      $id_pessoa = $data['pessoa'][0]->id_pessoa;

      $oldFile = $this->pessoa->findImage($id_pessoa)[0]->imagem;


      if($oldFile) {
         unlink('./uploads/profileImage/'.$oldFile);
      }

       if (isset($_FILES['arquivo']))  {

         $arquivo    = $_FILES['arquivo'];
         $image_name = generateImageName($arquivo['name']);
         $configuracao = array(
            'upload_path'   => './uploads/profileImage/',
            'allowed_types' => 'jpeg|jpg|png',
            'file_name'     => $image_name,
            'max_size'      => '999999'
         );

         $this->load->library('upload');
         $this->upload->initialize($configuracao);

         if ($this->upload->do_upload('arquivo')){
            $size = getimagesize('./uploads/profileImage/'.$image_name);
            $largura = $size[0];
            $altura = $size[1];


            $config['image_library'] = 'gd2';
            $config["source_image"] = './uploads/profileImage/'.$image_name;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['new_image'] = './uploads/profileImage/'.$image_name;
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = FALSE;

            if($largura > $altura){
               $config['width'] = $altura;
               $config['height'] = $altura;
            }else {
               $config['width'] = $largura;
               $config['height'] = $largura;
            }

            $this->load->library('image_lib', $config);


            if ($this->image_lib->crop()){

               $array = array(
                 'arquivo' => $image_name,
                 'id_pessoa' => $id_pessoa,
               );



               $this->pessoa->imageUpdate($array);
               $this->session->set_flashdata('success', 'Imagem de perfil atualizada com sucesso!');
               redirect('perfil');
            }
         }
         else{
            //echo $this->upload->display_errors();
            //exit;
            $this->session->set_flashdata('danger', 'Não foi possivel enviar o arquivo! O arquivo de ter no máximo 2mb de tamanho e possuir a extensão jpg, jpeg ou png');
            redirect('perfil/alterar-imagem');
         }

       }

       $data['title'] = 'Enviar Curriculum';

       loadTemplate('includes/header', 'perfil/alterar-imagem', 'includes/footer', $data);

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

      if ($data) {

         if (($data['senha']==$data['senha-confirme']) and $data['senha'] and $data['senha-confirme']) {
            echo $this->usuario->changePassword([
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
