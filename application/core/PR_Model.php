<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @author: Tiago Villalobos
* Este model tem como função facilitar a geração de logs
* e agrupar alguns métodos para models
*/ 
class PR_Model extends CI_Model 
{	
	/**
	* @author: Tiago Villalobos
	* Seta o log de acordo com a última query executada
	* Utilize o campo id quando a operação for de UPDATE ou DELETE
	* O parâmetro message deverá ser utilizado quando for necessária uma mensagem específica
	* No model Pedido existe um bom exemplo de mensagem customizada
	* 
	* @param: $name    string
	* @param: $id      integer
	* @param: $message string
	* @see:   application/models/Pedido_model.php
	*/ 
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

	/**
	* @author: Tiago Villalobos
	* Realiza a limpeza de alguns caracteres desnecessários na construção do log
	* 
	* @param:  $data string
	* @return: $string
	*/ 
	private function clearLogData($data)
	{
		return str_replace('WHERE', '', str_replace('_', ' ', str_replace('`', '', $data)));
	}
	
}
