<?php

/**
* author: Nikolas Lencioni
* Controller de fornecedor
**/

class Fornecedor extends CI_Controller
{
  public function index()
  {
    $data = [];

    $data['title'] = 'Fornecedores';
<<<<<<< HEAD
    $data['fornecedores'] = $this->fornecedor->get();
=======
>>>>>>> 66eb316325f9ad4dea1d60901dd0ed744888ab18

    loadTemplate('includes/header', 'fornecedor/index', 'includes/footer', $data);
  }

<<<<<<< HEAD
  public function create()
  {
    $data = $this->input->post();

    if ($this->form_validation->run('fornecedor'))
    {
      $this->fornecedor->insert($data);
    }

    loadTemplate('includes/header', 'fornecedor/cadastrar', 'includes/footer');
  }
=======
  public function create(){}
>>>>>>> 66eb316325f9ad4dea1d60901dd0ed744888ab18

  public function save(){}

  public function edit(){}

  public function update(){}

  public function delete(){}
}
