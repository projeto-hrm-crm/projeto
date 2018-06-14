
<div class="row justify-content-center align-items-center">
   <div class="col-lg-8">
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
             <input type="text" id="nome" name="nome" placeholder="Ex:Processo seletivo Para Gerente" class="form-control" required>
           </div>

           <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Data de Inicio</label>
             <date-util format="yyyy/MM/dd">
               <input type="date" id="data_inicio" name="data_inicio" placeholder="Data de Inicio" class="form-control">
             </date-util>
           </div>

           <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Data de Término</label>
             <date-util format="yyyy/MM/dd">
               <input type="date" id="data_fim" name="data_fim" placeholder="Data de Término" class="form-control">
             </date-util>
           </div>

           <div class="form-group col-12 col-md-6">
            <label class=" form-control-label">Cargo</label>
             <select class="form-control" name="id_cargo">
               <?php foreach ($cargos as $cargo): ?>
                 <option value="<?php echo $cargo->id_cargo ?>"><?php echo $cargo->nome; ?></option>
               <?php endforeach; ?>
             </select>
           </div>

           <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Número de Vagas</label>
             <input type="number" id="vagas" name="vagas" placeholder="Número de Vagas" class="form-control number">
           </div>

           <div class="form-group col-12">
             <label class=" form-control-label">Descrição das Etapas do Processo</label>
             <textarea rows="30" cols="140" placeholder="Descrição do Processo Seletivo" id="descricao" name="descricao" class="form-control" required></textarea>
             <span class="invalid-feedback" id="invalid-descricao">
               Campo obrigatório
             </span>
           </div>

       </div>
    </div>

     <div class="card-footer text-right">
        <a href="<?=site_url('processo_seletivo')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i> Cancelar
          </a>
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Cadastrar
          </button>

        </div>
       </form>
  </div>
</div>
