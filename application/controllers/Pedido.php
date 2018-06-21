<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends PR_Controller
{
	/**
	* @author: Tiago Villalobos
	* Construtor que recebe o nome do diretório aonde estão as views
	*/
	public function __construct()
	{
	  	parent::__construct('pedido');
	}

	/**
	* @author: Tiago Villalobos
	* Listagem de pedidos realizados para clientes e fornecedores
	* pedidos = clientes, compras = fornecedores
	* Realiza um foreach para definir os produtos de cada pedido
	*/
	public function index()
	{
		$this->setTitle('Pedidos');

		$this->addData('pedidos', $this->pedido->getFromClients());
		$this->addData('compras', $this->pedido->getFromProviders());

		foreach($this->data['pedidos'] as $pedido)
		{
			$pedido->produtos = $this->produto->getByOrder($pedido->id);
		}

		foreach($this->data['compras'] as $compra)
		{
			$compra->produtos = $this->produto->getByOrder($compra->id);
		}

       	$this->loadIndexDefaultScripts();

		$this->loadView('index');
	}

	/**
	* @author: Tiago Villalobos
	* Listagem de pedidos realizados para Fornecedores
	* Esta listagem será apresentada apenas para usuários logados como fornecedor
	*/
	public function indexProvider()
	{

		$this->setTitle('Pedidos');
		$this->addData('pedidos', $this->pedido->getFromProviders($this->session->userdata('user_login')));

		foreach($this->data['pedidos'] as $pedido)
		{
			$pedido->produtos = $this->produto->getByOrder($pedido->id);
		}

		$this->loadIndexDefaultScripts();

		$this->loadView('index_fornecedor');
	}


	/**
	* @author: Tiago Villalobos
	* Formulário para cadastro de pedidos
	*/
  	public function create()
  	{
  		if($this->input->post())
  		{
  			if($this->form_validation->run('pedido'))
  			{

  				$id_pedido = $this->pedido->insert($this->getOrderFromPost());

  				$this->andamento->insert($this->getProgressFromPost($id_pedido));

  				$this->insertOrderProducts($id_pedido);

  				$this->redirectSuccess('Pedido cadastrado com sucesso');

  			}
  			else
  			{
  				$this->redirectError('cadastrar');
  			}
  		}
  		else
  		{

  			$this->setTitle('Cadastrar Pedido');
	  		$this->addData('produtos',  $this->produto->get());
	  		$this->addData('clientes',  $this->cliente->get());
	  		$this->addData('fornecedores', $this->fornecedor->get());
	  		$this->addData('situacoes', $this->andamento->getSituations());

  			$this->addScripts(array('pedido/main.js'));
  			$this->loadFormDefaultScripts();

  			$this->loadView('cadastrar');

  		}

  	}

  	/**
	* @author: Tiago Villalobos
	* Carrega o formulário de edição
	*
	* @param $id_pedido integer
	*/
	public function edit($id_pedido)
	{
		if($this->input->post())
		{
			if($this->form_validation->run('pedido'))
			{
  				$this->pedido->update($this->getOrderFromPostEdit($id_pedido));

  				$this->andamento->update($this->getProgressFromPost($id_pedido));

  				$this->pedido->removeProducts($id_pedido);
  				$this->insertOrderProducts($id_pedido);
  				$this->redirectSuccess('Pedido atualizado com sucesso!');
			}
			else
			{
				$this->redirectError('pedido/editar/'.$id_pedido);
			}
		}
		else
		{
			$this->setTitle('Edição de Pedido');

			$this->addScripts(array('pedido/main.js'));
  			$this->loadFormDefaultScripts();

			$this->addData('pedido', $this->pedido->getById($id_pedido));

			$this->filterDataByTransaction();

	  		$this->addData('situacoes',       $this->andamento->getSituations());
	  		$this->addData('pedido_produtos', $this->produto->getByOrder($id_pedido));

			$this->loadView('editar');
		}
	}

	/**
	* @author: Tiago Villalobos
	* Formulário para edição de pedido do Fornecedor
	* Para utilização apenas de usuários logados como fornecedor
	*
	* @param $id_pedido integer
	*/
	public function editProvider($id_pedido)
	{
		if($this->input->post())
		{
			if($this->form_validation->run('pedido_fornecedor'))
			{
  				$this->pedido->update($this->getOrderFromPostEditProvider($id_pedido));

  				$this->andamento->update($this->getProgressFromPost($id_pedido));

  				$this->redirectSuccess('Pedido atualizado com sucesso', 'fornecedor');

			}
			else
			{
				$this->redirectError('fornecedor/editar/'.$id_pedido);
			}
		}
		else
		{
			$this->setTitle('Edição de Pedido');

			$this->loadFormDefaultScripts();

	  		$this->addData('situacoes',       $this->andamento->getSituations());
	  		$this->addData('pedido',          $this->pedido->getById($id_pedido));
	  		$this->addData('pedido_produtos', $this->produto->getByOrder($id_pedido));

	  		$this->loadView('editar_fornecedor');

		}
	}

	/**
	* @author: Tiago Villalobos
	* Remoção do pedido e dados relacionados
	*
	* @param: $id_pedido integer
	*/
	public function delete($id_pedido)
	{
		$this->andamento->remove($id_pedido);
		$this->pedido->removeProducts($id_pedido);
		$this->pedido->remove($id_pedido);

		$this->redirectSuccess('Pedido removido com sucesso!');
	}

	/**
	* @author: Tiago Villalobos
	* Realiza filtragem em alguns dados de acordo com o tipo de transação do pedido
	*/
	private function filterDataByTransaction()
	{

  		if($this->data['pedido']->transacao == 'V')
  		{
  			$this->addData('label',    'Cliente');
  			$this->addData('clientes', $this->cliente->get());
	  		$this->addData('produtos', $this->produto->get());
  		}
  		else
  		{
  			$this->addData('label',    'Fornecedor');
  			$this->addData('clientes', $this->fornecedor->get());

  			$id_provider;
  			foreach($this->data['clientes'] as $cliente)
  			{
  				if($cliente->id_pessoa == $this->data['pedido']->id_pessoa)
  				{
  					$id_provider = $cliente->id_fornecedor;
  				}
  			}

  			$this->addData('produtos', $this->produto->getByProvider($id_provider));
  		}
	}

	/**
	* @author: Tiago Villalobos
	* Retorna os dados enviados por post referentes aos dados básicos do pedido
	*
	* @return: mixed
	*/
  	private function getOrderFromPost()
  	{
  		return array(
			'id_pessoa' => $this->input->post('id_pessoa'),
			'descricao' => $this->input->post('descricao'),
			'transacao' => $this->input->post('transacao'),
			'tipo'      => $this->input->post('tipo')
		);
  	}

  	/**
	* @author: Tiago Villalobos
	* Retorna os dados para edição de um pedido
	*
	* @param:  $id_pedido integer
	* @return: mixed
	*/
  	private function getOrderFromPostEdit($id_pedido)
  	{
		$postData = $this->getOrderFromPost();

        $postData['id_pedido'] = $id_pedido;

        return $postData;
  	}

  	/**
	* @author: Tiago Villalobos
	* Retorna os dados para edição de um pedido à um fornecedor
	* Apenas para utilização de usuários logados como fornecedor
	*
	* @param:  $id_pedido integer
	* @return: mixed
	*/
  	private function getOrderFromPostEditProvider($id_pedido)
  	{
		return array(
			'id_pedido'  => $id_pedido,
			'descricao'  => $this->input->post('descricao'),
		);
  	}

  	/**
	* @author: Tiago Villalobos
	* Retorna dados do andamento do pedido para edição
	*
	* @param:  $id_pedido integer
	* @return: mixed
	*/
  	private function getProgressFromPost($id_pedido)
  	{
  		return array(
			'data'      => date('Y-m-d h:i:s'),
			'situacao'  => $this->input->post('situacao'),
			'id_pedido' => $id_pedido
		);
  	}

  	/**
	* @author: Tiago Villalobos
	* Insere dados relativos aos produtos e pedido na tabela de relação entre os mesmos
	* utlizando um foreach para iterar sobre os posts
	*
	* @param: $id_pedido integer
	*/
  	private function insertOrderProducts($id_pedido)
  	{
		foreach($this->input->post('id_produto') as $index => $id_produto)
		{
			$pedido_produto = array(
				'id_pedido'  => $id_pedido,
				'id_produto' => $id_produto,
				'quantidade' => $this->input->post('qtd_produto')[$index]
			);

			$this->pedido->insertProducts($pedido_produto);

		}
  	}

	/**
	* @author: Tiago Villalobos
	* Retorna JSON com fornecedores utilizado para adequação do formulário para cadastro de pedidos aos fornecedores
	*
	* @return: mixed
	*/
	public function getProvidersJSON()
	{
	  	echo json_encode($this->fornecedor->get());
	}

	/**
	* @author: Tiago Villalobos
	* Retorna JSON com clientes
	*
	* @return: mixed
	*/
	public function getClientsJSON()
	{
	  	echo json_encode($this->cliente->get());
	}

	/**
	* @author: Tiago Villalobos
	* Retorna JSON com produtos
	*
	* @return: mixed
	*/
	public function getProductsJSON()
	{
	  	echo json_encode($this->produto->get());
	}

	/**
	* @author: Tiago Villalobos
	* Retorna JSON com produtos de um determinado fornecedor
	*
	* @return: mixed
	*/
	public function getProductsByProviderJSON($id_fornecedor)
	{
		echo json_encode($this->produto->getByProvider($id_fornecedor));
	}

	/**
	* @author: Tiago Villalobos
	* Gera PDF para Cliente
	*
	* @param: $id_pedido integer
	*/
	public function pdfClient($id_pedido)
	{
		$this->pdf($id_pedido, 'C');
	}

	/**
	* @author: Tiago Villalobos
	* Gera PDF para Fornecedor
	*
	* @param: $id_pedido integer
	*/
	public function pdfProvider($id_pedido)
	{
		$this->pdf($id_pedido, 'F');
	}

	/**
	* @author: Tiago Villalobos
	* Método geral para geração de pdf de pedidos
	* Por meio do parâmetro type define-se qual tipo de pdf a ser gerado
	* sendo 'C' para Cliente e 'F' para Fornecedor
	*
	* @param: $id_pedido integer
	* @param: $type string
	*/
	private function pdf($id_pedido, $type)
	{
		switch ($type) {
			case 'C':
				$this->addData('pedido', $this->pedido->getByIdCompleteDataClient($id_pedido));
				$view = 'pdf_cliente';
				break;
			case 'F':
				$this->addData('pedido', $this->pedido->getByIdCompleteDataProvider($id_pedido));
				$view = 'pdf_fornecedor';
		}

	  	$this->addData('pedido_produtos', $this->produto->getByOrder($id_pedido));

		$mpdf = new \Mpdf\Mpdf();

		$html = $this->load->view($this->viewDirectory.'/'.$view, $this->data, TRUE);

		$mpdf->SetTitle('Pedido Nº '.$id_pedido);

		$mpdf->SetFooter('{PAGENO}');

		$mpdf->writeHTML($html);

		$mpdf->Output('pedido-'.$id_pedido.'.pdf', 'I');
	}

}
