<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller 
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
	* @author: Tiago Villalobos
	* Listagem de pedidos realizados por clientes
	*
	*
	*/
	public function index()
	{

		$data['title'] = 'Pedidos';

		$data['pedidos'] = $this->pedido->get();

		$data['success_message'] = $this->session->flashdata('success');
       	$data['error_message']   = $this->session->flashdata('danger');

		$data['assets'] = array(
			'css' => array(
				'lib/datatable/dataTables.bootstrap.min.css'
			),

			'js' => array(
				'lib/data-table/datatables.min.js',
				'lib/data-table/dataTables.bootstrap.min.js',
				'datatable.js',
				'confirm.modal.js'
			),
		);

		loadTemplate('includes/header', 'pedido/index', 'includes/footer', $data);
	}


	/**
	* @author: Tiago Villalobos
	* Formulário para cadastro de pedidos e cadastro dos mesmos
	*
	*/
  	public function create()
  	{
  		if($this->input->post())
  		{
  			if($this->form_validation->run('pedido'))
  			{
  				$pedido = array(
  					'id_pessoa' => $this->input->post('id_pessoa'),
  					'descricao'  => $this->input->post('descricao'),
  					'tipo'       => $this->input->post('tipo')
  				);

  				$id_pedido = $this->pedido->insert($pedido);

  				$andamento = array(
  					'data'      => date('Y-m-d h:i:s'),
  					'situacao'  => $this->input->post('situacao'),
  					'id_pedido' => $id_pedido
  				);

  				$this->andamento->insert($andamento);

  				foreach($this->input->post('id_produto') as $index => $id_produto)
  				{
	  				$pedidoProduto = array(
	  					'id_pedido'  => $id_pedido,
	  					'id_produto' => $id_produto,
	  					'quantidade' => $this->input->post('qtd_produto')[$index]
	  				);

	  				$this->pedido->insertProducts($pedidoProduto);
  					
  				}

  				$this->session->set_flashdata('success', 'Cadastrado com sucesso');
  				redirect('pedido');

  			}
  			else
  			{
  				$this->session->set_flashdata('errors', $this->form_validation->error_array());
	            $this->session->set_flashdata('old_data', $this->input->post());
	            redirect('pedido/cadastrar');
  			}
  		}
  		else
  		{
	  		$data['title'] = 'Pedido';

			$data['assets'] = array(
				'js' => array(
					'lib/jquery/jquery.validate.min.js',
					'validate.js',
					'pedido/main.js'
				),
			);

	  		$data['clientes'] = $this->cliente->get();
	  		$data['produtos'] = $this->produto->get();

	  		$data['errors']          = $this->session->flashdata('errors');
	  		$data['old_data']        = $this->session->flashdata('old_data');

			loadTemplate(
				'includes/header',
				'pedido/cadastrar',
				'includes/footer',
				$data
			);
  		}
  	


  	}

  	/**
	* @author: Tiago Villalobos
	* Formulário para edição de pedido e atualização do mesmo
	*
	* @param $id integer
	*/
	public function edit($id)
	{
		if($this->input->post())
		{
			if($this->form_validation->run('pedido'))
			{
				$pedido = array(
					'id_pedido'  => $id,
  					'id_pessoa'  => $this->input->post('id_pessoa'),
  					'descricao'  => $this->input->post('descricao'),
  					'tipo'       => $this->input->post('tipo')
  				);

  				$this->pedido->update($pedido);

  				$andamento = array(
  					'data'      => date('Y-m-d h:i:s'),
  					'situacao'  => $this->input->post('situacao'),
  					'id_pedido' => $id
  				);

  				$this->andamento->update($andamento);


  				$this->pedido->removeProducts($id);
  				foreach($this->input->post('id_produto') as $index => $id_produto)
  				{
	  				$pedido_produto = array(
	  					'id_pedido'  => $id,
	  					'id_produto' => $id_produto,
	  					'quantidade' => $this->input->post('qtd_produto')[$index]
	  				);

	  				$this->pedido->insertProducts($pedido_produto);
  					
  				}

  				$this->session->set_flashdata('success', 'Atualizado com sucesso.');
  				redirect('pedido');
  				
			}
			else
			{
				$this->session->set_flashdata('errors', $this->form_validation->error_array());
				$this->session->set_flashdata('old_data', $this->input->post());
				redirect('pedido/editar/'.$id);
			}
		}
		else
		{
			$data['title'] = 'Edição de Pedido';

			$data['assets'] = array(
				'js' => array(
					'lib/jquery/jquery.validate.min.js',
					'validate.js',
					'pedido/main.js'
				),
			);
			
	  		$data['clientes']        = $this->cliente->get();
	  		$data['produtos']        = $this->produto->get();
	  		$data['pedido']          = $this->pedido->getById($id);
	  		$data['pedido_produtos'] = $this->produto->getByOrder($id);

	  		$data['errors']          = $this->session->flashdata('errors');
	  		$data['old_data']        = $this->session->flashdata('old_data');

			loadTemplate(
				'includes/header',
				'pedido/editar',
				'includes/footer',
				$data
			);
		}
	}


	/**
	* @author: Tiago Villalobos
	* Remoção do pedido e dados relacionados
	*
	* @param: $id integer
	*/
	public function delete($id)
	{
		$pedido = $this->pedido->getById($id);

		if($pedido)
		{
			$this->andamento->remove($id);
			$this->pedido->removeProducts($id);
			$this->pedido->remove($id);

			$this->session->set_flashdata('success', 'Pedido removido com sucesso.');
		}
		else
		{
			$this->session->set_flashdata('danger', 'Não foi possível remover o Pedido!');
		}
		
		redirect('pedido');
	}


	/**
	* @author: Tiago Villalobos
	* Retorna JSON com fornecedores utilizado para adequação do formulário para cadastro de pedidos aos fornecedores
	*
	* @return: mixed 
	* @todo: Mudar o nome do método quando for ser implementado
	*/
	public function getJSON()
	{
	  echo json_encode($this->fornecedor->get());
	}


	public function pdf($id)
	{
		
		$data['pedido']          = $this->pedido->getByIdCompleteData($id);
	  	$data['pedido_produtos'] = $this->produto->getByOrder($id);

		$mpdf = new \Mpdf\Mpdf();
		
		$html = $this->load->view('pedido/pdf', $data, TRUE);
		
		$mpdf->SetTitle('Pedido Nº '.$id);
		
		$mpdf->SetFooter('{PAGENO}');
		
		$mpdf->writeHTML($html);
		
		$mpdf->Output('pedido-'.$id.'.pdf', 'I');
	}

}
