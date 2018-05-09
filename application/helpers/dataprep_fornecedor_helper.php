<?php

function data_preparation($data, $id=NULL)
{
  $cleaned = array(
    'pessoa' => array(
      'nome' => $data['nome'],
      'email' => $data['email'],
    ),

    'documento' => array(
      'numero' => $data['cnpj'],
      'tipo' => 'cnpj',
    ),

    'telefone' => array(
      'numero' => $data['telefone'],
    ),

    'endereco' => array(
      'cep' => $data['cep'],
      'id_cidade' => $data['id_cidade'],//$data['cidade'], FIXME ACERTAR O ID QUANDO O FRONT ESTIVER PRONTO
      'bairro' => $data['bairro'],
      'logradouro' => $data['logradouro'],
      'numero' => $data['numero'],
      'complemento' => $data['complemento'],
    ),

    'pessoa_juridica' => array(
      'razao_social' => $data['razao_social'],
    ),
  );
  if($id)
  {
    $CI =& get_instance();
    $aux = $CI->db->select('pessoa.id_pessoa')
    ->from('fornecedor')
    ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
    ->join('pessoa', 'pessoa.id_pessoa = pessoa_juridica.id_pessoa')
    ->where('fornecedor.id_fornecedor', $id)
    ->get();
    $cleaned['pessoa']['id_pessoa'] = $aux->result()[0]->id_pessoa;

    $aux2 = $CI->db->select('pessoa_juridica.id_pessoa_juridica')
    ->from('fornecedor')
    ->join('pessoa_juridica', 'pessoa_juridica.id_pessoa_juridica = fornecedor.id_pessoa_juridica')
    ->where('fornecedor.id_fornecedor', $id)
    ->get();
    $cleaned['pessoa_juridica']['id_pessoa_juridica'] = $aux2->result()[0]->id_pessoa_juridica;
  }

  return $cleaned;
}
