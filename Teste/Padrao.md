# Padrão 01

##### Tabela Padrão Front-End Botoes e modais

|Classe|	Local|	Nome Botão|	Cor Botão|	Cor escrito no botão|	Icone|	Posição na tela|	Padrão|	Modal|	Mensagem|
|----|----|------|------|-----|------|-----|---------------------|--------|------|
|1|	Tela de Cadastro|	Cadastrar|	Azul|	Branco| +	|	Canto direito, á direita	|Cadastrar os dados que estiverem de acordo com os requisitos e deve retornar a tela de listar		
|2|	Tela de Cadastro|	Cancelar|	Vermelho	|Branco|	X	|Canto direito, á esquerda do botão Cadastrar	|Ao Cancelar, deve limpar todos os campos e retornar a tela de listar |		
|3	|Tela Listar|	Excluir|	Vermelho|	Branco|	X|	Canto direito, á direita|	Deve ser acionado o Modal.  	|SIM	|
|4|	Tela Listar|	Editar|	Azul|	Branco|https://fontawesome.com/v4.7.0/icon/pencil-square-o/|Canto direito, á esquerda do botão| Excluir	Deve ser direcionado pra uma tela de edição contendo os dados antigos|		
|5|	Tela Editar|	Atualizar|	Azul|	Branco	|https://fontawesome.com/v4.7.0/icon/pencil-square-o/|	Canto direito, á direita|	Deve ser acionado o Modal.  	|SIM|	
|6|	Tela Editar|	Cancelar	|Vermelho|	Branco|	X	|Canto direito, á esquerda do botão Cadastrar|	Ao cancelar, deve retorna a tela de listar|		
|7|	Modal Excluir|	Confirmar|	Azul|	Branco|	nenhum|	Padrão modal|	Ao Excluir, deve voltar a tela de listar||		Parte superior: Excluir ________ parte inferior: Deseja Realmente Excluir esse/essa ______?|
|8|	Modal Excluir|	Cancelar|	Cinza|	Branco|	nenhum|	Padrão modal|	Ao cancelar, deve permanecer na mesma tela|	|	Parte superior: Excluir ________ parte inferior: Deseja Realmente Excluir esse/essa ______?|
|9|	Modal editar|	Confirmar|	Azul|	Branco|	nenhum|	Padrão modal|	Ao confirmar a edição, deve voltar a tela de listar|	|	Parte superior: Atualizar ________ parte inferior: Deseja Realmente Atualizar esse/essa ______?|
|10|	Modal editar|	Cancelar|	Cinza|	Branco|	nenhum|	Padrão modal|	Ao cancelar, deve permanecer na mesma tela|	|	Parte superior: Atualizar ________ parte inferior: Deseja Realmente Atualizar esse/essa ______?|
|11|	Todos|	Todos|||||					Efeito hover		||

# Padrão 02

#### Tabela Padrão Front-End Mensagens e layouts			

|Classe|	Local|	Mensagem	|Padrão|
|-----|-------|----------|-----------|
|12|	Exclusão|	Ex: Vaga Excluida Com Sucesso	
|13|	Atualizar|	EX: Vaga Atualizada Com Sucesso	
|14|	Cadastrar|	Ex: Vaga Cadastrada Com Sucesso	
|15|	Tela de Listar||		Toda em portugues
|16|	Tela de Listar||		Botão acima dos resultados por página, na cor azul, escrito em branco: Novo Cadastro|
|17|	Tela de Listar|	|	Acima do botão novo cadastro deve conter o nome da Tabela: ex Vagas (em Negrito)|
|18|	Tela de Listar||		Deve exibir 10 contatos por pagina 
|19|	Tela de Listar||		Ter barra de pesquisa
|20|	Tela editar||		no cabeçalho deve conter o nome da tabela: Atualizar Vaga (em Negrito)|
|21|	tela cadastrar||		no cabeçalho deve conter o nome da tabela: Cadastrar Vaga (em Negrito)
|22|	Todos os campos||		Mensagem de erro em baixo do campo 
|23|	Todos os campos	||	Mensagem de erro em vermelho
|24|	Todos os campos||		Mensagem de erro deve explicar ao usuario o preocedimento correto: Ex: O Campo quantidade deve conter um numero inteiro
|25| Tela Listar||Botão novo cadastro deve ir para tela de cadastro


# Teste Nos Padrões

			

|Tabela|	classe|Status|
|-----|------|-----------|
|Setor|1,2,21,7,5,6,16,17,20,9,12,13,14,22,23,24,11|Falhou
|Vaga|21,1,2,16,3,11,20,5,6,7,8,9,10|Falhou
|Sac|1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24|Falhou
|Produto|2,4(so item fornecedor)5,6,9,10,11,12,13,14,16,21,24|Falhou
|Cargo|1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24|Falhou
|Cliente|1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,20,21,22,23,24,25|Falhou
|Candidato|4,5,6,7,8,9,10,11,12,13,14,15,16,20,21,22,23,24,25|Falhou
|Fornecedor|21,11,15,17,3,7,8,12,22,23,24,9,10,13,14,5,16,25|Falhou
|Funcionario|1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,20,21,22,23,24,25|Falhou