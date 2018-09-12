<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cadastrar Sugestão</title>
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
                      <form action="<?php echo site_url('Sugestao/create'); ?>" method="POST" id="form_sugestao" class="form-horizontal" novalidate="novalidate">
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
                                  <h4>Sugestões</h4>
                                  Deixei aqui sua sugestão para nosso sistema
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
                                      </div>

                                      <div class="form-group col-12 col-md-12">
                                          <label class=" form-control-label">Sugestão</label>
                                          <textarea id="sugestao" name="sugestao" placeholder="Informe sua sugestão aqui" class="form-control" rows="4"><?php set_value('sugestao');?></textarea>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <a href="<?php echo site_url('login')?>" title="Cadastrar" class="btn btn-danger">
                                      Voltar ao Login
                                  </a>
                                  <button type="submit" title="Cadastrar" class="btn btn-primary">
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
