<?php
class Setor extends CI_Controller
{
  public $menus;

  function __construct()
  {
    parent::__construct();
    $user_id = $this->session->userdata('user_login');
    $url = isset($_SERVER['PATH_INFO']) ? rtrim($_SERVER['PATH_INFO'], '') : '';
    // $this->usuario->hasPermission($user_id, $url);
    $this->menus = $this->menu->getUserMenu($user_id);
  }

  /**
  * @author: Matheus Ladislau
  * Realiza o carregamento da página inicial de setor, apresentando os setores
  */
  public function index()
  {
    $data['title'] = 'Setores';
    $data['setores'] = $this->setor->get();
    $data['menus'] = $this->menus;
    $data['assets']= array(
      'js' =>array(
        'lib/data-table/datatables.min.js',
        'lib/data-table/datatables.bootstrap.min.js',
        'datatable.js',
        'confirm.modal.js',
      ),
    );
    loadTemplate(
      'includes/header',
      'setor/index',
      'includes/footer', $data);
  }

    /**
  * @author: Matheus Ladislau
  * Realiza o cadastro de um setor, dados recebidos da view setor/cadastro.php
  */
  public function create()
  {
    if($this->input->post())
    {
      $data["nome"]=$this->input->post("nome");
      $this->setor->insert($data);
      $this->session->set_flashdata('success', 'setor cadastrado com sucesso');
      redirect('setor');
    }else{
      $data['title'] = 'Cadastrar Setor';
      $data['menus'] = $this->menus;
      loadTemplate(
        'includes/header',
        'setor/cadastrar.php',
        'includes/footer',$data);
  }
}

  /**
  * @author: Matheus Ladislau
  *Realiza edição de registro de um setor pelo id, dados recebidos pela view setor/editar.php
  *
  *@param integer: referen-se ao id do setor a ser alterado
  */
  public function edit($id_setor)
  {
    if($this->input->post())
    {
      $data["nome"]=$this->input->post("nome");
      $this->setor->update($data,$id_setor);
      $this->session->set_flashdata('success', 'setor editado com sucesso');
      redirect('setor');
    }else{
      $data['setor'] = $this->setor->find($id_setor);
      $data['title'] = 'Editar Setor';
      $data['id_setor'] = $id_setor;
      $data['menus'] = $this->menus;
      loadTemplate(
        'includes/header',
        'setor/editar',
        'includes/footer', $data);
      }

  }

  /**
  * @author: Matheus Ladislau
  * Realiza remoção de registro de um setor pelo id, dados recebidos pela view setor/delete.php
  *
  *@param integer: referen-se ao id do setor a ser alterado
  */
  public function delete($id_setor)
  {
    $this->setor->remove($id_setor);
    $this->session->set_flashdata('success', 'setor excluído com sucesso');
    redirect('setor');
  }
}
