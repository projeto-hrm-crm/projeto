<?php

/**
* author: Camila Sales
* author: Mayra Bueno
* Controller de candidato
**/

class Candidato extends CI_Controller
{
  public $menus;

  /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct()
  {
    parent::__construct();
    $user_id = $this->session->userdata('user_login');
    $url = isset($_SERVER['PATH_INFO']) ? rtrim($_SERVER['PATH_INFO'], '') : '';
    // $this->usuario->hasPermission($user_id, $url);
    $this->menus = $this->menu->getUserMenu($user_id);
  }
  /**
  * author: Camila Sales
  * Metodo index que chama a view inicial de candidato
  **/
  public function index()
  {
    $data['title'] = 'Candidatos';
    $data['candidatos'] = $this->candidato->get();
    $data['menus'] = $this->menus;

    loadTemplate('includes/header', 'candidato/index', 'includes/footer', $data);
  }


  /**
  * author: Camila Sales
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de candidato_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de candidato
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  **/
  public function create()
  {
    $data['candidato']  = $this->input->post();

    if($data['candidato']){
      if(!$this->form_validation->run('pessoa'))
      {
        $this->session->set_flashdata('errors', $this->form_validation->error_array());
        $this->session->set_flashdata('old_values', $this->input->post());

        $this->session->set_flashdata(
          'danger',
          'Não foi possível realizar o cadastro<br>Verifique os campos abaixo'
        );

        redirect('candidato/cadastrar');
      }
      else
      {
        $id_pessoa = $this->pessoa->insert(['nome' => $data['candidato']['nome'], 'email' => $data['candidato']['email']]);
        $id_pessoa_fisica = $this->pessoa_fisica->insert(['data_nascimento'=> $data['candidato']['data_nacimento'],'sexo'=>$data['candidato']['sexo'],'id_pessoa'=>$id_pessoa]);
        $this->candidato->insert(['id_pessoa' => $id_pessoa]);
        $this->session->set_flashdata('success', 'Candidato cadastrado com sucesso.');
        redirect('candidato');
      }
    }
    $data['menus'] = $this->menus;
    $data['title'] = 'Cadastrar Candidato';
    loadTemplate('includes/header', 'candidato/cadastrar', 'includes/footer', $data);
  }


  /**
  * author: Camila Sales
  * Metodo edit, apresenta o formulario de edição, com os dados do candidato a ser editado,
  * recebe os dados e envia para função update de candidato_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de candidato
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id_candidato int
  **/
  public function edit($id_candidato)
  {
    if ($this->input->post())
    {
      $data['candidato'] = $this->input->post();
      $candidato = $this->candidato->find($id_candidato);

      $this->pessoa->update(['id_pessoa' => $candidato[0]->id_pessoa, 'nome'=> $data['candidato']['nome'],'email'=>$data['candidato']['email']]);
      $this->pessoa_fisica->update($candidato[0]->id_pessoa,['data_nascimento'=> $data['candidato']['data_nascimento'],'sexo'=>$data['candidato']['sexo']]);
      $this->session->set_flashdata('success', 'Candidato editado com sucesso.');
      redirect('candidato');
    }

    $data['candidato'] = $this->candidato->find($id_candidato);
    $data['title'] = 'Editar Candidato';
    $data['id'] = $id_candidato;
    $data['menus'] = $this->menus;

    loadTemplate('includes/header', 'candidato/editar', 'includes/footer', $data);
  }

  /**
  * author: Camila Sales
  * Metodo delete, chama a funçao delete de Candidato_model, passando o id do candidato
  * Redireciona para a pagina index de candidato
  *
  * @param $id_candidato int
  **/
  public function delete($id_candidato)
  {
    $data['candidato'] = $this->candidato->find($id_candidato);
    if ($data)
    {
      $this->candidato->remove($id_candidato);
      $this->session->set_flashdata('success', 'Candidato excluido com sucesso');
      redirect('candidato');
    }
  }
}
