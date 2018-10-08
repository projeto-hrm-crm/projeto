<div class="row justify-content-center align-items-center">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <strong>Info do Processo Seletivo <?php echo($info[0]->codigo) ?></strong>
      </div>
      <div class="card-body card-block">

        <div class="row">
          <div class="form-group col-12 col-md-6">
            <h4>Nome</h4><span><?php echo($info[0]->nome); ?></span>
          </div>
          <div class="form-group col-12 col-md-6">
            <h4>Nome</h4><span><?php echo($info[0]->nome); ?></span>
          </div>
          <div class="form-group col-12 col-md-6">
            <h4>Data de Abertura</h4><span><?php echo($info[0]->data_inicio); ?></span>
          </div>
          <div class="form-group col-12 col-md-6">
            <h4>Data de Encerramento</h4><span><?php echo($info[0]->data_fim); ?></span>
          </div>
          <div class="form-group col-12 col-md-12">
            <h4>Descrição do Processo</h4><span><?php echo($info[0]->descricao); ?></span>
          </div>
        </div>
        <hr>
        <strong>Vaga</strong>
        <hr>
        <div class="row">

          <div class="form-group col-12 col-md-6">
            <h4>Cargo</h4><span><?php echo($vaga->cargo); ?></span>
          </div>
         
          <div class="form-group col-12 col-md-6">
            <h4>Quantidade de Vagas</h4><span><?php echo($vaga->quantidade); ?></span>
          </div>
        </div>
        <hr>
        <strong>Etapas</strong>
        <hr>

          <?php foreach ($etapas as $etapa): ?>
            <div class="row">
            <div class="form-group col-12 col-md-6">
              <h4>Nome</h4><span><?php echo($etapa->nome); ?></span>
            </div>
            <div class="form-group col-12 col-md-6">
              <h4>Inscritos</h4><span><?php echo(count($etapa->candidatos)); ?></span>
            </div>
            <div class="form-group col-12 col-md-12">
              <h4>Descrição</h4><span><?php echo($etapa->descricao); ?></span>
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
