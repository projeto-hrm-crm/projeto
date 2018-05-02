<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Rotas Produtos
$route['produto/index'] = 'produto/index';
$route['produto/cadastrar'] = 'produto/create';
$route['produto/editar/(:num)'] = 'produto/edit/$1';

$route['produto'] = 'Produto/index';
$route['cadastrar/produto'] = 'Produto/create';
$route['editar/produto/(:num)'] = 'Produto/edit/$1';
$route['deletar/produto/(:num)'] = 'Produto/delete/$1';

//Rotas Pessoa
$route['pessoa']                = 'Pessoa/index';
$route['cadastrar/pessoa']      = 'Pessoa/create';
$route['editar/pessoa/(:num)']  = 'Pessoa/edit/$1';
$route['remover/pessoa/(:num)'] = 'Pessoa/delete/$1';

//Rotas Cidade
$route['filtrar_cidades/(:num)'] = 'Cidade/filterByState/$1';

//Rotas Fornecedores
$route['fornecedor/cadastrar'] = 'fornecedor/create';
$route['fornecedor/editar/(:num)'] = 'fornecedor/edit/$1';
$route['fornecedor/excluir/(:num)'] = 'fornecedor/delete/$1';

//Rotas funcionários
$route['funcionario'] = 'Funcionario';
$route['funcionario/cadastrar'] = 'Funcionario/create';
$route['funcionario/editar/(:num)'] = 'Funcionario/edit/$1';
$route['funcionario/excluir/(:num)'] = 'Funcionario/delete/$1';

//Rotas Pessoa Fisica
$route['pessoa_fisica/salvar']         = 'PessoaFisica/save';
$route['pessoa_fisica/listar']         = 'PessoaFisica/listar';
$route['pessoa_fisica/atualizar']      = 'PessoaFisica/update';
$route['pessoa_fisica/editar/(:num)']  = 'PessoaFisica/index/$1';
$route['pessoa_fisica/remover/(:num)'] = 'PessoaFisica/delete/$1';

/** LOGIN */
$route['login'] = 'Login/index';
$route['logout'] = 'Login/logout';

//Rotas SAC
$route['sac/listar'] = 'sac/index';
$route['sac/cadastrar'] = 'sac/create';

//Rotas Setores

$route['setor']='Setor';
$route['setor/cadastrar']='Setor/create';
$route['setor/editar/(:num)']='Setor/edit/$1';
$route['setor/excluir/(:num)']='Setor/delete/$1';

//Rotas Cargo
$route['cargo']='Cargo';
$route['cargo/cadastrar']='Cargo/create';
$route['cargo/editar/(:num)']='Cargo/edit/$1';
$route['cargo/excluir/(:num)']='Cargo/delete/$1';

//Rotas Cliente
$route['cliente']                   = 'Cliente';
$route['cliente/cadastrar']         = 'Cliente/create';
$route['cliente/editar/(:num)']     = 'Cliente/edit/$1';
$route['cliente/excluir/(:num)']    = 'Cliente/delete/$1';

//Rotas candidato
$route['candidato'] = 'Candidato';
$route['candidato/cadastrar'] = 'Candidato/create';
$route['candidato/editar/(:num)'] = 'Candidato/edit/$1';
$route['candidato/excluir/(:num)'] = 'Candidato/delete/$1';

//Rotas Vagas
$route['vagas']               = 'Vaga/index';
$route['cadastrar/vaga']      = 'Vaga/create';
$route['editar/vaga/(:num)']  = 'Vaga/edit/$1';
$route['remover/vaga/(:num)'] = 'Vaga/delete/$1';