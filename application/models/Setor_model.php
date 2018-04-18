<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setor_model extends CI_Model
{
  public $nome;
  public $id_setor;

  public function __construct(){
      parent::__construct();
  }

  /**
  * @author: Matheus Ladislau
  * Retorna todos registro de setor cadastrados no banco
  * @return array: todos registro de setor cadastrados
  */
  public function get(){
      $query = $this->db->get('setor');
      return $query->result();
  }

  /**
  * @author: Matheus Ladislau
  * Realiza registro de setor
  *
  *@param array: Dados (id_setor,nome) a serem registrados
  */
  public function insert($data)
  {
    $this->db->insert('setor',$data);
  }

  /**
  * @author: Matheus Ladislau
  * Edita o registro de setor pelo id_setor referente
  *
  * @param integer $id_setor refere-se ao id do registro de setor a ser editado 
  * @return boolean: True - caso editado com sucesso, False - não editado
  */
  public function update($data,$id_setor)
  {
    return $this->db->update("setor",$data,array('id_setor'=>$id_setor));
  }

  /**
	* @author: Matheus Ladislau
	* Remove o registro de setor pelo id_setor referente
	*
	* @param integer: $id_setor refere-se ao id do registro de setor a ser deletado
	*/
	public function remove($id_setor)
	{
		$this->db->where('id_setor', $id_setor);
		$this->db->delete('setor');
	}
}
?>
