<?php
class Setor extends CI_Controller
{
  public function index()
  {
    $setores=$this->setor->get();
    $data['title'] = 'Setores';
    loadTemplate('includes/header', 'setor/index', 'includes/footer', $data);
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
  public function edit($id)
  {
    $id_setor=$id;
    $data["nome"]=$this->input->post("nome");
    $this->setor->update($data,$id_setor);
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
