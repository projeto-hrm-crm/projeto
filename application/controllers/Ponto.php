<?php


class Funcionario extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      $this->usuario->hasPermission($user_id, $currentUrl);
    $this->load->model('funcionario_model');
  }


   public function index()
  {
    $data['title'] = 'ponto';
    $data['funcionarios'] = $this->funcionario->get();
    $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js',
        ),
    );

    foreach ($data['funcionarios'] as $key => $funcionario) {
      $data['funcionarios'][$key]->data_nascimento = switchDate($data['funcionarios'][$key]->data_nascimento);
    }

    loadTemplate('includes/header', 'ponto/index', 'includes/footer', $data);
  }


  public function edit($id_funcionario)
  {
    if ($this->input->post())
    {
      $data['funcionario'] = $this->input->post();
        $funcionario = $this->funcionario->getById($id_funcionario);

        $this->pessoa->update(['id_pessoa' => $funcionario[0]->id_pessoa, 'nome'=> $data['funcionario']['nome'],'email'=>$data['funcionario']['email']]);

        $this->documento->update(['tipo' => 'cpf','numero' => $this->input->post('cpf') , 'id_pessoa' => $funcionario[0]->id_pessoa]);

        $this->telefone->update(['numero'=>$this->input->post('tel'),'id_pessoa' => $funcionario[0]->id_pessoa]);

        $this->session->set_flashdata('success', 'Horas trabalhadas editadas com sucesso.');
        redirect('ponto');
    }

    $data['funcionario'] = $this->funcionario->getById($id_funcionario);
    $data['title'] = 'Horario de Trabalho';
    $data['id'] = $id_funcionario;
    loadTemplate('includes/header', 'ponto/editar', 'includes/footer', $data);
  }


}