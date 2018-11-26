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
      $this->usuario->hasPermission($user_id, $currentUrl);
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
        if (isset($data['nome_etapa'])) {
          $etapas['nome_etapa'] = $data['nome_etapa'];
          $etapas['descricao_etapa'] = $data['descricao_etapa'];
          unset($data['nome_etapa']);
          unset($data['descricao_etapa']);
        }

        $data['data_inicio'] = switchDate($data['data_inicio']);
        $data['data_fim'] = switchDate($data['data_fim']);
        $id_processo = $this->processo_seletivo->insert($data);

        if (isset($etapas['nome_etapa'])) {
          $this->etapa->insert($id_processo, $etapas['nome_etapa'], $etapas['descricao_etapa']);
        }

        $this->session->set_flashdata('success', 'Processo Seletivo cadastrado com sucesso!');

        redirect('processo_seletivo');
      }else {
        $this->session->set_flashdata('danger', 'Não foi possível cadastrar Processo Seletivo!');
        // redirect('processo_seletivo');
      }
    }
    $data['title'] = 'Cadastrar Processo Seletivo';
    $data['vagas'] = $this->vaga->get();
    $data['funcionarios'] = $this->funcionario->get();
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
        $data['data_inicio'] = switchDate($data['data_inicio']);
        $data['data_fim'] = switchDate($data['data_fim']);

        $etapas = $this->etapa->find($id);
        foreach ($etapas as $key => $etapa_ant) {
            if(isset($data['nome_etapa'][$key])) {
                $etapa[] = array(
                    'id_etapa' => $etapa_ant->id_etapa,
                    'nome' => $data['nome_etapa'][$key],
                    'descricao' => $data['descricao_etapa'][$key]
                );
                if(isset($etapa))
                  $this->etapa->update($id, $etapa);
            } else {
                $this->etapa->remove($etapa_ant->id_etapa);
            }
        }

        if(isset($data['nome_etapa'])){
          if (count($data['nome_etapa'])>count($etapas)) {
            foreach ($data['nome_etapa'] as $key => $novaEtapa) {
              if(!isset($etapas[$key])){
                $novas['nome_etapa'][$key] =  $data['nome_etapa'][$key];
                $novas['descricao_etapa'][$key] = $data['descricao_etapa'][$key];
              }
            }
            $this->etapa->insert($id, $novas['nome_etapa'], $novas['descricao_etapa']);
          }
          unset($data['nome_etapa']);
          unset($data['descricao_etapa']);
        }
        $this->processo_seletivo->update($id, $data);
        $this->session->set_flashdata('success', 'Processo Seletivo atualizado com sucesso!');
        redirect('processo_seletivo');
      }else{
        $this->session->set_flashdata('danger', 'Não foi possível atualizar o Processo Seletivo!');
        // redirect('processo_seletivo/edit/'.$id);
      }
    }

    $data['title'] = 'Editar Processo Seletivo';
    $data['vagas'] = $this->vaga->get();
    $data['etapas'] = $this->etapa->find($id);
    $data['funcionarios'] = $this->funcionario->get();

    $data['processo_seletivo'] = $this->processo_seletivo->find($id);

    $data['processo_seletivo'][0]->data_inicio = switchDate($data['processo_seletivo'][0]->data_inicio);
    $data['processo_seletivo'][0]->data_fim = switchDate($data['processo_seletivo'][0]->data_fim);

    $data['assets'] = array(
      'js' => array(
         'processo_seletivo/avancar_status.js',
        'processo_seletivo/cadastro_etapas.js',
        'processo_seletivo/textarea_auto_expand.js',
      ),
    );
    loadTemplate('includes/header', 'processo_seletivo/editar', 'includes/footer', $data);
  }

  public function info($id)
  {
    $data['info'] = $this->processo_seletivo->info($id);
    $data['vaga'] = $this->vaga->getById($data['info'][0]->id_vaga);
    $data['info'][0]->data_fim = switchDate($data['info'][0]->data_fim);
    $data['info'][0]->data_inicio = switchDate($data['info'][0]->data_inicio);
    $data['title'] = 'Informações Processo Seletivo';
    $data['etapas'] = $this->etapa->find($id);
    foreach ($data['etapas'] as $key => $etapa) {
      $data['etapas'][$key]->candidatos = $this->candidato_etapa->get($etapa->id_etapa);
    }

    // print_r($data);
    // exit;
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
       $this->session->set_flashdata('success', 'Processo Seletivo excluído com sucesso!');
    }else{
      $this->session->set_flashdata('danger', 'Não foi possível excluir!');
    }
    redirect('processo_seletivo');
  }

     public function avancar($id, $status)
   {
    echo json_encode($this->etapa->updateStatus($id, $status));

  }

  public function candidato_processo($id_processo)
  {
    $data['title'] = 'Candidatos do Processo Seletivo';
    $data['candidatos'] = $this->candidato->findCandidatoByProcesso($id_processo);
    $data['processo_seletivo'] = $this->processo_seletivo->find($id_processo);
    $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js',
        ),
    );
    loadTemplate('includes/header', 'processo_seletivo/candidatos', 'includes/footer', $data);
  }


}