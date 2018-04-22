<?php
class Cargo extends CI_Controller
{
  public function index()
  {
    $cargos=$this->cargo->get();
    $data['title'] = 'Cargos';
    loadTemplate('includes/header', 'cargo/index', 'includes/footer', $data);
  }


  /**
  * @author: Matheus Ladislau
  * Realiza o cadastro de um cargo, dados recebidos da view cargo/cadastro.php
  */
  public function create()
  {
    $data["nome"]=$this->input->post("nome");
    $data["descricao"]=$this->input->post("descricao");
    $data["id_setor"]=$this->input->post("id_setor");
    $this->cargo->insert($data);
  }

  /**
  * @author: Matheus Ladislau
  * Realiza edição de registro de um cargo pelo id, dados recebidos pela view cargo/editar.php
  *
  * @param integer: referem-se ao id do cargo a ser alterado
  */
  public function edit($id_cargo)
  {
    $data["nome"]=$this->input->post("nome");
    $data["descricao"]=$this->input->post("descricao");
    $data["id_setor"]=$this->input->post("id_setor");
    $this->cargo->update($id_cargo,$data);
  }

  /**
  * @author: Matheus Ladislau
  * Realiza remoção de registro de um cargo pelo id, dados recebidos pela view cargo/delete.php
  *
  * @param integer: refere-se ao id do cargo a ser alterado
  */
  public function delete($id_cargo)
  {
    $this->cargo->remove($id_cargo);
  }
}
?>
