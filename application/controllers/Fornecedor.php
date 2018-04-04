<?php

/**
* author: Nikolas Lencioni
* Controller de fornecedor
**/

class Fornecedor extends CI_Controller
{
  public function index()
  {
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
    }else{
      // echo "invalid form";
    }

    $data['title'] = 'Cadastrar Fornecedor';
    loadTemplate('includes/header', 'fornecedor/cadastrar', 'includes/footer', $data);
  }


  public function edit($id)
  {
    if ($this->input->post())
    {
      $data['fornecedor'] = $this->input->post();
      if ($this->form_validation->run('fornecedor'))
      {
        $this->fornecedor->update($id, (array)$data['fornecedor']);
      }else{
        // echo "invalid form";
      }
    }

    $data['fornecedor'] = $this->fornecedor->find($id);
    $data['title'] = 'Editar Fornecedor';
    $data['id'] = $id;

    loadTemplate('includes/header', 'fornecedor/editar', 'includes/footer', $data);
  }


  public function delete($id)
  {
    $data['fornecedor'] = $this->fornecedor->find($id);
    if ($data)
    {
      $this->fornecedor->delete($id);
      redirect('fornecedor');
    }
  }
}
