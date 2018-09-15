# Issue 05 - Teste Sac

 Verificar se o Sac ta cadastrando e editando normalmente. Verificar se a mesma esta se conectando com a tabela cliente e produtos.

#### CLASSE DE EQUIVALÊNCIA

| ID | NOME | CLASSE DE EQUIVALÊNCIA VÁLIDA | CLASSE DE EQUIVALÊNCIA INVÁLIDA |
| ------ | --------- | ---------------| ------------------------------|
|CE1|	Assunto|	Somente Letras |	campo em branco, numeros e caracteres especias|
|CE2|	Descrição|	Letras, Números e caracteres especiais|	Tags HTML
|CE3|	Descrição|	01 Até 45 caracteres|	acima de 45|
|CE4|	Botão Cadastrar|	Tudo dentro dos requisitos acima|	mudar de tela sem correção|
|CE5|	Botão Cancelar Cadastro|	volta pra tela de listagem|	faz qualquer coisa,menos voltar pra tela de listagem|
|CE6|	Botão excluir|	Remover todos os dados contidos naquele sac|	permanecer os dados, erro na página|
|CE7|	Editar Sac|	editar dentro dos requisitos acima|	qualquer campo que esteja fora dos requisitos|
|CE8|	Botão editar|	depois de editar ir para tela de listar|	faz qualquer coisa,menos voltar pra tela de listagem|
|CE9|	Botão Cancelar edição|	volta pra tela de listagem|	faz qualquer coisa,menos voltar pra tela de listagem|
|CE10|	Modal	|Para confirmar exclusao e edição|	Sem modal|

#### TESTE			
| ID |	ENTRADA |	SAÍDA ESPERADA | RESULTADO |
| ------ | --------- | ---------------| ------------------------------|
|CE1|	123456|	aparece msg de erro e não cadastra|	falhou|
|CE1|	ABCD$$$#	|aparece msg de erro e não cadastra|	falhou|
|CE1|	ABCD	|cadastrar|	falhou|
|CE1|	$$$$$$###****|	aparece msg de erro e não cadastra|	falhou|
|CE1|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE2|	1235456|	cadastrar|	falhou|
|CE2|	ABCD$$$#|	cadastrar|	falhou|
|CE2|	ABCD|	cadastrar|	falhou|
|CE2|	$$$$$$###****|	cadastrar|	falhou|
|CE2|	1,2|	cadastrar|	falhou|
|CE2|	<script></script>|	aparece msg de erro e não cadastra|	falhou|
|CE3|	200 caracteres|	aparece msg de erro e não cadastra	|falhou|
|CE3|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE3|	1 caracter|	cadastrar|	falhou|
|CE4|	todos os campos preenchido corretamente|	cadastrar e ir pra tela listar|	falhou|
|CE4|	um ou mais campos errados|	permanecer na mesma tela para correção|	falhou|
|CE5|	cancelar o cadastro|	voltar para tela de listagem|	falhou|
|CE6|	Excluir sac|	exclusao de dados e retorno a tela de listagem|	falhou|
|CE7|	editar assunto|	editado com sucesso|	falhou|
|CE7|	editar descrição|	editado com sucesso	|falhou|
|CE7|	editar cliente,produto|	editado com sucesso|	falhou|
|CE8|	botão editar|	ir para tela de listagem|	falhou|
|CE9|	botao cancelar edição|	ir para tela de listagem|	falhou|
|CE10|	Não existe modal|	Confirmar exclusão e edição e voltar a tela de listagem	|falhou|
