<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setor_model extends CI_Model
{
  public $nome;

  public function __construct(){
      parent::__construct();
  }

  /**
  * @author: Matheus Ladislau
  * Retorna todos registro de setor cadastrados no banco
  *@return
  */
  public function get(){
      $query = $this->db->get('setor');
      return $query->result();
  }

  /**
  * @author: Matheus Ladislau
  * Registra setor
  *
  * @param integer $id_pessoa
  */
  public function insert($data)
  {
    $this->db->insert('setor',$data);
  }

}
?>
