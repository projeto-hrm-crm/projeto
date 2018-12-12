<div class="animated fadeIn">
   <div class="row justify-content-center align-items-center">
      <div class="col-lg-10">
         <div class="card">
            <div class="card-header">
               <strong class="card-title">Cadastrar Remanejamento</strong>
            </div>
            <form action="<?php echo site_url('remanejamento/cadastrar'); ?>" method="POST" id="form_remanejamento">
               <div class="card-body">
                   <?php if(sizeof($funcionarios) <= 0): ?>
                       <div class="row justify-content-center align-items-center">
                           <div class="col-12">
                               <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                   Não existe nenhum funcionario cadastrado no sistema, favor cadastre um funcionario!
                               </div>
                               <a title="Novo funcionario" href="<?= site_url('funcionario/cadastrar')?>" class="btn btn-primary btn-sm float-right">
                                   <i class="fa fa-check"></i>
                                   Novo funcionario
                               </a>
                           </div>
                       </div>
                   <?php elseif(sizeof($cargos) <= 0): ?>
                       <div class="row justify-content-center align-items-center">
                           <div class="col-12">
                               <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                   Não existe nenhum cargo cadastrado no sistema, favor cadastre um cargo!
                               </div>
                               <a title="Novo cargo" href="<?= site_url('cargo/cadastrar')?>" class="btn btn-primary btn-sm float-right">
                                   <i class="fa fa-check"></i>
                                   Novo Cargo
                               </a>
                           </div>
                       </div>
                   <?php else: ?>
                  <div class="row">
                    <div class="col-lg-12 form-group">
                        <label class="form-control-label">Funcionário</label>
                        <select name="id_funcionario" class="form-control" id="funcionario">
                           <option value="0" disabled selected>Selecione um funcionario</option>
                           <?php foreach ($funcionarios as $funcionario): ?>
                              <option value="<?php echo $funcionario->id_funcionario ?>"><?php echo $funcionario->nome; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>

                     <div class="form-group col-md-12 col-sm-12">
                        <label for="id_cargo" class="form-control-label">Cargo</label>
                        <select name="id_cargo" class="form-control" id="cargo">
                           <option value="0" disabled selected>Selecione cargo</option>
                           <?php foreach ($cargos as $cargo): ?>
                              <option value="<?php echo $cargo->id_cargo ?>"><?php echo $cargo->nome; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>

                     <div class="form-group col-md-12 col-sm-12">
                        <label for="id_setor" class="form-control-label">Setor</label>
                        <select name="id_setor" class="form-control" id="setor">
                           <option value="0" disabled selected>Selecione setor</option>
                           <?php foreach ($setores as $setor): ?>
                              <option value="<?php echo $setor->id_setor ?>"><?php echo $setor->nome; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="card-footer text-right">
                  <a title="Cancelar Cadastro" href="<?=site_url('remanejamento')?>" class="btn btn-danger btn-sm">
                     <i class="fa fa-times"></i> Cancelar
                  </a>
                  <button title="Cadastrar SAC" type="submit" class="btn btn-primary btn-sm">
                     <i class="fa fa-plus"></i> Cadastrar
                  </button>

               </div>
           <?php endif; ?>
            </form>
         </div>

      </div>
   </div>
</div>
