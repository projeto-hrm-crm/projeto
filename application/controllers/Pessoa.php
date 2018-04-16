<?php
class Pessoa extends CI_Controller
{


	public function index()
	{
		$this->create();
	}


	/**
	* @author: Tiago Villalobos
	* Cria o formulário para cadastro de pessoa ou submete uma nova pessoa, caso seja enviada uma requisão POST.
	* 
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
				$id_pessoa = $this->pessoa->insert();

				$this->telefone->insert($id_pessoa);
				$this->documento->insert($id_pessoa);
				$this->endereco->insert($id_pessoa);

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
				'pessoa/create-form',
				'includes/footer',
				$data
			);
		}
  	}

	/**
	* @author: Tiago Villalobos
	* Utiliza um id para buscar uma pessoa no banco e preencher o formulário de edição 
	*
	* 
	* @param integer $id identificação da pessoa
	* @todo mudar o formulário de edição
	*/
	public function edit($id)
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

				redirect('editar/pessoa/'.$id);
			}
			else
			{
				$this->pessoa->update($id);
				$this->documento->update($id);
				$this->telefone->update($id);
				$this->endereco->update($id);

				$this->session->set_flashdata('success', 'Cadastro editado com sucesso');

				redirect('cadastrar/pessoa');
			}
		}
		else
		{

			$data['pessoa']        = $this->pessoa->getById($id);
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

			//Mudar para o formulário de edição
			loadTemplate(
				'includes/header',
				'pessoa/create-form',
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
	public function delete($id)
	{
		$this->telefone->remove($id);
		$this->documento->remove($id);
		$this->endereco->remove($id);

		if($this->pessoa->remove($id))
		{
			$this->session->set_flashdata('success', 'Cadastro removido com sucesso!');
		}
		else
		{
			$this->session->set_flashdata('danger', 'Não foi possível remover o cadastro!');	
		}


		redirect('cadastrar/pessoa');
	}

}

