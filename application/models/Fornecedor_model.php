
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
          endereco.id_cidade, 
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
       'senha'          => $data['senha2'],
       'id_grupo_acesso'=> 1,
       'id_pessoa'      => $id_pessoa
    ]);

    $id_pessoa_juridica = $this->pessoa_juridica->insert([
        'id_pessoa'     => $id_pessoa,
        'razao_social'  => $data['razao_social']
    ]);

    $this->endereco->insert([
        'cep'           => $data['cep'],
        'bairro'        => $data['logradouro'],
        'numero'        => $data['numero'],
        'complemento'   => $data['complemento'],
        'id_pessoa'     => $id_pessoa,
        'id_cidade'     => $data['cidade']
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
          endereco.id_cidade, 
          endereco.bairro, 
          endereco.logradouro, 
          endereco.numero AS numero, 
          endereco.complemento,
          cidade.id_estado,
          usuario.id_usuario'
      )
          ->from('fornecedor')
          ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
          ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
          ->join('usuario', 'pessoa.id_pessoa = usuario.id_pessoa')
          ->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
          ->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
          ->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa')
          ->join('cidade', 'cidade.id_cidade = endereco.id_cidade')
          ->where('fornecedor.id_fornecedor', $id);
      $fornecedor = $this->db->get();

      if ($fornecedor->num_rows() > 0)
          return $fornecedor->result();
      return null;
  }

  public function update($id, $data)
  {
    try {
      $cleaned = data_preparation($data, $id);
      if($cleaned)
      {
        $id = $this->pessoa->update($cleaned['pessoa']);
        $cleaned['documento']['id_pessoa'] = $id;
        $cleaned['telefone']['id_pessoa'] = $id;
        $cleaned['endereco']['id_pessoa'] = $id;
        $cleaned['pessoa_juridica']['id_pessoa'] = $id;
        $this->documento->update($cleaned['documento']);
        $this->telefone->update($cleaned['telefone']);
        $this->endereco->update($cleaned['endereco']);
        $aux['id_pessoa_juridica'] = $this->pessoa_juridica->update($cleaned['pessoa_juridica']);
        $this->db->where('id_fornecedor', $id);
        if($this->db->update('fornecedor', $aux))
    		{
    			return $aux['id_fornecedor'];
    		}else {
    			return 0;
    		}
      }
    } catch (\Exception $e) {}
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
}
