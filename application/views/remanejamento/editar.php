<form action="<?php echo site_url('remanejamento/editar/'.$id); ?>" method="POST" id="form-remanejamento">
<div class="animated fadeIn">
   <div class="row justify-content-center align-items-center">
      <div class="col-lg-10">
         <div class="card">
            <div class="card-header">
               <strong class="card-title">Atualizar remanejamento</strong>
            </div>
               <div class="card-body">
                  <div class="row">
                    
                     <div class="col-lg-12 form-group">
                        <label class="form-control-label">funcionarios</label>
                        <select name="id_funcionario" class="form-control" id="funcionario">
                           <option value="0" disabled selected>Selecione um funcionario</option>
                           <?php foreach ($funcionarios as $funcionario): ?>
                              <option value="<?php echo $funcionario->id_funcionario ?>" <?php if($remanejamento[0]->id_funcionario == $funcionario->id_funcionario){echo "selected";} ?>><?php echo $funcionario->nome; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class="col-lg-12 form-group">
                        <label class="form-control-label">cargos</label>
                        <select name="id_cargo" class="form-control" id="cargo">
                           <option value="0" disabled selected>Selecione um cargo</option>
                           <?php foreach ($cargos as $cargo): ?>
                              <option value="<?php echo $cargo->id_cargo ?>" <?php if($remanejamento[0]->id_cargo == $cargo->id_cargo){echo "selected";} ?>><?php echo $cargo->nome; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class="col-lg-12 form-group">
                        <label class="form-control-label">setores</label>
                        <select name="id_setor" class="form-control" id="setor">
                           <option value="0" disabled selected>Selecione um setor</option>
                           <?php foreach ($setores as $setor): ?>
                              <option value="<?php echo $setor->id_setor ?>" <?php if($remanejamento[0]->id_setor == $setor->id_setor){echo "selected";} ?>><?php echo $setor->nome; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                    
                  </div>
               </div>

               <div class="card-footer text-right">
                  <a title="Cancelar Atualização" href="<?= site_url('remanejamento')?>" class="btn btn-danger btn-sm">
                     <i class="fa fa-times"></i> Cancelar
                  </a>
                  <button title="Atualizar remanejamento" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar">
                     <span class="fa fa-check"></span>
                    Atualizar
                 </button>
               </div>

         </div>

      </div>
   </div>
</div>
 <div class="modal fade" id="editar" role="dialog" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Atualizar remanejamento</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   Deseja realmente atualizar esse remanejamento?
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
