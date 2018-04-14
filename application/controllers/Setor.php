<?php
class Setor extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Setores';
    loadTemplate(
      'includes/header',
      'setor/setor',
      'includes/footer',
      $data
    );
  }

  public function create()
  {

  }

  public function edit()
  {

  }

  public function delete()
  {

  }

}
