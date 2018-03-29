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

    loadTemplate('includes/header', 'fornecedor/index', 'includes/footer', $data);
  }

  public function create(){}

  public function save(){}

  public function edit(){}

  public function update(){}

  public function delete(){}
}
