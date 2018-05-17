<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CandidatoEtapa_model extends CI_Model
{

  public function __construct(){
      parent::__construct();
  }

  /**
  * @author: Matheus Ladislau
  * Realiza registro de candidato_etapa
  *
  *@param array: Dados (id_setor,nome) a serem registrados
  */
  public function insert($data)
  {
    $this->db->insert('candidato_etapa',$data);
  }


}
