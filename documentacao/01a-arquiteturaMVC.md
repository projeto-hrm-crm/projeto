### Arquitetura MVC

Model-view-controller (MVC), em português modelo-visão-controlador, é um padrão de arquitetura de software que separa a representação da informação da interação do usuário. É normalmente usado para o desenvolvimento de interfaces de usuário que divide uma aplicação em três partes interconectadas. A utilização do padrão MVC trás como benefício isolar as regras de negócios da lógica de apresentação, a interface com o usuário. Isto possibilita a existência de várias interfaces com o usuário que podem ser modificadas sem que haja a necessidade da alteração das regras de negócios, proporcionando assim muito mais flexibilidade e oportunidades de reuso das classes. O padrão de projeto MVC separa estes componentes maiores possibilitando a reutilização de código e desenvolvimento paralelo de maneira eficiente. Esta arquitetura também facilita atualizações.

O **modelo (model)** consiste nos dados da aplicação, regras de negócios, lógica e funções. A **visão (view)** pode ser qualquer saída de representação dos dados, como uma tabela ou um diagrama. É possível ter várias visões do mesmo dado, como um gráfico de barras para gerenciamento e uma visão tabular para contadores. É a interface com a qual o usuário irá interagir. O **controlador (controller)** faz a mediação da entrada, convertendo-a em comandos para o modelo ou visão. A comunicação entre interfaces e regras de negócios é definida através de um controlador, e é a existência deste controlador que torna possível a separação entre as camadas. Quando um evento é executado na interface gráfica, como um clique em um botão, a interface irá se comunicar com o controlador que por sua vez se comunica com as regras de negócios. As ideias centrais por trás do MVC são a reusabilidade de código e separação de conceitos.

Portanto, a principal ideia do padrão arquitetural MVC é a separação dos conceitos - e do código. O MVC é como a clássica programação orientada a objetos, ou seja, criar objetos que escondem as suas informações e como elas são manipuladas e então apresentar apenas uma simples interface para o mundo. Entre as diversas vantagens do padrão MVC estão a possibilidade de reescrita da GUI ou do controller sem alterar o nosso modelo, reutilização da GUI para diferentes aplicações com pouco esforço, facilidade na manutenção e adição de recursos, reaproveitamento de código, facilidade de manter o código sempre limpo, etc.

*(**Origem:** Wikipédia e DevMedia).*

A aplicação desenvolvida neste projeto aplica o padrão MVC com o uso do framework **CodeIgniter** para desenvolvimento em PHP. A seguir listamos as classes, as pastas e os arquivos que compõem a estrutura do projeto.

### Models

Estes são os _models_ que compõem o projeto e cada _model_ é uma classe/arquivo .php

- Andamento_model
- Candidato_model
- CandidatoEtapa_model
- Cargo_model
- Cidade_model
- Cliente_model
- Documento_model
- Endereco_model
- Estado_model
- Etapa_model
- Fornecedor_model
- Funcionario_model
- Grupo_model
- Iteracao_model
- Log_model
- Pais_model
- Menu_model
- Pessoa_model
- PessoaFisica_model
- PessoaJuridica_model
- ProcessoSeletivo_model
- Produto_model
- Sac_model
- Setor_model
- Submenu_model
- Telefone_model
- Usuario_model
- Vaga_model

### Controllers
Estes são os _controllers_ que compõem o projeto e cada _controller_ é uma classe/arquivo .php

- Candidato
- CandidatoEtapa
- Cargo
- Cidade
- Cliente
- Email
- Estado
- Fornecedor
- Funcionario
- Home
- Log
- Login
- Pedido
- Perfil
- Pessoa
- Processo_Seletivo
- Produto
- Sac
- Seed
- Setor
- Teste_Controller
- Usuario
- Vaga

### Views
Os arquivos das _views_ do projeto estão organizadas nas pastas listadas a seguir:

- candidato
- candidato_etapa
- cargo
- cliente
- email
- errors
- fornecedor
- funcionario
- home
- images
- includes
- login
- pedido
- perfil
- pessoa
- processo_seletivo
- produto
- sac
- setor
- vaga
