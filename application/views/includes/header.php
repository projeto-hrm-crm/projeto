<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?php echo $title;?></title>
   <meta name="description" content="Projeto de PR1">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="apple-touch-icon" href="apple-icon.png">
   <link rel="shortcut icon" href="favicon.ico">

   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons.css">
   <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flag-icon.min.css"> -->
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cs-skin-elastic.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/lib/datatable/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/calendar/fullcalendar.min.css">

<link rel="stylesheet" media='print' href="<?php echo base_url();?>assets/css/calendar/fullcalendar.print.min.css">


   <link rel="stylesheet" href="<?php echo base_url();?>assets/scss/style.css">
   <script type="text/javascript">
   var BASE_URL = "<?php echo base_url();?>";
   </script>
   <!-- inserção dinâmica de arquivos CSS -->
   <?php if (isset($assets['css'])): ?>
   <?php foreach ($assets['css'] as $css_file): ?>
   <link
   rel="stylesheet"
   href="<?php echo base_url().'assets/css/'.$css_file; ?>"
   >
   <?php endforeach; ?>
   <?php endif; ?>
   <!-- fim da inserção -->
   <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
   <!-- script jquery para incluir máscaras nos inputs -->
</head>
<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="<?php echo base_url().'dashboard';?>"><span title="λ">Lambda</span></a>
      <a class="navbar-brand hidden" href="<?php echo base_url();?>">L</a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav navigation">
        <li class="active">
          <a href="<?php echo base_url().'dashboard';?>"> <i class="menu-icon fa fa-dashboard"></i><span title="Principal">Principal </span></a>
        </li>
        <?php if (isset($menus) && !empty($menus) && count($menus) > 0): ?>
          <?php foreach($menus as $key => $menu): ?>
          <h3 class="menu-title"><?php echo $key;?> </h3><!-- /.menu-title -->
            <?php foreach($menu as $m): ?>
              <li class="menu_atual nome_menu <?php echo $m->sub_modulo ?>">
                <a href="<?php echo base_url()."".$m->link;?>" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon <?php echo $m->icone;?>" title="<?php echo $m->sub_modulo;?>"></i> <?php echo $m->sub_modulo;?></a>

              </li>
            <?php endforeach;?>
          <?php endforeach; ?>

      <?php endif;?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

  <!-- Header-->
  <header id="header" class="header">

    <div class="header-menu">

      <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        <div class="header-left">
          <button class="search-trigger"><i class="fa fa-search"></i></button>
          <div class="form-inline">
            <form class="search-form">
              <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
              <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
            </form>
          </div>

            <div class="dropdown for-notification">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-status="false">
                <i class="fa fa-bell"></i>
                <span class="count bg-danger"></span>
              </button>
              <div class="dropdown-menu notification-div" aria-labelledby="notification">
                <!-- LOADED FROM AJAX -->
              </div>
             </div>

             <div class="dropdown for-contacts">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="contacts" data-status="false">
                 <a href="<?=site_url('contato')?>"/>
                 <span class="fa fa-phone"></span>
               </button>

              </div>
        </div>
      </div>
       <?php

            $cur_name = explode(" ", $this->usuario->getUserNameById($this->session->userdata('user_login'))[0]->nome);
            $data['pessoa'] = $this->usuario->getUserNameById($this->session->userdata('user_login'));
            $id_pessoa = $data['pessoa'][0]->id_pessoa;

           $image = $this->pessoa->findImage($id_pessoa)[0]->imagem;
           if($image) {
              $path_profile_image = base_url()."uploads/profileImage/".$image;
           }else{
              $path_profile_image = base_url()."assets/images/theme/no-user.png";
           }

           ?>
      <div class="col-sm-5">
        <div class="user-area dropdown float-right">
          <a href="#" class="dropdown-toggle" id="user-dropdown" data-toggle="dropdown" data-status="false">
            <img class="user-avatar rounded-circle" src="<?php echo $path_profile_image;?>" alt="User Avatar">
          </a>




          <div class="user-menu dropdown-menu">
            <a class="nav-link" href="#">Olá, <?=$cur_name[0];?></a>
            <a class="nav-link" href="<?php echo base_url();?>perfil"><i class="fa fa-user"></i> Meu Perfil</a>
            <a class="nav-link" href="<?php echo base_url();?>logout"><i class="fa fa-power-off"></i> Logout</a>
          </div>
        </div>

        <div class="language-select dropdown" id="language-select">
          <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
            <i class="flag-icon flag-icon-us"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="language" >
            <div class="dropdown-item">
              <span class="flag-icon flag-icon-fr"></span>
            </div>
            <div class="dropdown-item">
              <i class="flag-icon flag-icon-es"></i>
            </div>
            <div class="dropdown-item">
              <i class="flag-icon flag-icon-us"></i>
            </div>
            <div class="dropdown-item">
              <i class="flag-icon flag-icon-it"></i>
            </div>
          </div>
        </div>

      </div>
    </div>

  </header><!-- /header -->
  <!-- Header-->

  <!-- CONTENT -->
  <!-- <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>Dashboard</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div> -->

<div class="content mt-3">
