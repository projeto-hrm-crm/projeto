<?php
class Pessoa extends CI_Controller
{

  public function create()
  {
    if($this->input->post)
    {
      print_r($_POST);
    }
    else
    {
      $data['title'] = 'Cadastrar Pessoa';
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
	* Este método tem como finalidade validar os campos de pessoa,
	* e permitir que o model insira estes dados no banco, respeitando a ordem de inserção.
	*
	*
	*/
	public function save()
	{

		if(!$this->form_validation->run())
		{
			$this->session->set_flashdata('erros_pessoa', $this->form_validation->error_array());
			$this->session->set_flashdata('valores_antigos', $this->input->post());

			redirect('pessoa/create');
		}
		else
		{
			$id_pessoa = $this->pessoa->insert();

			$this->telefone->insert($id_pessoa);
			$this->documento->insert($id_pessoa);
			$this->endereco->insert($id_pessoa);

			redirect('pessoa/create');
		}

	}


	/**
	* @author: Tiago Villalobos
	* Utiliza um id para buscar uma pessoa no banco e preencher o formulário de edição
	*
	* @todo retornar a view com o formulário
	* @param integer $id_pessoa
	*/
	public function edit($id_pessoa)
	{
		$this->pessoa->get($id_pessoa);
	}


	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade validar os campos de pessoa,
	* e permitir que o model atualize este registro no banco.
	*
	* @todo criar o formulário e apresentar os erros
	*/
	public function update()
	{
		if(!$this->form_validation->run())
		{
			$this->session->set_flashdata('erros_pessoa', $this->form_validation->error_array());
			$this->session->set_flashdata('valores_antigos', $this->input->post());
		}
		else
		{
			$this->pessoa->update();
			$this->documento->update();
			$this->telefone->update();
			$this->endereco->update();

			//redirect('pessoa');
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

		$this->pessoa->remove();

		//redirect('pessoa');
	}

}
