<?php
class Pessoa extends CI_Controller
{


	public function index()
	{
		$this->create();
	}


	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade validar os campos de pessoa, 
	* e permitir que o model insira estes dados no banco, respeitando a ordem de inserção.
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
				
				redirect('pessoa');
			}
			else
			{
				$id_pessoa = $this->pessoa->insert();

				$this->telefone->insert($id_pessoa);
				$this->documento->insert($id_pessoa);
				$this->endereco->insert($id_pessoa);

				$this->session->set_flashdata('success', 'Cadastro efetuado com sucesso');

				redirect('pessoa');
			}
		}
		else
		{
			$data['title']       = 'Cadastrar Pessoa';
			$data['estados']     = $this->estado->get();
			$data['errors']      = $this->session->flashdata('errors');
			$data['old_values']  = $this->session->flashdata('old_values');
			$data['message']     = $this->session->flashdata('success');

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
	* @todo retornar a view com o formulário
	* @param integer $id_pessoa
	*/
		/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade validar os campos de pessoa, 
	* e permitir que o model atualize este registro no banco.
	*
	* @todo criar o formulário e apresentar os erros
	*/

	public function edit($id)
	{
		
		if($this->input->post)
		{
			if(!$this->form_validation->run('pessoa'))
			{
				$this->session->set_flashdata('errors', $this->form_validation->error_array());
				$this->session->set_flashdata('old_values', $this->input->post());

				redirect('pessoa/edit/'.$id);
			}
			else
			{
				$this->pessoa->update($id);
				$this->documento->update($id);
				$this->telefone->update($id);
				$this->endereco->update($id);

				$this->session->set_flashdata('success', 'Cadastro editado com sucesso');

				redirect('pessoa');
			}
		}

		//TODO
		$data['pessoa']      = $this->pessoa->find($id);
		$data['title']       = 'Editar Cadastro';
		$data['errors']      = $this->session->flashdata('errors');
		$data['old_values']  = $this->session->flashdata('old_values');
		$data['message']     = $this->session->flashdata('success');

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

		$this->pessoa->remove();

		$this->session->set_flashdata('success', 'Cadastro removido com sucesso');

		redirect('pessoa');
	}

}

