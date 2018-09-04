<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadeMedida_model extends CI_Model
{
   /**
	* @author Camila Sales
	* Retorna as unidades de medidas
	*
	* @return mixed array de objetos
	*/
  public function get()	{
      $this->db->order_by('unidade_medida.medida', 'ASC');
		return $this->db->get('unidade_medida')->result();
	}

}
