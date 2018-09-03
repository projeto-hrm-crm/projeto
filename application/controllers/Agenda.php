<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function index()
    {
        $dados['title'] = 'Agenda';

        $dados['eventos'] = $this->evento->get();

        loadTemplate('includes/header', 'agenda/index', 'includes/footer', $dados);
    }

    public function create()
    {
        if($this->input->post()){
            if($this->form_validation->run('evento')){
                $eventos = array(
                    'titulo'     => $this->input->post('titulo'),
                    'inicio'     => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('inicio')))),
                    'fim'        => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('fim')))),
                    'cor'        => $this->input->post('cor'),
                );
                $this->evento->insert($eventos);
                $this->session->set_flashdata('success','Evento cadastrado com sucesso!');
                redirect('agenda');
            }else{
                $this->session->set_flashdata('errors', $this->form_validation->error_array());
                $this->session->set_flashdata('old_data', $this->input->post());
                redirect('agenda/cadastrar');
            }
        } else {
            $dados['title'] = 'Cadastrar evento';
            $dados['errors'] = $this->session->flashdata('errors');
            $dados['old_data'] = $this->session->flashdata('old_data');

            loadTemplate('includes/header', 'agenda/cadastrar', 'includes/footer', $dados);
        }
    }

}
