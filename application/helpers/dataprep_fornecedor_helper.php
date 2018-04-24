<?php

function data_preparation($data)
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
      'id_cidade' => 10,//$data['cidade'], FIXME ACERTAR O ID QUANDO O FRONT ESTIVER PRONTO
      'bairro' => $data['bairro'],
      'logradouro' => $data['logradouro'],
      'numero' => $data['numero'],
      'complemento' => $data['complemento'],
    ),

    'pessoa_juridica' => array(
      'razao_social' => $data['razao_social'],
    ),
  );

  return $cleaned;
}
