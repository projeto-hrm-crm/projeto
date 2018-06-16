<!-- <pre>
<?php print_r($processo_seletivo);
print_r($etapas);
?> -->
<!-- </pre> -->
<div class="row justify-content-center align-items-center">
 <div class="col-lg-10">
<div class="card">
  <div class="card-header">
    <strong>Atualizar Processo Seletivo <?php echo($processo_seletivo[0]->codigo) ?></strong>
  </div>
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
   <form action="<?php echo site_url('processo_seletivo/editar/'.$processo_seletivo[0]->id_processo_seletivo); ?>" method="POST" id="form_processo_seletivo" >
     <div class="card-body card-block">

      <div class="row">

        <div class="form-group col-12 col-md-6">
           <label class=" form-control-label">Codigo</label>
           <input type="text" id="codigo" name="codigo" placeholder="Codigo do Processo" class="form-control" value="<?php echo($processo_seletivo[0]->codigo); ?>" required>
         </div>

        <div class="form-group col-12 col-md-6">
           <label class=" form-control-label">Nome</label>
           <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" value="<?php echo($processo_seletivo[0]->nome); ?>" required>
         </div>

         <div class="form-group col-12 col-md-6">
           <label class=" form-control-label">Data de Inicio</label>
           <input type="text" id="data_inicio" name="data_inicio" placeholder="Data de Inicio" class="form-control data" value="<?php echo($processo_seletivo[0]->data_inicio); ?>">
         </div>

         <div class="form-group col-12 col-md-6">
           <label class=" form-control-label">Data de Término</label>
           <input type="text" id="data_fim" name="data_fim" placeholder="Data de Término" class="form-control data" value="<?php echo($processo_seletivo[0]->data_fim); ?>">
         </div>

         <div class="form-group col-12">
          <label class=" form-control-label">Vaga</label>
           <select class="form-control" name="id_vaga">
             <?php foreach ($vagas as $vaga): ?>
               <option value="<?php echo $vaga->id_vaga ?>"><?php echo $vaga->cargo; ?></option>
             <?php endforeach; ?>
           </select>
         </div>

         <div class="form-group col-12">
           <label class=" form-control-label">Descrição do Processo</label>
           <textarea auto-resize placeholder="Descrição do Processo Seletivo" id="descricao" name="descricao" class="form-control" required><?php echo($processo_seletivo[0]->descricao); ?></textarea>
           <span class="invalid-feedback" id="invalid-descricao">
             Campo obrigatório
           </span>
         </div>

         <?php foreach ($etapas as $etapa): ?>
           <div class="form-group col-12">
             <label class=" form-control-label">Descrição da Etapa</label>
             <input type="number" name="id_etapa[]" value="<?php echo $etapa->id_etapa ?>" readonly>
             <textarea auto-resize name="descricao_etapa[]" class="form-control" required><?php print_r($etapa->descricao); ?></textarea>
             <span class="invalid-feedback" id="invalid-descricao">
               Campo obrigatório
             </span>
           </div>
         <?php endforeach; ?>


     </div>
  </div>

   <div class="card-footer text-right">
      <a title="Cancelar Atualização" href="<?=site_url('processo_seletivo')?>" class="btn btn-danger btn-sm">
          <i class="fa fa-times"></i> Cancelar
        </a>
        <button title="Atualizar Processo" type="button" class="btn btn-primary text-white btn-sm" data-toggle="modal" data-target="#editarProcesso">>
          <i class="fa fa-check"></i> Editar
        </button>

      </div><!-- FIM BOTÕES -->

       <!-- MODAL -->
       <div class="modal fade" id="editarProcesso" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Atualizar Processo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                Deseja Atualizar Esse Processo?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm text-white" data-dismiss="modal">
                  Cancelar
                </button>
                <button type="submit" class="btn btn-primary  btn-sm">
                  Atualizar
                </button>
              </div>
            </div>
          </div>
        </div>


    </form>
  </div>
</div>
</div>
