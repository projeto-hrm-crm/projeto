<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente_model extends CI_Model {

	public $id_pessoa;
	/**
	* @author: Camila Sales
	* Salva o registro de cliente associado à uma pessoa fisica
	*
	*/
	public function insert($data)
  {
 	try {
 		$this->db->insert('cliente', $data);
		$id_cliente = $this->db->insert_id();
		$logged_user = !is_null($this->session->userdata('user_login')) ? $this->session->userdata('user_login') : 1;

		if($id_cliente)
		{
			$this->relatorio->setLog('insert', 'Inserir', 'Cliente', $id_cliente, 'Inseriu o cliente', $id_cliente);
		}


		//Gera notificação



		$this->Notification->notify(null, $logged_user, "Um novo usuário foi inserido", base_url()."cliente/editar/{$id_cliente}");


		return $id_cliente;
 	} catch (\Exception $e) {}
  }


	/**
	* @author: Camila Sales
	* Remove o registro de cliente associado à uma pessoa fisica
	*
	* @param integer $id_cliente
	*/
	public function delete($id)
	{
		$this->db->where('id_cliente', $id);
		$id_cliente = $this->db->delete('cliente');

		if($id_cliente)
		{
			$this->relatorio->setLog('delete', 'Deletar', 'Cliente', $id_cliente, 'Deletou o cliente', $id);
		}
		return $id_cliente;
		// delete pessoa fisica;
	}

	public function get()
	{
		try {
			$query = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('cliente', 'pessoa_fisica.id_pessoa = cliente.id_pessoa');
		} catch (\Exception $e) {}

		if ($query){
			return $query->get()->result();
		}else{
			echo 'Não existem dados';
			exit;
		}
	}

	public function getClienteByUserID($id)
	{
		try {
			$query = $this->db->select("*")->from("cliente")
			->join('usuario', 'cliente.id_pessoa = usuario.id_pessoa');
		} catch (\Exception $e) {}

		if ($query){
			return $query->get()->result();
		}else{
			echo 'Não existem dados';
			exit;
		}
	}

	public function getById($id_cliente)
	{
		try {
			$cliente = $this->db->select("
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
			endereco.cidade,
			endereco.estado,
			documento.numero AS numero_documento,
			telefone.numero AS telefone,
			usuario.id_usuario")
			->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
			->join('cliente', 'pessoa_fisica.id_pessoa = cliente.id_pessoa')
			->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa')
			->join('documento', 'pessoa.id_pessoa = documento.id_pessoa')
			->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa')
			->where('cliente.id_cliente', $id_cliente)->get();
			if ($cliente)
			{
				return $cliente->result();
			}else{
				echo 'Candidato não existe';
				return 1;
			}
		} catch (\Exception $e) {}
	}

   public function GetIdCliente($id)
	{
		try {
			$cliente = $this->db->select("id_cliente")->from("cliente")->where('id_pessoa', $id)->get();
			if ($cliente) {
				return $cliente->result();
			}else {
				echo 'Candidato não existe';
				return 1;
			}
		} catch (\Exception $e) {}
	}

	public function update($id)
	{
		$this->db->where('id_cliente', $id);
		$id_cliente = $this->db->update('cliente');

		if($id_cliente)
		{
			$this->relatorio->setLog('update', 'Atualizar', 'Cliente', $id_cliente, 'Atualizou o cliente', $id);
		}
		return $id_cliente;
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

	/**
	* @author: Pedro Henrique
	* Método responsável por alimentar o gráfico de clientes da home
	* País, estado e cidade
	*/
	public function getClienteChartData()
	{
		for($i = 1; $i <= 12; $i++) {
			$this->db->select('count(*) as c')
						   ->from('cliente as c ')
							 ->join('pessoa as p', ' c.id_pessoa = p.id_pessoa')
							 ->where('MONTH(p.data_criacao)', $i)
                             ->where('YEAR(p.data_criacao)', date('Y'));
			$chart[] = $this->db->get()->result()[0]->c;

		}


		$data = [
			'data' => $chart,
			'status' => 'ok'
		];

		return $data;
	}

	/**
	* @author: Pedro Henrique
	*
	* Método responsável por trazer o total de clientes cadastrados no banco
	* @param void
	* @return int
	*/
	public function count()
	{
		$this->db->select("count(*) as clientes")
			->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('cliente', 'pessoa_fisica.id_pessoa = cliente.id_pessoa');
		$query = $this->db->get();

		return $query->result()[0]->clientes;
	}


	public function getDadosCliente()
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
			->join('cliente', 'pessoa_fisica.id_pessoa = cliente.id_pessoa')
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
}
