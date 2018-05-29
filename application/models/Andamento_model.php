<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamento_model extends CI_Model
{

    /**
    * @author: Tiago Villalobos
    * Insere andamento no banco
    * @param: $andamento mixed
    */
	public function insert($andamento)
	{
        $this->db->insert('andamento', $andamento);
        $id_andamento = $this->db->insert_id();
        
        if($id_andamento)
        {
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'insert';
            $dados['acao'] = 'Inserir';
            $dados['data'] = date('Y-m-d H:i:s');
            $dados['tabela'] = 'Andamento';
            $dados['item_editado'] = $id_andamento;
            $dados['descricao'] = $dados['id_usuario'] . ' Inseriu o andamento ' . $dados['item_editado'];
    
            $this->relatorio->setLog($dados);
            return $id_andamento;
        }
	}

    /**
    * @author: Tiago Villalobos
    * Atualiza andamento no banco
    *
    * @param: $andamento mixed
    */
	public function update($andamento)
	{
        $this->db->where('andamento.id_pedido', $andamento['id_pedido']);
        $id_andamento = $this->db->get('andamento')->row()->id_andamento;

        $this->db->set('andamento.data', $andamento['data']);
        $this->db->set('andamento.situacao', $andamento['situacao']);

        $this->db->update('andamento');

        if($id_andamento)
        {
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'update';
            $dados['acao'] = 'Atualizar';
            $dados['data'] = date('Y-m-d H:i:s');
            $dados['tabela'] = 'Andamento';
            $dados['item_editado'] = $id_andamento;
            $dados['descricao'] = $dados['id_usuario'] . ' Atualizou o andamento ' . $dados['item_editado'];
    
            $this->relatorio->setLog($dados);
            return $id_andamento;
        }

    }

    /**
    * @author: Tiago Villalobos
    * Remove andamento do banco utilizado o id do pedido
    * e retorna verdadeiro ou falso caso consiga remove-lo
    *
    *
    * @param: $id integer
    */
    public function remove($id)
    {

        $this->db->where('andamento.id_pedido', $id);
        $id_documento = $this->db->get('documento')->row()->id_documento;

        $this->db->delete('andamento');

        if($id_andamento)
        {
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'delete';
            $dados['acao'] = 'Deletar';
            $dados['data'] = date('Y-m-d H:i:s');
            $dados['tabela'] = 'Andamento';
            $dados['item_editado'] = $id_andamento;
            $dados['descricao'] = $dados['id_usuario'] . ' Deletou o andamento ' . $dados['item_editado'];
    
            $this->relatorio->setLog($dados);
            return $id_andamento;
        }

    }

}
