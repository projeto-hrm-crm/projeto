<?php
/**
* author: Matheus Ladislau
* Controller de candidato-vaga
**/
class CandidatoVaga extends CI_Controller
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
  * Metodo index que chama a view inicial de candidato vaga
  **/
  public function index()
  {
    $data['title'] = 'Candidatar a Vaga';
    $data['vagas'] = $this->vaga->get();
    loadTemplate(
      'includes/header',
      'candidato_vaga/index',
      'includes/footer',
      $data);
  }

  public function create($id_cargo){
    $user_id = $this->session->userdata('user_login');
    $data['id_candidato']=$user_id;
    $data['id_vaga_etapa']=$id_cargo;
    $this->candidato_etapa->insert($data);
  }
}
