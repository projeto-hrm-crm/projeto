<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get('evento')->result();
    }

    public function insert($eventos)
    {
        $this->db->insert('evento', $eventos);
        $id_evento = $this->db->insert_id();

        if($id_evento)
        {
            $this->relatorio->setLog('insert', 'Inserir', 'Evento', $id_evento, 'Inseriu o evento', $_POST['titulo']);
        }
        return $id_evento;
    }

    public function update($array){
        $this->db->where('id', $array['id']);
        $this->db->set('titulo', $array['titulo']);
        $this->db->set('inicio', $array['inicio']);
        $this->db->set('fim', $array['fim']);
        $this->db->set('cor', $array['cor']);

        $id_evento = $this->db->update('produto');

        if($id_evento)
        {
            $this->relatorio->setLog('update', 'Atualizar', 'Evento', $id_evento, 'Atualizou o evento', $array['titulo']);
        }
        return $id_evento;
    }

}
