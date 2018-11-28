<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @author: Nikolas Lencioni
* @author Tiago Villalobos
* Controller de fornecedor
* Adequado ao PR_Controller para fins de abstração de código[Tiago Villalobos]
**/
class Fornecedor extends CI_Controller
{
   /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
   public function __construct()
   {

      parent::__construct('fornecedor');
      $user_id = $this->session->userdata('user_login');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      $this->usuario->hasPermission($user_id, $currentUrl);
      $this->load->model('Fornecedor_model');
   }

  /**
  * author: Nikolas Lencioni
  * Metodo index que chama a view inicial de fornecedores
  **/
  public function index()
  {

    // $this->setTitle('')


    $data['title'] = 'Fornecedores';
    $data['fornecedores'] = $this->fornecedor->get();
    $data['assets'] = array(
     'js' => array(
       'lib/data-table/datatables.min.js',
       'lib/data-table/dataTables.bootstrap.min.js',
       'datatable.js',
       'confirm.modal.js',
     ),
   );

    loadTemplate('includes/header', 'fornecedor/index', 'includes/footer', $data);
  }

  /**
  * @author: Nikolas Lencioni
  * @author: Tiago Villalobos
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de Fornecedor_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de fornecedor
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  **/

  public function create()
  {
      if($this->input->post())
      {
          if($this->form_validation->run('fornecedor'))
          {
              $fornecedor = $this->getFromPost();

              $this->fornecedor->insert($fornecedor);
              $this->session->set_flashdata('success', 'Fornecedor cadastrado com sucesso!');
              redirect('fornecedor');

          }
          else
          {
              $this->session->set_flashdata('danger', 'Não foi possível cadastrar Processo Seletivo!');
              redirect('fornecedor');
          }
      }
      else
      {
        $data['title'] = 'Cadastrar Fornecedor';
        $data['fornecedor'] = $this->input->post();
        $data['assets'] = array(
         'js' => array(
           'validate.js',
           'thirdy_party/apicep.js',
           'lib/data-table/datatables.min.js',
           'lib/data-table/dataTables.bootstrap.min.js',
           'datatable.js',
           'confirm.modal.js',
           'fornecedor/validate-form.js',

           ),
        );
        loadTemplate('includes/header', 'fornecedor/cadastrar', 'includes/footer', $data);
      }
  }

  private function getFromPost()
  {
      return [
          'nome'        => $this->input->post('nome'),
          'email'       => $this->input->post('email'),         
          'senha'       => substr(md5(date('r')), 0, 10), /*essa é a forma correta para todo e qualquer usuário. Gerar uma senha qualquer e depois ele muda. */
          'razao_social'=> $this->input->post('razao_social'),
          'cnpj'        => $this->input->post('cnpj'),
          'telefone'    => $this->input->post('telefone'),
          'cep'         => $this->input->post('cep'),
          'bairro'      => $this->input->post('bairro'),
          'logradouro'  => $this->input->post('logradouro'),
          'numero'      => $this->input->post('numero'),
          'complemento' => $this->input->post('complemento'),
          'estado'      => $this->input->post('estado'),
          'cidade'      => $this->input->post('cidade')
      ];

  }

  private function getFromPostEdit($id_fornecedor)
  {
      $postData = $this->getFromPost();

      $postData['id_fornecedor'] = $id_fornecedor;

      return $postData;
  }

  /**
  * author: Nikolas Lencioni
  * Metodo edit, apresenta o formulario de edição, com os dados do fornecedor a ser editado,
  * recebe os dados e envia para função update de Fornecedor_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de fornecedor
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id int, id do fornecedor
  **/
  public function edit($id_fornecedor)
  {
    if ($this->input->post())
    {
        $data['fornecedor'] = $this->input->post();
        $fornecedor = $this->fornecedor->find($id_fornecedor);

        $this->pessoa->update(
              [
                'id_pessoa' => $fornecedor[0]->id_pessoa,
                'nome'      => $data['fornecedor']['nome'],
                'email'     =>$data['fornecedor']['email']
              ]
            );

        $this->endereco->update(
          [
            'cep'         => $this->input->post('cep'),
            'bairro'      => $this->input->post('bairro'),
            'logradouro'  => $this->input->post('logradouro'),
            'numero'      => $this->input->post('numero'),
            'complemento' => $this->input->post('complemento'),
            'id_pessoa'   => $fornecedor[0]->id_pessoa,
            'estado'        => $this->input->post('estado'),
            'cidade'        => $this->input->post('cidade')
          ]
        );


        $this->documento->update(
          [
            'tipo'      => 'cnpj',
            'numero'    => $this->input->post('cnpj') ,
            'id_pessoa' => $fornecedor[0]->id_pessoa
          ]
        );

        $this->telefone->update(
          [
            'numero'  => $this->input->post('telefone'),
            'id_pessoa' =>  $fornecedor[0]->id_pessoa
          ]
        );

        $this->pessoa_fisica->update($fornecedor[0]->id_pessoa,
          [
            'data_nascimento' =>  switchDate($data['fornecedor']['data_nascimento']),
            'sexo'            =>  $data['fornecedor']['sexo']
          ]
        );

        $this->session->set_flashdata('success', 'fornecedor atualizado com sucesso!');

        redirect('fornecedor');
    }

    $data['fornecedor'] = $this->fornecedor->find($id_fornecedor);
    $data['title']   = 'Atualizar fornecedor';
    $data['id']      = $id_fornecedor;
  $data['assets'] = array(
        'js' => array(
          'thirdy_party/apicep.js',
        ),
    );

    loadTemplate('includes/header', 'fornecedor/editar', 'includes/footer', $data);
  }

  /**
  * author: Nikolas Lencioni
  * Metodo delete, chama a funçao delete de Fornecedor_model, passando o id do fornecedores
  * Redireciona para a pagina index de fornecedor
  *
  * @param $id int
  **/


  public function delete($id_fornecedor)
  {
    $fornecedor =  $this->db->where('produto.id_fornecedor', $id_fornecedor)->get('produto')->row();

     if(!$fornecedor){
        $this->fornecedor->delete($id_fornecedor);
        $this->session->set_flashdata('success','fornecedor removido com sucesso!');
      }else{
        $this->session->set_flashdata('danger', 'Não foi possível Realizar esta operação, Existem produtos relacionados a este fornecedor!');
     }
     redirect('fornecedor');
  }

}
