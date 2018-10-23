<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function index()
    {
        $dados['title'] = 'Agenda';
        $dados['usuarios'] = $this->usuario->getByName();
        $dados['assets'] = array (
            'css' => array(
                'calendar/selectize.css'
            ),

            'js' => array (
                'calendar/agenda.js',
                'calendar/selectize.js'
            ),
        );

        loadTemplate('includes/header', 'agenda/index', 'includes/footer', $dados);
    }

    public function getEventUsers($event_id)
    {
        $users = $this->evento->getEventUsers($event_id);
        echo $users;
    }

    public function get()
    {
       echo json_encode($this->evento->get());
    }

    public function create()
    {
        if($this->input->post()){
            if($this->form_validation->run('evento')){
                $eventos = array(
                    'criado_por' => $this->session->userdata('user_login'),
                    'titulo'     => $this->input->post('titulo'),
                    'inicio'     => date('Y-m-d H:i:s', strtotime(str_replace('/','-',$this->input->post('inicio').$this->input->post('horaInicio')))),
                    'fim'        => date('Y-m-d H:i:s', strtotime(str_replace('/','-',$this->input->post('fim').$this->input->post('horaFim')))),
                    'cor'        => $this->input->post('cor'),
                );

                $inicio     = strtotime(str_replace('/','-',$this->input->post('inicio')));
                $fim        = strtotime(str_replace('/','-',$this->input->post('fim')));
                $horaInicio = strtotime(str_replace('/','-',$this->input->post('horaInicio')));
                $horaFim    = strtotime(str_replace('/','-',$this->input->post('horaFim')));

                if($inicio == $fim){
                    if($horaInicio < $horaFim){
                        $id_evento = $this->evento->insert($eventos);
                        $this->session->set_flashdata('success','Evento cadastrado com sucesso!');

                    } else {
                        $this->session->set_flashdata('danger','Hora de início maior ou igual a hora final.');
                    }

                } else if($inicio < $fim) {
                    $id_evento = $this->evento->insert($eventos);
                    $this->session->set_flashdata('success','Evento cadastrado com sucesso!');

                } else {
                    $this->session->set_flashdata('danger','Data de início maior que a data final.');
                }

            } else {
                $this->session->set_flashdata('danger','Não foi possivel realizar esta operação.');
            }

            if ($this->input->post('id_usuario')) {
                for ($i = 0; $i < count($this->input->post('id_usuario')); $i++) {
                    $evento[$i] = array(
                        'evento_id'  => $id_evento,
                        'id_usuario' => $this->input->post('id_usuario')[$i],
                    );
                    $this->evento->insereUsuario($evento[$i]);
                }
            }

            redirect('agenda');

        } else {
            $dados['title'] = 'Cadastrar evento';
            loadTemplate('includes/header', 'agenda/cadastrar', 'includes/footer', $dados);
        }
    }

    public function edit()
    {
        if($this->input->post()){
            if($this->form_validation->run('evento')){
                $eventos = array(
                    'id'         => $this->input->post('id'),
                    'titulo'     => $this->input->post('titulo'),
                    'inicio'     => date('Y-m-d H:i:s', strtotime(str_replace('/','-',$this->input->post('inicio').$this->input->post('horaInicio')))),
                    'fim'        => date('Y-m-d H:i:s', strtotime(str_replace('/','-',$this->input->post('fim').$this->input->post('horaFim')))),
                    'cor'        => $this->input->post('cor'),
                );

                $inicio     = strtotime(str_replace('/','-',$this->input->post('inicio')));
                $fim        = strtotime(str_replace('/','-',$this->input->post('fim')));
                $horaInicio = strtotime(str_replace('/','-',$this->input->post('horaInicio')));
                $horaFim    = strtotime(str_replace('/','-',$this->input->post('horaFim')));

                if($inicio == $fim){
                    if($horaInicio < $horaFim){
                        $this->evento->update($eventos);
                        $this->session->set_flashdata('success','Evento editado com sucesso!');

                    } else {
                        $this->session->set_flashdata('danger','Hora de início maior ou igual a hora final.');
                    }

                } else if($inicio < $fim) {
                    $this->evento->update($eventos);
                    $this->session->set_flashdata('success','Evento editado com sucesso!');

                } else {
                    $this->session->set_flashdata('danger','Data de início maior que a data final.');
                }

            } else {
                $this->session->set_flashdata('danger','Não foi possivel realizar esta operação');
            }

            if ($this->input->post('id_usuario')) {
                $this->evento->deleteEventUser($this->input->post('id'));

                for ($i = 0; $i < count($this->input->post('id_usuario')); $i++) {
                    $evento[$i] = array(
                        'evento_id'  => $this->input->post('id'),
                        'id_usuario' => $this->input->post('id_usuario')[$i],
                    );
                    $this->evento->insereUsuario($evento[$i]);
                }

            }

            redirect('agenda');

        } else {
            $dados['title'] = 'Editar evento';
            loadTemplate('includes/header', 'agenda/index', 'includes/footer', $dados);
        }
    }

    public function delete()
    {
        $evento = $this->input->post('id');

        if($evento){
            $this->evento->delete($evento);
            $this->session->set_flashdata('success', 'Evento excluído com sucesso!');
        } else {
            $this->session->set_flashdata('danger','Não foi possivel realizar esta operação');
        }
        redirect('agenda');
    }
}
