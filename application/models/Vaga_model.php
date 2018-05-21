<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaga_model extends CI_Model
{


    public function __construct(){
        parent::__construct();
    }

    /*
    *@author: Lucilene Fidelis
    *
    *@return: mixed
    */
    public function get(){
        $this->db->select(
            'vaga.id_vaga, vaga.data_oferta, vaga.quantidade,
            cargo.nome AS cargo,
            setor.nome AS setor'
        );
        $this->db->join('cargo', 'vaga.id_cargo = cargo.id_cargo');
        $this->db->join('setor', 'cargo.id_setor = setor.id_setor');

        return $this->db->get('vaga')->result();
    }
     /*
     *@author: Lucilene Fidelis
     *
     *@params: array - com dados das vagas
     *@return: boolean
    */
    public function insert($array) {

        $this->db->insert('vaga', $array);
        $id_vaga = $this->db->insert_id();

        if($id_vaga)
        {
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'insert';
            $dados['acao'] = 'Inserir';
            $dados['data'] = date('d-m-Y');
            $dados['tabela'] = 'Vaga';
            $dados['item_editado'] = $id_vaga;
            $dados['descricao'] = $dados['id_usuario'] . ' Inseriu a vaga ' . $dados['item_editado'] . ' na data de ' . $dados['data'];

            $this->relatorio->setLog($dados);
            return $id_vaga;
        }

    }
     /*
     *@author: Lucilene Fidelis
     *
     *@params: mixed com dados das vagas
     *@return: boolean
    */
    public function update($vaga){
        $this->db->where('vaga.id_vaga', $vaga['id_vaga']);

        $this->db->set('vaga.data_oferta', $vaga['data_oferta']);
        $this->db->set('vaga.quantidade',  $vaga['quantidade']);
        $this->db->set('vaga.requisitos',  $vaga['requisitos']);
        $this->db->set('vaga.id_cargo',    $vaga['id_cargo']);
        $id_vaga = $this->db->update('vaga');

        if($id_vaga)
        {
            $id_vaga = $vaga['id_vaga'];

            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'update';
            $dados['acao'] = 'Atualizar';
            $dados['data'] = date('d-m-Y');
            $dados['tabela'] = 'Vaga';
            $dados['item_editado'] = $id_vaga;
            $dados['descricao'] = $dados['id_usuario'] . ' Atualizou a vaga ' . $dados['item_editado'] . ' na data de ' . $dados['data'];

            $this->relatorio->setLog($dados);
            return $id_vaga;
        }

    }

    /*
     *@author: Lucilene Fidelis
     *
     *@params: mixed com dados das vagas
     *@return: boolean
    */
    public function remove($id){
        $this->db->where('vaga.id_vaga', $id);
        $id_vaga = $this->db->delete('vaga');

        if($id_vaga)
        {
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'delete';
            $dados['acao'] = 'Deletar';
            $dados['data'] = date('d-m-Y');
            $dados['tabela'] = 'Vaga';
            $dados['item_editado'] = $id;
            $dados['descricao'] = $dados['id_usuario'] . ' Deletou a vaga ' . $dados['item_editado'] . ' na data de ' . $dados['data'];

            $this->relatorio->setLog($dados);
            return $id_vaga;
        }
    }

    /*
     * @author: Lucilene Fidelis
     * Esse método retorna um objeto Vaga através de seu $id
     *
     * @params: $id
     * @return: object Vaga
     */
    public function getById($id){

      $this->db->where('vaga.id_vaga', $id);
      return $this->db->get('vaga')->row();
    }

}
