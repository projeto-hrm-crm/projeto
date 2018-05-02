# Projeto PR1 2018

## Introdução
O sistema em desenvolvimento tem o objetivo de auxiliar pequenas e médias empresas a agilizar o gerenciamento de clientes, funcionários e produtos. Neste sentido pode-se afirmar que se trata de um sistema ERP - Enterprise Resource Planning, ou Planejamento de Recursos Empresarias com foco em nos módulos de CRM e HRM.

O termo CRM significa Customer Relationship Management, ou Gestão de Relacionamento com o Cliente. Por meio do sistema de CRM, uma empresa consegue manter um banco de dados detalhado de cada cliente, bem como um histórico de interações que ajuda a enriquecer e personalizar atendimentos futuros.   

Com o sistema HRM (Human Resource Management - Gerenciador de Recursos Humanos) é possível controlar todos os processos ligados ao RH e gestão de pessoas. Ter um cadastro dos funcionários, histórico de cargos, currículo do funcionário, banco de horas, faltas, folgas, férias, enfim tudo que gere as pessoas da empresa.

Sendo uma solução voltada a empresas que vendem produtos, houve necessidade de cadastrar os fornecedreos de tais produtos, de forma que o sistema possui módulo de gerenciamente de fornecedores.

## Requisitos de Sistema
Requisitos funcionais e não funcionais

## Desenvolvimento
Linguagens e ferramenats utilizados no desenvolvimento:

### Linguagens
- HTML5 - HyperText Markup Language;
- PHP (HyperText Preprocessor);
- CSS (Cascading Style Sheets);
- JavaScript;
- Mardown - linguagem de marcação para documentação

### Frameworks
- CodeIgniter
- Bootstrap

### Banco de Dados
- MySQL

O DER ficará disponível ao final do projeto, uma vez que está sendo desenvolvido de forma incremental, de acordo com as necessidades do sistema.

### Ferramentas
- MySql Workbench.
- Astah;
- Trello
- Google Drive;
- Diversas IDEs, entre Atom, Brackets, Sublime Text.

### Controle de Versões
O controle das versões do sistema é mantido no Github, no endereço https://github.com/ProjetoPR12018/projeto

### Diagramas UML
Os diagramas UML necessários na documentação

### Níveis de acesso
Quais os níveis de acesso do sistema?

## O sistema e suas funções
*Os componentes estão sendo desenvolvidos de forma incemental, assim, atualizar esta lista*

### Arquitetura MVC

O sistema desenvolvido neste projeto aplica o padrão MVC com o uso do framework **CodeIgniter** para desenvolvimento em PHP. A seguir listamos as classes, pastas e os arquivos que compõem a estrutura do projeto.

#### Models

Estes são os models que compõem o projeto e cada model é uma classe/arquivo .php

- Candidato_model
- Cargo_model
- Cidade_model
- Cliente_model
- Documento_model
- Endereco_model
- Estado_model
- Fornecedor_model
- Funcionario_model
- Grupo_model
- Interacao_model
- Menu_model
- Pessoa_model
- PessoaFisica_model
- PessoaJuridica_model
- Produto_model
- Sac_model
- Setor_model
- Submenu_model
- Telefone_model

#### Controllers
Estes são os controllers que compoem o projeto e cada controller é uma classe/arquivo .php

- Candidato
- Cargo
- Cidade
- Cliente
- Fornecedor
- Funcionario
- Index
- Login
- Pessoa
- PessoaFisica
- Produto
- Sac
- Setor

#### Views
Os arquivos das views do projeto estão organizadas nas pastas listadas a seguir:

- candidato
- cargo
- cliente
- errors
- fornecedor
- funcionario
- images
- includes
- login
- pessoa
- produto
- sac
- setor
- vaga
