
<?php
class Fornecedor_model extends CI_Model
{

/**
 * @author Pedro Henrique Guimarães
 * Método responsável por consultar todos os fornecedores cadastrados
 *
 * @return mixed
 */
  public function get()
  {
      $this->db->select(
          'fornecedor.id_fornecedor,
          pessoa_juridica.id_pessoa_juridica,
          pessoa_juridica.razao_social,
          pessoa.id_pessoa, pessoa.nome,
          pessoa.email,
          telefone.numero AS telefone,
          documento.numero AS cnpj,
          endereco.cep,
          endereco.bairro,
          endereco.logradouro,
          endereco.numero AS numero,

          endereco.complemento',
          'usuario.id_usuario')
        ->from('fornecedor')
        ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
        ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
        ->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
        ->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
        ->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
        ->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa');
        $fornecedores = $this->db->get();

        if ($fornecedores->num_rows() > 0) {
            return $fornecedores->result();
        }

        return null;
  }
  public function getRazaoSocial(){
      $this->db->select('id_fornecedor, razao_social')
      ->join('pessoa_juridica' , 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica');
      return $this->db->get('fornecedor')->result();
  }

    /**
     * @author Pedro Henrique Guimarães
     * Insere os dados fornecedor no banco de dados.
     *
     * @param $data
     */
  public function insert($data)
  {
    $id_pessoa = $this->pessoa->insert([
      'nome' => $data['nome'],
      'email' => $data['email'],
    ]);

    $this->usuario->insert([
       'login'          => $data['email'],
       'senha'          => $data['senha'],
       'id_grupo_acesso'=> 3,
       'id_pessoa'      => $id_pessoa
    ]);

    $id_pessoa_juridica = $this->pessoa_juridica->insert([
        'id_pessoa'     => $id_pessoa,
        'razao_social'  => $data['razao_social']
    ]);

    $this->endereco->insert([
        'cep'           => $data['cep'],
        'bairro'        => $data['bairro'],
        'logradouro'    => $data['logradouro'],
        'numero'        => $data['numero'],
        'complemento'   => $data['complemento'],
        'id_pessoa'     => $id_pessoa,
        'estado'        => $data['estado'],
        'cidade'        => $data['cidade']
    ]);

    $this->telefone->insert([
       'numero'     => $data['telefone'],
       'id_pessoa'  => $id_pessoa
    ]);

    $this->documento->insert([
        'numero'    => $data['cnpj'],
        'tipo'      => 'cnpj',
        'id_pessoa' => $id_pessoa
    ]);

    $this->db->insert('fornecedor', [
       'id_pessoa_juridica' => $id_pessoa_juridica
    ]);
  }

    /**
     * @author Pedro Henrique Guimarães
     * Método responsável por retornar as informações de um usuário específico baseado em seu id único
     *
     * @param $id
     * @return mixed
     */
  public function find($id)
  {
      $this->db->select(
         'fornecedor.id_fornecedor,
          pessoa_juridica.id_pessoa_juridica,
          pessoa_juridica.razao_social,
          pessoa.id_pessoa, pessoa.nome,
          pessoa.email,
          telefone.numero AS telefone,
          documento.numero AS cnpj,
          endereco.cep,
          endereco.bairro,
          endereco.logradouro,
          endereco.numero AS numero,
          endereco.complemento,
          endereco.cidade,
          endereco.estado,
          usuario.id_usuario')

        ->from('fornecedor')
        ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
        ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
        ->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
        ->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
        ->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
        ->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa')
        ->where('fornecedor.id_fornecedor', $id);
       $fornecedor = $this->db->get();

      if ($fornecedor)
          return $fornecedor->result();
      return null;
  }

  public function update($data)
  {
      $fornecedor = $this->find($data['id_fornecedor']);

      $this->pessoa->update(
          [
              'id_pessoa' => $fornecedor[0]->id_pessoa,
              'nome' => $data['nome'],
              'email' => $data['email']
          ]
      );

      $this->pessoa_juridica->update(
          [
              'id_pessoa_juridica' => $fornecedor[0]->id_pessoa_juridica,
              'razao_social'       => $data['razao_social']
          ]
      );

      $this->documento->update(
          [
              'id_pessoa' => $fornecedor[0]->id_pessoa,
              'numero'    => $data['cnpj'],
              'tipo'      => 'cnpj'
          ]
      );

      $this->telefone->update(
          [
              'id_pessoa' => $fornecedor[0]->id_pessoa,
              'numero'    => $data['telefone'],
          ]
      );

        $this->endereco->update(
            [
                'cep'           => $data['cep'],
                'bairro'        => $data['bairro'],
                'logradouro'    => $data['logradouro'],
                'numero'        => $data['numero'],
                'complemento'   => $data['complemento'],
                'cidade'        => $data['cidade'],
                'estado'        => $data['estado'],
                'id_pessoa'     => $fornecedor[0]->id_pessoa
            ]
        );

  }


  public function delete($id)
  {
    try {
      $this->db->where('id_fornecedor', $id);
      $id_fornecedor = $this->db->delete('fornecedor');

      if($id_fornecedor) {
        $this->relatorio->setLog('delete', 'Deletar', 'Fornecedor', $id_fornecedor, 'Deletou o fornecedor', $id);
      }
      return $id_fornecedor;
    } catch (\Exception $e) {}
  }

  /**
  * @author: Pedro Henrique
  *
  * Método responsável por trazer o total de fornecedores cadastrados no banco
  * @param void
  * @return int
  */
  public function count()
  {
    $this->db->select('count(*) as fornecedores')
        ->from('fornecedor')
        ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
        ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
        ->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
        ->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
        ->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
        ->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa');
        $query = $this->db->get();

     return $query->result()[0]->fornecedores;
  }
  public function getDadosFornecedor()
  {
    try {
      $query = $this->db->select(
         'fornecedor.id_fornecedor,
          pessoa_juridica.id_pessoa_juridica,
          pessoa_juridica.razao_social,
          pessoa.id_pessoa, pessoa.nome,
          pessoa.email,
          telefone.numero AS telefone,
          documento.numero AS cnpj,
          endereco.cep,
          endereco.bairro,
          endereco.logradouro,
          endereco.numero AS numero,
          endereco.complemento,
          endereco.cidade,
          endereco.estado,
          usuario.id_usuario')

        ->from('fornecedor')
        ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
        ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
        ->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
        ->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
        ->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
        ->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa');
    } catch (\Exception $e) {}

    if ($query){
      return $query->get()->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }

}
