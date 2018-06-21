<?php
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
    // $data['vagas'] = $this->vaga->get();
    $data['processo_seletivo']=$this->candidato_etapa->getProcessoSeletivo();
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
  function create($id_processo_seletivo)
  {
    $id_usuario = $this->session->userdata('user_login');
    $usuario=$this->candidato_etapa->selectCandidatoByIdUsuario($id_usuario);
    $get_idEtapa= $this->candidato_etapa->getIdEtapaByProcessoID($id_processo_seletivo);
    $data['id_etapa']=$get_idEtapa->id_etapa;
    $data['id_candidato']=$usuario->id_candidato;
    if(()$this->processo_seletivo_candidato->find($data['id_candidato'],$data['id_etapa']))==null){
      $this->candidato_etapa->insert($data);
      $this->session->set_flashdata('sucess',"Candidatura realizada com sucesso");
    }else{
      $this->session->set_flashdata('danger',"Candidatura já realizada");

    }

        redirect('candidato_etapa');
  }



  /**
  * @author: Matheus Ladislau
  * Realiza remoção de registro de um vaga_etapa pelo id vaga etapa e usuario, coletado por sessão
  *
  *@param integer: refere-se ao id da vaga ligada ao usuário atual
  */
  function delete($id_processo_seletivo)
  {
    $id_usuario = $this->session->userdata('user_login');
    $usuario=$this->candidato_etapa->selectCandidatoByIdUsuario($id_usuario);

    $get_idEtapa= $this->candidato_etapa->getIdEtapaByProcessoID($id_processo_seletivo);
    $data['id_etapa']=$get_idEtapa->id_etapa;
    $data['id_candidato']=$usuario->id_candidato;

    $this->candidato_etapa->remove($data);
    redirect('candidato_etapa');
  }

}
