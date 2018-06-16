<div class="row justify-content-center align-items-center">
   <div class="col-lg-10">
  <div class="card">
    <div class="card-header">
      <strong>Cadastrar Processo Seletivo</strong>
    </div>
    <?php echo validation_errors(); ?>
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
     <form action="<?php echo site_url('processo_seletivo/cadastrar'); ?>" method="POST" id="form_processo_seletivo" >
       <div class="card-body card-block">

        <div class="row">

          <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Codigo</label>
             <input type="text" id="codigo" name="codigo" placeholder="Codigo do Processo" class="form-control" required>
           </div>

          <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Nome</label>
             <input type="text" id="nome" name="nome" placeholder="Ex: Processo Seletivo Para Gerente" class="form-control" required>
           </div>

           <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Data de Inicio</label>
                 <input type="text" id="data_inicio" name="data_inicio" placeholder="Data de Inicio" class="form-control data">
             </div>

           <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Data de Término</label>
                 <input type="text" id="data_fim" name="data_fim" placeholder="Data de Término" class="form-control data">
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
             <textarea auto-resize placeholder="Descrição do Processo Seletivo" id="descricao" name="descricao" class="form-control" required></textarea>
             <span class="invalid-feedback" id="invalid-descricao">
               Campo obrigatório
             </span>
           </div>

						 <div class="form-group col-12">
							 <div id="newlink">
  							 <!-- <label class=" form-control-label">Etapas</label>
                 <div class="form-group col-12 cloned-main" id="template1" hidden>
                   <div class="cloned-div">
                     <input type="text" name="nome_etapa[]" placeholder="Nome da Etapa" class="form-control" required hidden>
                     <textarea auto-resize placeholder="Descrição da Etapa"  name="descricao_etapa[]" class="form-control" required hidden></textarea>
                     <a  name="button" class="btn btn-danger btn-sm remDiv" >Excluir</a><br><br>
                   </div> -->
                 <!-- </div> -->
  						 </div>
					   </div>

       </div>
       <a title="Adicionar Nova Etapa" id="addnew" class="btn btn-primary text-white btn-sm addDiv">
        <i class="fa fa-check"></i> Adicionar Etapa </a>
    </div>

     <div class="card-footer text-right">
        <a title="Cancelar Cadastro" href="<?=site_url('processo_seletivo')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i> Cancelar
          </a>
          <button title="Cadastrar Processo" type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Cadastrar
          </button>

        </div>
       </form>
  </div>
</div>

<!-- Template -->
