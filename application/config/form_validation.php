<?php
/*
------------------ EXEMPLO ------------------
$config = array(
        'signup' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'passconf',
                        'label' => 'Password Confirmation',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required'
                )
        ),
        'email' => array(
                array(
                        'field' => 'emailaddress',
                        'label' => 'EmailAddress',
                        'rules' => 'required|valid_email'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|alpha'
                ),
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'message',
                        'label' => 'MessageBody',
                        'rules' => 'required'
                )
        )
);

*/

$config = array(
    'pessoa/salvar' => 
    
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required'
        ),

        array(
            'field' => 'email',
            'label' => 'E-Mail',
            'rules' => 'valid_email|max_length[100]'
        ),

        array(
            'field' => 'cep',
            'label' => 'CEP',
            'rules' => 'required|min_length[11]'
        ),

        array(
            'field' => 'estado',
            'label' => 'Estado',
            'rules' => 'required'
        ),

        array(
            'field' => 'cidade',
            'label' => 'Cidade',
            'rules' => 'required'
        ),

        array(
            'field' => 'bairro',
            'label' => 'Bairro',
            'rules' => 'required'
        ),        

        array(
            'field' => 'logradouro',
            'label' => 'Logradouro',
            'rules' => 'required'
        ),

        array(
            'field' => 'numero',
            'label' => 'Número',
            'rules' => 'required'
        ),

        array(
            'field' => 'tel',
            'label' => 'Telefone',
            'rules' => 'required'
        ),

        requeridoSe(),
);


/**
* @author: Tiago Villalobos
* Método palhiativo para lidar com a validação de cpf ou cnpj
*
* 
*/
function requeridoSe()
{
    if(isset($_POST['tipo-pessoa']))
    {
        if($_POST['tipo-pessoa'] == 'pf')
        {
            return 
                array(
                    'field' => 'cpf',
                    'label' => 'CPF',
                    'rules' => 'required'
                );
        }

        if($_POST['tipo-pessoa'] == 'pj')
        {
            return 
                array(
                    'field' => 'cnpj',
                    'label' => 'CNPJ',
                    'rules' => 'required'
                );   
        }
    }
}