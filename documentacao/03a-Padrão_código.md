# Padrões (Convenções)
## 1. Nomenclatura
### 1.1. Controllers e Rotas
Por conta da utilização do nome do controller na criação das rotas mágicas do CodeIgniter
os nomes dos controllers recebem os nomes dos objetos a serem utilizados.

Por convenção, todos os nomes de controllers devem estar no **SINGULAR**
````php
<?php
// Curso terá controle sobre as rotas em http://localhost/curso
class Curso extends CI_Controller
{
    // Rota: http://localhost/curso/index
    //       http://localhost/curso
    public function index() { echo 'página inicial'; }

    // Rota: http://localhost/curso/cadastrar
    public function create() { echo 'cadastro de curso'; }
}
````

### 1.2 Nomes das funções no controller
- **index**: Lista de resultados, página inicial;
- **create**: Formulário de cadastro, chama função insert do model;
- **edit**: Formulário de edição, chama função update do model;
- **delete**: Remove do banco;  

**Obs:** As demais funções necessárias devem seguir este padrão, sendo sempre verbos;  
**Obs²:** Para manter a utilização correta e fácil busca, qualquer função de ação
que não seja lista ou página inicial utilizada no *index* não deve ser implementada
em *index*, mas em uma função específica que será chamada.

**Exemplo**: O Fornecedor não tem página inicial, ele vai direto para o cadastro:
````php
<?php
class Fornecedor extends CI_Controller
{
    public function index()
    {
        $this->create();
    }

    public function create()
    {
        // Lógica para o cadastro de Fornecedor
    }
}
````

****

## 2. Modelos e Banco de Dados
### 2.1 Tabelas e nome de modelos
O nome dos modelos devem seguir o padrão **Tabela_model**, isso garante que nenhuma
outra classe sobrescreva ou seja sobrescrita pelo modelo.
````php
<?php
class Blog_model extends CI_Model
{

        public $title;
        public $content;
        public $date;

        public function get()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        public function insert()
        {
                $this->title    = $this->input->post('title');
                $this->content  = $this->input->post('content');
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        public function update()
        {
                $this->title    = $this->input->post('title');
                $this->content  = $this->input->post('content');
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $this->input->post('id')));
        }

}
````
### 2.2 Nomes das funções no model
- **insert**: Salva os dados no banco;
- **get**: Recupera os registros da tabela;
- **update**: Atualiza os dados no banco;
- **remove**: Remove os dados do banco;

Algumas regras utilizadas:
 - Nomes de tabelas sempre no **SINGULAR**;
 - Atributos chaves primárias devem ser nomeadas com o nome da tabela seguido por 'id';
 - Id's de chaves estrangeiras sempre no **SINGULAR**;
 - Nome de campos e tabelas em **MINÚSCULO** e utilizando **snake_case**:  
 **Ex:** `cursos_semestres` e `curso_id`;

## 3 Views
### 3.1 Nome das views
As views devem conter pelo menos as páginas index, cadastrar e editar.

Todas as páginas devem estar contidas em um diretório com o nome de sua respectiva funcionalidade,
dentro do diretório views.

Todas as páginas devem ser nomeadas com inicial minúscula.
### 3.2 Estrutura do diretório views
```
├── views/
│   ├── fornecedor
│   │   ├── index.php
│   │   ├── cadastrar.php
│   │   ├── editar.php

```

## 4 Geral
### Nome de variáveis
As variáveis precisam ser explicativas. Não usar, de forma alguma, variáveis que não fazem sentido, exemplo:

#### Não fazer
`$a = "Ta errado isso aqui"`;

#### Fazer
`$usuarios = "Correto"`;
`$total_linhas = "Correto"`;

### Variáveis compostas
As variáveis compostas seguirão o padrão snake case:

#### Não fazer
`$minhaVariavelComposta = "ERRADO"`;

#### Fazer
`$minha_variavel_composta = "CERTO"`;

### Nome de métodos
Os métodos seguirão o padrão camel case:

#### Não fazer
`public function meu_metodo(){}`

#### Fazer
`public function meuMetodo(){}`

### Comentários
A fim de não haver problemas ou duplicação de código desnecessário, haverá obrigatoriedade de comentários em cada método criado e os comentários seguirão o seguinte padrão:

````php
<?php
class Usuarios extends CI_Controller
{
      /**
      *@author: Fulano de tal
      * Essa método tem a finalidade de filtrar usuários
      * por uma data especificada.
      *
      * @param $data_comeco String
      * @param $data_fim    String
      * @return mixed
      */
      public function buscarUsuariosPelaData($data_comeco, $data_fim)
      {
         // Corpo do método
      }
}
````
