# Issue 01 - Teste Setor

Verificar se o setor ta cadastrando e editando normalmente. 

#### CLASSE DE EQUIVALÊNCIA

| ID | NOME | CLASSE DE EQUIVALÊNCIA VÁLIDA | CLASSE DE EQUIVALÊNCIA INVÁLIDA |
| ------ | --------- | ---------------| ------------------------------|
|CE1|	Nome|	SomenteLetras e Numeros|	campo em branco, caracteres especiais,tags html|
|CE2|	Botão Cadastrar|	Tudo dentro dos requisitos acima|	mudar de tela sem correção|
|CE3|	Botão Cancelar Cadastro	|volta pra tela de listagem|	faz qualquer coisa,menos voltar pra tela de listagem|
|CE4|	Botão excluir setor|	Remover todos os dados contidos naquela vaga|	permanecer os dados, erro na página|
|CE5|	Editar setor|	editar dentro dos requisitos acima|	qualquer campo que esteja fora dos requisitos|
|CE6|	Botão Cancelar edição|	volta pra tela de listagem|	faz qualquer coisa,menos voltar pra tela de listagem|
|CE7|	Botão editar|	depois de editar ir para tela de listar|	faz qualquer coisa,menos voltar pra tela de listagem|

#### TESTE			
| ID |	ENTRADA |	SAÍDA ESPERADA | RESULTADO |
| ------ | --------- | ---------------| ------------------------------|
|CE1|	123456|	cadastrar|	ok|
|CE1|	ABCD$$$#|	aparece msg de erro e não cadastra|	falhou|
|CE1|	ABCD|	Cadastrar|	ok|
|CE1|	$$$$$$###****|	aparece msg de erro e não cadastra|	falhou|
|CE1|	<script></script>|	aparece msg de erro e não cadastra|	falhou|
|CE2|	todos os campos preenchido corretamente|	cadastrar e ir pra tela listar|	ok|
|CE2|	um ou mais campos errados|	permanecer na mesma tela para correção|	ok|
|CE3|	cancelar o cadastro|	voltar para tela de listagem|	ok|
|CE4|	Excluir um setor|	exclusao de dados e retorno a tela de listagem|	falhou|
|CE5|	editar setor|	editado com sucesso|	ok|
|CE6|	botao cancelar edição|	ir para tela de listagem|	ok|
|CE7|	botão editar|	ir para tela de listagem|	ok|
