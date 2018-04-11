<div class="row justify-content-center">
  <div class="col">
    <form action="#" method="post">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title">Formulário de Cadastro</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="person-form">
                <h2>Dados Pessoais</h2>
                <div class="form-radio">
                  <input class="form-radio-input" type="radio" name="tipo_pessoa" value="pf" id="ck-pf" checked>
                  <label for="ck-pf">Pessoa Fisica</label>
                </div>
                <div class="form-radio">
                  <input class="form-radio-input" type="radio" name="tipo_pessoa" value="pj" id="ck-pj">
                  <label for="ck-pj">Pessoa Juridica</label>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="nome" placeholder="Nome..." pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{3,}" required>
                  <div class="invalid-feedback" id="nome-feedback">
                    Informe um nome válido.
                  </div>
                </div>
                <div class="pf-form">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input class="form-control" type="text" name="cpf" placeholder="CPF...">
                      </div>
                      <div class="invalid-feedback" id="cpf-feedback">
                        Informe um CPF válido.
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Nascimento</label>
                        <input class="form-control" type="date" name="nascimento">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="sl-sex">Sexo</label>
                        <select class="form-control" name="sexo" id="sl-sexo">
                          <option value="0">Masculino</option>
                          <option value="1">Feminino</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pj-form hide">
                  <div class="form-group">
                    <input class="form-control" type="text" name="cnpj" placeholder="CNPJ...">
                  </div>
                </div>
              </div>
              <div class="contact-form">
                <h2>Informações de Contato</h2>
                <div class="form-group">
                  <input class="form-control" type="email" name="email" placeholder="email@exemplo.com">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="telefone" placeholder="Telefone...">
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_user" id="ck-user">
                <label for="ck-user">Criar Conta de Usuário</label>
              </div>
              <div class="user-form hide">
                <h2>Dados de usuário</h2>
                <div class="form-group">
                  <input class="form-control" type="email" name="login" placeholder="email@exemplo.com">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="use-email">
                  <label for="use-email">Usar email de contato</label>
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="senha" placeholder="Senha...">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="senha_confirm" placeholder="Confirmar Senha...">
                </div>
              </div>
              <div class="address-form">
                <h2>Endereço</h2>
                <div class="row">
                  <div class="col-8 align-self-end">
                    <div class="form-group">
                      <input class="form-control" type="text" name="cep" placeholder="CEP...">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="sl-estado">Estado</label>
                      <select class="form-control" name="estado" id="sl-estado">
                        <option value="0">SP</option>
                        <option value="1">RJ</option>
                        <option value="1">MG</option>
                        <option value="1">PR</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="sl-cidade">Cidade</label>
                      <select class="form-control" name="cidade" id="sl-cidade">
                        <option value="0">Caraguatatuba</option>
                        <option value="1">São Sebastião</option>
                        <option value="1">Ubatuba</option>
                        <option value="1">Ilha Bela</option>
                      </select>
                    </div>
                  </div>
                  <div class="col align-self-end">
                    <div class="form-group">
                      <input class="form-control" type="text" name="bairro" placeholder="Bairro...">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="form-group">
                      <input class="form-control" type="text" name="logradouro" placeholder="Logradouro...">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <input class="form-control" type="text" name="numero" placeholder="Número...">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" type="text" name="complemento" placeholder="Complemento...">
                    </div>
                  </div>
                  <div class="col">
                    <button class="btn btn-outline-success" type="submit" name="button" >Finalizar Cadastro</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
