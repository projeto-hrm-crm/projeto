<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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

  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">
  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-form">
          <form action="<?php echo site_url('usuario/cadastrar'); ?>" method="POST" id="form_usuario" class="form-horizontal" novalidate="novalidate">

            <?php if ($this->session->flashdata('errors')): ?>
              <div class="alert alert-danger"><?php echo $this->session->flashdata('errors');?></div>
            <?php endif;?>
            
            <?php if (validation_errors()) : ?>
              <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
            <?php endif;?>

            <div class="card-body card-block">
              <h4>Realizar Cadastro</h4>
              <div class="row">
                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Nome</label>
                  <input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome completo" class="form-control" required>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">E-mail</label>
                  <input type="email" class="form-control" placeholder="E-Mail" name="email">
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Data de Nascimento</label>
                  <input type="date" class="form-control" placeholder="Data de nascimento" name="data">
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Sexo</label><br>
                  <input type="radio" name="sexo" id="sexo_masc" value="0" required /><label class="text-lowercase" for="sexo_masc">Masculino</label>
                  <input type="radio" name="sexo" id="sexo_fem" value="1" required /><label class="text-lowercase" for="sexo_fem" >Feminino</label>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label>CPF</label>
                  <input type="text" id="cpf" name="cpf" value="<?php echo isset($old_data['cpf']) ? $old_data['cpf'] : null;?>" placeholder="XXX.XXX.XXX-XX" class="form-control cpf">
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Telefone</label>
                  <input type="text" class="form-control" placeholder="Telefone" name="telefone">
                </div>

                <div class="form-group col-12 col-md-6">
                  <label>CEP</label>
                  <input size="6" type="text" class="form-control" placeholder="CEP" name="cep">
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Estado</label>
                  <select name="estado" id="estado" class="form-control">
                    <option value="">Selecionar estado</option>
                    <?php foreach($estados as $estado): ?>
                      <option value="<?php echo $estado->id_estado; ?>"><?php echo $estado->nome; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Cidade</label>
                  <select name="cidade" id="cidade" class="form-control">
                    <option value="">Selecionar cidade</option>
                    <?php foreach($cidades as $cidade): ?>
                      <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->nome; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Bairro</label>
                  <input type="text" class="form-control" placeholder="Bairro" name="bairro">
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Endereço</label>
                  <input type="text" class="form-control" placeholder="Logradouro" name="logradouro">
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Número</label>
                  <input type="text" class="form-control" placeholder="Numero" name="numero">
                </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Complemento</label>
                  <input type="text" class="form-control" placeholder="Complemento" name="complemento">
                </div>
              </div>

              <h4>Informações de Acesso</h4>
              <div class="row">
                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Login</label>
                  <input type="text" class="form-control" placeholder="Login de acesso" name="login">
                </div>
              </div>

                <div class="row">
                  <div class="form-group col-12 col-md-6">
                    <label class="text-lowercase">Senha</label>
                    <input type="password" class="form-control" placeholder="Senha de acesso" name="senha">
                  </div>

                <div class="form-group col-12 col-md-6">
                  <label class="text-lowercase">Confirmar Senha</label>
                  <input type="password" class="form-control" placeholder="Confirmar senha" name="senha2">
                </div>
              </div>

              <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Cadastrar</button>

            </div>
          </div>
        </form>



        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
  <script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>
</html>
