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
    $data['fornecedores'] = $this->fornecedor->get();

    loadTemplate('includes/header', 'fornecedor/index', 'includes/footer', $data);
  }

  public function create()
  {
    $data = $this->input->post();

    if ($this->form_validation->run('fornecedor'))
    {
      $this->fornecedor->insert($data);
    }

    loadTemplate('includes/header', 'fornecedor/cadastrar', 'includes/footer');
  }

  public function save(){}

  public function edit(){}

  public function update(){}

  public function delete(){}
}
