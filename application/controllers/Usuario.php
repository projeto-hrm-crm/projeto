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
    $data['cidades'] = $this->cidade->get();
    $data['estados'] = $this->estado->get();
    $this->load->view(
      'login/cadastrar.php',
      $data
    );
  }

  /**
  * @author: Matheus Ladislau
  * Realiza o cadastro de um usuario, dados recebidos da view setor/cadastro.php
  */
  public function create(){
    if($this->input->post())
    {
      if(!$this->form_validation->run('usuario'))
      {
        $this->session->set_flashdata('errors','Não foi possível realizar o cadastro<br>Verifique os campos abaixo');
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
            $this->session->set_flashdata('errors','E-mail já cadastrado no sistema.<br>Favor inserir outro e-mail');
            $this->index();
          }
          else
          {
            //pessoa
            $data_pessoa["nome"]=$this->input->post("nome");
            $data_pessoa["email"]=$this->input->post("email");
            $id_pessoa=$this->pessoa->insert($data_pessoa);

            //endereco
            $data_endereco['cep']=$this->input->post('cep');
            $data_endereco['bairro']=$this->input->post('bairro');
            $data_endereco['logradouro']=$this->input->post('logradouro');
            $data_endereco['numero']=$this->input->post('numero');
            $data_endereco['complemento']=$this->input->post('complemento');
            $data_endereco['id_pessoa']=$id_pessoa;
            $data_endereco['id_cidade']=$this->input->post('cidade');
            $this->endereco->insert($data_endereco);

            //pessoa_fisica
            $data_pessoa_fisica['id_pessoa']=$id_pessoa;
            $data_pessoa_fisica['sexo']=$this->input->post('sexo');
            $data_pessoa_fisica['data_nascimento']=$this->input->post('data_nascimento');
            $this->pessoa_fisica->insert($data_pessoa_fisica);

            //cliente
            $dados_cliente['id_pessoa']=$id_pessoa;
            $this->cliente->insert($dados_cliente);

            //usuario
            $data_usuario["login"]=$this->input->post("email");
            $data_usuario["senha"]=$this->input->post("senha");
            //referente a grupo de acesso de cliente padrao
            $data_usuario["id_grupo_acesso"]=4;
            $data_usuario["id_pessoa"]=$id_pessoa;
            $this->usuario->insert($data_usuario);

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
      $this->session->set_flashdata('success', 'Usuário excluído com sucesso');
      redirect('usuario');
    }

    /**
    * @author: Camila Sales
    * Realiza a verificação do email
    *
    *@param string: refere-se ao email do usuario
    *@param integer: refere-se ao id do usuario
    */
    public function unique($id_usuario)
    {
     echo json_encode($this->usuario->uniqueMail($id_usuario,$this->input->get('email')));

    }
}
?>
