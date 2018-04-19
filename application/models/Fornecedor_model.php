<?php

class Fornecedor_model extends CI_Model
{

  public function get()
  {
    try {
      $query = $this->db->select('fornecedor.id_fornecedor, pessoa_juridica.id_pessoa_juridica, pessoa_juridica.razao_social, pessoa.id_pessoa, pessoa.nome, pessoa.email')//, telefone.numero AS telefone, documento.numero AS cnpj, endereco.cep, endereco.estado, endereco.cidade, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco, endereco.complemento')
  		->from('fornecedor')
      ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
      ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
  		// ->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
  		// ->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
  		// ->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa')
  		->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    } catch (\Exception $e) {}
  }


  public function insert($data)
  {
    $pessoa['nome'] = $data['nome'];
    $pessoa['email'] = $data['email'];

    // $documento['numero'] = $data['cnpj'];
    // $documento['tipo'] = 2;
    //
    // $telefone['telefone'] = $data['telefone'];
    //
    // $endereco['cep'] = $data['cep'];
    // $endereco['estado'] = $data['estado'];
    // $endereco['cidade'] = $data['cidade'];
    // $endereco['bairro'] = $data['bairro'];
    // $endereco['logradouro'] = $data['logradouro'];
    // $endereco['numero'] = $data['numero'];
    // $endereco['complemento'] = $data['complemento'];

    $pessoa_juridica['razao_social'] = $data['razao_social'];

    try {
      $id = $this->pessoa->insert($pessoa);
      // $documento['id_pessoa'] = $id;
      // $telefone['id_pessoa'] = $id;
      // $endereco['id_pessoa'] = $id;
      $pessoa_juridica['id_pessoa'] = $id;

      // $this->Documento->insert($documento);
      // $this->Telefone->insert($telefone);
      // $this->Endereco->insert($endereco);
      $id2['id_pessoa_juridica'] = $this->pessoa_juridica->insert($pessoa_juridica);
      // print_r($id2);
      // exit();

      $this->db->insert('fornecedor', $id2);
      return $this->db->insert_id();
    } catch (\Exception $e) {}
  }


  public function find($id)
  {
    try {
      $fornecedor = $this->db->select('*')->from('fornecedor')->where('id', $id)->get();
      if ($fornecedor)
      {
        return $fornecedor->result();
      }else{
        echo 'Fornecedor não existe';
        return 1;
      }
    } catch (\Exception $e) {}
  }


  public function update($id, $data)
  {
    try {
      $this->db->where('id', $id);
      $this->db->update('fornecedor', $data);
    } catch (\Exception $e) {}
  }


  public function delete($id)
  {
    try {
      $this->db->where('id', $id);
      $this->db->delete('fornecedor');
    } catch (\Exception $e) {}
  }

}
