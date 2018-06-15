<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Este model tem como função facilitar a geração de logs
// e agrupar alguns métodos para models
class PR_Model extends CI_Model 
{	

	// Seta o log de acordo com a última query executada
	protected function setLog($name, $id = null, $message = null)
	{
		$query = explode(' ', $this->db->last_query());

		switch ($query[0])
		{
			case 'INSERT':
				$this->relatorio->setLog(
					$query[0], 
					'Inserir', 
					$this->clearLogData($query[2]), 
					is_null($id) ? $this->db->insert_id() : $id, 
					is_null($message) ? 'Inseriu '.$this->clearLogData($query[2]) : $message, 
					$name
				);
				break;
			
			case 'UPDATE':
				$this->relatorio->setLog(
					$query[0], 
					'Atualizar', 
					$this->clearLogData($query[1]), 
					$id, 
					is_null($message) ? 'Atualizou '.$this->clearLogData($query[1]) : $message, 
					$name
				);
				break;

			case 'DELETE':
				$this->relatorio->setLog(
					$query[0], 
					'Deletar', 
					$this->clearLogData($query[2]), 
					$id, 
					is_null($message) ? 'Deletou '.$this->clearLogData($query[2]) : $message, 
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
