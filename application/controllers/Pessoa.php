<?php
class Pessoa extends CI_Controller
{

	/**
	* @author Tiago Villalobos
	* Chama o método create, formulário de pessoa.
	* 
	* 
	*/
	public function index()
	{
		$this->create();
	}


	/**
	* @author: Tiago Villalobos
	* Cria o formulário para cadastro de pessoa ou submete uma nova pessoa, caso seja enviada uma requisão POST.
	* Retorna messagem de erro ou sucesso por flashdata que são inseridos em variáveis para facilitar o 
	* trabalho na view.
	*
	* 
	*/
  	public function create()
  	{	
		if($this->input->post())
		{	
			if(!$this->form_validation->run('pessoa'))
			{
				$this->session->set_flashdata('errors', $this->form_validation->error_array());
				$this->session->set_flashdata('old_values', $this->input->post());
				
				$this->session->set_flashdata(
					'danger', 
					'Não foi possível realizar o cadastro<br>Verifique os campos abaixo'
				);

				redirect('cadastrar/pessoa');
			}
			else
			{

				$pessoa = array();
				$pessoa['nome']  = $this->input->post('nome');
				$pessoa['email'] = $this->input->post('email');
				$id_pessoa = $this->pessoa->insert($pessoa);

				$endereco = array();
				$endereco['cep']         = $this->input->post('cep');
				$endereco['bairro']      = $this->input->post('bairro');
				$endereco['logradouro']  = $this->input->post('logradouro');
				$endereco['numero']      = $this->input->post('numero');
				$endereco['complemento'] = $this->input->post('complemento');
				$endereco['id_pessoa']   = $id_pessoa;
				$endereco['id_cidade']   = $this->input->post('cidade');
				$this->endereco->insert($endereco);

				$documento = array();
				$documento['numero']    = $this->input->post('tipo_pessoa') === 'pf' ?
					$this->input->post('cpf') : $this->input->post('cnpj');
				$documento['tipo']      = $this->input->post('tipo_pessoa') === 'pf' ? 
					'CPF' : 'CNPJ';
				$documento['id_pessoa'] = $id_pessoa;
				$this->documento->insert($documento);

				$telefone = array();
				$telefone['numero']    = $this->input->post('telefone');
				$telefone['id_pessoa'] = $id_pessoa;
				$this->telefone->insert($telefone);

				$this->session->set_flashdata('success', 'Cadastro efetuado com sucesso');

				redirect('cadastrar/pessoa');
			}
		}
		else
		{
			$data['title']         = 'Cadastrar Pessoa';
			$data['estados']       = $this->estado->get();

			//Cria váriaveis com os flashdata para facilitar a manipulação na view 
			$data['errors']          = $this->session->flashdata('errors');
			$data['old_values']      = $this->session->flashdata('old_values');
			$data['success_message'] = $this->session->flashdata('success');
			$data['error_message']   = $this->session->flashdata('danger');

			$data['assets'] = array(
				'css' => array('pessoa/style.css'),
				'js' => array(
					'lib/jquery/jquery.mask.min.js',
					'pessoa/main.js',
					'pessoa/validate-form.js',
				),
			);

			loadTemplate(
				'includes/header',
				'pessoa/cadastrar',
				'includes/footer',
				$data
			);
		}
  	}

	/**
	* @author: Tiago Villalobos
	* Utiliza um id para buscar uma pessoa no banco e preencher o formulário de edição 
	* Retorna messagem de erro ou sucesso por flashdata que são inseridos em variáveis para facilitar o 
	* trabalho na view.
	* 
	* @param integer $id identificação da pessoa
	*/
	public function edit($id_pessoa)
	{
		
		if($this->input->post())
		{
			if(!$this->form_validation->run('pessoa'))
			{
				$this->session->set_flashdata('errors', $this->form_validation->error_array());
				$this->session->set_flashdata('old_values', $this->input->post());

				$this->session->set_flashdata(
					'danger', 
					'Não foi possível atualizar o cadastro<br>Verifique os campos abaixo'
				);

				redirect('editar/pessoa/'.$id_pessoa);
			}
			else
			{

				$pessoa = array();
				$pessoa['nome']      = $this->input->post('nome');
				$pessoa['email']     = $this->input->post('email');
				$pessoa['id_pessoa'] = $id_pessoa;
				$this->pessoa->update($pessoa);

				$endereco = array();
				$endereco['cep']         = $this->input->post('cep');
				$endereco['bairro']      = $this->input->post('bairro');
				$endereco['logradouro']  = $this->input->post('logradouro');
				$endereco['numero']      = $this->input->post('numero');
				$endereco['complemento'] = $this->input->post('complemento');
				$endereco['id_pessoa']   = $id_pessoa;
				$endereco['id_cidade']   = $this->input->post('cidade');
				$this->endereco->update($endereco);

				$documento = array();
				$documento['numero']    = $this->input->post('tipo_pessoa') === 'pf' ?
					$this->input->post('cpf') : $this->input->post('cnpj');
				$documento['tipo']      = $this->input->post('tipo_pessoa') === 'pf' ? 
					'CPF' : 'CNPJ';
				$documento['id_pessoa'] = $id_pessoa;
				$this->documento->update($documento);

				$telefone = array();
				$telefone['numero']    = $this->input->post('telefone');
				$telefone['id_pessoa'] = $id_pessoa;
				$this->telefone->update($telefone);

				$this->session->set_flashdata('success', 'Cadastro editado com sucesso');

				redirect('pessoa');
			}
		}
		else
		{

			$data['pessoa']        = $this->pessoa->getById($id_pessoa);
			$data['title']         = 'Editar Cadastro';
			$data['estados']       = $this->estado->get();

			//Cria váriaveis com os flashdata para facilitar a manipulação na view 
			$data['errors']          = $this->session->flashdata('errors');
			$data['old_values']      = $this->session->flashdata('old_values');
			$data['success_message'] = $this->session->flashdata('success');
			$data['error_message']   = $this->session->flashdata('danger');

			$data['assets'] = array(
				'css' => array('pessoa/style.css'),
				'js' => array(
					'lib/jquery/jquery.mask.min.js',
					'pessoa/main.js',
					'pessoa/validate-form.js',
				),
			);

			loadTemplate(
				'includes/header',
				'pessoa/editar',
				'includes/footer',
				$data
			);
			
		}
		
	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade remover um registro de pessoa do banco com base no id passado.
	* Seguindo a ordem de dependência.
	*
	* @param integer $id_pessoa
	*/
	public function delete($id_pessoa)
	{
		$this->telefone->remove($id_pessoa);
		$this->documento->remove($id_pessoa);
		$this->endereco->remove($id_pessoa);

		if($this->pessoa->remove($id_pessoa))
		{
			$this->session->set_flashdata('success', 'Cadastro removido com sucesso!');
		}
		else
		{
			$this->session->set_flashdata('danger', 'Não foi possível remover o cadastro!');	
		}


		redirect('pessoa');
	}

}

