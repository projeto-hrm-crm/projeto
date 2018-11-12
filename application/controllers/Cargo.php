<?php
class Cargo extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      $this->usuario->hasPermission($user_id, $currentUrl);
  }

  /**
  * @author Peterson Munuera
  * @author Beto Cadilhe
  * Metodo index que chama a view inicial de cliente
  **/
  public function index()
  {
    $data['title'] = 'Cargos';
    $data['cargos'] = $this->cargo->get();
    $data['assets'] = array(
      'js' => array(
        'validate.js',
        'lib/data-table/datatables.min.js',
        'lib/data-table/dataTables.bootstrap.min.js',
        'datatable.js',
        'confirm.modal.js',
      ),
    );
    loadTemplate('includes/header', 'cargo/index', 'includes/footer', $data);
  }


  /**
  * @author: Beto Cadilhe
  * Realiza o cadastro de um cargo, com validação dos dados recebidos da view cargo/cadastro.php
  */
  public function create()
  {
    $data = $this->input->post();
    if($data){
      $this->cargo->insert($this->getFromPost());
      $this->session->set_flashdata('success', 'Cargo cadastrado com sucesso!');
      redirect('cargo');
    }

    $data['title'] = 'Cadastrar cargo';
    $data['assets'] = array(
      'js' => array(
        'lib/jquery/jquery.maskMoney.min.js',
        'maskMoney.js',
      ),
    );
    loadTemplate('includes/header', 'cargo/cadastrar', 'includes/footer', $data);
  }


  /**
  * @author: Peteson Munuera
  * @author: Beto Cadilhe
  * Realiza edição de registro de um cargo pelo id, dados recebidos pela view cargo/editar.php
  *
  * @param integer: referem-se ao id do cargo a ser alterado
  */
  public function edit($id_cargo)
  {
    if ($this->input->post())
    {
      $this->cargo->update($this->getFromPostEdit($id_cargo));
      $this->session->set_flashdata('success', 'Cargo alterado com sucesso!');
      redirect('cargo');
    }


    $data['cargo'] = $this->cargo->getById($id_cargo);
    $data['title'] = 'Alterar cargo';
    $data['assets'] = array(
      'js' => array(
        'validate.js',
        'lib/jquery/jquery.maskMoney.min.js',
        'maskMoney.js',
      ),
    );
    loadTemplate('includes/header', 'cargo/editar', 'includes/footer', $data);
  }



  /**
  * @author: Peterson Munuera
  * Realiza remoção de registro de um cargo pelo id, dados recebidos pela view cargo/delete.php
  *
  * @param integer: refere-se ao id do cargo a ser alterado
  */
  public function delete($id_cargo)
  {
    $this->cargo->remove($id_cargo);
    $this->session->set_flashdata('success', 'Cargo excluído com sucesso!');
    redirect('cargo');
  }

  /**
  * @author: Tiago Villalobos
  * Retorna um array com dados pegos por post
  *
  * @return: mixed
  */
  private function getFromPost()
  {
    return array(
      'nome'                  => $this->input->post('nome'),
      'descricao'             => $this->input->post('descricao'),
      'carga_horaria_semanal' => $this->input->post('carga_horaria'),
      'salario'               => $this->input->post('salario'),
      // 'horario'  => $this->input->post('horario'),
      //  'hora_entrada'  => $this->input->post('hora_entrada'),
      //  'hora_saida'  => $this->input->post('hora_saida'),
    );
  }

  /**
  * @author: Tiago Villalobos
  * Retorna um array com dados pegos por post adicionado a eles o id_cargo
  *
  * @return: mixed
  */
  private function getFromPostEdit($id_cargo)
  {
    $postData = $this->getFromPost();

    $postData['id_cargo'] = $id_cargo;
    return $postData;
  }

  private function getSalarioPorHora($id_cargo)
  {

  }
}
