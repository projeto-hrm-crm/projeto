<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    /*
    *@author: Dhiego Balthazar
    *
    *@return: mixed
    */
    public function get(){
        try{
            $query = $this->db->select('id_produto, nome, codigo, fabricacao, validade, lote, recebimento, valor, razao_social')
            ->join('fornecedor', 'produto.id_fornecedor = fornecedor.id_fornecedor')
            ->join('pessoa_juridica', 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica')
            ->get('produto');
            return $query->result();
        }catch (\Exception $e) {

        }
    }

    /*
     *@author: Dhiego Balthazar
     *
     *@params: array - com dados do produto
     *@return: boolean
    */
    public function insert($array) {

        $this->db->insert('produto', $array);
        $id_produto = $this->db->insert_id();

        if($id_produto)
        {
            $this->relatorio->insertLog('Produto', $id_produto, 'Inseriu o produto', $_POST['nome']);
        }
        return $id_produto;
    }

    /*
     *@author: Dhiego Balthazar
     *
     *@params: mixed com dados do produto
     *@return: boolean
    */
    public function update($array){
        $this->db->where('id_produto', $array['id_produto']);
        $this->db->set('id_fornecedor', $array['id_fornecedor']);
        $this->db->set('nome', $array['nome']);
        $this->db->set('codigo', $array['codigo']);
        $this->db->set('fabricacao', $array['fabricacao']);
        $this->db->set('validade', $array['validade']);

        $this->db->set('lote', $array['lote']);
        $this->db->set('valor', $array['valor']);
        $this->db->set('recebimento', $array['recebimento']);
        $id_produto = $this->db->update('produto');

        if($id_produto)
        {
            $this->relatorio->updateLog('Produto', $id_produto, 'Atualizou o produto', $array['nome']);
        }
        return $id_produto;
    }


    /*
     *@author: Dhiego Balthazar
     *
     *@params: mixed com dados do produto
     *@return: boolean
    */
    public function delete($id){
        $this->db->where('id_produto', $id);
        $id_produto = $this->db->delete('produto');

        if($id_produto)
        {
            $this->relatorio->deleteLog('Produto', $id_produto, 'Deletou o produto', $id);
        }
        return $id_produto;
    }

    /*
     * @author: Dhiego Balthazar
     * Esse método retorna um objeto Produto através de seu $id
     *
     * @params: $id
     * @return: object Produto
     */
    public function getById($id){
        $this->db->select('id_produto, nome, codigo, fabricacao, validade, lote, recebimento, valor, razao_social')
            ->join('fornecedor', 'produto.id_fornecedor = fornecedor.id_fornecedor')
            ->join('pessoa_juridica', 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica')
            ->get('produto');
            $this->db->where('id_produto', $id);
            return $this->db->get('produto')->row();
    }

    /*
     * @author: Dhiego Balthazar
     * Esse método retorna um objeto Produto através de seu $nome como parametro de entrada
     *
     * @params: $nome
     * @return: object Produto
     */
    public function getByName($nome){
      $this->db->select('id_produto, id_fornecedor, nome, codigo, fabricacao, validade, lote, recebimento, valor');
      $this->db->where('nome', $nome);
      return $this->db->get('produto')->row();
    }

    public function getByOrder($id_pedido)
    {
        return
            $this->db->select('pedido_produto.quantidade, produto.id_produto, produto.nome, produto.valor')
           ->join('pedido_produto', 'pedido_produto.id_produto = produto.id_produto')
           ->where('pedido_produto.id_pedido', $id_pedido)
           ->get('produto')
           ->result();

    }

}
