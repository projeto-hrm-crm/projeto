<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Candidato_model extends CI_Model {

	public $id_pessoa;
	/**
	* @author: Camila Sales
	* Salva o registro de candidato associado à uma pessoa fisica
	*
	*/
	public function insert($data)
  {
 	try {
 		$this->db->insert('candidato', $data);
		$id_candidato = $this->db->insert_id();

		if($id_candidato)
	    {
			$this->relatorio->setLog('insert', 'Inserir', 'Candidato', $id_candidato, 'Inseriu o candidato', $id_candidato);
		}
		return $id_candidato;
 	} catch (\Exception $e) {}
  }


	/**
	* @author: Camila Sales
	* Remove o registro de candidato associado à uma pessoa fisica
	*
	* @param integer $id_candidato
	*/
	public function remove($id)
	{
		$this->db->where('id_candidato', $id);
		$id_candidato = $this->db->delete('candidato');

		if($id_candidato)
		{
			$this->relatorio->setLog('delete', 'Deletar', 'Candidato', $id_candidato, 'Deletou o candidato', $id);
		}
		return $id_candidato;
		// delete pessoa fisica;
	}

	public function get()
	{
		try {
			$query = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa = candidato.id_pessoa');
		} catch (\Exception $e) {}

	if ($query)
	{
		return $query->get()->result();
	}else{
		echo 'Não existem dados';
		exit;
	}
	}
	public function getById($id_candidato)
	{
		try {
			$candidato = $this->db->select("
			pessoa.id_pessoa,
			pessoa.nome,
			pessoa.email,
			pessoa_fisica.sexo,
			pessoa_fisica.data_nascimento,
			endereco.cep,
			endereco.bairro,
			endereco.logradouro,
			endereco.numero AS numero_endereco,
			endereco.complemento,
			endereco.estado,
			endereco.cidade,
			documento.numero AS numero_documento,
			telefone.numero AS telefone,
			usuario.id_usuario

			")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa = candidato.id_pessoa')
			->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa')
			->join('documento', 'pessoa.id_pessoa = documento.id_pessoa')
			->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa')
			->where('candidato.id_candidato', $id_candidato)->get();
			if ($candidato)
			{
				return $candidato->result();
			}else{
				echo 'Candidato não existe';
				return 1;
			}
		} catch (\Exception $e) {}
	}
	public function find($id_candidato)
	{
		try {
			$candidato = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa = candidato.id_pessoa')->where('candidato.id_candidato', $id_candidato)->get();
			if ($candidato)
			{
				return $candidato->result();
			}else{
				echo 'Candidato não existe';
				return 1;
			}
		} catch (\Exception $e) {}
	}

	public function update($id)
	{
		$this->db->where('id_candidato', $id);
		$this->db->update('candidato');

		if($id)
		{
			$this->relatorio->setLog('update', 'Atualizar', 'Candidato', $id, 'Atualizou o candidato', $id);
		}
		return $id;
	}

    /**
	* @author: Rodrigo
	* Atualiza o curriculum
	*/
    public function findCurriculum($id_pessoa)	{
		$curriculum = $this->db->select("curriculum")->from("candidato")->where('id_pessoa', $id_pessoa)->get();

		return $curriculum->result();
	}

   /**
	* @author: Rodrigo
	* Verifica se já existe um curriculum cadastrado
	*/
    public function fileUpdate($data)	{
		$this->db->where('candidato.id_pessoa', $data['id_pessoa']);
        $this->db->set('candidato.curriculum', $data['arquivo']);
		$this->db->update('candidato');

		return $data['arquivo'];
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

	public function get_vagas(){
		// $query = $this->db->get('vaga');

		// return $query->result();
	}

	/**
	* @author: Matheus Ladislau
	* Retorna o registro de candidato, resultado de busca por id_usuario referente
	*/
	public function findCandidatoByIdUsuario($id_usuario)
	{
		$query=$this->db->select('*')
		->from('candidato')
		// ->join('pessoa',  'pessoa.id_pessoa = candidato.id_pessoa')
		->join('usuario',  'usuario.id_pessoa = candidato.id_pessoa')
		->get();
		return $query->result();
	}

	public function getDadosCandidato()
	{
		try {
			$query = $this->db->select("
			pessoa.id_pessoa,
			pessoa.nome,
			pessoa.imagem,
			pessoa.email,
			pessoa_fisica.sexo,
			pessoa_fisica.data_nascimento,
			endereco.cep,
			endereco.bairro,
			endereco.logradouro,
			endereco.numero AS numero_endereco,
			endereco.complemento,
			endereco.cidade,
			endereco.estado,
			documento.numero AS numero_documento,
			telefone.numero AS telefone,
			usuario.id_usuario")
			->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa = candidato.id_pessoa')
			->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa')
			->join('documento', 'pessoa.id_pessoa = documento.id_pessoa')
			->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa');
		} catch (\Exception $e) {}

		if ($query){
			return $query->get()->result();
		}else{
			echo 'Não existem dados';
			exit;
		}
	}
	public function findCandidatoByProcesso($id_processo){
		try {
      $query = $this->db
      ->select('candidato.id_candidato, candidato.curriculum, pessoa.id_pessoa, pessoa.nome, pessoa.email, pessoa.imagem')
      ->from('candidato')

      ->join('processo_seletivo_candidato', 'candidato.id_candidato = 	processo_seletivo_candidato.id_candidato')

      ->join('etapa', 'processo_seletivo_candidato.id_etapa = etapa.id_etapa')
      ->join('processo_seletivo', 'etapa.id_processo_seletivo = processo_seletivo.id_processo_seletivo')

      ->join('usuario', 'candidato.id_pessoa = usuario.id_pessoa')
      ->join('pessoa', 'pessoa.id_pessoa = usuario.id_pessoa')
      ->where('processo_seletivo.id_processo_seletivo', $id_processo)
      ->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    }
    catch (\Exception $e) {}

	}

}
