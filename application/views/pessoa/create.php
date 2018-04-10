<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>/assets/css/pessoa/style.css">
    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/assets/js/pessoa/main.js" charset="utf-8"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container-fluid">
        <?php 
            if ($this->session->flashdata('erros_pessoa')): 
                $erros   = $this->session->flashdata('erros_pessoa');
                $valores =  $this->session->flashdata('valores_antigos');
            endif;
        ?>
      <div class="row justify-content-center full-height">
        <div class="col-10 col-xm-8">
          <form action="<?php echo base_url('pessoa/salvar'); ?>" method="post">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Cadastrar Pessoa</h1>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="person-form">
                      <h2>Dados Pessoais</h2>
                      <div class="form-radio">
                        <input class="form-radio-input" type="radio" name="tipo-pessoa" value="pf" id="ck-pf" checked>
                        <label for="ck-pf">Pessoa Fisica</label>
                      </div>
                      <div class="form-radio">
                        <input class="form-radio-input" type="radio" name="tipo-pessoa" value="pj" id="ck-pj">
                        <label for="ck-pj">Pessoa Juridica</label>
                      </div>
                      <div class="form-group">
                        <input class="form-control  <?php echo isset($erros['nome']) ? 'is-invalid' : '' ?>" type="text" name="nome" placeholder="Nome..." value="<?php echo isset($valores['nome']) ? $valores['nome'] : '' ?>">
                        <span class="invalid-feedback">
                            <?php echo isset($erros['nome']) ? $erros['nome'] : '' ?>
                        </span>
                      </div>
                      <div class="pf-form">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <input class="form-control <?php echo isset($erros['cpf']) ? 'is-invalid' : '' ?>" type="text" name="cpf" placeholder="CPF...">
                              <span class="invalid-feedback">
                                <?php echo isset($erros['cpf']) ? $erros['cpf'] : '' ?>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nascimento</label>
                              <input class="form-control" type="date" name="birth">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="sl-sex">Sexo</label>
                              <select class="form-control" name="sex" id="sl-sex">
                                <option value="0">Masculino</option>
                                <option value="1">Feminino</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="pj-form hide">
                        <div class="form-group">
                          <input class="form-control <?php echo isset($erros['cnpj']) ? 'is-invalid' : '' ?>" type="text" name="cnpj" placeholder="CNPJ...">
                          <span class="invalid-feedback">
                            <?php echo isset($erros['cnpj']) ? $erros['cnpj'] : '' ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="contact-form">
                      <h2>Informações de Contato</h2>
                      <div class="form-group">
                        <input class="form-control <?php echo isset($erros['email']) ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="email@exemplo.com" value="<?php echo isset($valores['email']) ? $valores['email'] : '' ?>">
                        <span class="invalid-feedback">
                            <?php echo isset($erros['email']) ? $erros['email'] : '' ?>
                        </span>
                      </div>
                      <div class="form-group">
                        <input class="form-control <?php echo isset($erros['tel']) ? 'is-invalid' : '' ?>" type="text" name="tel" placeholder="Telefone..." value="<?php echo isset($valores['tel']) ? $valores['tel'] : '' ?>">
                        <span class="invalid-feedback">
                            <?php echo isset($erros['tel']) ? $erros['tel'] : '' ?>
                        </span>
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
                        <label for="ck-user">Usar email de contato</label>
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Senha...">
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="password" name="password_confirm" placeholder="Confirmar Senha...">
                      </div>
                    </div>
                    <div class="address-form">
                      <h2>Endereço</h2>
                      <div class="row">
                        <div class="col-8">
                          <div class="form-group">
                            <input class="form-control <?php echo isset($erros['cep']) ? 'is-invalid' : '' ?>" type="text" name="cep" placeholder="CEP..." value="<?php echo isset($valores['cep']) ? $valores['cep'] : '' ?>">
                            <span class="invalid-feedback">
                                <?php echo isset($erros['cep']) ? $erros['cep'] : '' ?>
                            </span>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <input class="form-control <?php echo isset($erros['estado']) ? 'is-invalid' : '' ?>" type="text" name="estado" placeholder="Estado..." value="<?php echo isset($valores['estado']) ? $valores['estado'] : '' ?>">
                            <span class="invalid-feedback">
                                <?php echo isset($erros['estado']) ? $erros['estado'] : '' ?>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <input class="form-control <?php echo isset($erros['cidade']) ? 'is-invalid' : '' ?>" type="text" name="cidade" placeholder="Cidade..." value="<?php echo isset($valores['cidade']) ? $valores['cidade'] : '' ?>">
                            <span class="invalid-feedback">
                                <?php echo isset($erros['cidade']) ? $erros['cidade'] : '' ?>
                            </span>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <input class="form-control <?php echo isset($erros['bairro']) ? 'is-invalid' : '' ?>" type="text" name="bairro" placeholder="Bairro..." value="<?php echo isset($valores['bairro']) ? $valores['bairro'] : '' ?>">
                            <span class="invalid-feedback">
                                <?php echo isset($erros['bairro']) ? $erros['bairro'] : '' ?>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <div class="form-group">
                            <input class="form-control <?php echo isset($erros['logradouro']) ? 'is-invalid' : '' ?>" type="text" name="logradouro" placeholder="Logradouro..." value="<?php echo isset($valores['logradouro']) ? $valores['logradouro'] : '' ?>">
                            <span class="invalid-feedback">
                                <?php echo isset($erros['logradouro']) ? $erros['logradouro'] : '' ?>
                            </span>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <input class="form-control <?php echo isset($erros['numero']) ? 'is-invalid' : '' ?>" type="text" name="numero" placeholder="Número..." value="<?php echo isset($valores['numero']) ? $valores['numero'] : '' ?>">
                            <span class="invalid-feedback">
                                <?php echo isset($erros['numero']) ? $erros['numero'] : '' ?>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" name="complemento" placeholder="Complemento..." value="<?php echo isset($valores['complemento']) ? $valores['complemento'] : '' ?>">
                      </div>
                      <button type="">Salvar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
