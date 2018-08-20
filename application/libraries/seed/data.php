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
              'Financeiro'
          ),
        ),
        array(
          'fields' => array(
            'nome'
          ),
          'values' => array(
              'Contabilidade'
          ),
        ),
        array(
          'fields' => array(
            'nome'
          ),
          'values' => array(
              'Regursos Humanos'
          ),
        ),
        array(
          'fields' => array(
            'nome'
          ),
          'values' => array(
              'Prestação de contas'
          ),
        )
      )
    ),
  ),
  // Pessoa
  'pessoa' => array(
    'dataset' => array(
      array(
        // --------------------------Cliente--------------------------------
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Camilo Silva',
              'camilosilva@teste.com',
              '1998-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Pedro Silva',
              'pedrosilva@teste.com',
              '1990-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Matheus Santos',
              'matheussantos@teste.com',
              '1996-11-23'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Rodrigo Santos',
              'rodrigosantos@teste.com',
              '1996-11-23'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Fernando Santos',
              'fernandosantos@teste.com',
              '1996-11-23'
          ),
        ),
        // --------------------------Candidato--------------------------------
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Camila Mota',
              'camilamota@teste.com',
              '1998-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Pietra Silva',
              'pietrasilva@teste.com',
              '1990-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Maitê Santos',
              'maitesantos@teste.com',
              '1996-11-23'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Yasmyn Santos',
              'yasminsantos@teste.com',
              '1996-11-23'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Carla Santos',
              'carlasantos@teste.com',
              '1996-11-23'
          ),
        ),

        // --------------------------Funcionario--------------------------------
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Ederson Pia',
              'edersonpia@teste.com',
              '1998-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Luciana Santos',
              'luciansantos@teste.com',
              '1990-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Paloma Cabral',
              'palomacabral@teste.com',
              '1996-11-23'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Carol Santos',
              'Carolsantos@teste.com',
              '1996-11-23'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Amanda Santos',
              'amandasantos@teste.com',
              '1996-11-23'
          ),
        ),
        // --------------------------Fornecedor--------------------------------
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'João Carlos',
              'joaocarlos@teste.com',
              '1998-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Diana Costa',
              'dianacoste@teste.com',
              '1990-10-20'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Amanda Ribeiro',
              'amandaribeiro@teste.com',
              '1996-11-23'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Joaquim Costa',
              'joaquincosta@teste.com',
              '1996-11-23'
          ),
        ),
        array(
          'fields' => array(
            'nome',
            'email',
            'data_criacao'
          ),
          'values' => array(
              'Carlos Lopes',
              'carloslopes@teste.com',
              '1996-11-23'
          ),
        )
      )
    ),
  ),
  // id_pessoa 1 - 15 
  'pessoa_fisica' => array(
    'dataset' => array(
      array(
        // --------------------------Cliente--------------------------------
        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '1',
              '1996-03-22',
              '2'
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
              '2'
          ),
        ),

        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '3',
              '1999-12-03',
              '2'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '4',
              '1999-12-01',
              '2'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '5',
              '1999-12-21',
              '2'
          ),
        ),
        // --------------------------Candidato--------------------------------

        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '6',
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
              '7',
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
              '8',
              '1999-12-03',
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
              '9',
              '1999-12-01',
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
              '10',
              '1999-12-21',
              '1'
          ),
        ),



        // --------------------------Funcionário--------------------------------

        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '11',
              '1996-03-22',
              '2'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'data_nascimento',
            'sexo'
          ),
          'values' => array(
              '12',
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
              '13',
              '1999-12-03',
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
              '14',
              '1999-12-01',
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
              '15',
              '1999-12-21',
              '1'
          ),
        ),
      )
    ),
  ),
  // id_pessoa 16 - 20 
  'pessoa_juridica' => array(
    'dataset' => array(
      array(
        // --------------------------Cliente--------------------------------
        array(
          'fields' => array(
            'id_pessoa',
            'razao_social'
          ),
          'values' => array(
              '15',
              'RDSF - Engenharia'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'razao_social'
          ),
          'values' => array(
              '16',
              'HGT - Contrabilidade'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'razao_social'
          ),
          'values' => array(
              '17',
              'Faber Castel'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'razao_social'
          ),
          'values' => array(
              '18',
              'Recort - Papelaria'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'razao_social'
          ),
          'values' => array(
              '19',
              'Bic - Canetas'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa',
            'razao_social'
          ),
          'values' => array(
              '20',
              'Tilibra'
          ),
        ),
      )
    ),
  ),       
  // id_pessoa 1 - 5
  'cliente' => array(
    'dataset' => array(
      array(
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '1'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '2'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '3'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '4'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '5'
          ),
        )
      )
    ),
  ),
  // id_pessoa 6 - 10
  'candidato' => array(
    'dataset' => array(
      array(
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '6'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '7'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '8'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '9'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '10'
          ),
        )
      )
    ),
  ),
  // id_pessoa 11 - 15
  'funcionario' => array(
    'dataset' => array(
      array(
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '11'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '12'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '13'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '14'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa'
          ),
          'values' => array(
              '15'
          ),
        )
      )
    ),
  ),
   // id_pessoa 11 - 15
   'fornecedor' => array(
    'dataset' => array(
      array(
        array(
          'fields' => array(
            'id_pessoa_juridica'
          ),
          'values' => array(
              '1'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa_juridica'
          ),
          'values' => array(
              '2'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa_juridica'
          ),
          'values' => array(
              '3'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa_juridica'
          ),
          'values' => array(
              '4'
          ),
        ),
        array(
          'fields' => array(
            'id_pessoa_juridica'
          ),
          'values' => array(
              '5'
          ),
        )
      )
    ),
  )
  #'próxima tabela' => array();
);
