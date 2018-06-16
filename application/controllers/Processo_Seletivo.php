<?php

/**
* @author: Nikolas Lencioni
* Controller de Processo_Seletivo
**/

class Processo_Seletivo extends CI_Controller
{
  /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct()
  {
    parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      // $this->usuario->hasPermission($user_id, $currentUrl);
    $this->load->model('ProcessoSeletivo_model');
  }

  public function index()
  {
    $data['title'] = 'Processo Seletivo';
    $data['processos_seletivos'] = $this->processo_seletivo->get();
    $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js',
        ),
    );

    loadTemplate('includes/header', 'processo_seletivo/index', 'includes/footer', $data);
  }

  public function create()
  {

    if($this->input->post())
    {
      $data = $this->input->post();

      if($this->form_validation->run('processo_seletivo'))
      {
        $etapas['nome_etapa'] = $data['nome_etapa'];
        $etapas['descricao_etapa'] = $data['descricao_etapa'];

        unset($data['nome_etapa']);
        unset($data['descricao_etapa']);

        $id_processo = $this->processo_seletivo->insert($data);

        $this->etapa->insert($id_processo, $etapas['nome_etapa'], $etapas['descricao_etapa']);

        $this->session->set_flashdata('success', 'Processo Seletivo Cadastrado Com Sucesso!');

        redirect('processo_seletivo');
      }else {
        $this->session->set_flashdata('danger', 'Processo Seletivo Não Pode Ser Cadastrado');
        // redirect('processo_seletivo');
      }
    }
    $data['title'] = 'Cadastrar Processo Seletivo';
    $data['vagas'] = $this->vaga->get();
    $data['etapas'] = $this->etapa->get();
    $data['processo_seletivo'] = $this->input->post();
    $data['assets'] = array(
      'js' => array(
        'processo_seletivo/textarea_auto_expand.js',
        'processo_seletivo/cadastro_etapas.js',
      ),
    );
    loadTemplate('includes/header', 'processo_seletivo/cadastrar', 'includes/footer', $data);
  }

  public function edit($id)
  {
    if ($this->input->post())
    {
      $data = $this->input->post();

      if ($this->form_validation->run('processo_seletivo'))
      {
        $this->processo_seletivo->update($id, $data);
        for ($i=0; $i < count($data['id_etapa']); $i++) {
          $etapa[] = array(
            'id_etapa' => $data['id_etapa'][$i],
            'descricao' => $data['descricao_etapa'][$i]
          );
        }
        $this->etapa->update($id, $etapa);
        $this->session->set_flashdata('success', 'Processo Seletivo Atualizado Com Sucesso!');
        redirect('processo_seletivo');
      }else{
        $this->session->set_flashdata('danger', 'Processo Seletivo Não Pode Ser Atualizado!');
        // redirect('processo_seletivo/edit/'.$id);
      }
    }

    $data['title'] = 'Editar Processo Seletivo';
    $data['vagas'] = $this->vaga->get();
    $data['etapas'] = $this->etapa->find($id);
    $data['processo_seletivo'] = $this->processo_seletivo->find($id);
    $data['assets'] = array(
      'js' => array(
        'processo_seletivo/textarea_auto_expand.js',
      ),
    );
    loadTemplate('includes/header', 'processo_seletivo/editar', 'includes/footer', $data);
  }

  public function info($id)
  {
    if ($this->input->post())
    {
      $data = $this->input->post();

      if ($this->form_validation->run('processo_seletivo_info'))
      {
        $this->processo_seletivo->update($id, $data);
        for ($i=0; $i < count($data['id_etapa']); $i++) {
          $etapa[] = array(
            'id_etapa' => $data['id_etapa'][$i],
            'descricao' => $data['descricao_etapa'][$i]
          );
        }
        $this->etapa->update($id, $etapa);
        $this->session->set_flashdata('success', 'Processo Seletivo Atualizado Com Sucesso!');
        redirect('processo_seletivo');
      }else{
        $this->session->set_flashdata('danger', 'Processo Seletivo Não Pode Ser Atualizado.');
        // redirect('processo_seletivo/edit/'.$id);
      }
    }
    $data['info'] = $this->processo_seletivo->info($id);
    $data['title'] = 'Informações Processo Seletivo';
    $data['etapas'] = $this->etapa->find($id);
    $data['assets'] = array(
      'js' => array(
        'processo_seletivo/textarea_auto_expand.js',
      ),
    );
    loadTemplate('includes/header', 'processo_seletivo/info', 'includes/footer', $data);
  }

  public function delete($id)
  {
    $processo_seletivo = $this->processo_seletivo->find($id);
    if($processo_seletivo){
       $this->processo_seletivo->delete($id);
       $this->session->set_flashdata('success', 'Processo Seletivo Excluído Com Sucesso!');
    }else{
      $this->session->set_flashdata('danger', 'Impossível Excluir!');
    }
    redirect('processo_seletivo');
  }
}
