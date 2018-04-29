<?php
class Setor extends CI_Controller
{

  public function __construct()
    {
      parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $url = isset($_SERVER['PATH_INFO']) ? rtrim($_SERVER['PATH_INFO'], '') : '';
      #$this->usuario->hasPermission($user_id, $url);
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
    $data["nome"]=$this->input->post("nome");
    $this->setor->insert($data);
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
      redirect('setor');
    }else{
      $data['setor'] = $this->setor->find($id_setor);
      $data['title'] = 'Editar Setor';
      $data['id_setor'] = $id_setor;
      loadTemplate(
        'includes/header',
        'setor/editar',
        'includes/footer', $data);
    }
  }

  /**
  * @author: Matheus Ladislau
  *Realiza remoção de registro de um setor pelo id, dados recebidos pela view setor/delete.php
  *
  *@param integer: referen-se ao id do setor a ser alterado
  */
  public function delete($id_setor)
  {
    $this->setor->remove($id_setor);
  }
}
