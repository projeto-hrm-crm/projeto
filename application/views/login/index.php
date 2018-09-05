<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
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
      <div class="login-content margin30">

        <?php if ($this->session->flashdata('success')): ?>
         <div class="alert alert-success mt-4">
           <?php echo $this->session->flashdata('success'); ?>
         </div>
        <?php endif; ?>
        <form method="post">
        <?php if ($this->session->flashdata('login_error')): ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('login_error');?></div>
        <?php endif;?>
        <?php if (validation_errors()) : ?>
          <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
        <?php endif;?>        
            <div class="login-form">
                <div class="form-group">
                  <label class="text-lowercase">E-mail</label>
                  <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <label class="text-lowercase">Senha</label>
                  <input type="password" class="form-control" placeholder="Password" name="senha">
                </div>
                <div class="checkbox">
                  <label class="pull-right">
                    <a href="#">Esqueceu a senha?</a>
                  </label>
                </div>
                <button type="submit" title="Entrar" class="btn btn-success btn-flat m-b-30 m-t-30">Entrar</button>
                <div class="text-success m-t-15 text-center">
                  <p>Ainda não está cadastrado? <a href="<?php echo base_url();?>cadastro"> Cadastre-se aqui</a></p>
                </div>
            </div>
          </form>
          
          
          
      </div>
    <center>
        <a href="<?php echo site_url('sugestao/cadastrar')?>">Deixe sua sugestão aqui!</a>
    </center>
    </div>
  </div>
  <script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
  <script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>
</html>
