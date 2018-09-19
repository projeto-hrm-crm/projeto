<?php
class Usuario extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
  }

  public function index(){
    /*
    $data['cidades'] = $this->cidade->get();
    $data['estados'] = $this->estado->get();
    */
    $data['assets'] = array(
      'js' => array(
        'thirdy_party/apicep.js',
      ),
    );
    $this->load->view(
      'login/cadastrar.php',
      $data
    );
  }

  /**
  * @author: Matheus Ladislau
  * @author: Camila Sales
  * Realiza o cadastro de um usuario, dados recebidos da view setor/cadastro.php
  */
  public function create(){
    if($this->input->post())
    {
      if(!$this->form_validation->run('usuario'))
      {
        $this->session->set_flashdata('errors','Não foi possível realizar o cadastro<br>Verifique os campos abaixo.');
        $this->index();
      }
      else
      {
        if($this->input->post("senha")!=$this->input->post("senha2"))
        {
          $this->session->set_flashdata('errors','Senhas não coincidem');
          $this->index();
        }
        else
        {
          if($this->usuario->existsLogin($this->input->post("email")))
          {
            $this->session->set_flashdata('errors','E-mail já cadastrado no sistema.<br>Favor inserir outro e-mail.');
            $this->index();
          }
          else
          {
            //pessoa
            $data = $this->input->post();
            $id_pessoa = $this->pessoa->insert(['nome' => $data['nome'], 'email' => $data['email']]);

            //endereco
            $this->endereco->insert(['cep'=> $this->input->post('cep'),'bairro' => $this->input->post('bairro'),
            'logradouro'  => $this->input->post('logradouro'),'numero' => $this->input->post('numero'), 'complemento' => $this->input->post('complemento')
            ,'id_pessoa'  => $id_pessoa, 'cidade' => $this->input->post('cidade')]);

            //documento
            $this->documento->insert(['tipo' => 'cpf','numero' => $this->input->post('cpf'),'id_pessoa' => $id_pessoa]);

            //telefone
            $this->telefone->insert(['numero'=>$this->input->post('tel'),'id_pessoa' => $id_pessoa]);

            //pessoa_fisica
            $this->pessoa_fisica->insert(['data_nascimento'=> switchDate($data['data_nacimento']),'sexo'=>$data['sexo'],'id_pessoa'=>$id_pessoa]);

            //cliente
            if($this->input->post('tipo_us')==4)
            $this->cliente->insert(['id_pessoa' => $id_pessoa]);
            else {
              $this->candidato->insert(['id_pessoa' => $id_pessoa]);
            }

            //usuario
           $this->usuario->insert(['login' => $this->input->post("email"), 'senha'=>$this->input->post("senha"),'id_grupo_acesso'=>$this->input->post("tipo_us"),'id_pessoa'=>$id_pessoa]);

            $this->session->set_flashdata('success','Usuário criado.<br>Já é possível acessar com seu e-mail e senha.');
            redirect('login');
          }
        }
      }
    }
      else
      {
        $this->index();
      }
    }

    /**
    * @author: Matheus Ladislau
    * Realiza remoção de registro de um usuario pelo id
    *
    *@param integer: refere-se ao id do usuario a ser excluído
    */
    public function delete($id_usuario)
    {
      $this->usuario->remove($id_usuario);
      $this->session->set_flashdata('success', 'Usuário excluído com sucesso!');
      redirect('usuario');
    }

    /**
    * @author: Camila Sales
    * Realiza a verificação do email
    *
    *@param integer: refere-se ao id do usuario
    */
    public function unique($id_usuario)
    {
      echo json_encode($this->usuario->uniqueMail($id_usuario,$this->input->get('email')));
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Método responsável por buscar as notificações do sistema. 
     * 
     * @return json 
     */
    public function getNotifications()
    {
      $to_id = $this->session->userdata('user_login');
      echo $this->Notification->getNotifications($to_id);
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Método responsável por contar o total de notificações
     * 
     * @return json 
     */
    public function getCount()
    {
      $to_id = $this->session->userdata('user_login');
      echo $this->Notification->getCount($to_id);
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Método responsável por setar a notificação como visualizada
     * 
     * @param int $notification_id
     * @return void 
     */
    public function setViewed($notification_id)
    {
      $this->Notification->setViewed($notification_id);
    }
}
?>
