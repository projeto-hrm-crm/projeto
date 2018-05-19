# Issue 03 - Teste Produto

Verificar se o produto ta cadastrando e editando normalmente. Verificar se a mesma esta se conectando com a tabela Fornecedor.

#### CLASSE DE EQUIVALÊNCIA

| ID | NOME | CLASSE DE EQUIVALÊNCIA VÁLIDA | CLASSE DE EQUIVALÊNCIA INVÁLIDA |
| ------ | --------- | ---------------| ------------------------------|
|CE1|	Nome|	Somente Letras|	campo em branco, numeros e caracteres especiais|
|CE2|	Data Recebimento|	Data válida(dia ate 31, mês ate 12, ano a partir de 1900)|	32/13/0019 e data anterior a data de fabricação|
|CE3|	Lote|	Somente Numeros inteiros|	campo em branco, letras, caracteres e numeros decimais|
|CE4|	Código|	Somente Numeros inteiros|	campo em branco, letras, caracteres e numeros decimais e código não repetido|
|CE5|	Data Fabricação|	Data válida(dia ate 31, mês ate 12, ano a partir de 1900)|	32/13/0019 e data superior a data de validade|
|CE6|	Botão Cadastrar|	Tudo preenchido dentro dos requisitos| 	mudar de tela sem correção|
|CE7|	Botão Cancelar| Cadastro	volta pra tela de listagem|	faz qualquer coisa,menos voltar pra tela de listagem|
|CE8|	Botão excluir produto	|Remover todos os dados contidos do produto|	permanecer os dados, erro na página|
|CE9|	Editar Produto|	editar dentro dos requisitos acima|	qualquer campo que esteja fora dos requisitos|
|CE10|	Botão cancelar em editar|	Retornar a tela de listagem| não ter nenhuma ação
|CE11|	Data validade|	Data válida(dia ate 31, mês ate 12, ano a partir de 1900), nenhum caracter|	32/13/0019 e data inferior a data de fabricação|

#### TESTE			
| ID |	ENTRADA |	SAÍDA ESPERADA | RESULTADO |
| ------ | --------- | ---------------| ------------------------------|
|CE1|	123456|	aparece msg de erro e não cadastra|	ok|
|CE1|	ABCD$$$#	|aparece msg de erro e não cadastra|	ok|
|CE1|	ABCD|	cadastra|	ok|
|CE1|	$$$$$$###****|	aparece msg de erro e não cadastra|	ok|
|CE2|	01/05/2018|	cadastrar|	ok|
|CE2|	nenhum caracter|	aparece msg de erro e não cadastra|	ok
|CE2|	32/13/0019|	aparece msg de erro e não cadastra|	Falhou
|CE2|	data recebimento < data fabricação|	aparece msg de erro e não cadastra|	Falhou
|CE3|	1235456|	cadastrar|	ok|
|CE3|	ABCD$$$#|	aparece msg de erro e não cadastra|	ok|
|CE3|	nenhum caracter	|aparece msg de erro e não cadastra	ok|
|CE3|	ABCD|	aparece msg de erro e não cadastra|	ok|
|CE3|	$$$$$$###****|	aparece msg de erro e não cadastra|	ok|
|CE3|	1,2|	aparece msg de erro e não cadastra	|ok|
|CE4|	1235456|	cadastrar|	ok|
|CE4|	ABCD$$$#|	aparece msg de erro e não cadastra|	ok|
|CE4|	ABCD|	aparece msg de erro e não cadastra|	ok|
|CE4|	$$$$$$###****|	aparece msg de erro e não cadastra|	ok|
|CE4|	Códigos iguais|	aparece msg de erro e não cadastra|	falhou|
|CE4|	1,2|	aparece msg de erro e não cadastra|	OK|
|CE5|	01/05/2018|	cadastrar|	ok|
|CE5|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE5|	32/13/0019|	aparece msg de erro e não cadastra|	Falhou|
|CE5|	data recebimento < data fabricação|	aparece msg de erro e não cadastra|	Falhou|
|CE6|	todos os campos preenchido corretamente|	cadastrar e ir pra tela listar|	ok|
|CE6|	um ou mais campos errados|	permanecer na mesma tela para correção|	ok|
|CE7|	cancelar o cadastro|	voltar para tela de listagem|	falhou|
|CE8|	Excluir um produto|	exclusao de dados e retorno a tela de listagem|	falhou|
|CE9|	editar Fornecedor|	que apareça na tela o Fornecedor que esta salvo para editar|	falhou|
|CE9|	editar data de recebimento|	editado com sucesso|	ok|
|CE9|	editar código|	editado com sucesso|	ok|
|CE9|	editar Lote|	editado com sucesso|	ok|
|CE9|	editar data fabricação|	editado com sucesso|	ok|
|CE9|	editar data validade|	editado com sucesso|	ok|
|CE9|	editar nome|	editado com sucesso|	ok|
|CE10|	cancelar edição|	volta a pagina de listagem|	ok|
|CE11|	01/05/2018|	cadastrar|	ok|
|CE11|	nenhum caracter|	cadastrar|falhou|
|CE11|	32/13/0019|	aparece msg de erro e não cadastra|	Falhou|
|CE11|	data recebimento < data fabricação|	aparece msg de erro e não cadastra|	Falhou|
