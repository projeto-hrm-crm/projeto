# Issue 08 - Teste Fornecedor

Verificar se a tabela fornecedor ta cadastrando e editando normalmente. 

#### CLASSE DE EQUIVALÊNCIA

| ID | NOME | CLASSE DE EQUIVALÊNCIA VÁLIDA | CLASSE DE EQUIVALÊNCIA INVÁLIDA |
| ------ | --------- | ---------------| ------------------------------|
|CE1|	Nome|	Somente Letras de 1 a 45 caracteres|	campo em branco, numeros e caracteres especias|
|CE2|	Email|	Letras, Números e caracteres especiais seguindo a validação de email(Ex: XXXX@XXX.com)|	Tags HTML, Fora de Validação, somente numeros|
|CE3|	Razão social|Somente Letras de 1 a 45 caracteres|	campo em branco, numeros e caracteres especias|
|CE4| CNPJ | Somente Números, obrigatório 14 carateres, padrão XX.XXX.XXX/XXXX-XX| Campo em Branco, letras, caracteres especiais
|CE5| Telefone |Somente Números, obrigatório 10 ou 11 carateres, padrão (XX) XXXXX-XXXX| Campo em Branco, letras, caracteres especiais
|CE6|Estado | Obrigatório escolher um item no combobox| Nenhuma escolha
|CE7|Cidade |Obrigatório escolher um item no combobox| Nenhuma escolha
|CE8|Logradouro| Letras e/ou Números, de 1 a 45 caracteres|Campo vazio, caracteres especiais
|CE9|Numero| Número e Letra| Somente letra, campo em branco,caracteres especiais
|CE10|Complemento| Número e Letra| caracteres especiais
|CE11|Bairro| Letras e/ou Números, de 1 a 45 caracteres|Campo vazio, caracteres especiais
|CE12|CEP|Somente Números, obrigatório 8 carateres,padrão XXXXX-XXX|Campo em Branco, letras, caracteres especiais
|CE13|	Botão Cadastrar|	Cadastrar tudo o que for de acordo com os requisitos válidos da tabela|	mudar de tela sem correção, cadastrar com erro|
|CE14|	Botão Cancelar Cadastro|	volta pra tela de listagem |	faz qualquer coisa,menos voltar pra tela de listagem|
|CE15|	Botão excluir |	Remover todos os dados contidos naquela tabela|	permanecer os dados,Dar erro na página|
|CE16|	Edição|	editar tudo o que for de acordo com os requisitos válidos da tabela|	qualquer campo que esteja fora dos requisitos|
|CE17|	Botão editar|	depois de editar ir para tela de listar	|faz qualquer coisa,menos voltar pra tela de listagem|
|CE18|	Botão Cancelar edição|	volta pra tela de listagem|	faz qualquer coisa,menos voltar pra tela de listagem|

#### TESTE			
| ID |	ENTRADA |	SAÍDA ESPERADA | RESULTADO |
| ------ | --------- | ---------------| ------------------------------|
|CE1|	123456|	aparece msg de erro e não cadastra|	falhou|
|CE1|	ABCD$$$#|	aparece msg de erro e não cadastra|	falhou|
|CE1|	ABCD|	cadastrar|	ok|
|CE1|	$$$$$$###****|	aparece msg de erro e não cadastra|	falhou|
|CE1|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE1|	mais de 45 caracteres|	aparece msg de erro e não cadastra|	falhou|
|CE1|	ate 45 caracteres|cadastrar|	ok|
|CE2|	testanto@testar.com|	cadastrar|	ok|
|CE2|	testandotestanto|	aparece msg de erro e não cadastra|	ok|
|CE2|	13232323|	aparece msg de erro e não cadastra|	ok|
|CE2|	<script></script>|	aparece msg de erro e não cadastra|	falhou|
|CE3|	mais de 45 caracteres|	aparece msg de erro e não cadastra|	falhou|
|CE3|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE3|	ate 45 caractereres|cadastrar|	ok|
|CE3|	13232323|	aparece msg de erro e não cadastra|	falhou|
|CE4|	somente letras|	não permitir|	ok|
|CE4|	caracteres especiais|	não permitir|	ok|
|CE4|   menor que 14 caracteres|	aparece msg de erro e não cadastra|	falhou|
|CE4|	maior que 14 caracteres|	não permitir|	ok|
|CE4|	caracteres especiais|	não permitir|	ok|
|CE4|	dentro do padrão|	cadastrar|	falhou|
|CE4|	campo em branco| aparece msg e não cadastra| ok
|CE5|	somente letras|	não permitir|	ok|
|CE5|	caracteres especiais|	não permitir|	ok|
|CE5|	menor que 10 caracteres|	aparece msg de erro e não cadastra|	falhou|
|CE5|	maior que 11 caracteres|	não permitir|	ok|
|CE5|	dentro do padrão|	cadastrar|	falhou|
|CE5|   campo em branco| aparece msg e não cadastra| ok
|CE6|  escolher um item combobox|cadastrar|ok
|CE6|  não ter nenhum item escolhido no combobox|aparece msg de erro e não cadastra|falhou
|CE7|  escolher um item combobox|cadastrar|ok
|CE7|  não ter nenhum item escolhido no combobox|aparece msg de erro e não cadastra|falhou
|CE8|	123456|	aparece msg de erro e não cadastra|	falhou|
|CE8|	ABCD$$$#|	aparece msg de erro e não cadastra|	falhou|
|CE8|	ABCD|	cadastrar|	ok|
|CE8|	$$$$$$###****|	aparece msg de erro e não cadastra|	falhou|
|CE8|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE8|	mais de 45 caracteres|	aparece msg de erro e não cadastra|	falhou|
|CE8|	ate 45 caracter|cadastrar|	ok|
|CE8|  HHHH5555|cadastrar|ok
|CE9| 25A|cadastrar|ok
|CE9| 25|cadastrar|ok
|CE9| hhhhhhh|aparece msg de erro e não cadastra| falhou
|CE9|	$$$$$$###****|	aparece msg de erro e não cadastra|	falhou|
|CE9|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE10| casa 1|cadastrar|ok
|CE10|  A|cadastrar|ok
|CE10| hhhhhhh|cadastrar| ok
|CE10|	$$$$$$###****|	aparece msg de erro e não cadastra|	falhou|
|CE10|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE11|	123456|	aparece msg de erro e não cadastra|	falhou|
|CE11|	ABCD$$$#|	aparece msg de erro e não cadastra|	falhou|
|CE11|	ABCD|	cadastrar|	ok|
|CE11|	$$$$$$###****|	aparece msg de erro e não cadastra|	falhou|
|CE11|	nenhum caracter|	aparece msg de erro e não cadastra|	ok|
|CE11|	mais de 45 caracteres|	aparece msg de erro e não cadastra|	falhou|
|CE11|	ate 45 caracter|cadastrar|	ok|
|CE11|  HHHH5555|cadastrar|ok
|CE12|	somente letras|	não permitir|	ok|
|CE12|	caracteres especiais|	não permitir|	ok|
|CE12|	menor que 8 caracteres|	aparece msg de erro e não cadastra|	falhou|
|CE12|	maior que 8 caracteres|	não permitir|	ok|
|CE12|	dentro do padrão|	cadastrar|	ok|
|CE12|   campo em branco| aparece msg e não cadastra| ok
|CE13| todos os dados de acordo com os requisitos válidos| cadastra|ok
|CE13| algum campo com erro| aparece msg e não cadastra| ok
|CE14| clicar no botão cancelar| ir para tela de listar|ok
|CE15| Clicar no botão excluir| Apresentar modal para confirmação| falhou
|CE16| editar os dados de acordo com os requisitos válidos| cadastrar| falhou
|CE16| algum campo com erro| aparece msg e não cadastra| falhou
|CE17| Clicar botão atualizar| apresentar modal de confirmação| falhou
|CE18|Clicar no botão cancelar de atualização! voltar para tela de listar|falhou
|CE19|Clicar no botão novo cadastro|ir para tela de cadastro|falhou