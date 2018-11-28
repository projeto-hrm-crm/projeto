<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Produto_controller tera controle sobre as rotas em:
 * http://localhost/projeto/produto
 */

class Produto extends CI_Controller
{

    /**
     * @author Pedro Henrique Guimarães
     * Com a configuração do menu esse controller serve como base para todos os outros controllers
     * onde todos devem seguir essa mesma estrutura mínima no consrutor.
     */
    public function __construct()
    {
      parent::__construct();
      $access_group = $this->session->userdata('user_id_grupo_acesso');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      $this->usuario->hasPermission($access_group, $currentUrl);
    }
    /**
      *@author: Dhiego Balthazar
      * Esse método tem a finalidade de retornar uma lista com todos os produtos
      * cadastrados
      *
      * @return array - carrega lista produtos para view
      */
    // Rota: http://localhost/projeto/produto
    public function index()
    {  
      $user_id = $this->session->userdata('user_login');
      $id_grupo_acesso = $this->usuario->getUserAccessGroup($user_id);

      switch ($id_grupo_acesso) {
        //login de administrador
        case '1':
          $dados['title'] = 'Produtos';
          $dados['produtos'] = $this->produto->get();
          break;
          //login de fornecedor
          case '3':
          $dados['title'] = 'Produtos';
          $dados['produtos'] = $this->produto->getFornecedorLogado($user_id);

          break;

          default:
        # code...
          break;
      }
      $dados['assets'] = array(
            'js' => array(
              'lib/data-table/datatables.min.js',
              'lib/data-table/dataTables.bootstrap.min.js',
              'datatable.js',
              'maskMoney.js',
              'confirm.modal.js',
            ),
          );

          $produtos = $dados['produtos'];
          foreach($produtos as $produto){
              $produto->fabricacao = switchDate($produto->fabricacao);
              $produto->validade = switchDate($produto->validade);
              $produto->recebimento = switchDate($produto->recebimento);

          }
          loadTemplate('includes/header', 'produto/index', 'includes/footer', $dados);
    }

    /**
     * @author: Dhiego Balthazar
     * Se não houver post ele carrega a pagina cadastrar
     * Esse método tem a finalidade de cadastrar um produto
     * Se der certo ele redireciona para a lista de produtos
     * Se der errado ele aciona um danger na pagina de cadastro
     *
     * Rota: http://localhost/projeto/produto/cadastrar
     */
    public function create()
    {
      if($this->input->post()){

        if($this->form_validation->run('produto')){
          
          # upload de imagem
          
          if (isset($_FILES['arquivo']))  {
            
            $arquivo    = $_FILES['arquivo'];
            $image_name = generateImageName($arquivo['name']);
            $configuracao = array(
               'upload_path'   => './uploads/produtoImage/',
               'allowed_types' => 'jpef|jpg|png',
               'file_name'     => $image_name,
               'max_size'      => '999999'
            );
   
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
   
            if ($this->upload->do_upload('arquivo')){
   
               $size = getimagesize('./uploads/produtoImage/'.$image_name);
   
               $largura = $size[0];
               $altura = $size[1];
   
               $config['image_library'] = 'gd2';
               $config["source_image"] = './uploads/produtoImage/'.$image_name;
               $config['allowed_types'] = 'jpef|jpg|png';
               $config['new_image'] = './uploads/produtoImage/'.$image_name;
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
   
                
               }
              
            }
            # image upooad

            $array = array(
              'id_fornecedor' => $this->input->post('id_fornecedor'),
              'nome'          => $this->input->post('nome'),
              'descricao' => $this->input->post('descricao'),
              'codigo'        => $this->input->post('codigo'),
              'fabricacao'    => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
              'validade'      => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validade')))),
              'recebimento'   => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
              'lote'          => $this->input->post('lote'),
              'imagem'        => $arquivo['name'],
              'valor'         => str_replace(',','',(str_replace('.','',$this->input->post('valor')))),
             );
   
               $this->produto->insert($array);
               $this->session->set_flashdata('success','Produto cadastrado com sucesso!');
               redirect('produto');
          }   

          
        }else{
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            $this->session->set_flashdata('old_data', $this->input->post());
            redirect('produto/cadastrar');
        }
      }else{
        $dados['title'] = 'Cadastrar produto';
        $dados['errors'] = $this->session->flashdata('errors');
        $dados['old_data'] = $this->session->flashdata('old_data');
        $dados['fornecedores'] = $this->fornecedor->getRazaoSocial();
        $dados['assets'] = array(
         'js' => array(
           'lib/jquery/jquery.maskMoney.min.js',
           'validate.js',
           'maskMoney.js',
         ),
       );
        loadTemplate('includes/header', 'produto/cadastrar', 'includes/footer', $dados);
      }
    }

    /**
     * @author: Dhiego Balthazar
     * Se não houver post ele carrega a pagina editar
     * Esse método tem a finalidade de cadastrar um produto
     * Se der certo ele redireciona para a lista de produtos
     * Se der errado ele aciona um danger na pagina de cadastro
     *
     * Rota: http://localhost/projeto/produto/editar
     */
    public function edit($id) {
      if($this->input->post()) {
        
        if($this->form_validation->run('produto')) {
          
          # upload de imagem
          
          if (isset($_FILES['arquivo']))  {
            
            $arquivo    = $_FILES['arquivo'];
            $configuracao = array(
               'upload_path'   => './uploads/produtoImage/',
               'allowed_types' => 'jpef|jpg|png',
               'file_name'     => $arquivo['name'],
               'max_size'      => '999999'
            );
   
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
   
            if ($this->upload->do_upload('arquivo')){
   
               $size = getimagesize('./uploads/produtoImage/'.$arquivo["name"]);
   
               $largura = $size[0];
               $altura = $size[1];
   
               $config['image_library'] = 'gd2';
               $config["source_image"] = './uploads/produtoImage/'.$arquivo["name"];
               $config['allowed_types'] = 'jpef|jpg|png';
               $config['new_image'] = './uploads/produtoImage/'.$arquivo['name'];
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
   
                
               }
              
             }
          }
            # image upooad

          
          
          $array = array(
           'id_produto'    => $id,
           'id_fornecedor' => $this->input->post('id_fornecedor'),
           'nome'          => $this->input->post('nome'),
           'descricao' => $this->input->post('descricao'),
           'codigo'        => $this->input->post('codigo'),
           'fabricacao'    => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
           'validade'      => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validade')))),
           'lote'          => $this->input->post('lote'),
           'imagem'        => $arquivo['name'],
           'recebimento'   => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
           'valor'         => str_replace(',','',(str_replace('.','',$this->input->post('valor')))),
         );
          $this->produto->update($array);
          $this->session->set_flashdata('success','Produto atualizado com sucesso!');
          redirect('produto');
        }else{
          $this->session->set_flashdata('errors', $this->form_validation->error_array());
          $this->session->set_flashdata('old_data', $this->input->post());
          redirect('produto/editar/'.$id);
        }
      }else{
        $data['errors'] = $this->session->flashdata('errors');
        $data['title'] = 'Alterar Produto';
        $data['old_data'] = $this->session->flashdata('old_data');
        $data['produto'] = $this->produto->getById($id);
        $data['produto']->fabricacao = switchDate($data['produto']->fabricacao);
        $data['produto']->validade = switchDate($data['produto']->validade);
        $data['produto']->recebimento = switchDate($data['produto']->recebimento);
        $data['fornecedores'] = $this->fornecedor->getRazaoSocial();
        $data['assets'] = array(
         'js' => array(
           'lib/jquery/jquery.maskMoney.min.js',
           'validate.js',
           'maskMoney.js',
         ),
       );
        loadTemplate('includes/header', 'produto/editar', 'includes/footer', $data);
      }
    }
  


  
    /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de deletar
     * Se der certo ele lança um succes na lista de produtos
     * Se der errado ele lança um danger na lista de produtos
     * @param: $id
     * Rota: http://localhost/projeto/produto/deletar
     */

    public function delete($id)
    {
      $produto = $this->pedido->checkIfProductIssetInSomeOrder($id);

      if(!$produto){
        $this->produto->delete($id);
        $this->session->set_flashdata('success', 'Produto excluído com sucesso!');
      }else{
        $this->session->set_flashdata('danger','Não foi possivel realizar esta operação, existem pedidos dependentes desse produto!');
      }
      redirect('produto');
    }


    public function produtoImage() 
    {

      // Pegar informações do produto
      $id_produto = $data['produto'][0]->id_produto;

      $oldFile = $this->produto->findImage($id_produto)[0]->imagem;


      if($oldFile) {
         unlink('./uploads/produtoImage/'.$oldFile);
      }
      
       if (isset($_FILES['arquivo']))  {

         $arquivo    = $_FILES['arquivo'];
         $configuracao = array(
            'upload_path'   => './uploads/produtoImage/',
            'allowed_types' => 'jpef|jpg|png',
            'file_name'     => $arquivo['name'],
            'max_size'      => '999999'
         );

         $this->load->library('upload');
         $this->upload->initialize($configuracao);

         if ($this->upload->do_upload('arquivo')){

            $size = getimagesize('./uploads/produtoImage/'.$arquivo["name"]);

            $largura = $size[0];
            $altura = $size[1];


            $config['image_library'] = 'gd2';
            $config["source_image"] = './uploads/produtoImage/'.$arquivo["name"];
            $config['allowed_types'] = 'jpef|jpg|png';
            $config['new_image'] = './uploads/produtoImage/'.$arquivo['name'];
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
                 'arquivo' => $arquivo['name'],
                 'id_produto' => $id_produto,
               );


               $this->produto->imageUpdate($array);

               $this->session->set_flashdata('success', 'Imagem atualizada com Sucesso!');
               redirect('produto');
            }
         }
         else{
            //echo $this->upload->display_errors();
            //exit;
            $this->session->set_flashdata('danger', 'Não foi possivel enviar o arquivo! O arquivo de ter no máximo 2mb de tamanho  e possuir a extensão jpg, jpeg ou png');
            redirect('produto');
         }
       }
}
}
