<?php

/**
* author: Camila Sales
* author: Mayra Bueno
* Controller de candidato
**/

class Candidato extends CI_Controller
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
  * author: Camila Sales
  * Metodo index que chama a view inicial de candidato
  **/
  public function index()
  {
    $data['title'] = 'Candidatos';
    $data['candidatos'] = $this->candidato->get();
    $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js',
        ),
    );

    foreach ($data['candidatos'] as $key => $cliente) {
      $data['candidatos'][$key]->data_nascimento = switchDate($data['candidatos'][$key]->data_nascimento);
    }
    loadTemplate('includes/header', 'candidato/index', 'includes/footer', $data);
  }


  /**
  * author: Camila Sales
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de candidato_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de candidato
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  **/
  public function create()
  {
    $data['candidato']  = $this->input->post();


    if($data['candidato']){
      if(!$this->form_validation->run('candidato')) {
            $data['old_data'] = $this->input->post();
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            $this->session->set_flashdata('old_data', $this->input->post());
            redirect('candidato/cadastrar');
      }
      else {
        $id_pessoa = $this->pessoa->insert([
            'nome' => $data['candidato']['nome'],
            'email' => $data['candidato']['email']]);

          $this->usuario->insert([
              'login'             => $data['candidato']['email'],
              'senha'             => md5($data['candidato']['email']), /*essa é a forma correta para qualquer usuário. Gerar uma senha default baseada no e-mail e depois ele muda. */
              'id_grupo_acesso'   => 5,
              'id_pessoa'         => $id_pessoa
          ]);

        $this->endereco->insert([
            'cep'         => $this->input->post('cep'),
            'bairro'      => $this->input->post('bairro'),
            'logradouro'  => $this->input->post('logradouro'),
            'numero'      => $this->input->post('numero'),
            'complemento' => $this->input->post('complemento'),
            'id_pessoa'   => $id_pessoa,
            'estado'      => $this->input->post('estado'),
            'cidade'      => $this->input->post('cidade')]);

        $this->documento->insert(['tipo' => 'cpf','numero' => $this->input->post('cpf'),'id_pessoa' => $id_pessoa]);

        $this->telefone->insert(['numero'=>$this->input->post('tel'),'id_pessoa' => $id_pessoa]);

        $this->pessoa_fisica->insert(['data_nascimento'=> switchDate($data['candidato']['data_nascimento']),
        'sexo'=>$data['candidato']['sexo'],'id_pessoa'=>$id_pessoa]);

        $this->candidato->insert(['id_pessoa' => $id_pessoa]);


        $this->session->set_flashdata('success', 'Candidato cadastrado com sucesso!');
        redirect('candidato');
      }
    }
    $data['title'] = 'Cadastrar Candidato';
    $data['errors'] = $this->session->flashdata('errors');
    $data['old_data'] = $this->session->flashdata('old_data');
    $data['paises'] = $this->candidato->get_pais();
    $data['estados'] =  $this->estado->get();
    $data['vagas'] = $this->candidato->get_vagas();

    $data['assets'] = array(
      'js' => array(
        'thirdy_party/apicep.js',
      ),
    );

    loadTemplate('includes/header', 'candidato/cadastrar', 'includes/footer', $data);
  }


  /**
  * author: Camila Sales
  * Metodo edit, apresenta o formulario de edição, com os dados do candidato a ser editado,
  * recebe os dados e envia para função update de candidato_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de candidato
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id_candidato int
  **/
  public function edit($id_candidato)
  {
    if ($this->input->post())
    {
      $data['candidato'] = $this->input->post();
      $candidato = $this->candidato->getById($id_candidato);

      $this->endereco->update(['cep'=> $this->input->post('cep'),'bairro' => $this->input->post('bairro'),
      'logradouro'  => $this->input->post('logradouro'),'numero' => $this->input->post('numero'), 'complemento' => $this->input->post('complemento'),
      'id_pessoa'   => $candidato[0]->id_pessoa, 'id_cidade' => $this->input->post('cidade')]);

      $this->documento->update(['tipo' => 'cpf','numero' => $this->input->post('cpf') , 'id_pessoa' => $candidato[0]->id_pessoa]);

      $this->telefone->update(['numero'=>$this->input->post('tel'),'id_pessoa' => $candidato[0]->id_pessoa]);

      $this->pessoa->update(['id_pessoa' => $candidato[0]->id_pessoa, 'nome'=> $data['candidato']['nome'],'email'=>$data['candidato']['email']]);
      $this->pessoa_fisica->update($candidato[0]->id_pessoa,['data_nascimento'=> switchDate($data['candidato']['data_nascimento']),'sexo'=>$data['candidato']['sexo']]);

      $this->session->set_flashdata('success', 'Candidato atualizado com sucesso!');
      redirect('candidato');
    }

    $data['candidato'] = $this->candidato->getById($id_candidato);
    $data['title'] = 'Editar Candidato';
    $data['id'] = $id_candidato;
    $data['vagas'] = $this->candidato->get_vagas();
    loadTemplate('includes/header', 'candidato/editar', 'includes/footer', $data);
  }

  /**
  * author: Camila Sales
  * Metodo delete, chama a funçao delete de Candidato_model, passando o id do candidato
  * Redireciona para a pagina index de candidato
  *
  * @param $id_candidato int
  **/
  public function delete($id_candidato)
  {
    $data['candidato'] = $this->candidato->getById($id_candidato);
    if ($data)
    {
      $this->candidato->remove($id_candidato);
      $this->session->set_flashdata('success', 'Candidato excluído com sucesso!');
      redirect('candidato');
    }
  }
}
