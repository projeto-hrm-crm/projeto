<?php
class Cliente extends CI_Controller
{

  public function index(){

  }
  public function insert();
  {
    $data = $this->input->post();
    if ($this->form_validation->run()) {
      $this->db->insert('cliente', $data);
    }
  }




}
