# Projeto PR1 2018

## Introdução
O sistema em desenvolvimento tem o objetivo de auxiliar empresas a agilizar o gerenciamento de clientes, funcionários e produtos. Neste sentido, pode-se afirmar que se trata de um sistema ERP -- Enterprise Resource Planning, ou Planejamento de Recursos Empresarias com foco nos módulos de CRM e HRM.

O termo CRM significa Customer Relationship Management, ou Gestão de Relacionamento com o Cliente. Por meio do sistema de CRM, uma empresa consegue manter um banco de dados detalhado de cada cliente, bem como um histórico de interações e pedidos que ajuda a enriquecer e personalizar atendimentos futuros.

Sendo uma solução voltada à empresas de varejo, o sistema também oferece formulário para gerenciar fornecedores e seus produtos.

Com o sistema HRM (Human Resource Management, ou Gerenciador de Recursos Humanos) é possível controlar todos os processos ligados ao RH e gestão de pessoas. É possível ter um cadastro dos funcionários, histórico de cargos, currículo do funcionário, folha de pagamento, banco de horas, faltas, folgas, férias, processo de seleção e todas as informações relevantes sobre as pessoas trabalhando na empresa.

## Requisitos de Sistema
Embora o cliente tenha explicitado um conjunto de necessidades que deverão ser atendidas pelo sistema para solucionar o problema do seu negócio, coube à equipe de consultores identificar a real necessidade do negócio e deduzir os requisitos de sistema.

Requisitos funcionais e não-funcionais em: _01a-Requisitos_sistema.md_

## Desenvolvimento
Linguagens e ferramentas utilizados no desenvolvimento:

### Linguagens
- HTML5 -- HyperText Markup Language
- PHP (HyperText Preprocessor)
- CSS (Cascading Style Sheets)
- JavaScript e biblioteca JQuery
- Markdown -- linguagem de marcação para documentação

### Frameworks
- CodeIgniter
- Bootstrap
- Ajax

### Banco de Dados
- MySQL

Diagrama entidade-relacionamento (DER)

![alt text](images/banco_de_dados.png "Diagrama entidade-relacionamento")

## Metodologia
A metodologia utilizada para o desenvolvimento do projeto foi a metodologia ágil Scrum.

### Ferramentas
- MySQL Workbench
- Trello
- Google Drive
- Navegadores de internet
- IDEs
- FontAwesome

### Controle de Versões
O controle das versões do sistema é mantido no Github, acessado pelo link: [Github](https://github.com/ProjetoPR12018/projeto)

### Arquitetura MVC
O sistema desenvolvido neste projeto aplica o padrão MVC com o uso do framework **CodeIgniter** para desenvolvimento em PHP.

As classes e pastas que compõe a estrutura do projeto estão listadas em: [01a-ArquiteturaMVC](01a-ArquiteturaMVC.md)

### Níveis de acesso
Para acessar o sistema é necessário que o usuário esteja cadastrado no sistema.
O Projeto conta com 4 tipos de usuários:
- Administrador:
Tem total acesso ao sistema.
- Funcionário:
Tem acesso aos módulos:

  - Candidato:
  Tem acesso aos processos seletivos disponíveis, para inscrição e monitoramento de inscrições anteriores.
  - Cliente:
  Tem acesso ao módulo de SAC, podendo apenas criar atendimentos e consultar os atendimentos anteriores.
  - Fornecedor:
  Pode ver os produtos que fornece à empresa.
