<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*	@author: Tiago Villalobos
*
*	Este controller tem como função agrupar métodos para evitar reescrita de código
*/
class PR_Controller extends CI_Controller 
{

	protected $data = array();
	protected $viewDirectory;

	// Construtor que recebe o diretório padrão das views que serão utilizadas pelo controller filho
	// Inicializa os assets (js e css)
	// Define as permissões do usuário com base em seu grupo de acesso
	public function __construct($viewDirectory)
	{
		parent::__construct();
		
		$this->data['assets']['js']  = array();
		$this->data['assets']['css'] = array();

		$this->viewDirectory = $viewDirectory;

		$user_id    = $this->session->userdata('user_login');
      	$currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      	$this->usuario->hasPermission($user_id, $currentUrl);
		
		$this->addData('menus', $this->menu->getUserMenu($user_id));

	}

	// Carrega a view especificada do diretório padrão, definido no construtor
	// Redireciona para a view as mensagens definidas por flashdata e demais dados
	protected function loadView($view)
	{
		$this->setFlashMessages();

		$this->load->view('includes/header', $this->data);
		$this->load->view($this->viewDirectory.'/'.$view);
		$this->load->view('includes/footer');
	}	

	//Adiciona um novo dado para o atributo data
	//Associando o nome ao valor, que pode ser um array
	protected function addData($dataName, $dataValue)
	{
		$this->data[$dataName] = $dataValue;
	}

	//Permite a definição do título da página
	protected function setTitle($title)
	{
		$this->data['title'] = $title;
	}

	//Adiciona novos javascripts ao assets, por meio de um array
	protected function addScripts($scripts)
	{
		foreach($scripts as $script)
		{
			array_push($this->data['assets']['js'], $script); 
		}

	}

	//Adiciona novos folhas de estilo ao assets, por meio de um array
	protected function addStyles($styles)
	{
		foreach($styles as $style)
		{
			array_push($this->data['assets']['css'], $style); 
		}

	}

	//Carrega javascripts padrão que são utilizados em todas as views de listagem
	protected function loadIndexDefaultScripts()
	{
		$this->addScripts(
		    array(
		        'lib/data-table/datatables.min.js',
		        'lib/data-table/dataTables.bootstrap.min.js',
		        'datatable.js',
		        'confirm.modal.js'
		    )
		);
	}

	//Carrega javascripts padrão que são utilizados em todas as views com formulário
	protected function loadFormDefaultScripts()
	{
		$this->addScripts(
		    array(
		        'validate.js'
		    )
		);
	}

	//Redireciona o usuário para a view padrão do diretório com uma mensagem de sucesso
	protected function redirectSuccess()
	{
		$this->session->set_flashdata('success', 'Operação realizada com sucesso');
		
		redirect($this->viewDirectory);
	}

	//Redireciona o usuário para uma view do diretório 
	//Juntamente com as mensagens de erro e dados antigos do formulário
	protected function redirectError($view)
	{
		$this->session->set_flashdata('danger', 'Não foi possível realizar a operação');
		$this->session->set_flashdata('errors',   $this->form_validation->error_array());
        $this->session->set_flashdata('old_data', $this->input->post());
        
        redirect($this->viewDirectory.'/'.$view);
	}

	//Define as mensagens de alerta assim como recupera os erros e dados antigos do formulário
	private function setFlashMessages()
	{
		$this->data['success_message'] = $this->session->flashdata('success');
        $this->data['error_message']   = $this->session->flashdata('danger');
        $this->data['errors']          = $this->session->flashdata('errors');
		$this->data['old_data']        = $this->session->flashdata('old_data');
	}

}