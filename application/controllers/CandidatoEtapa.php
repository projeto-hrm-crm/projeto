<?php
/**
* author: Matheus Ladislau
* Controller de candidato-etapa
**/
class CandidatoEtapa extends CI_Controller
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
    #$this->usuario->hasPermission($user_id, $currentUrl);

  }
  /**
  * author: Matheus Ladislau
  * Metodo index que chama a view inicial de candidato-etapa
  **/
  public function index()
  {
    $data['title'] = 'Candidatar-se à Vaga';
    $data['vagas'] = $this->vaga->get();
    loadTemplate(
      'includes/header',
      'candidato_etapa/index',
      'includes/footer',
      $data);
  }

  /**
  * @author: Matheus Ladislau
  * Realiza criação de registro de um vaga_etapa pelo id vaga etapa e usuario, coletado por sessão
  *
  *@param integer: refere-se ao id da vaga a ser vinculada ao usuário/candidato atual
  */
  function create()
  {
    redirect('candidato_etapa');
  }

  /**
  * @author: Matheus Ladislau
  * Realiza criação de registro de um vaga_etapa pelo id vaga etapa e usuario, coletado por sessão
  *
  *@param integer: refere-se ao id da vaga a ser vinculada ao usuário/candidato atual
  */
  function createCandidatoEtapa($id_vaga_etapa)
  {
    $id_usuario = $this->session->userdata('user_login');
    $usuario=$this->candidato_etapa->selectCandidatoByIdUsuario($id_usuario);
    $data['id_candidato']=$usuario->id_candidato;
    $data['id_vaga_etapa']=$id_vaga_etapa;
    $this->candidato_etapa->insert($data);
    $this->session->set_flashdata('success', 'Realizada candidatura à vaga com sucesso');
    redirect('candidato_etapa');
  }

  /**
  * @author: Matheus Ladislau
  * Realiza remoção de registro de um vaga_etapa pelo id vaga etapa e usuario, coletado por sessão
  *
  *@param integer: refere-se ao id da vaga ligada ao usuário atual
  */
  function delete($id_vaga_etapa)
  {
    $id_usuario = $this->session->userdata('user_login');
    $usuario=$this->candidato_etapa->selectCandidatoByIdUsuario($id_usuario);
    $id_candidato=$usuario->id_candidato;
    $this->candidato_etapa->remove($id_candidato,$id_vaga_etapa);
    $this->session->set_flashdata('success', 'Candidatura excluída');

    redirect('candidato_etapa');
  }

}