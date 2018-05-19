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

  public function create($id_vaga_etapa){
    $id_usuario = $this->session->userdata('user_login');
    $usuario=$this->candidato_etapa->selectCandidatoByIdUsuario($id_usuario);
    $data['id_candidato']=$usuario->id_candidato;
    $data['id_vaga_etapa']=$id_vaga_etapa;
    $this->candidato_etapa->insert($data);
    redirect('candidato_etapa');
  }

  function excluir($id_vaga_etapa)
  {
    $id_usuario = $this->session->userdata('user_login');
    $usuario=$this->candidato_etapa->selectCandidatoByIdUsuario($id_usuario);
    $id_candidato=$usuario->id_candidato;
    $this->candidato_etapa->remove($id_candidato,$id_vaga_etapa);

  }

}
