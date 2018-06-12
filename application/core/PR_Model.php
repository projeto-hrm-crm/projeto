<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Este model tem como função facilitar a geração de logs
// e agrupar alguns métodos para models
class PR_Model extends CI_Model 
{	

	// Seta o log de acordo com a última query executada
	// 
	protected function setLog($name, $id = null)
	{
		$query = explode(' ', $this->db->last_query());

		switch ($query[0]) 
		{
			case 'INSERT':
				$this->relatorio->setLog(
					$query[0], 
					'Inserir', 
					$this->clearLogData($query[2]), 
					$this->db->insert_id(), 
					'Inseriu '.$this->clearLogData($query[2]), 
					$name
				);
				break;
			
			case 'UPDATE':
				$this->relatorio->setLog(
					$query[0], 
					'Atualizar', 
					$this->clearLogData($query[1]), 
					$id, 
					'Atualizou '.$this->clearLogData($query[1]), 
					$name
				);
				break;

			case 'DELETE':
				$this->relatorio->setLog(
					$query[0], 
					'Deletar', 
					$this->clearLogData($query[2]), 
					$id, 
					'Deletou '.$this->clearLogData($query[2]), 
					$name
				);
				break;

		}

	}

	// Limpa algumas sujeiras ;)
	private function clearLogData($data)
	{
		return str_replace('WHERE', '', str_replace('_', ' ', str_replace('`', '', $data)));
	}
	

}
