<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function index()
    {
        $dados['title'] = 'Agenda';

        $dados['assets'] = array (
            'js' => array (
                'calendar/agenda.js',
            ),
        );

        loadTemplate('includes/header', 'agenda/index', 'includes/footer', $dados);
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
                        $this->evento->insert($eventos);
                        $this->session->set_flashdata('success','Evento cadastrado com sucesso!');

                    } else {
                        $this->session->set_flashdata('danger','Hora de início maior ou igual a hora final.');
                    }

                } else if($inicio < $fim) {
                    $this->evento->insert($eventos);
                    $this->session->set_flashdata('success','Evento cadastrado com sucesso!');

                } else {
                    $this->session->set_flashdata('danger','Data de início maior que a data final.');
                }

            } else {
                $this->session->set_flashdata('danger','Não foi possivel realizar esta operação.');
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
