<?php

/**
* author: Camila Sales
* Controller de func_cargo
**/

class Remanejamento extends CI_Controller
{
  /**
  * @author Pedro Henrique Guimarães
  * Com a configuração do menu esse controller serve como base para todos os outros controllers
  * onde todos devem seguir essa mesma estrutura mínima no consrutor.
  */
  public function __construct()
  {
    parent::__construct();
    $user_id = $this->session->userdata('user_login');
    $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $this->usuario->hasPermission($user_id, $currentUrl);
  }
  /**
  * @author Camila Sales
  * Metodo index que chama a view inicial de func_cargo
  **/
  public function index()
  {
    $data['title'] = 'Funcionarios Setores';
    $data['func_cargos'] = $this->cargo_funcionario->get();
    $data['assets'] = array(
      'js' => array(
        'lib/data-table/datatables.min.js',
        'lib/data-table/dataTables.bootstrap.min.js',
        'datatable.js',
        'maskMoney.js',
        'confirm.modal.js',
      ),
    );
    
    loadTemplate('includes/header', 'remanejamento/index', 'includes/footer', $data);
  }
  /**
  * @author: Camila Sales
  * Realiza o cadastro de um sugestao, dados recebidos da view remanejamento/cadastro.php
  */
  public function create() {
    
    $data = $this->input->post();
    
    if($data) {
      
      if($this->form_validation->run('remanejamento')) {
        $data['criado'] = date("Y-m-d H:i:s");
        $data['atualizado'] = date("Y-m-d H:i:s");
        $data['status'] = 1;

        $this->cargo_funcionario->insert($data);
        $this->session->set_flashdata('success', 'Remanejamento cadastrado com sucesso!');
        redirect('remanejamento');
      }else {
        $this->session->set_flashdata('danger', 'Não foi possivel cadastrar');
        redirect('remanejamento/cadastrar');
      }
      
    }else {
      $data['title'] = 'Remanejamento';             
      $data['cargos'] = $this->cargo->get();             
      $data['setores'] = $this->setor->get();             
      $data['funcionarios'] = $this->funcionario->get();             
      loadTemplate('includes/header', 'remanejamento/cadastrar', 'includes/footer', $data);
      
    }
    
  }
  
  
  /**
  * @author Camila Sales
  * Metodo edit, apresenta o formulario de edição, com os dados do func_cargo a ser editado,
  * recebe os dados e envia para função update de func_cargo_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de func_cargo
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id_func_cargo int
  **/
  public function edit($id_func_cargo)
  {
    if ($this->input->post()){
      $data = $this->input->post();
      $data['atualizado'] = date("Y-m-d H:i:s");

      $this->cargo_funcionario->update($id_func_cargo,$data);
      
      $this->session->set_flashdata('success', 'Remanejamento atualizado com sucesso!');
      
      redirect('remanejamento');
    }
    $data['cargos']         = $this->cargo->get();             
    $data['setores']        = $this->setor->get();             
    $data['funcionarios']   = $this->funcionario->get();  
    $data['remanejamento']  = $this->cargo_funcionario->getById($id_func_cargo);
    $data['title']          = 'Editar Remanejamento';
    $data['id']             = $id_func_cargo;
    
    loadTemplate('includes/header', 'remanejamento/editar', 'includes/footer', $data);
  }
  
  /**
  * @author Camila Sales
  * Metodo delete, chama a funçao delete de func_cargo_model, passando o id do func_cargo
  * Redireciona para a pagina index de func_cargo
  *
  * @param $id_func_cargo int
  **/
  public function delete($id_func_cargo) {
    $func_cargo = $this->cargo_funcionario->getById($id_func_cargo);
    if ($func_cargo){
      $data['atualizado'] = date("Y-m-d H:i:s");
      $data['deletado'] = date("Y-m-d H:i:s");
      $data['status'] = 0;

      $this->cargo_funcionario->update($id_func_cargo,$data);
      $this->session->set_flashdata('success', 'Remanejamneto desativado com sucesso!');
    }else {
      $this->session->set_flashdata('danger', 'Não foi possível excluir!');
    }
    redirect('remanejamento');
  }
  
}