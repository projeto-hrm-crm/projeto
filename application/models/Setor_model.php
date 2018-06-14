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
  * Retorna registro de setor cadastrados no banco com id_setor referente
  *
  * @param integer $id_setor refere-se ao id do registro de setor a ser consultado
  * @return array: registro de setor cadastrado com id_setor informado
  */
  public function find($id_setor)
	{
    try {
			$data=$this->db->from('setor')->where('setor.id_setor', $id_setor)->get();
      if($data){
        return $data->result();
      }else{
        echo "setor não existe";
        return 1;
      }
    }catch (\Exception $e){}
}

  /**
  * @author: Matheus Ladislau
  * Retorna todos registro de setor cadastrados no banco
  * @return array: todos registro de setor cadastrados
  */
  public function get(){
    return $this->db->get('setor')->result();
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
    $id_setor = $this->db->insert_id();

    if($id_setor)
    {
      $this->relatorio->setLog('insert', 'Inserir', 'Setor', $id_setor, 'Inseriu o setor', $id_setor);
    }
    return $id_setor;
  }

  /**
  * @author: Matheus Ladislau
  * Edita o registro de setor pelo id_setor referente
  *
  * @param integer $id_setor refere-se ao id do registro de setor a ser editado
  * @return boolean: True - caso editado com sucesso, False - não editado
  */
  public function update($data,$id)
  {
    $id_setor = $this->db->update("setor",$data,array('id_setor'=>$id));

    if($id_setor)
    {
      $this->relatorio->setLog('update', 'Atualizar', 'Setor', $id_setor, 'Atualizou o setor', $id);
    }
    return $id_setor;
  }

  /**
	* @author: Matheus Ladislau
	* Remove o registro de setor pelo id_setor referente
	*
	* @param integer: $id_setor refere-se ao id do registro de setor a ser deletado
	*/
	public function remove($id)
	{
		$this->db->where('id_setor', $id);
		$id_setor = $this->db->delete('setor');

      if($id_setor)
      {
        $this->relatorio->setLog('delete', 'Deletar', 'Setor', $id, 'Deletou o setor', $id);
      }
	}
}
?>
