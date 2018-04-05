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
    'produto' => 
    array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required|alpha_numeric_spaces'
        ),
        array(
            'field' => 'codigo',
            'label' => 'Codigo',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'fabricacao',
            'label' => 'Fabricacao',
            'rules' => 'required|exact_length[10]'
        ),
        array(
            'field' => 'validate',
            'label' => 'Validate',
            'rules' => 'required|exact_length[10]'
        ),
        array(
            'field' => 'lote',
            'label' => 'Lote',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'recebimento',
            'label' => 'Recebimento',
            'rules' => 'required|exact_length[10]'
        ),
    )
);