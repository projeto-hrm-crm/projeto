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
            'rules' => 'required'
        ),
        array(
            'field' => 'lote',
            'label' => 'Lote',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'codigo',
            'label' => 'Codigo',
            'rules' => 'required'
        ),
        array(
            'field' => 'valor',
            'label' => 'Valor',
            'rules' => 'required',
        ),
        array(
            'field' => 'fabricacao',
            'label' => 'Fabricacao',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida'
            ),
        ),
        array(
            'field' => 'validade',
            'label' => 'Validade',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida',
            ),
        ),
        array(
            'field' => 'recebimento',
            'label' => 'Recebimento',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida'
            ),
        ),
        array(
            'field' => 'id_fornecedor',
            'label' => 'Fornecedor',
            'rules' => 'required',
        ),

    ),
    'almoxarifado' =>
    array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
        ),
        array(
            'field' => 'valor',
            'label' => 'Valor',
            'rules' => 'required',
        ),
        array(
            'field' => 'recebimento',
            'label' => 'Recebimento',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida'
            ),
        ),
        array(
            'field' => 'descricao',
            'label' => 'Descricao',
            'rules' => 'required',
        ),
        array(
            'field' => 'id_unidade_medida',
            'label' => 'Unidade de Medida',
            'rules' => 'required',
        ),

    ),
    'pessoa' => array(

        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required'
        ),

        array(
            'field' => 'email',
            'label' => 'E-Mail',
            'rules' => 'required|valid_email'
        ),

        array(
            'field' => 'cep',
            'label' => 'CEP',
            'rules' => 'required'
        ),

        array(
            'field' => 'estado',
            'label' => 'Estado',
            'rules' => 'required|integer'
        ),

        array(
            'field' => 'cidade',
            'label' => 'Cidade',
            'rules' => 'required|integer'
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
            'field' => 'telefone',
            'label' => 'Telefone',
            'rules' => 'required'
        ),

        array(
            'field' => 'cpf',
            'label' => 'CPF',
            'rules' => requiredIf('tipo_pessoa', 'pf')
        ),

        array(
            'field' => 'cnpj',
            'label' => 'CNPJ',
            'rules' => requiredIf('tipo_pessoa', 'pj')
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

    ),

    // @Beto Cadilhe

    /* validação form fornecedor */
    'fornecedor' => array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]|min_length[1]|max_length[45]'
        ),

        array(
            'field' => 'email',
            'label' => 'E-Mail',
            'rules' => 'required|valid_email'
        ),

        array(
            'field' => 'razao_social',
            'label' => 'Razão Social',
            'rules' => 'required',
        ),

        array(
            'field' => 'cnpj',
            'label' => 'CNPJ',
            'rules' => 'required|validCNPJ',
            'errors' => array(
                'validCNPJ' => 'O campo {field} deve conter um número válido',
            ),
        ),

        array(
            'field' => 'estado',
            'label' => 'Estado',
            'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
        ),

        array(
            'field' => 'cidade',
            'label' => 'Cidade',
            'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
        ),

        array(
            'field' => 'telefone',
            'label' => 'Telefone',
            'rules' => 'required'
        ),

        array(
            'field' => 'cep',
            'label' => 'CEP',
            'rules' => 'required'
        ),

        array(
            'field' => 'logradouro',
            'label' => 'Logradouro',
            'rules' => 'required',
        ),

        array(
            'field' => 'numero',
            'label' => 'Número',
            'rules' => 'required'
        ),

        array(
            'field' => 'bairro',
            'label' => 'Bairro',
            'rules' => 'required',
        ),

    ),
    /* fim da validação form fornecedor */


    'login' => array(
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'senha',
            'label' => 'senha',
            'rules' => 'required'
        )
    ),
    'setor' => array(
        array(
            'field' => 'nome',
            'label' => 'nome',
            'rules' => 'required'
        )
    ),


    'sugestao' => array(
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'nome',
            'label' => 'nome',
            'rules' => 'required'
        ),
        array(
            'field' => 'sugestao',
            'label' => 'sugestao',
            'rules' => 'required'
        )
    ),

    'setor' => array(
        array(
            'field' => 'nome',
            'label' => 'nome',
            'rules' => 'required'
        )
    ),


    'vaga' => array(

        array(
            'field' => 'id_cargo',
            'label' => 'Cargo',
            'rules' => 'required|integer'
        ),

        array(
            'field'  => 'data_oferta',
            'label'  => 'Data da Oferta',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida'
            ),
        ),

        array(
            'field' => 'quantidade',
            'label' => 'Quantidade',
            'rules' => 'required|integer|greater_than[0]'
        ),

        array(
            'field' => 'requisitos',
            'label' => 'Requisitos',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        ),
    ),

    'sac' => array(

        array(
            'field' => 'titulo',
            'label' => 'Assunto',
            'rules' => 'required'
        ),

        array(
            'field'  => 'id_produto',
            'label'  => 'Produto',
            'rules'  => 'required|integer'
        ),

        array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required'
        )
    ),

    'iteracao' => array(

        array(
            'field' => 'mensagem',
            'label' => 'Mensagem',
            'rules' => 'required'
        )
    ),

    'pedido' => array(

        array(
            'field' => 'id_pessoa',
            'label' => 'Cliente',
            'rules' => 'required'
        ),

        array(
            'field' => 'id_produto[]',
            'label' => 'Produto',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Selecione ao menos um Produto/Serviço'
            ),
        ),

        array(
            'field' => 'situacao',
            'label' => 'Situação',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        ),

        array(
            'field' => 'tipo',
            'label' => 'Tipo do Pedido',
            'rules' => 'required'
        ),

        array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        )

    ),
    'processo_seletivo' => array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required'
        ),
        array(
            'field' => 'codigo',
            'label' => 'Codigo',
            'rules' => 'required'
        ),
        array(
            'field' => 'descricao',
            'label' => 'Descrição etapas',
            'rules' => 'required'
        ),
        array(
            'field' => 'data_inicio',
            'label' => 'Data de inicio',
            'rules' => 'required'
        ),
        array(
            'field' => 'data_fim',
            'label' => 'Data termino',
            'rules' => 'required'
        ),
        array(
            'field' => 'id_vaga',
            'label' => 'Vaga',
            'rules' => 'required|numeric'
        ),

    ),
    'processo_seletivo_info' => array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required'
        ),
        array(
            'field' => 'descricao',
            'label' => 'Descricao etapas',
            'rules' => 'required'
        ),
    ),

    'cargo' => array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
        ),

        array(
            'field' => 'carga_horaria',
            'label' => 'Carga horária',
            'rules' => 'required|numeric'
        ),

        array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required|max_length[200]',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        ),
        array(
            'field' => 'salario',
            'label' => 'Salário',
            'rules' => 'required'
        ),
        array(
            'field' => 'id_setor',
            'label' => 'Setor',
            'rules' => 'required|numeric'
        ),
    ),

    'pedido_fornecedor' => array(

        array(
            'field' => 'situacao',
            'label' => 'Situação',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        ),

        array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        )

    ),
    'usuario' =>
    array(
        array(
            'field' => 'nome',
            'label' => 'nome completo',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required'
        ),

        array(
            'field' => 'sexo',
            'label' => 'sexo',
            'rules' => 'required'
        ),
        array(
            'field' => 'tipo_us',
            'label' => 'tipo_us',
            'rules' => 'required'
        ),
        array(
            'field' => 'cpf',
            'label' => 'cpf',
            'rules' => 'required'
        ),
        array(
            'field' => 'tel',
            'label' => 'telefone',
            'rules' => 'required'
        ),
        array(
            'field' => 'cep',
            'label' => 'cep',
            'rules' => 'required'
        ),
        array(
            'field' => 'estado',
            'label' => 'estado',
            'rules' => 'required'
        ),
        array(
            'field' => 'cidade',
            'label' => 'cidade',
            'rules' => 'required'
        ),
        array(
            'field' => 'bairro',
            'label' => 'bairro',
            'rules' => 'required'
        ),
        array(
            'field' => 'logradouro',
            'label' => 'endereço',
            'rules' => 'required'
        ),
        array(
            'field' => 'numero',
            'label' => 'número',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'senha',
            'label' => 'senha',
            'rules' => 'required'
        ),
        array(
            'field' => 'senha2',
            'label' => 'confirmar senha',
            'rules' => 'required'
        ),
    ),

    'candidato' =>
    array(
        array(
            'field' => 'nome',
            'label' => 'nome completo',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required'
        ),
        array(
            'field' => 'sexo',
            'label' => 'sexo',
            'rules' => 'required'
        ),
        array(
            'field' => 'cpf',
            'label' => 'cpf',
            'rules' => 'required'
        ),
        array(
            'field' => 'tel',
            'label' => 'telefone',
            'rules' => 'required'
        ),
        array(
            'field' => 'cep',
            'label' => 'cep',
            'rules' => 'required'
        ),
        array(
            'field' => 'estado',
            'label' => 'estado',
            'rules' => 'required'
        ),
        array(
            'field' => 'cidade',
            'label' => 'cidade',
            'rules' => 'required'
        ),
        array(
            'field' => 'bairro',
            'label' => 'bairro',
            'rules' => 'required'
        ),
        array(
            'field' => 'logradouro',
            'label' => 'endereço',
            'rules' => 'required'
        ),
        array(
            'field' => 'numero',
            'label' => 'número',
            'rules' => 'required|numeric'
        ),
    ),
    'perfil' =>
    array(
        array(
            'field' => 'nome',
            'label' => 'nome completo',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required'
        ),
        array(
            'field' => 'cep',
            'label' => 'cep',
            'rules' => 'required'
        ),
        array(
            'field' => 'estado',
            'label' => 'estado',
            'rules' => 'required'
        ),
        array(
            'field' => 'cidade',
            'label' => 'cidade',
            'rules' => 'required'
        ),
        array(
            'field' => 'bairro',
            'label' => 'bairro',
            'rules' => 'required'
        ),
        array(
            'field' => 'logradouro',
            'label' => 'endereço',
            'rules' => 'required'
        ),
        array(
            'field' => 'numero',
            'label' => 'número',
            'rules' => 'required'
        ),
    ),
    'funcionario' =>
    array(
        array(
            'field' => 'nome',
            'label' => 'nome completo',
            'rules' => 'required'
        ),
        array(
            'field' => 'id_cargo',
            'label' => 'cargo',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required'
        ),
        array(
            'field' => 'sexo',
            'label' => 'sexo',
            'rules' => 'required'
        ),
        array(
            'field' => 'cpf',
            'label' => 'cpf',
            'rules' => 'required'
        ),
        array(
            'field' => 'cep',
            'label' => 'cep',
            'rules' => 'required'
        ),
        array(
            'field' => 'estado',
            'label' => 'estado',
            'rules' => 'required'
        ),
        array(
            'field' => 'cidade',
            'label' => 'cidade',
            'rules' => 'required'
        ),
        array(
            'field' => 'bairro',
            'label' => 'bairro',
            'rules' => 'required'
        ),
        array(
            'field' => 'logradouro',
            'label' => 'endereço',
            'rules' => 'required'
        ),
        array(
            'field' => 'numero',
            'label' => 'número',
            'rules' => 'required|numeric'
        ),
    ),
    'evento' =>
    array(
        array(
            'field' => 'titulo',
            'label' => 'Titulo',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú ]+$/]'
        ),
        array(
            'field' => 'cor',
            'label' => 'Cor',
            'rules' => 'required',
        ),
        array(
            'field' => 'inicio',
            'label' => 'Inicio',
            'rules' => 'required'
        ),
        array(
            'field' => 'horaInicio',
            'label' => 'Hora Inicio',
            'rules' => 'required'
        ),
        array(
            'field' => 'fim',
            'label' => 'Termino',
            'rules' => 'required'
        ),
        array(
            'field' => 'horaFim',
            'label' => 'Hora Fim',
            'rules' => 'required'
        ),
    ),
);

/**
* @author: Tiago Villalobos
* Método para tratar a validação de cpf ou cnpj
*/
function requiredIf($field, $value)
{
    if(isset($_POST[$field]))
    {
        if($_POST[$field] == $value)
        {
            return 'required';
        }
    }


}


/**
* @author: Tiago Villalobos
* Verifica se uma data é válida
*
* Recebe uma data no formato padrão enviado por post, sem inversão Ex: 21/04/2018
*
* @param: string $date
*/
function validDate($date)
{
    return date('d/m/Y', strtotime(str_replace('/', '-', $date))) === $date ? true : false;
}

function validCNPJ($cnpj)
{
    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;

	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
}
