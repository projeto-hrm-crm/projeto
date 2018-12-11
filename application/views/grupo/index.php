<div class="row justify-content-center align-items-center">
  <div class="col-lg-12">
    <?php if($this->session->flashdata('success')): ?>
      <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('danger')): ?>
      <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
        <?php echo $this->session->flashdata('danger'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>


    <div id="grupos">
      <div class="col-md-2">

      </div>
      <div class="col-md-8">
        <h1 class="p-1 font-2xl mr-1 mb-3 text-center text-secondary"> Grupos de Acesso </h1>
      </div>
      <div class="col-md-2">
        <a href="<?= site_url('grupo/cadastrar')?>" class="mt-3 mr-3 btn btn-primary btn-sm float-right rounded-circle" title="Cadastrar Novo Grupo de Acesso">
          <i class="fa fa-plus"></i>
        </a>
      </div>

      <?php foreach ($grupos as $grupo) : ?>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="clearfix">
                <div class="pt-5 pb-3 text-center col-sm-6">
                  <i class="fa fa-group bg-flat-color-4 p-1 rounded font-2xl float-center text-light"> <?= $grupo->nome ;?></i>
                </div>
                <div class="col-6">
                  <a href="<?= site_url('grupo/editar/').$grupo->id_grupo_acesso?>" class="mt-5 mr-3 btn btn-warning btn-sm float-right rounded-circle" title="Editar Grupo de Acesso">
                    <i class="fa fa-edit"></i>
                  </a>
                </div>
              </div>
              <div class="b-b-1 pt-3"></div>
              <hr>
              <p class="p-1 font-2xl mr-1 mb-3 text-center text-secondary"><?= $grupo->descricao ?></p>

              <hr>
              <?php foreach($permissoes as $permissao) : ?>

              <?php endforeach; ?>

              <hr>
              <h6 class="p-1 font-1xl mr-1 mb-3 text-center text-secondary small"> Usuários no grupo </h6>
              <?php foreach ($usuarios as $usuario) : ?>
                <?php if($usuario->id_grupo == $grupo->id_grupo_acesso) : ?>
                  <?php

                  $image = $usuario->imagem;
                  if($image) {
                    $path_profile_image = base_url()."uploads/profileImage/".$image;
                  }else{
                    $path_profile_image = base_url()."assets/images/theme/no-user.png";
                  }
                  ?>
                  <div class="col-sm-4">
                    <div class="">
                      <a href="#" class="" id="" data-toggle="modal"  data-status="">
                        <img class="user-avatar rounded-circle" src="<?php echo $path_profile_image;?>" alt="User Avatar" title="<?=$usuario->nome;?>">
                      </a>

                    </div>
                    <h6 class="text-center small"><?= $usuario->nome;?></h6>
                  </div>

                <?php endif; ?>

              <?php endforeach; ?>

            </div>

          </div>

        </div>

      <?php endforeach; ?>
    </div>





  </div>
</div>
