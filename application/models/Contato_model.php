<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contato_model extends CI_Model {

  public function getCliente()
  {
    try {
      $query = $this->db->select("*")->from("cliente")
      ->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
      ->join('cliente', 'pessoa_fisica.id_pessoa = cliente.id_pessoa');
    } catch (\Exception $e) {}

    if ($query){
      return $query->getCliente()->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }

  public function getFornecedor()
  {
    try {
      $query = $this->db->select("*")->from("fornecedor")
      ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
      ->join('fornecedor', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa');
    } catch (\Exception $e) {}

    if ($query){
      return $query->getFornecedor()->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }

  public function getCandidato()
  {
    try {
      $query = $this->db->select("*")->from("candidato")
      ->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa = candidato.id_pessoa');
    } catch (\Exception $e) {}

    if ($query){
      return $query->getCandidato()->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }

  public function getFuncionario()
	{
    try {
      $query = $this->db->select("*")->from("funcionario")
      ->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
      ->join('funcionario', 'pessoa_fisica.id_pessoa = funcionario.id_pessoa');
    } catch (\Exception $e) {}

    if ($query){
      return $query->getFuncionario()->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }
}
