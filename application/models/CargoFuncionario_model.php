
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargoFuncionario_model extends CI_Model{

  /**
  * @author: Camila Sales
  * Este método tem como finalidade salvar um registro de cargo_funcionario
  *
  */
  public function insert($data)
  {
    try{
      $this->db->insert('cargo_funcionario', $data);
      $id_cargo_funcionario = $this->db->insert_id();

      if($id_cargo_funcionario)
      {
        $this->relatorio->setLog('insert', 'Inserir', 'cargo_funcionario', $id_cargo_funcionario, 'Inseriu o cargo_funcionario', $id_cargo_funcionario);
      }
      return $id_cargo_funcionario;

    } catch (\Exception $e) {

    }
  }

    /**
	* @author Camila Sales
	* Retorna os cargos_funcionario correspondentes
	*
	* @return mixed array de objetos
	*/
  public function get($id_funcionario,$id_cargo)	{
    $cargo = $this->db->select("*")
    ->from("cargo_funcionario")
    ->where('cargo_funcionario.id_funcionario', $id_funcionario)->where('cargo_funcionario.id_cargo', $id_cargo)->get();
    return $cargo->result();
  }


  /**
  * @author: Camila Sales
  * Este método tem como finalidade atualizar um registro de cargo_funcionario do banco
  * pelo id do mesmo.
  *
  */
  public function atualizar($id_cargo_funcionario,$data)
  {
    try {
      $this->db->update('cargo_funcionario', $data, array('id_cargo_funcionario' => $id_cargo_funcionario));

      $this->relatorio->setLog('desativar', 'Desativado', 'cargo_funcionario', $id_cargo_funcionario, 'Desativou o cargo_funcionario', $id_cargo_funcionario);

    } catch (\Exception $e) {}
  }
  
}
