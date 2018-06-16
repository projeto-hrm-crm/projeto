<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_model extends CI_Model
{
  public $id_cargo;
  public $nome;
  public $descricao;
  public $id_setor;//estrangeira

  public function __construct(){
      parent::__construct();
  }
  /**
  * @author: Matheus Ladislau
  * Retorna todos registro de cargo cadastrados no banco
  * @return array: todos registro de cargo
  */
  public function get(){
      $query = $this->db->get('cargo');
      return $query->result();
  }

  /**
  * @author: Peterson Munuera
  * Retorna registro do cargo filtrado pelo id_cargo
  * @param integer $id_cargo refere-se ao id do registro de cargo a ser buscado
  * @return array: cargo buscado
  */
  public function getById($id_cargo)
  {
      $query = $this->db->get_where('cargo', array('id_cargo' => $id_cargo));
      return $query->result();
  }

  /**
  * @author: Matheus Ladislau
  * Realiza registro de cargo
  *
  *@param array: Dados (id_cargo,nome,descricao,id_setor) a serem registrados
  */
  public function insert($data)
  {
    $this->db->insert('cargo',$data);
    $id_cargo = $this->db->insert_id();

    if($id_cargo)
    {
        $this->relatorio->setLog('insert', 'Inserir', 'Cargo', $id_cargo, 'Inseriu o cargo', $id_cargo);
    }
    return $id_cargo;
  }

  /**
  * @author: Matheus Ladislau
  * Edita o registro de cargo pelo id_cargo referente
  *
  * @param integer $id_cargo refere-se ao id do registro de cargo a ser editado
  * @return boolean: True - caso editado com sucesso, False - não editado
  */
  public function update($id,$data)
  {
    $id_cargo = $this->db->update("cargo",$data,array('id_cargo'=>$id));

    if($id_cargo)
    {
        $this->relatorio->setLog('update', 'Atualizar', 'Cargo', $id_cargo, 'Atualizou o cargo', $id);
    }
    return $id_cargo;
  }

  /**
  * @author: Matheus Ladislau
  * Remove o registro de cargo pelo id_cargo referente
  *
  * @param integer: $id_cargo refere-se ao id do registro de cargo a ser deletado
  */
  public function delete($id)
  {
    $id_cargo = $this->db->delete('cargo', array('id_cargo' => $id));

    if($id_cargo)
    {
        $this->relatorio->setLog('delete', 'Deletar', 'Cargo', $id_cargo, 'Deletou o cargo', $id);
    }
    return $id_cargo;
  }

  /**
  * @author: Pedro Henrique
  * Método responsável por contar o total de cargos em aberto
  *
  * @param void
  * @return int
  */

  public function count()
  {
    $this->db->select('count(*) as cargos')
             ->from('cargo');
             
    $query = $this->db->get();
    return $query->result()[0]->cargos;
  }
}
?>
