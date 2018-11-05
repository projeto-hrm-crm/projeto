<form action="<?php echo site_url('sac/mensagem/'.$id); ?>" method="POST" id="form-iteracao">
<div class="animated fadeIn">
   <div class="row justify-content-center align-items-center">
      <div class="col-lg-10">
         <div class="card">
            <div class="card-header">
               <strong class="card-title">Responder Mensagem</strong>
            </div>

               <div class="card-body">
                  <div class="row">

                     <div class="col-md-12 form-group">
                        <label class=" form-control-label">Descrição</label>
                        <textarea id="descricao" name="mensagem" class="form-control descricao" placeholder="Escreva aqui sua mensagem" required></textarea>
                     </div>

                  </div>
               </div>

               <div class="card-footer text-right">
                  <a title="Cancelar Atualização" href="<?=site_url('sac')?>" class="btn btn-danger btn-sm">
                     <i class="fa fa-times"></i> Cancelar
                  </a>
                  <button title="Enviar Resposta" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#enviar">
                     <span class="fa fa-check"></span>
                    Enviar
                 </button>
               </div>

         </div>

      </div>
   </div>
</div>
 <div class="modal fade" id="enviar" role="dialog" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Enviar Resposta</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   Deseja realmente cadastrar esta resposta?
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">
                       Cancelar
                   </button>
                   <button  type="submit" class="btn btn-primary btn-remove-ok">
                       Confirmar
                   </button>
               </div>
           </div>
       </div>
   </div>
</form>
