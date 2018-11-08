<div class="row justify-content-center align-items-center">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <strong>Info do Processo Seletivo <?php echo($info[0]->codigo) ?></strong>
      </div>
      <div class="card-body card-block">

        <div class="row">
          <div class="form-group col-12 col-md-6">
            <h4>Nome</h4><span><?php echo($cargos[0]->nome); ?></span>
          </div>
          <div class="form-group col-12 col-md-6">
            <h4>Email</h4><span><?php echo($cargos[0]->email); ?></span>
          </div>
          <div class="form-group col-12 col-md-6">
            <h4>Data de Criação</h4><span><?php echo($cargos[0]->criacao); ?></span>
          </div>
          
        </div>
        <hr>
        <strong>Cargos</strong>
        <hr>

          <?php foreach ($cargos as $cargo): ?>
            <div class="row">
            <div class="form-group col-12 col-md-6">
              <h4>Nome</h4><span><?php echo($cargo->nome); ?></span>
            </div>
            <div class="form-group col-12 col-md-6">
              <h4>Inscritos</h4><span><?php echo(count($cargo->candidatos)); ?></span>
            </div>
            <div class="form-group col-12 col-md-12">
              <h4>Descrição</h4><span><?php echo($cargo->descricao); ?></span>
            </div>
          </div>
            <hr>

          <?php endforeach; ?>

		<a>
          <a title="Voltar a todos os processos seletivos"  href="<?=site_url('processo_seletivo')?>" class="btn btn-primary btn-sm">
            VOLTAR PARA VISUALIZAÇÃO DE TODOS OS PROCESSOS SELETIVOS
          </a>
		</a>
		  
      </div>

    </div>
  </div>
</div>
</div>
