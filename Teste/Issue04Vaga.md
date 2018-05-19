# Issue 04 - Teste Vaga

Verificar se a vaga ta cadastrando e editando normalmente. Verificar se a mesma esta se conectando com a tabela cargo

#### CLASSE DE EQUIVALÊNCIA

| ID | NOME | CLASSE DE EQUIVALÊNCIA VÁLIDA | CLASSE DE EQUIVALÊNCIA INVÁLIDA |
| ------ | --------- | ---------------| ------------------------------|
| CE1 | Data de Oferta | Somente Numeros | campo em branco, letras e caracteres especiais |
| CE2 | Data de Oferta | Data válida |	Dia acima de 31, mês acima de 12 e ano a partir de 1900 |
| CE3 | Quantidade | Somente Numeros inteiros |	campo em branco, letras, caracteres especiais e numeros decimais |
| CE4 | Requisitos | Letras, Números e caracteres especiais |	Tags HTML |
| CE5 | Requisitos | 01 Até 45 caracteres |	acima de 45 |
| CE6 | Botão Cadastrar | Tudo dentro dos requisitos acima | mudar de tela sem correção |
| CE7 | Botão Cancelar Cadastro | volta pra tela de listagem |	faz qualquer coisa,menos voltar pra tela de listagem |
| CE8 | Botão excluir vaga | Remover todos os dados contidos naquela vaga |	permanecer os dados, erro na página |
| CE9 | Editar vaga | editar dentro dos requisitos acima |	qualquer campo que esteja fora dos requisitos |
| CE10 | Cargo | que tenha vínculo com o setor |	que não tenha vinculo nenhum |

#### TESTE			
| ID |	ENTRADA |	SAÍDA ESPERADA | RESULTADO |
| ------ | --------- | ---------------| ------------------------------|
| CE1 |	123456 |	cadastrar |	ok |
| CE1 |	ABCD$$$# |	aparece msg de erro e não cadastra |	ok |
| CE1 | ABCD | aparece msg de erro e não cadastra |	ok |
| CE1 |	$$$$$$###**** | aparece msg de erro e não cadastra |	ok |
| CE2 |	01/05/2018 |	cadastrar	|ok|
| CE2 |	nenhum caracter	|aparece msg de erro e não cadastra |	ok|
| CE2 |	32/13/0019|aparece msg de erro e não cadastra|	ok|
| CE3 |	1235456	|cadastrar|	ok|
| CE3 |	ABCD$$$#|aparece msg de erro e não cadastra|ok|
|CE3|	nenhum caracter|aparece msg de erro e não cadastra|ok|
|CE3|	ABCD|aparece msg de erro e não cadastra|ok|
|CE3|	$$$$$$###****|aparece msg de erro e não cadastra|ok|
|CE3|	1,2	|aparece msg de erro e não cadastra|ok|
|CE4|	1235456|	cadastrar|	ok|
|CE4|	ABCD$$$#|	cadastrar|	ok|
|CE4|	ABCD|	cadastrar|	ok|
|CE4|	$$$$$$###****|	cadastrar|	ok|
|CE4|	1,2	|cadastrar|	OK|
|CE4|	<script></script>|	Msg de erro|	ok|
|CE5|	200 caracteres|	Msg de erro|	ok|
|CE5|	nenhum caracter|	Msg de erro|	ok|
|CE5|	1 caracter|	cadastrar|	ok|
|CE6|	todos os campos preenchido corretamente|	cadastrar e ir pra tela listar|	ok|
|CE6|	um ou mais campos errados|	permanecer na mesma tela para correção|	falhou|
|CE7|	cancelar o cadastro|	voltar para tela de listagem|	falhou|
|CE8|	Excluir uma vaga|	exclusao de dados e retorno a tela de listagem|	falhou|
|CE9|	editar cargo|	Atualizado com sucesso|	ok|
|CE9|	editar data de oferta|	atualizado com sucesso|	ok|
|CE9|	editar quantidade|atualizado com sucesso|	ok|
|CE9|	editar requisitos|	atualizado com sucesso|	ok|
|CE10	|escolher cargo|	que o cargo esteja relacionado com o setor certo|	ok|
