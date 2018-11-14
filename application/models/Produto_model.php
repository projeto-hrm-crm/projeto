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
            $query = $this->db->select('id_produto, nome, descricao, codigo, fabricacao, validade, lote, recebimento, valor, razao_social')
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
            $this->relatorio->setLog('insert', 'Inserir', 'Produto', $id_produto, 'Inseriu o produto', $_POST['nome']);
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
        $this->db->set('descricao', $array['descricao']);
        $this->db->set('codigo', $array['codigo']);
        $this->db->set('fabricacao', $array['fabricacao']);
        $this->db->set('validade', $array['validade']);
        $this->db->set('lote', $array['lote']);
        if($array['imagem']){
            $this->db->set('imagem', $array['imagem']);
        }
       
        $this->db->set('valor', $array['valor']);
        $this->db->set('recebimento', $array['recebimento']);
        $id_produto = $this->db->update('produto');

        if($id_produto)
        {
            $this->relatorio->setLog('update', 'Atualizar', 'Produto', $id_produto, 'Atualizou o produto', $array['nome']);
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

        if($id_produto){
            $this->relatorio->setLog('delete', 'Deletar','Produto', $id_produto, 'Deletou o produto', $id);
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
      $this->db->select('id_produto, id_fornecedor, nome, codigo, fabricacao, validade, lote, recebimento, imagem, valor');
      $this->db->where('nome', $nome);
      return $this->db->get('produto')->row();
    }

    /**
    * @author: Tiago Villalobos
    * Retorna produtos pelo id do pedido
    *
    * @return: mixed
    */
    public function getByOrder($id_pedido)
    {
        return
            $this->db->select('pedido_produto.quantidade, produto.id_produto, produto.nome, produto.valor')
               ->join('pedido_produto', 'pedido_produto.id_produto = produto.id_produto')
               ->where('pedido_produto.id_pedido', $id_pedido)
               ->get('produto')
               ->result();

    }

    /**
    * @author: Tiago Villalobos
    * Retorna produtos pelo id do fornecedor
    *
    * @return: mixed
    */
    public function getByProvider($id_fornecedor)
    {
        $this->db->where('produto.id_fornecedor', $id_fornecedor);

        return $this->get();
    }

    /**
    * @author: Pedro Henrique
    *
    * Método responsável por trazer o total de clientes cadastrados no banco
    * @param void
    * @return int
    */
    public function count()
    {
        $this->db->select('count(*) as produtos')
            ->from('produto')
            ->join('fornecedor', 'produto.id_fornecedor = fornecedor.id_fornecedor')
            ->join('pessoa_juridica', 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica');
        $query = $this->db->get();
         
        return $query->result()[0]->produtos;
    }


    public function countProdutosFornecedorLogado($user_id){

      $this->db->select('count(*) as produtos')
            ->from('produto')
            ->join('fornecedor', 'produto.id_fornecedor = fornecedor.id_fornecedor')
            ->join('pessoa_juridica', 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica')
            ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
            ->join('usuario', 'usuario.id_pessoa = pessoa.id_pessoa')
            ->where('usuario.id_grupo_acesso = 3')
            ->where('usuario.id_usuario', $user_id);
        $query = $this->db->get();

        return $query->result()[0]->produtos;
    }

    public function getFornecedorLogado($user_id)
    {
      $query = $this->db->select('id_produto, produto.nome, descricao, codigo, fabricacao, validade, lote, recebimento, valor, imagem, razao_social')
        ->join('fornecedor', 'produto.id_fornecedor = fornecedor.id_fornecedor')
        ->join('pessoa_juridica', 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica')   
        ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
        ->join('usuario', 'usuario.id_pessoa = pessoa.id_pessoa')
        //->where('usuario.id_grupo_acesso = 3')
        ->where('usuario.id_usuario', $user_id)
        ->get('produto');
            return $query->result();
    }
    
    
    /**
    * @author: Rodrigo 
	* Atualiza o imagem
	*/
    public function findImage($id_produto)	{
		$curriculum = $this->db->select("imagem")->from("produto")->where('id_produto', $id_produto)->get();
		return $curriculum->result();
	}
   
   /**
	* @author: Rodrigo 
	* Verifica se já existe um imagem cadastrado
	*/
    public function imageUpdate($data)	{
		$this->db->where('produto.id_produto', $data['id_produto']);
        $this->db->set('produto.imagem', $data['arquivo']);
		$this->db->update('produto');

		return $data['arquivo'];
	}


}
