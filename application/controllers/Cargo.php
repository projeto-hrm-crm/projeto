<?php
class Cargo extends CI_Controller
{
  public $menus;

  // function __construct()
  // {
  //   $user_id = $this->session->userdata('user_login');
  //   $url = isset($_SERVER['PATH_INFO']) ? rtrim($_SERVER['PATH_INFO'], '') : '';
  //   $this->usuario->hasPermission($user_id, $url);
  //   $this->menus = $this->menu->getUserMenu($user_id);
  // }

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
    $data['success_message']=$this->session->flashdata('success');
    $data['error_message']=$this->session->flashdata('danger');
    $data['assets'] = array(
      'js' => array(
        'lib/data-table/datatables.min.js',
        'lib/data-table/dataTables.bootstrap.min.js',
        'datatable.js',
        'confirm.modal.js',
      ),
    );
    loadTemplate('includes/header', 'cargo/index', 'includes/footer', $data);
  }


  /**
  * @author: Matheus Ladislau
  * Realiza o cadastro de um cargo, dados recebidos da view cargo/cadastro.php
 */ 

/* public function create()
{
  if($this->input->post())
  {
    $cargo = array();
    $cargo["nome"]=$this->input->post("nome");
    $cargo["descricao"]=$this->input->post("descricao");
    $cargo["salario"]=$this->input->post("salario");
    $cargo["id_setor"]=$this->input->post("id_setor");
    $this->cargo->insert($cargo);

    $this->session->set_flashdata('success', 'Cadastro efetuado com sucesso');

    redirect('cargo/cadastrar');
  }
  else
  {
    $data['menus'] = $this->menus;
    $data['title']         = 'Cadastrar Cargo';
    $data['setores']       = $this->setor->get();
    $data['assets'] = array(
      'js' => array(
        'cargo/validate-form.js',
      ),
    );

    loadTemplate(
      'includes/header',
      'cargo/cadastrar',
      'includes/footer',
      $data
    );
  }
}*/

/**
  * @author: Beto Cadilhe
  * Realiza o cadastro de um cargo, com validação dos dados recebidos da view cargo/cadastro.php
  */

  public function create()
  {
    if($this->input->post()){

      if($this->form_validation->run('cargo')){
        $cargo = array(
         'nome' => $this->input->post('nome'),
         'descricao' => $this->input->post('descricao'),
         'salario' => $this->input->post('salario'),
         'id_setor' => $this->input->post('id_setor'),

        );
          $this->cargo->insert($cargo);
          $this->session->set_flashdata('success','Cadastrado com sucesso');
          redirect('cargo');
      }else{
          $this->session->set_flashdata('errors', $this->form_validation->error_array());
          $this->session->set_flashdata('old_data', $this->input->post());
          redirect('cargo/cadastrar');
      }
    }else{
      $data['title'] = 'Cadastrar cargo';
      $data['errors'] = $this->session->flashdata('errors');
      $data['success_message'] = $this->session->flashdata('success');
      $data['error_message']   = $this->session->flashdata('danger');
      $data['old_data'] = $this->session->flashdata('old_data');
       $data['assets'] = array(
      'js' => array(

        'validate.js',
      ),

    );
       $data['setores'] = $this->setor->get();

      loadTemplate('includes/header', 'cargo/cadastrar', 'includes/footer', $data);
    }
  }


  /**
  * @author: Peteson Munuera
  * Realiza edição de registro de um cargo pelo id, dados recebidos pela view cargo/editar.php
  *
  * @param integer: referem-se ao id do cargo a ser alterado
  */
  public function edit($id_cargo)
  {
    if ($this->input->post())
    {
      $data["nome"]=$this->input->post("nome");
      $data["descricao"]=$this->input->post("descricao");
      $data["salario"]=$this->input->post("salario");
      $data["id_setor"]=$this->input->post("id_setor");
      $this->cargo->update($id_cargo,$data);

      $this->session->set_flashdata('success', 'Cargo editado com sucesso');

      redirect('cargo');
    }
    else {
      $data['cargo'] = $this->cargo->getById($id_cargo)[0];

      $data['setores']       = $this->setor->get();
			$data['title']         = 'Editar Cargo';
      loadTemplate(
				'includes/header',
				'cargo/editar',
				'includes/footer',
				$data
			);
    }
  }

  /**
  * @author: Peterson Munuera
  * Realiza remoção de registro de um cargo pelo id, dados recebidos pela view cargo/delete.php
  *
  * @param integer: refere-se ao id do cargo a ser alterado
  */
  public function delete($id_cargo)
  {
    $this->cargo->delete($id_cargo);

    $this->session->set_flashdata('success', 'Cargo excluído com sucesso');
    redirect('cargo');
  }
}
?>
