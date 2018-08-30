<?php
class Home extends CI_Controller
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
  }


  /**
   * @author Matheus Ladislau
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function index()
	{
    $user_id = $this->session->userdata('user_login');
    $id_grupo_acesso = $this->usuario->getUserAccessGroup($user_id); 
    $grupo_acesso = $this->grupo->find($id_grupo_acesso);


      // alterado o data da view home_fornecedor para testar na branch home_fornecedor
      $data['fornecedor'] = $this->getAdminHomeConfigs();

      $data['title'] = 'Dashboard';
      $data['assets'] = [
        'js' => [
           'chartjs.min.js',
           'cliente/home-charts.js'
        ]
      ];

  		loadTemplate(
          'includes/header',
          'home/home_'.$grupo_acesso[0]->nome,
          'includes/footer',
          $data
        );
  	
  }

  /**
   * @author Pedro Henrique Guimarães
   * Método responsável por buscar as configurações a serem exibidas na view
   *
   * @param void
   * @return mixed
   */
  public function getAdminHomeConfigs()
  {
    $data = [];

    //CRM
    $data['clientes']           = $this->cliente->count();
    $data['fornecedores']       = $this->fornecedor->count();
    $data['produtos']           = $this->produto->count();
    $data['last_sac']           = $this->sac->getLastSac();

    //HRM
    $data['funcionarios']       = $this->funcionario->count();
    $data['cargos']             = $this->cargo->count();
    $data['vagas']              = $this->vaga->count();
    $data['job_opportunity']    = $this->vaga->getLastJobOpportunity(3);
    $data['processos_seletivos']= $this->processo_seletivo->getUltimos();
    foreach ($data['processos_seletivos'] as $key => $value) {
      $data['processos_seletivos'][$key]->data_fim = switchDate($data['processos_seletivos'][$key]->data_fim);
    }

    return $data;
  }


  public function getFornecedorHomeConfigs()
  {

    $data = [];
    //
    $data['produtos']  = $this->produto->count($user_id);
    $data['last_sac']  = $this->sac->getLastSac();

    return $data;

  }


}


/*
 public function getProdutosFornecedorLogado($user_id){
 
  return $this->db
    ->select('produto.*, pessoa_juridica.razao_social, usuario.id_usuario')
    ->join('fornecedor', 'fornecedor.id_fornecedor = produto.id_fornecedor')
    ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
    ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
    ->join('usuario', 'usuario.id_usuario = pessoa.id_pessoa')
    ->where('usuario.id_grupo_acesso = 3')
    ->where('usuario.id_usuario', $user_id)
    ->get('produto')
    ->result();
}


 /* SELECT produto.nome, pessoa_juridica.razao_social, usuario.senha, usuario.id_usuario FROM produto

JOIN fornecedor
ON fornecedor.id_fornecedor = produto.id_fornecedor

 JOIN pessoa_juridica     
     ON pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica

  JOIN pessoa      
      ON pessoa.id_pessoa = pessoa_juridica.id_pessoa

  JOIN usuario
      ON usuario.id_usuario = pessoa.id_pessoa

  WHERE usuario.id_grupo_acesso = 3 AND usuario.id_usuario = 18 (usuario_logado);


  }
  */