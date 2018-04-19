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
      'tipo' => 2,
    ),

    'telefone' => array(
      'telefone' => $data['telefone'],
    ),

    'endereco' => array(
      'cep' => $data['cep'],
      'estado' => $data['estado'],
      'cidade' => $data['cidade'],
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
