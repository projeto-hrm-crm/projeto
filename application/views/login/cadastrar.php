<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cadastrar</title>
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cs-skin-elastic.css">
  <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/scss/style.css">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <script type="text/javascript">
      var BASE_URL = "<?php echo base_url();?>";
  </script>
  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-10">
                    <!-- <div style="max-width: 950px; margin: 8vh auto;"> -->
                    <!-- <div class="login-form"> -->
                    <div style="color:#878787">
                      <form action="<?php echo site_url('Usuario/create'); ?>" method="POST" id="form_cliente" class="form-horizontal" novalidate="novalidate">
                          <?php if ($this->session->flashdata('errors')): ?>
                              <div class="alert alert-danger"><?php echo $this->session->flashdata('errors');?></div>
                          <?php endif;?>
                          <?php if (validation_errors()) : ?>
                              <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                          <?php endif;?>
                          <?php if ($this->session->flashdata('success')): ?>
                              <div class="alert alert-success mt-4">
                                  <?php echo $this->session->flashdata('success'); ?>
                              </div>
                          <?php endif; ?>
                          <div class="card mt-4">
                              <div class="card-header text-center">
                                  <h4>Realizar Cadastro</h4>
                              </div>
                              <div class="card-body card-block">
                                  <div class="row">
                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Nome</label>
                                          <input type="text" id="nome" name="nome" value = "<?php set_value('nome');?>" placeholder="Nome completo" class="form-control" required>
                                      </div>

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">E-mail</label>
                                          <input type="text" id="email" name="email" value="<?php set_value('email');?>"  placeholder="email@provedor.com" class="form-control" >
                                      </div> <!-- FIM EMAIL -->
                                      <div class="form-group col-12 col-md-6">
                                          <label class="form-control-label">Senha</label>
                                          <input id="senha" value="<?php set_value('senha');?>" name="senha" type="password" placeholder="Senha" class="form-control" required>
                                      </div>

                                      <div class="form-group col-12 col-md-6">
                                          <label class="form-control-label">Confirmar Senha</label>
                                          <input id="senha2" value="<?php set_value('senha2');?>" name="senha2" type="password" placeholder="Repetir senha" class="form-control" required>
                                      </div>

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Data de Nascimento</label>
                                          <input type="text" id="data_nacimento" name="data_nacimento" value="<?php set_value('data_nascimento')?>"  placeholder="00/00/0000" class="form-control data">
                                      </div> <!-- FIM DATA DE NASCIMENTO -->

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Sexo</label><br>
                                          <input type="radio" name="sexo" id="sexo_masc" value="0" required /><label for="sexo_masc">Masculino</label>
                                          <input type="radio" name="sexo" id="sexo_fem" value="1" required /><label for="sexo_fem" >Feminino</label>
                                      </div> <!-- FIM SEXO -->

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">CPF</label>
                                          <input type="text" id="cpf" name="cpf" value="<?php set_value('cpf');?>" placeholder="000.000.000-00" class="form-control cpf">
                                      </div> <!-- FIM CPF -->

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Tipo de usuário</label><br>
                                          <input type="radio" name="tipo_us" id="tipo_us_cli" value="4" required /><label for="tipo_us_cli">Cliente</label>
                                          <input type="radio" name="tipo_us"  value="5" id="tipo_us_cand" required /><label for="tipo_us_cand" >Candidato</label>
                                      </div> <!-- FIM SEXO -->

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Telefone</label>
                                          <input type="text" id="tel" name="tel"  value="<?php set_value('tel');?>" placeholder="(00)00000-0000" class="form-control alter_mask" >
                                      </div> <!-- FIM TELEFONE -->
                                      <!-- INÍCIO ENDEREÇO -->
                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">CEP</label>
                                          <input type="cep" id="cep" name="cep" value="<?php set_value('cep');?>"  placeholder="00000-000" class="form-control cep" required>
                                      </div> <!-- FIM CEP -->

                                      <div class="form-group col-12 col-md-6">
                                          <label for="estado">Estado</label>
                                          <input type="text" name="estado" id="estado" placeholder="Estado" class="form-control">
                                      </div>

                                      <div class="form-group col-12 col-md-6">
                                          <label for="cidade">Cidade</label>
                                          <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="form-control">
                                      </div>
                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Bairro</label>
                                          <input type="bairro" id="bairro" name="bairro" value="<?php set_value('bairro');?>"  placeholder="Bairro" class="form-control" required>
                                      </div> <!-- FIM BAIRRO -->

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Endereço</label>
                                          <input type="logradouro" id="logradouro" name="logradouro"  value="<?php set_value('logradouro');?>"  placeholder="Nome da rua/av./praça/alameda" class="form-control" required>
                                      </div> <!-- FIM ENDEREÇO -->

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Número</label>
                                          <input type="numero" id="numero" name="numero" value="<?php set_value('numero');?>"  placeholder="Número da residência" class="form-control" required>
                                      </div> <!-- FIM NÚMERO -->

                                      <div class="form-group col-12 col-md-6">
                                          <label class=" form-control-label">Complemento</label>
                                          <input type="complemento" id="complemento" name="complemento" value="<?php set_value('complemento');?>" placeholder="Complemento" class="form-control">
                                      </div> <!-- FIM COMPLEMENTO -->
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <a href="<?php echo site_url('login')?>" title="Cadastrar" class="btn btn-danger">
                                      <i class="fa fa-close"></i>
                                      Cancelar
                                  </a>
                                  <button type="submit" title="Cadastrar" class="btn btn-success">
                                      <i class="fa fa-plus"></i>
                                      Cadastrar
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <script src="<?php echo base_url();?>assets/js/mask.js"></script>
    <script src="<?php echo base_url();?>assets/js/validate.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.mask.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/estado_cidade.js"></script>
    <script src="<?php echo base_url();?>assets/js/thirdy_party/apicep.js"></script>
    </body>
</html>
