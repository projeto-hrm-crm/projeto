### Arquitetura MVC

*"Model-view-controller (MVC), em português modelo-visão-controlador, é um padrão de arquitetura de software (não confundir com um design pattern) que separa a representação da informação da interação do usuário. É normalmente usado para o desenvolvimento de interfaces de usuário que divide uma aplicação em três partes interconectadas. Isto é feito para separar representações de informação internas dos modos como a informação é apresentada para e aceita pelo usuário. O padrão de projeto MVC separa estes componentes maiores possibilitando a reutilização de código e desenvolvimento paralelo de maneira eficiente.*

*O **modelo (model)** consiste nos dados da aplicação, regras de negócios, lógica e funções. Uma **visão (view)** pode ser qualquer saída de representação dos dados, como uma tabela ou um diagrama. É possível ter várias visões do mesmo dado, como um gráfico de barras para gerenciamento e uma visão tabular para contadores. O **controlador (controller)** faz a mediação da entrada, convertendo-a em comandos para o modelo ou visão. As ideias centrais por trás do MVC são a reusabilidade de código e separação de conceitos.*

*Tradicionalmente usado para interfaces gráficas de usuário (GUIs), esta arquitetura tornou-se popular para projetar aplicações web e até mesmo para aplicações móveis, para desktop e para outros clientes.[3] Linguagens de programação populares como Java, C#, Ruby, PHP e outras possuem frameworks MVC populares que são atualmente usados no desenvolvimentos de aplicações web." (**Origem:** Wikipédia, a enciclopédia livre).*

A aplicação desenvolvida neste projeto aplica o padrão MVC com o uso do framework **CodeIgniter** para desenvovimento em PHP. A seguir listamos as classes, as pastas e os arquivos que compoem a estrutura do projeto.

### Models

Estes são os models que compoem o projeto e cada model é uma classe/arquivo .php

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

### Controllers
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

### Views
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
