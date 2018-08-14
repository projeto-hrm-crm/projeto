<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* author: Nikolas Lencioni
* Controller de fornecedor
**/

class Fornecedor extends PR_Controller
{
   /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
   public function __construct()
   {
      parent::__construct('fornecedor');
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
    // print_r($data);
    // exit();
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
              $this->redirectSuccess('Fornecedor cadastrado com sucesso');

          }
          else
          {
              $this->redirectError('cadastrar');
          }
      }
      else
      {

          $this->setTitle('Cadastrar Fornecedor');
          $this->addData('estados',  $this->estado->get());

          $this->loadFormDefaultScripts();

          $this->loadView('cadastrar');

      }
    }
    $data['title'] = 'Cadastrar Fornecedor';
    $data['fornecedor'] = $this->input->post();
    $data['estados'] = $this->estado->get();
    $data['assets'] = array(
     'js' => array(
       'thirdy_party/apicep.js',
       'lib/data-table/datatables.min.js',
       'lib/data-table/dataTables.bootstrap.min.js',
       'datatable.js',
       'confirm.modal.js',
       //'fornecedor/validate-form.js',
       'validate.js',
     ),
   );


  }

  private function getFromPost()
  {
      return [
          'nome'         => $this->input->post('nome'),
          'email'        => $this->input->post('email'),
          'senha'        => $this->input->post('senha'),
          'senha2'       => $this->input->post('senha2'),
          'razao_social' => $this->input->post('razao_social'),
          'cnpj'         => $this->input->post('cnpj'),
          'telefone'     => $this->input->post('telefone'),
          'id_estado'    => $this->input->post('id_estado'),
          'id_cidade'    => $this->input->post('id_cidade'),
          'cep'          => $this->input->post('cep'),
          'logradouro'   => $this->input->post('logradouro'),
          'numero'       => $this->input->post('numero'),
          'bairro'       => $this->input->post('bairro'),
          'complemento'  => $this->input->post('complemento')
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
      if($this->input->post())
      {
          if($this->form_validation->run('fornecedor'))
          {
              $this->fornecedor->update($this->getFromPostEdit($id_fornecedor));

              $this->redirectSuccess('Fornecedor atualizado com sucesso!');
          }
          else
          {
              $this->redirectError('editar/'.$id_fornecedor);
          }
      }
      else
      {
          $this->setTitle('Atualizar Fornecedor');


          $this->loadFormDefaultScripts(array('thirdy_party/apicep.js'));

          $this->addData('fornecedor', $this->fornecedor->find($id_fornecedor));
          $this->addData('estado_atual', $this->cidade->findState($this->data['fornecedor'][0]->id_cidade));
          $this->addData('estados', $this->estado->get());
          $this->addData('cidades', $this->cidade->getByState($this->data['estado_atual'][0]->id_estado));

          $this->loadView('editar');
      }
  }

  /**
  * author: Nikolas Lencioni
  * Metodo delete, chama a funçao delete de Fornecedor_model, passando o id do fornecedores
  * Redireciona para a pagina index de fornecedor
  *
  * @param $id int
  **/
  public function delete($id)
  {
     if($id){
        $this->fornecedor->delete($id);
        $this->session->set_flashdata('success', 'Fornecedor excluído com sucesso!');
     }else{
       $this->session->set_flashdata('danger', 'Não foi possível excluir!');
     }
     redirect('fornecedor');
  }
}
