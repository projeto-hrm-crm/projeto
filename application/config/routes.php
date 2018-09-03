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

$route['default_controller'] = 'landingpage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Rota do seed
$route['make/seed'] = 'seed/index';

$route['cidade'] = 'Cidade/edit';
$route['estado'] = 'Estado/edit';

//Rotas Produtos
$route['produto'] = 'produto/index';
$route['produto/cadastrar'] = 'produto/create';
$route['produto/editar/(:num)'] = 'produto/edit/$1';
$route['produto/excluir/(:num)'] = 'Produto/delete/$1';

//Rotas Log
$route['log'] = 'Log/index';


//Rotas Cidade
$route['filtrar_cidades/(:num)'] = 'Cidade/filterByState/$1';

//Rota para verificando de email
$route['unique/(:any)'] = 'Usuario/unique/$1';


//Rotas Fornecedores
$route['fornecedor/cadastrar'] = 'Fornecedor/create';
$route['fornecedor/editar/(:num)'] = 'Fornecedor/edit/$1';
$route['fornecedor/excluir/(:num)'] = 'Fornecedor/delete/$1';

//Rotas funcionários
$route['funcionario'] = 'Funcionario';
$route['funcionario/cadastrar'] = 'Funcionario/create';
$route['funcionario/editar/(:num)'] = 'Funcionario/edit/$1';
$route['funcionario/excluir/(:num)'] = 'Funcionario/delete/$1';

/** LOGIN */
$route['login'] = 'Login/index';
$route['logout'] = 'Login/logout';

//Rotas SAC
$route['sac'] = 'Sac';
$route['sac/cadastrar'] = 'Sac/create';
$route['sac/editar/(:num)'] = 'Sac/edit/$1';
$route['sac/excluir/(:num)'] = 'Sac/delete/$1';
$route['sac/iteracao/(:num)'] = 'Iteracao/loadMensagem/$1';
$route['sac/mensagem/(:num)'] = 'Iteracao/create/$1';

//Rotas Sugestões
$route['sugestao'] = 'Sugestao';
$route['sugestao/cadastrar'] = 'Sugestao/create';
$route['sugestao/visualizar/(:num)'] = 'Sugestao/details/$1';
$route['sugestao/excluir/(:num)'] = 'Sugestao/delete/$1';

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
$route['vaga']                = 'Vaga/index';
$route['vaga/cadastrar']      = 'Vaga/create';
$route['vaga/editar/(:num)']  = 'Vaga/edit/$1';
$route['vaga/excluir/(:num)'] = 'Vaga/delete/$1';



//Rotas CandidatoVaga
$route['candidato_etapa']                = 'CandidatoEtapa/index';
$route['candidato_etapa/cadastrar/(:num)']      = 'CandidatoEtapa/create/$1';
$route['candidato_etapa/excluir/(:num)'] = 'CandidatoEtapa/delete/$1';

//Rotas Pedido
$route['pedido']                            = 'Pedido/index';
$route['pedido/cadastrar']                  = 'Pedido/create';
$route['pedido/editar/(:num)']              = 'Pedido/edit/$1';
$route['pedido/excluir/(:num)']             = 'Pedido/delete/$1';
$route['pedido/cliente/pdf/(:num)']         = 'Pedido/pdfClient/$1';
$route['pedido/fornecedor/pdf/(:num)']      = 'Pedido/pdfProvider/$1';
$route['pedido/fornecedores']               = 'Pedido/getProvidersJSON';
$route['pedido/clientes']                   = 'Pedido/getClientsJSON';
$route['pedido/produtos']                   = 'Pedido/getProductsJSON';
$route['pedido/produtos/fornecedor/(:num)'] = 'Pedido/getProductsByProviderJSON/$1';
$route['pedido/fornecedor']                 = 'Pedido/indexProvider';
$route['pedido/fornecedor/editar/(:num)']   = 'Pedido/editProvider/$1';


//Rotas Processo Processo_Seletivo
$route['processo_seletivo'] = 'Processo_Seletivo/index';
$route['processo_seletivo/cadastrar'] = 'Processo_Seletivo/create';
$route['processo_seletivo/info/(:num)'] = 'Processo_Seletivo/info/$1';
$route['processo_seletivo/editar/(:num)'] = 'Processo_Seletivo/edit/$1';
$route['processo_seletivo/excluir/(:num)'] = 'Processo_Seletivo/delete/$1';

//Rotas Perfil
$route['perfil'] = 'Perfil/index';
$route['perfil/editar'] = 'Perfil/edit';
$route['perfil/alterar-senha'] = 'Perfil/changePassword';
$route['perfil/upload']		   = 'Perfil/fileUpload';

//Ajax calls
$route['cliente/chart']               = 'Cliente/getChartData';
$route['notifications']               = 'Usuario/getNotifications';
$route['notifications/count']         = 'Usuario/getCount';
$route['notifications/viewed/(:num)'] = 'Usuario/setViewed/$1';

//Rotas Usuario
$route['cadastro'] = 'Usuario/create';




