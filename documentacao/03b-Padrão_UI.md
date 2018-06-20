# Padrões
## UI (interface do usuário)

-	Todo botão de deletar e editar precisa necessariamente de uma confirmação antes da ação (modal). Ao clicar no botão de deletar, ele normalmente iria para uma página para deletar e após a exclusão do dado ele voltaria para a página de listagem; esse passo irá acontecer, porém, antes da requisição de exclusão ser completada, um modal precisa aparecer interrompendo o comportamento padrão da requisição (event.preventDefault). Se o usuário clicar em *sim*, ele prossegue com a requisição, caso ele clique em *cancelar* não faz nada, mata completamente a requisição. Em ambos os casos, o usuário continua na tela de listagem.

-	Divs col-lg-10 (sistema grid -- padrão Bootstrap) e centralizadas.

-	Css e JS customizados precisam ser inseridos no script do header. Para evitar carregamento de JS e CSS desnecessário à outras páginas adotou-se o padrão de carregar eles só quando necessário e direto pelo controller, já existe alguns controllers que fazem isso. Caso tenham algum arquivo JS e/ou CSS que só seja necessário em sua página adicione-o no array de assets.

### Listas

- Título da lista deve ser o título referente à página.

- Devem ser exibidos no máximo 10 resultados por página (a não ser que o usuário escolha opção diferente).

- Botão de "Novo Cadastro" azul com ícone e letras brancos no canto superior esquerdo da lista (dentro do "card-body").
  - Bootstrap: class="btn btn-primary btn-sm"
  - Fontawesome: class="fa fa-check"

- Barra de pesquisa no lado direito superior da lista.

- Classe Bootstrap para a tabela de listagem: "table table-striped table-bordered datatable".

### Formulários
-	Formulário com col-10 e os inputs precisam ter colunas diferentes para cada tela.  Quando temos uma tela de notebook/computador os botões não devem ficar um embaixo do outro (col-12), eles precisam, no mínimo, ficar um ao lado do outro (no mínimo col-6), apenas em telas menores os campos devem ocupar todo o tamanho da div.

- Botão cancelar à esquerda de confirmar, ambos alinhados à direita.
  - Cancelar: Bootstrap -- class="btn btn-danger btn-sm"; Fontawesome -- class="fa fa-times"
  - Confirmar: Bootstrap -- class="btn btn-primary btn-sm"; Fontawesome --  class="fa fa-plus"

```html
</div>
<div class="card-footer text-right">
    <a title="Cancelar Cadastro" href="<?=site_url('candidato')?>" class="btn btn-danger btn-sm">
        <i class="fa fa-times"></i>
        Cancelar
    </a>
    <button title="Cadastrar Candidato" type="submit" class="btn btn-primary btn-sm" name="cadastrar">
        <i class="fa fa-plus"></i>
        Cadastrar
    </button>
</div>
```

- Formulário de edição deve conter o título "Atualizar *nome do formulário*". Ex.: Atualizar Candidato.

- Formulário de cadastro deve conter o título "Cadastrar *nome do formulário*". Ex.: Cadastrar Candidato.

- Colocar informação em todo *placeholder* de tipo texto.

```html
<div class="form-group col-12 col-md-6">
    <label class=" form-control-label">Nome</label>
    <input type="text" id="nome"placeholder="Nome completo" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" class="form-control" required>
</div>
```

### Botões
-	Cores dos botões (Bootstrap):
  - Botão de excluir (bg-danger) vermelho
  - Botão de cadastrar (bg-primary) azul
  - Botão de editar(bg-primary) azul


- Ícones dos botões (Fontawesome):
  -	Botão de cadastro: https://fontawesome.com/v4.7.0/icon/plus/
  - Botão de exclusão: https://fontawesome.com/v4.7.0/icon/times/
  - Botão de edição: https://fontawesome.com/v4.7.0/icon/pencil-square-o/
  -	A cor dos ícones deve ser branca.
  

-	Botão de cancelar à esquerda e botão de cadastrar à direita em *todos os formulários*.

- Todos os botões de ação devem conter _title_.
```html
  <input type="submit" title="Excluir informação">
```
  ou
```html
  <button title="Editar informação">
```
