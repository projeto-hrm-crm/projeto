<form action="<?php echo site_url('perfil/alterar-senha/'); ?>" method="POST" enctype="multipart/form-data" id="form_perfil">

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
                 <strong>Alterar Senha</strong>
               </div>
               
               
               
               
      <div class="card-body card-block">
         
      <div class="row">

              <div class="form-group col-12 col-md-12">
                <label class=" form-control-label">Digite a nova senha</label>
                <input type="password" id="senha" name="senha" placeholder="Nova Senha" value="" class="form-control" required>
              </div>
         
               <div class="form-group col-12 col-md-12">
                <label class=" form-control-label">Confirme a senha</label>
                <input type="password" id="senha-confirme" name="senha-confirme" placeholder="Insira novamente" value="" class="form-control" required>
              </div>

      </div>
   </div>
       <div class="card-footer text-right">
          <a href="<?= site_url('perfil')?>" class="btn btn-danger  btn-sm" title="Cancelar Edição">
               <i class="fa fa-times"></i> Cancelar
            </a>
            <button title="Atualizar Cadastro" type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#editarPerfil">
               <span class="fa fa-check"></span>
               Atualizar
           </button>

          </div>
         </div>
    
   </div>
</div>
   </div>
    <div class="modal fade" id="editarPerfil" role="dialog" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Atualizar Senha</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   Deseja Realmente Atualizar sua Senha?
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">
                       Cancelar
                   </button>
                   <button  type="submit" class="btn btn-primary btn-edit">
                       Confirmar
                   </button>
               </div>
           </div>
       </div>
     </div>
</form>
