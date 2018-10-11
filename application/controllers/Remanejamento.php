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
      $user_id = $this->session->userdata('');
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
        'confirm.modal.js',
      ),
    );

    loadTemplate('includes/header', 'funCargo/index', 'includes/footer', $data);
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
    if ($this->input->post())
    {
        $this->func_cargo->update(
            [
            'id_func_cargo' => $func_cargo[0]->id_func_cargo, 
            'nome'      => $data['func_cargo']['nome'],
            'email'     =>$data['func_cargo']['email']
            ]
        );

        
        $this->session->set_flashdata('success', 'func_cargo atualizado com sucesso!');

        redirect('func_cargo');
    }

    $data['func_cargo'] = $this->func_cargo->getById($id_func_cargo);
    $data['title']   = 'Editar func_cargo';
    $data['id']      = $id_func_cargo;
	$data['assets'] = array(
        'js' => array(
          'thirdy_party/apicep.js',
        ),
    );

    loadTemplate('includes/header', 'func_cargo/editar', 'includes/footer', $data);
  }

  /**
  * @author Camila Sales
  * Metodo delete, chama a funçao delete de func_cargo_model, passando o id do func_cargo
  * Redireciona para a pagina index de func_cargo
  *
  * @param $id_func_cargo int
  **/
  public function delete($id_func_cargo)
  {
    $func_cargo = $this->func_cargo->getById($id_func_cargo);
    if ($func_cargo){
      $this->func_cargo->delete($id_func_cargo);
      $this->session->set_flashdata('success', 'func_cargo excluído com sucesso!');
    }else {
         $this->session->set_flashdata('danger', 'Não foi possível excluir!');
      }
      redirect('func_cargo');
  }

}
