## Requisitos Não-Funcionais

Os requisitos que descrevem os aspectos não-funcionais do sistema são apresentados a seguir e foram divididos nas categorias de processo, de produto e externos:

### Requisitos de Processo
Os requisitos de processo estão relacionados ao processo de desenvolvimento do sistema.

Identificação	| Descrição
--- | ---
RNF 001	| Utilização de SCRUM como o processo para o desenvolvimento do sistema
RNF 002	| Deve-se utilizar SQL padrão, para se ter indepêndencia de banco de dados
RNF 003	| A camada de apresentação utilizará o Framework Bootstrap para facilitar o tratamento das ações dos usuários.
RNF 004	| Todo o sistema deverá ser desenvolvido utilizando o padrão de software MVC.
RNF 005	| O sistema deverá ser desenvolvido em PHP, utlizando o framework CodeIgniter.
RNF 006	| 	O banco de dados que suportará o ambiente será o MySQL;


### Requisitos de Produto
Os requisitos de produto estão relacionados às características desejadas que o sistema deve ter.

Identificação	| Descrição
--- | ---
RNF 007	| As mensagens de erro do sistema deverão ser precisas e construtivas, fazendo com que o usuário identifique sua origem e como proceder após sua ocorrência.
RNF 008	| A interface do sistema deverá ser agradável e objetiva, ou seja, suas funcionalidades e informações deverão estar bem intuitivas. Os usuários administrativos (administradores e funcionários) após curto tempo de treinamento devem ser capazes de operar o sistema como um todo, diminuindo a necessidade de consultas ao sistema de suporte, helpdesk, para a execução de suas tarefas.
RNF 009	| O sistema deve ser independente de   plataforma.
RNF 010	| O sistema deve ser independente de navegador.
RNF 011	| O sistema deve estar sempre disponível.
RNF 012	| Os dados não podem ser corrompidos. Os dados serão mantidos e gerenciados por um SGBD.
RNF 013	| A base de dados deve estar sempre íntegra.
RNF 013	| Os dados que o usuário entra no sistema deverão ser validados a fim de evitar que dados errôneos sejam armazenados prejudicando a corretude e consistência da base de dados.
RNF 014	| O sistema deve ter um tempo de resposta a consultas de no máximo 5 segundos.
RNF 015	| O sistema deverá suportar até 10.000 acessos simultâneos.
RNF 016	| Será utilizado um padrão de codificação especificado no documento de arquitetura.
RNF 017	| Padrões de projetos serão utilizados a fim de evitar soluções não reusáveis de programação.

### Requisitos Externos
Os requisitos externos são derivados do ambiente no qual o sistema está sendo desenvolvido.

Identificação	| Descrição
--- | ---
RNF 018	| O tempo com o desenvolvimento, implantação e treinamento do sistema não poderá superar a data estimada no calendário de desenvolvimento proposto.
