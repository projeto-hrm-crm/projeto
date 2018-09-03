<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>Lambda RP - Projeto Integrado 2</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS inline GAMBIARRA TEMPORÁRIA
   ================================================== -->
        <style>
        .header-logo a {  
        background: url("<?php echo base_url();?>assets/images/landing_page/logo.png") no-repeat center;  
        }

        .footer-logo {  
        background: url("<?php echo base_url();?>assets/images/landing_page/logo.png") no-repeat center;  
        }


        #download .download-badges li a.badge-download {
        background-image: url("<?php echo base_url();?>assets/images/landing_page/download-button-large.png");
        }

        #download .download-badges li a.badge-appstore {
        background-image: url("<?php echo base_url();?>assets/images/landing_page/appstore.png");
        }

        #download .download-badges li a.badge-googleplay {
        background-image: url("<?php echo base_url();?>assets/images/landing_page/google-play.png");
        }
        </style>

    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/landing_page/base.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/landing_page/vendor.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/landing_page/main.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>views/landing_page/style.php"/>

    <!-- script
   ================================================== -->
    <script src="<?php echo base_url();?>assets/js/landing_page/modernizr.js"></script>
    <script src="<?php echo base_url();?>assets/js/landing_page/pace.min.js"></script>

    <!-- favicons
	================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header 
   ================================================== -->
   <header id="header" class="row">   

   		<div class="header-sitename">
	        <a href="<?php echo base_url();?>"><h1>Lambda RP</h1></a>
	    </div>

	   	<nav id="header-nav-wrap">
			<ul class="header-main-nav">
				<li class="current"><a class="smoothscroll"  href="#home" title="home">Início</a></li>
                <li><a class="smoothscroll"  href="#sobre" title="sobre">Conheça o Lambda RP</a></li>
				<li><a class="smoothscroll"  href="#acesso" title="acesso">Acesso</a></li>				
				<li><a class="smoothscroll"  href="#download" title="download">Download</a></li>
				<li><a href="https://github.com/projeto-hrm-crm/projeto/tree/master/documentacao" target="_blank" title="documentation">Documentação</a></li>				
			</ul>

            <a href="<?php echo base_url();?>/login" target="_blank" title="sign-up" class="button button-primary cta">Login</a>
		</nav>

		<a class="header-menu-toggle" href="#"><span>Menu</span></a>    	
   	
   </header> <!-- /header -->