<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaga extends CI_Controller 
{

		/**
		* @author Tiago Villalobos
		* Chama o método create, formulário de pessoa.
		* 
		* 
		*/
		public function index()
		{
			$data['title'] = 'Vagas';

			$data['assets'] = array(
				'js' => array(
					'lib/data-table/datatables.min.js',
					'lib/data-table/dataTables.bootstrap.min.js',
					'lib/data-table/dataTables.buttons.min.js',
					'lib/data-table/buttons.bootstrap.min.js',
					'lib/data-table/jszip.min.js',
					'lib/data-table/pdfmake.min.js',
					'lib/data-table/vfs_fonts.js',
					'lib/data-table/buttons.html5.min.js',
					'lib/data-table/buttons.print.min.js',
					'lib/data-table/buttons.colVis.min.js',
					'lib/data-table/datatables-init.js',
				),
			);

			loadTemplate(
				'includes/header',
				'vaga/index',
				'includes/footer',
				$data
			);
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
				if(!$this->form_validation->run())//vaga
				{
					$this->session->set_flashdata('errors', $this->form_validation->error_array());
					$this->session->set_flashdata('old_values', $this->input->post());
					
					$this->session->set_flashdata(
						'danger', 
						'Não foi possível realizar o cadastro<br>Verifique os campos abaixo'
					);

					redirect('cadastrar/vaga');
				}
				else
				{

					$vaga = array();
					$vaga['data_oferta'] = $this->input->post('data_oferta');
					$vaga['quantidade']  = $this->input->post('quantidade');
					$vaga['requisitos']  = $this->input->post('requisitos');
					$vaga['id_cargo']    = $this->input->post('id_cargo');

					$this->vaga->insert($vaga);

					$this->session->set_flashdata('success', 'Vaga criada com sucesso');

					redirect('vagas');
				}
			}
			else
			{

				//Cria váriaveis com os flashdata para facilitar a manipulação na view 
				$data['errors']          = $this->session->flashdata('errors');
				$data['old_values']      = $this->session->flashdata('old_values');
				$data['success_message'] = $this->session->flashdata('success');
				$data['error_message']   = $this->session->flashdata('danger');

				$data['title']  = 'Cadastro de Vaga';
				$data['cargos'] = array();

				for($i = 1; $i <= 5; $i++)
				{
					$cargo = new stdClass;

					$cargo->id_cargo = $i;
					$cargo->nome     = 'Cargo '.$i;

					array_push($data['cargos'], $cargo);
				}

				loadTemplate(
					'includes/header',
					'vaga/cadastrar',
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
		public function edit($id_vaga)
		{
			
	  		if($this->input->post())
			{	
				if(!$this->form_validation->run())//vaga
				{
					$this->session->set_flashdata('errors', $this->form_validation->error_array());
					$this->session->set_flashdata('old_values', $this->input->post());
					
					$this->session->set_flashdata(
						'danger', 
						'Não foi possível realizar o cadastro<br>Verifique os campos abaixo'
					);

					redirect('editar/vaga/'.$id_vaga);
				}
				else
				{

					$vaga = array();
					$vaga['id_vaga']     = $id_vaga;
					$vaga['data_oferta'] = $this->input->post('data_oferta');
					$vaga['quantidade']  = $this->input->post('quantidade');
					$vaga['requisitos']  = $this->input->post('requisitos');
					$vaga['id_cargo']    = $this->input->post('id_cargo');

					$this->vaga->update($vaga);

					$this->session->set_flashdata('success', 'Vaga atualizada com sucesso');

					redirect('vagas');
				}
			}
			else
			{

				//Cria váriaveis com os flashdata para facilitar a manipulação na view 
				$data['errors']          = $this->session->flashdata('errors');
				$data['old_values']      = $this->session->flashdata('old_values');
				$data['success_message'] = $this->session->flashdata('success');
				$data['error_message']   = $this->session->flashdata('danger');

				$data['title']  = 'Edição de Vaga';
				$data['cargos'] = array();

				for($i = 1; $i <= 5; $i++)
				{
					$cargo = new stdClass;

					$cargo->id_cargo = $i;
					$cargo->nome     = 'Cargo '.$i;

					array_push($data['cargos'], $cargo);
				}

				loadTemplate(
					'includes/header',
					'vaga/cadastrar',
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
		public function delete($id_vaga)
		{
			if($this->vaga->remove($id_vaga))
			{
				$this->session->set_flashdata('success', 'Vaga removida com sucesso!');
			}
			else
			{
				$this->session->set_flashdata('danger', 'Não foi possível remover a vaga!');	
			}


			redirect('vagas');
		}

}