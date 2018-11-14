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
  * author: Matheus Romeo
  * Metodo index agora carrega os processos seletivos de acordo com as regras de 
  * negócio de etapa->getProcessoSeletivo
  **/
  public function index()
  {
    $data['title'] = 'Candidatar-se à Vaga';
    $data['processo_seletivo']=$this->etapa->getProcessoSeletivo();
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
  public function create($id_processo_seletivo)
  {
    $id_usuario = $this->session->userdata('user_login');
    $usuario=$this->candidato_etapa->selectCandidatoByIdUsuario($id_usuario)[0];
    if($usuario==null)
    {
      $this->session->set_flashdata('danger',"É necessário ter perfil de candidato para se candidatar à uma vaga.");
    }
    else
    {
      if($usuario!=null)
      {
        if(isset($id_processo_seletivo))
        {
        $get_idEtapa= $this->candidato_etapa->getIdEtapaByProcessoID($id_processo_seletivo);
        $data['id_etapa']=$get_idEtapa->id_etapa;
        $data['id_candidato']=$usuario->id_candidato;
        $cadastrado=$this->candidato_etapa->find($data['id_candidato'],$data['id_etapa']);
        if($cadastrado!=null)
          $this->session->set_flashdata('danger',"Candidatura já realizada");
          else {
            $this->candidato_etapa->insert($data);
            $this->session->set_flashdata('success',"Candidatura realizada com sucesso");
        }
      }
    }
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
