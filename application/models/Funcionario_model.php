<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Funcionario_model extends CI_Model {

	/**
	* @author: Camila Sales
	* Salva o registro de funcionario associado à uma pessoa fisica
	*
	* @param integer $data
	*/
	public function insert($data)
	{
		try {
			$this->db->insert('funcionario', $data);
			$id_funcionario = $this->db->insert_id();

			if($id_funcionario)
	        {
				$this->relatorio->insertLog('Funcionario', $id_funcionario, 'Inseriu o funcionario', $id_funcionario);
	        }
    } catch (\Exception $e) {}
	}


	public function get()
	{
		try {
			$query = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('funcionario', 'pessoa_fisica.id_pessoa = funcionario.id_pessoa');
    } catch (\Exception $e) {}

	if ($query)
	{
		return $query->get()->result();
	}else{
		echo 'Não existem dados';
		exit;
	}
}
public function getById($id_funcionario)
{
	try {
		$funcionario = $this->db->select("
		pessoa.id_pessoa, pessoa.nome, pessoa.email,
		pessoa_fisica.sexo,pessoa_fisica.data_nascimento,
		endereco.cep, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco,
		endereco.complemento,
		cidade.id_cidade,
		documento.numero AS numero_documento,
		telefone.numero AS telefone,
		estado.id_estado
		")->from("pessoa")
		->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
		->join('funcionario', 'pessoa_fisica.id_pessoa = funcionario.id_pessoa')
		->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa')
		->join('cidade',    'endereco.id_cidade = cidade.id_cidade')
		->join('documento', 'pessoa.id_pessoa = documento.id_pessoa')
		->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa')
		->join('estado',    'cidade.id_estado = estado.id_estado')
		->where('funcionario.id_funcionario', $id_funcionario)->get();
		if ($funcionario)
		{
			return $funcionario->result();
		}else{
			echo 'Candidato não existe';
			return 1;
		}
	} catch (\Exception $e) {}
}

	/**
	* @author: Camila Sales
	* Remove o registro de funcionario associado à uma pessoa fisica
	*
	* @param integer $id_pessoa
	*/
	public function remove($id)
	{
		try {
			$this->db->where('id_funcionario', $id);
			$id_funcionario = $this->db->delete('funcionario');

			if($id_funcionario)
			{
				$this->relatorio->deleteLog('Funcionario', $id_funcionario, 'Deletou o funcionario', $id);
			}
	    } catch (\Exception $e) {}
			// delete pessoa fisica;
		}

	/**
	* @author: Mayra Bueno
	* Métodos para a caixa de seleção dinâmica
	* País, estado e cidade
	*/
	public function get_pais(){
		$query = $this->db->get('pais');
		return $query->result();
	}

	public function get_cargos(){
		// $query = $this->db->get('vaga');

		// return $query->result();
	}

}
