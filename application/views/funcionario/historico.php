<div class="row justify-content-center align-items-center">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <strong>Historico dos cargos </strong>
      </div>
      <div class="card-body card-block">
        <strong>Funcionário</strong>
        <hr>
        <div class="row">
          <div class="form-group col-12 col-md-6">
            <h4>Nome</h4><span><?php echo($funcionario[0]->nome); ?></span>
          </div>
          <div class="form-group col-12 col-md-6">
            <h4>Email</h4><span><?php echo($funcionario[0]->email); ?></span>
          </div>
          <div class="form-group col-12 col-md-6">
            <h4>Documento</h4><span><?php echo($funcionario[0]->numero_documento); ?></span>
          </div>
          <div class="form-group col-12 col-md-6">
            <h4>Telefone</h4><span><?php echo($funcionario[0]->telefone); ?></span>
          </div>
        </div>
        <hr>
          <strong>Cargos</strong>
        <hr>

          <?php foreach ($cargos as $cargo):
            $criado = new
            ?>
            <div class="row">
            <div class="form-group col-md-6">
              <h4>Nome</h4><span><?php echo($cargo->nome); ?></span>
            </div>
            <div class="form-group col-md-6">
              <h4>Setor</h4><span><?php echo($cargo->nome); ?></span>
            </div>
            <div class="form-group col-md-6">
              <h4>Inscritos</h4><span><?php echo(switchDate($cargo->criado)); ?></span>
            </div>
            <div class="form-group col-md-6">
              <h4>Última atualização</h4><span><?php echo($cargo->atualizado); ?></span>
            </div>
            <?php if ($cargo->deletado): ?>
              <div class="form-group col-md-6">
                <h4>Descrição</h4><span><?php echo($cargo->deletado); ?></span>
              </div>
            <?php endif; ?>
          </div>
            <hr>

          <?php endforeach; ?>

	      </div>

    </div>
  </div>
</div>
</div>
