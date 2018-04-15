<?php
class Setor extends CI_Controller
{
  public function index()
  {
    $setores=$this->setor->get();
    $data['title'] = 'Setores';
    loadTemplate('includes/header', 'setor/index', 'includes/footer', $data);
  }
  // 
  // public function teste(){
  //   $this->load->view("setor/cadastrar");
  // }

  /**
  * @author: Matheus Ladislau
  *Realizar o cadastro de um setor, dados recebidos da view setor/cadastro.php
  */
  public function create()
  {
    $data["nome"]=$this->input->post("nome");
    $this->setor->insert($data);
  }

  public function edit()
  {

  }

  public function delete($id_setor)
  {

  }
    //
    // echo "<pre>";
    // print_r($setores);
    // echo "</pre>";

}
