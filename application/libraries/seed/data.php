<?php
$seeds = array(
  'setor' => array(
    'dataset' => array(
      array(
        array(
          'fields' => array(
            'nome'
          ),
          'values' => array(
              'Setor de teste'
          ),
        )
      )
    ),
  ),
  'pessoa' => array(
    'dataset' => array(
      array(
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Camila',
              'camilateste@teste.com',
              '1996-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Pedro',
              'pedroteste@teste.com',
              '1996-10-20'
          ),
        ),
      )
    ),
  ),
  'pessoa_fisica' => array(
    'dataset' => array(
      array(
        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '1',
              '1996-03-22',
              '1'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '2',
              '1996-03-22',
              '1'
          ),
        ),
      )
    ),
  ),
  #'próxima tabela' => array();
);
