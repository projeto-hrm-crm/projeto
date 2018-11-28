<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sac_model extends PR_Model
{
  /**
  * @author: Matheus Ladislau
  * Retorna registro de sac cadastrados no banco com id_sac referente
  *
  * @param integer id_sac refere-se ao id do registro de sac a ser consultado
  * @return array: registro de sac cadastrado com id_sac informado
  */
  public function find($id)
  {
    try {
      $data=$this->db->select('*')->from('sac')->join('produto', 'sac.id_produto=produto.id_produto')->where('sac.id_sac',$id)->get();
      if($data){
        return $data->result();
      }else{
        // echo "não existe";
        return 1;
      }
      }catch (\Exception $e){}
      }

    /**
    * @author: Rodrigo Alves
    * Este método inserção de dados
    */
    public function insert($sac)
    {
        $result = $this->db->insert('sac', $sac);

        $this->setLog($sac['titulo']);

        return $result;
    }

    /**
    * @author: Rodrigo Alves
    * listar todas as ordens
    */
    public function get()
    {
        return $this->db
        ->select('sac.*, pessoa.nome')
        ->join('cliente', 'sac.id_cliente = cliente.id_cliente')
        ->join('pessoa', 'cliente.id_pessoa = pessoa.id_pessoa')
        ->get('sac')
        ->result();
    }

    /**
    * @author: Tiago Villalobos
    * Retorna um sac pelo id do mesmo
    *
    * @param: $id_sac integer
    */
    public function getById($id_sac)
    {
        return $this->db
        ->where('sac.id_sac', $id_sac)
        ->get('sac')
        ->result();
    }

    /**
    * @author: Rodrigo Alves
    * listar todas as ordens que o cliente abriu
    *
    * @param: $id_cliente integer
    */
    public function getClient($id_cliente)
    {
        return $this->db
        ->select('sac.*')
        ->where('id_cliente', $id_cliente)
        ->get('sac')
        ->result();
    }

    /**
    * @author: Rodrigo Alves
    * Este método atualiza as informações da ordem do sac referenciado pelo id
    *
    * @param: $sac mixed
    */
    public function update($sac)
    {

        $this->db
        ->set('sac.id_produto', $sac['id_produto'])
        ->set('sac.titulo', $sac['titulo'])
        ->set('sac.descricao', $sac['descricao'])
        ->set('sac.abertura', $sac['abertura'])
        ->set('sac.fechamento', $sac['fechamento'])
        ->set('sac.encerrado', $sac['encerrado'])
        ->where('sac.id_sac', $sac['id_sac'])
        ->update('sac');

        $this->setLog($sac['titulo'], $sac['id_sac']);

    }

    /**
    * @author: Rodrigo Alves
    * Alterar estatus de um Sac
    *
    * @param: $status boolean
    * @param: $id_sac integer
    */
    public function changeStatus($status, $id_sac)
    {
        $sac = $this->db->where('sac.id_sac', $id_sac)->get('sac')->row();

        $this->db
        ->set('encerrado', $status)
        ->where('id_sac', $id_sac)
        ->update('sac');

        $this->setLog($sac->titulo, $id_sac);
    }

     /**
    *analizando o desenvolvimento do projeto, esta função de remoção se tornou inviavel para uso
    *

    public function remove($id_sac)
    {
        $sac = $this->db->where('sac.id_sac', $id_sac)->get('sac')->row();

        $this->db
        ->where('id_sac', $id_sac)
        ->delete('sac');

        $this->setLog($sac->titulo, $id_sac);
    }

   */
  /**
  * @author: Pedro Henrique Guimarães
  * Busca o último SAC
  *
  * @return mixed
  */
  public function getLastSac()
  {
      $this->db->select('*')
               ->from('sac as s')
               ->join('cliente as c', 's.id_cliente = c.id_cliente')
               ->join('pessoa as p', 'c.id_pessoa = p.id_pessoa');
      $query = $this->db->get();

      if ($query->num_rows() > 0)
        return $query->result()[0];
      return null;
  }

  /**
   * @author Pedro Henrique Guimarães
   * Busca o total de atendimentos (sac) realizados pelo cliente logado
   *
   * @param int $customer_id
   * @return int
   */
  public function getCustomerCalls($customer_id)
  {
      $this->db->select('COUNT(*) calls')
               ->from('sac')
               ->where('sac.id_cliente', $customer_id);
      $query = $this->db->get();

      return $query->result()[0]->calls;
  }

  /**
   * @author Pedro Henrique Guimarães
   *
   * Busca o último SAC aberto pelo cliente
   *
   * @param int $customer_id
   * @return mixed | null
   */
  public function getCustomerSac($customer_id)
  {
      $this->db->select('*')
               ->from('sac as s')
               ->join('cliente as c', 's.id_cliente = c.id_cliente')
               ->join('pessoa as p', 'c.id_pessoa = p.id_pessoa')
               ->join('usuario as u', 'u.id_pessoa = p.id_pessoa')
               ->where('u.id_usuario', $customer_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result()[0];
        return null;
  }

  /**
  * @author: Matheus Romeo
  * Busca o último SAC do produto de um fornecedor específico
  *
  * @return mixed
  */
  public function getLastSacFornecedorLogado($user_id)
  {
     $this->db
      ->select('pcli.nome, pcli.data_criacao, sac.id_sac')
      ->join('cliente', 'sac.id_cliente = cliente.id_cliente')
      ->join('pessoa as pcli', 'cliente.id_pessoa = pcli.id_pessoa')
      ->join('produto', 'sac.id_produto = produto.id_produto')
      ->join('fornecedor', 'produto.id_fornecedor = fornecedor.id_fornecedor')
      ->join('pessoa_juridica', 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica')
      ->join('pessoa as pfor', 'pessoa_juridica.id_pessoa = pfor.id_pessoa')
      ->join('usuario', 'usuario.id_pessoa = pfor.id_pessoa')
      ->where('usuario.id_usuario', $user_id);

      $query = $this->db->get('sac');

      if ($query->num_rows() > 0){
        return $query->result()[0];
      }

  }
  /*
  public function getFornecedorLogado($user_id)
    {
      return $this->db
      ->select('sac.*, pessoa.nome')
      ->join('cliente', 'sac.id_cliente = cliente.id_cliente')
      ->join('pessoa', 'cliente.id_pessoa = pessoa.id_pessoa')
      ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
      ->join('usuario', 'usuario.id_pessoa = pessoa.id_pessoa')
      ->where('usuario.id_usuario', $user_id)
      ->get('sac')
      ->result();
    }
*/

/**
    * @author: Beto Cadilhe
    * Retorna um array com dados pegos por post adicionado a eles o id_sac
    *
    * @param: $id_sac integer
    */
    public function getPessoasEnvolvidas($id_iteracao)
    {
        $this->db->distinct()
                 ->select('id_pessoa')
                 ->from('iteracao')
                 ->where('id_sac', $id_iteracao);

        $sql = $this->db->get();

        if ($sql->num_rows() > 0) {
            return $sql->result();
        }

        return [];
    }

}
