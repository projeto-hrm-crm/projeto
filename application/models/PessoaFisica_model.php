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
  public function insert($id_pessoa)
  {
    // function insert pessoa;
    // $this->$dataNascimento  = $this->input->post('data_nascimento');
    // $this->sexo = $this->input->post('sexo');
    // $this->id_pessoa = $id_pessoa;
    $dados = ['data_nascimento' => '2000-05-05','sexo' => 1, 'id_pessoa' => $id_pessoa];
    $this->db->insert('pessoa_fisica', $dados);
    return $this->db->insert_id();
  }

  /**
  * @author: Rodrigo Alves
  * Retorna todas a pessoa fisica corespondentes ao $id ou todas, caso o id for nullo
  * @return mixed array de objetos
  */
  public function get($id)
  {
    if (is_null($id)) {
      $query = $this->db->select("*")->from("pessoa")
      ->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa');
    }else {
      $query = $this->db->select("*")->from("pessoa")
      ->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')->where('pessoa.id_pessoa', $id);
    }
    if ($query)
    {
      return $query->get()->result();
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
  public function update($id)
  {
    // update pessoa
    $this->$dataNascimento  = $this->input->post('data_nascimento');
    $this->sexo = $this->input->post('sexo');

    $this->db->update('pessoa_fisica', $this, array('id_pessoa' => $this->input->post('id_pessoa')));
  }
  /**
  * @author: Camila Sales
  * Este método tem como finalidade remover um registro de pessoa do banco
  * pelo id do mesmo.
  *
  */
  public function remove($id_pessoa)
  {
    $this->db->where('id_pessoa', $id_pessoa);
    $this->db->delete('pessoa_fisica');
    // remove pessoa
  }
}
