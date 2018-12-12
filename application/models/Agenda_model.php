<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    public function get()
    {
        $events = array();

        $results = $this->db->distinct()
            ->select('id, criado_por, titulo, inicio, fim, cor')
            ->from('evento')
            ->join('evento_usuario', 'evento_usuario.id_evento = evento.id', 'left')
            ->where('criado_por', $this->session->userdata('user_login'))
            ->or_where('id_usuario', $this->session->userdata('user_login'))
            ->get()
            ->result();

        foreach ($results as $key => $result) {
            $events[$key]['id']             = $result->id;
            $events[$key]['criado_por']     = $result->criado_por;
            $events[$key]['usuario_logado'] = $this->session->userdata('user_login');
            $events[$key]['title']          = $result->titulo;
            $events[$key]['start']          = $result->inicio;
            $events[$key]['end']            = $result->fim;
            $events[$key]['color']          = $result->cor;
        }

        return $events;
    }

    public function insert($eventos)
    {
        $this->db->insert('evento', $eventos);

        $titulo = $eventos['titulo'];
        $inicio = date("d/m/Y",strtotime($eventos['inicio']));

        $id_evento = $this->db->insert_id();
        $logged_user = $this->session->userdata('user_login');

        if($id_evento)
        {
            $this->relatorio->setLog('insert', 'Inserir', 'Evento', $id_evento, 'Inseriu o evento', $_POST['titulo']);
        }

        $this->Notification->notify(null, $logged_user, "O evento <b>{$titulo}</b> foi criado na data <b>{$inicio}</b>.", base_url()."agenda");

        return $id_evento;
    }

    public function update($array){
        $this->db->where('id', $array['id']);
        $this->db->set('titulo', $array['titulo']);
        $this->db->set('inicio', $array['inicio']);
        $this->db->set('fim', $array['fim']);
        $this->db->set('cor', $array['cor']);

        $titulo = $array['titulo'];
        $inicio = date("d/m/Y",strtotime($array['inicio']));

        $id_evento = $this->db->update('evento');
        $logged_user = $this->session->userdata('user_login');

        if($id_evento)
        {
            $this->relatorio->setLog('update', 'Atualizar', 'Evento', $id_evento, 'Atualizou o evento', $array['titulo']);
        }

        $this->Notification->notify(null, $logged_user, "O evento <b>{$titulo}</b> foi alterado para a data <b>{$inicio}</b>.", base_url()."agenda");

        return $id_evento;
    }

    public function delete($id)
    {

        $this->db->where('id', $id);
        $getTitle = $this->evento->get();
        $titulo = $getTitle[0]['title'];

        $this->db->where('id', $id);
        $id_evento = $this->db->delete('evento');
        $logged_user = $this->session->userdata('user_login');

        if($id_evento){
            $this->relatorio->setLog('delete', 'Deletar','Evento', $id_evento, 'Deletou o Evento', $id);
        }

        $this->Notification->notify(null, $logged_user, "O evento <b>{$titulo}</b> foi cancelado.", base_url()."agenda");

        return $id_evento;
    }


    /**
    * @author: Rafael Pigozzi
    * Atualiza a data do evento
    *
    * @param int $event_id
    * @param string $date
    * @return boolean
    */
    public function updateDate($event_id, $date)
    {
        $this->db->where('id', $event_id);
        return $this->db->update('evento', [
            'inicio' => $date['date_start'],
            'fim'    => $date['date_end']
        ]);

    }

    /**
    * @author: Rafael Pigozzi
    * Deleta dados na tabela relacional entre evento e usuario: evento_usuario
    *
    * @param: $evento_usuario mixed
    */
    public function deleteEventUser($event_id)
    {
        $this->db->where('id_evento', $event_id);
        $this->db->delete('evento_usuario');
    }

    /**
    * @author: Rafael Pigozzi
    * Insere dados na tabela relacional entre evento e usuario: evento_usuario
    *
    * @param: $evento_usuario mixed
    */
    public function insereUsuario($evento_usuario)
    {
        $usuario = $this->usuario->getByName($evento_usuario['id_usuario']);
        $this->db->insert('evento_usuario', $evento_usuario);

    }

    /**
    * @author: Rafael Pigozzi
    *
    * @param:
    */
    public function getEventUsers($event_id)
    {
        $users = [];

        $this->db->select('evento_usuario.id_usuario, pessoa.nome')
                 ->from('evento')
                 ->join('evento_usuario', 'evento.id = evento_usuario.id_evento')
                 ->join('usuario', 'evento_usuario.id_usuario = usuario.id_usuario')
                 ->join('pessoa', 'usuario.id_pessoa = pessoa.id_pessoa')
                 ->where('evento_usuario.id_evento', $event_id);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            $users = $result->result();
        }

        return json_encode($users);

    }

}
