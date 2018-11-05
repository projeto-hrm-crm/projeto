<div class="animated fadeIn">
   <div class="row">
      <div class="col-md-12">
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
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-3">
                     <a href="<?=site_url('perfil/alterar-imagem/')?>" alt="Alterar Imagem" title="Alterar Imagem">
                        <img width="100%" src="<?=$imagem;?>">
                     </a>
                  </div>
                  <div class="col-lg-9">
                     <h1><?=$pessoa[0]->nome;?></h1>                      
                     <p>
                        <?=$endereco[0]->cidade;?> -  <?=$endereco[0]->estado;?>, Brasil
                        <?php
                           if(!empty($curriculum)) {
                        ?> 
                         &nbsp;&nbsp;- &nbsp;
                        <a href="<?=$curriculum;?>" download><i class="fa fa-file-o"></i> Meu Curriculum</a>
                        <?php } ?>
                        
                        
                        <br>
                        <?=$pessoa[0]->email;?>
                     </p> 
                     <br>
                     <a href="<?=site_url('perfil/editar/')?>" class="btn btn-primary btn-sm">Dados Cadastrais</a>&nbsp;&nbsp;
                     <a href="<?=site_url('perfil/alterar-senha/')?>" class="btn btn-primary btn-sm">Alterar Senha</a>&nbsp;&nbsp;
                     
                     <?php
                        if($tipoUsuario=="5") {
                     ?>                     
                     <a href="<?=site_url('perfil/enviar-curriculum/')?>" class="btn btn-primary btn-sm">Enviar Curriculum</a>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-12">
                     <h1>Minhas Habilidades</h1>
                     <a href="<?=site_url('perfil/editar/')?>" class="btn btn-primary btn-sm">Adicionar Habilidade</a>
                  </div>                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>