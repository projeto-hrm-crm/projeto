<form action="<?php echo site_url('perfil/enviar-curriculum/'; ?>" method="POST" id="form_perfil" enctype="multipart/form-data">
   <div class="animated fadeIn">      
      <div class="row justify-content-center align-items-center">
         <div class="col-lg-6">
            <div class="row" style="margin-top: 5px;">
               <div class="col-md-12">
                  <?php if ($this->session->flashdata('success')) : ?>
                  <div class="alert alert-success">
                     <p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
                  </div>
                  <?php elseif ($this->session->flashdata('danger')) : ?>
                  <div class="alert alert-danger">
                     <p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <strong>Cadastrar Curriculum</strong>
               </div>               
               <div class="card-body card-block">
                  <div class="row">
                     <div class="form-group col-12 col-md-12">
                        <input type="file" name="curriculum">
                     </div>
                  </div>
               </div>               
               <div class="card-footer text-right">
                  <a href="<?= site_url('perfil')?>" class="btn btn-danger  btn-sm" title="Cancelar Edição">
                     <i class="fa fa-times"></i> Cancelar
                  </a>
                  <button  type="submit" class="btn btn-primary  btn-sm">
                     <i class="fa fa-check"></i> Enviar Curriculum
                  </button>
               </div>
            </div>   
         </div>
      </div>      
   </div>
</form>
