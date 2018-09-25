<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Habilidade_model extends PR_Model
{
    
    /**
    * @author: Rodrigo Alves
    * Cadastrar Habilidade
    *
    */
    public function insert($data) {               
       $this->db->insert('habilidade', [
          'id_pessoa' => $data['id_pessoa'],
          'nome' => $data['nome']
       ]);       
    }
   
   /**
    * @author: Rodrigo Alves
    * Autualizar Habilidade
    *
    */
   public function update($data) {                     
      $this->db
        ->set('nome', $data['nome'])
        ->where('id_habilidade', $data['id_habilidade'])
        ->update('habilidade');
    }

    /**
    * @author: Rodrigo Alves
    * Retorna todas as habilidades da pessoa
    *
    */   
    public function get($id_pessoa) {        
        return $this->db
            ->where('id_pessoa', $id_pessoa)
            ->get('habilidade')
            ->result();
    }

    /**
    * @author: Rodrigo Alves
    * Retorna registro de habilidade cadastrado no banco com id_sugestao de referencia
    *
    */
    public function find($id_habilidade) {
        return $this->db           
            ->where('id_habilidade', $id_habilidade)
            ->get('habilidade')
            ->result();
    }

    /**
    * @author: Rodrigo Alves
    * Remove o registro de habilidade pelo id_habilidade referente
    *
    */
    public function remove($id_habilidade) {
        $this->db
           ->where('id_habilidade', $id_habilidade)
           ->delete('habilidade');
    }
}

