
<div class="row justify-content-center align-items-center">
   <div class="col-lg-10">
  <div class="card">
    <div class="card-header">
      <strong>Informação do Processo Seletivo <?php echo($info[0]->codigo) ?></strong>
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
     <form action="<?php echo site_url('processo_seletivo/info/'.$info[0]->id_processo_seletivo); ?>" method="POST" id="form_processo_seletivo" >
       <div class="card-body card-block">

        <div class="row">

          <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Nome</label>
             <input type="text" id="nome" name="nome" class="form-control" value="<?php echo($info[0]->nome); ?>" required>
           </div>


           <!-- Aqui vai um //FIXME
           <?php foreach ($etapas as $etapa): ?>
           <div class="form-group col-12">
             <label class=" form-control-label">Descrição da Etapa [<?php $etapa->nome ?>]</label>
             <textarea auto-resize id="descricao_etapa" name="descricao_etapa" class="form-control" required><?php print_r($etapa->descricao); ?></textarea>
             <span class="invalid-feedback" id="invalid-descricao">
               Campo obrigatório
             </span>
           </div>
           <?php endforeach; ?>
          -->


           <div class="form-group col-12">
             <label class=" form-control-label">Descrição das Etapas do Processo</label>
             <textarea auto-resize id="descricao" name="descricao" class="form-control" required><?php print_r($info[0]->descricao); ?></textarea>
             <span class="invalid-feedback" id="invalid-descricao">
               Campo obrigatório
             </span>
           </div>

       </div>
    </div>

     <div class="card-footer text-right">
        <a title="Cancelar Edição" href="<?=site_url('processo_seletivo')?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Cancelar</a>
        <button title="Atualizar Informação" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Atualizar</button>

        </div>
       </form>
  </div>
</div>
