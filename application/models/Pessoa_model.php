<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa_model extends CI_Model {

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade salvar um registro de pessoa
	* no banco e retornar um último id inserido.
	*
	* @return integer último id inserido no banco
	*/
	public function insert($pessoa)
	{
		$pessoa['data_criacao'] = date("Y-m-d");
		$this->db->insert('pessoa', $pessoa);
		$id_pessoa = $this->db->insert_id();

		if($id_pessoa)
		{
			$this->relatorio->setLog('insert', 'Inserir', 'Pessoa', $id_pessoa, 'Inseriu a pessoa', $id_pessoa);
		}

		return $id_pessoa;
	}


	public function get()
	{

		$this->db->select(
			'pessoa.id_pessoa, pessoa.nome, pessoa.email,
			endereco.cep, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco, endereco.complemento, endereco.cidade,
			documento.tipo AS tipo_documento, documento.numero AS numero_documento,
			telefone.numero AS telefone,
			endereco.estado'
		);

		$this->db->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa');
		$this->db->join('documento', 'pessoa.id_pessoa = documento.id_pessoa');
		$this->db->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa');


		return $this->db->get('pessoa')->result();
	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade atualizar os dados
	* de um registro de pessoa no banco pelo id do mesmo.
	*
	*/
	public function update($pessoa)
	{
		$this->db->where('pessoa.id_pessoa', $pessoa['id_pessoa']);
		$this->db->set('pessoa.nome', $pessoa['nome']);
		$this->db->set('pessoa.email', $pessoa['email']);
		$this->db->update('pessoa', $pessoa);

		$id_pessoa = $pessoa['id_pessoa'];

		if($id_pessoa)
		{
			$this->relatorio->setLog('update', 'Atualizar', 'Pessoa', $id_pessoa, 'Atualizou pessoa', $id_pessoa);
		}
		return $id_pessoa;

	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade remover um registro de pessoa do banco
	* pelo id do mesmo.
	*
	*/
	public function remove($id)
	{
		$this->db->where('id_pessoa', $id);
		$this->db->delete('pessoa');

		if($id)
		{
			$this->relatorio->setLog('delete', 'Deletar', 'Pessoa', $id, 'Deletou a pessoa', $id);
		}
		return $id;
	}

    /**
    * @author: Rodrigo
	* Atualiza o imagem
	*/
    public function findImage($id_pessoa)	{
		$curriculum = $this->db->select("imagem")->from("pessoa")->where('id_pessoa', $id_pessoa)->get();
		return $curriculum->result();
	}

   /**
	* @author: Rodrigo
	* Verifica se já existe um imagem cadastrado
	*/
    public function imageUpdate($data)	{
		$this->db->where('pessoa.id_pessoa', $data['id_pessoa']);
        $this->db->set('pessoa.imagem', $data['arquivo']);
		$this->db->update('pessoa');

		return $data['arquivo'];
	}


	/**
	* @author Tiago Villalobos
	* Retorna uma stdClass com dados da pessoa pesquisada pelo id da mesma, tabelas relacionadas tabém são retornadas
	*
	*
	* @param  integer id identificação da pessoa
	* @return mixed objeto

	*/
	public function getById($id_pessoa)
	{
		$this->db->select(
			'pessoa.id_pessoa, pessoa.nome, pessoa.email,
			endereco.cep, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco,
			endereco.complemento,
			documento.tipo AS tipo_documento, documento.numero AS numero_documento,
			telefone.numero AS telefone'
		);

		$this->db->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa');
		$this->db->join('documento', 'pessoa.id_pessoa = documento.id_pessoa');
		$this->db->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa');

		$this->db->where('pessoa.id_pessoa', $id_pessoa);

		return $this->db->get('pessoa')->row();
	}

	/**
	* @author Beto Cadilhe
	* Retorna o id da pessoa logada
	*
	*
	* @param  integer id identificação do usuário
	* @return mixed objeto

	*/
	public function getIdPessoaByIdUsuario($id_user)
	{
		$this->db->select('id_pessoa')
				 ->from('usuario')
				 ->where('usuario.id_usuario', $id_user);

		$sql = $this->db->get();

		if ($sql->num_rows() > 0) {
			return $sql->result()[0];
		}

		return [];
	}

}
