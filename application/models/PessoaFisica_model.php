<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PessoaFisica_model extends CI_Model{

  public $email;
  public $dataNascimento;
  public $sexo;
  public $id_pessoa;

  /**
	* @author: Camila Sales
	* Este método tem como finalidade salvar um registro de pessoa
	* física no banco
	*
	*/
	public function insert()
	{
    // insert pessoa;
    $this->email  = $this->input->post('email');
		$this->$dataNascimento  = $this->input->post('data_nascimento');
    $this->sexo = $this->input->post('sexo');
		$this->id_pessoa = 1;
    // $this->id_pessoa = $this->input->post('id_pessoa');

		$this->db->insert('pessoa_fisica', $this);
    return $this->db->insert_id();
	}
	/**
	* @author: Camila Sales
	* Retorna todas as pessoas fisicas pessoas fisicas.
	* @return mixed array de objetos
	*/
	public function get()
  {
    $query = $this->db->get('pessoa_fisica');
    if ($query)
    {
      return $query->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }
  /**
	* @author: Rodrigo Alves
	* Retorna todas as pessoas fisicas pessoas fisicas pelo Id.
	* @return mixed array de objetos
	*/
	public function getId($id)
  {
    $this->db->get('pessoa_fisica');
    $query = $this->db->where('id_pessoa_fisica', $id_pessoa);
    if ($query)
    {
      return $query->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }
	/**
	* @author: Camila Sales
	* Este método tem como finalidade atualizar os dados
	* de um registro de pessoa no banco pelo id do mesmo.
	*
	*/
	public function update()
	{
    // update pessoa
    $this->email  = $this->input->post('email');
    $this->$dataNascimento  = $this->input->post('data_nascimento');
    $this->sexo = $this->input->post('sexo');

		$this->db->update('pessoa_fisica', $this, array('id_pessoa_fisica' => $this->input->post('id_pessoa_fisica')));
	}
	/**
	* @author: Camila Sales
	* Este método tem como finalidade remover um registro de pessoa do banco
	* pelo id do mesmo.
	*
	*/
	public function remove()
	{
		$this->db->where('id_pessoa_fisica', $this->input->post('id_pessoa_fisica'));
		$this->db->delete('pessoa');
    // remove pessoa
	}
}
