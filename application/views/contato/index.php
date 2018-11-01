<?php if ($this->session->flashdata('permissions_ok') != ""): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('permissions_ok');?></div>
<?php endif;?>

  <div class="row justify-content-center align-items-center col-12">
    <div class="btn-group btn-group-toggle " data-toggle="buttons">
      <label class="btn btn-secondary active">
        <input type="radio" class="sort" data-sort="todos" name="todos" id="todos" autocomplete="off" checked> Todos
      </label>
      <label class="btn btn-secondary">
        <input type="radio" class="sort" data-sort="funcionarios" name="funcionarios" id="funcionarios" autocomplete="off"> Funcionários
      </label>
      <label class="btn btn-secondary">
        <input type="radio" class="sort" data-sort="fornecedores" name="fornecedores" id="fornecedores" autocomplete="off"> Fornecedores
      </label>
      <label class="btn btn-secondary">
        <input type="radio" class="sort" data-sort="candidatos" name="candidatos" id="candidatos" autocomplete="off"> Candidatos
      </label>
      <label class="btn btn-secondary">
        <input type="radio" class="sort" data-sort="funcionarios" name="funcionarios" id="clientes" autocomplete="off"> Clientes
      </label>
    </div>

    <?php foreach ($clientes as $cliente) : ?>

      <div class="row justify-content-center align-items-center col-12">
        <div class="card" style="width: 36rem;">
          <div class="card-body">
            <div class="col-2">
            <img class="card-img-top" src="<?php $path_profile_image;?> " alt="<?= $cliente->nome; ?>">
          </div>
            <div class="col-10">
            <h5 class="card-title"><?= $cliente->nome; ?></h5>
            <span class="lead small strong"><?= $cliente->email; ?></span>
            <span class="lead small"> <!-- $cliente->telefone?> --> </span>
            <small class="small"><?php $date = new DateTime($cliente->data_nascimento);
              $idade = $date->diff( new DateTime(date('H:i:s')));
              echo $idade->format( '%Y Anos' ); ?></small>
            <span class="lead small">Cliente</span>
          </div>
          </div>
        </div>

        <?php endforeach; ?>

      <?php foreach ($funcionarios as $funcionario) : ?>

        <div class="row justify-content-center align-items-center col-12">
          <div class="card" style="width: 36rem;">
            <div class="card-body">
              <div class="col-2">
              <img class="card-img-top" src="<?php $path_profile_image;?> " alt="<?= $funcionario->nome; ?>">
            </div>
              <div class="col-10">
              <h5 class="card-title"><?= $funcionario->nome; ?></h5>
              <span class="lead small strong"><?= $funcionario->email; ?></span>
              <span class="lead small"> </span>
              <small class="small"><?php $date = new DateTime($funcionario->data_nascimento);
                $idade = $date->diff( new DateTime(date('H:i:s')));
                echo $idade->format( '%Y Anos' ); ?></small>
              <span class="lead small">Funcionario</span>
            </div>
            </div>
          </div>

      <?php endforeach; ?>

      <?php foreach ($fornecedores as $fornecedor) : ?>

        <div class="row justify-content-center align-items-center col-12">
          <div class="card" style="width: 36rem;">
            <div class="card-body">
              <div class="col-2">
              <img class="card-img-top" src="<?php $path_profile_image;?> " alt="<?= $fornecedor->nome; ?>">
            </div>
              <div class="col-10">
              <h5 class="card-title"><?= $fornecedor->nome; ?></h5>
              <span class="lead small strong"><?= $fornecedor->email; ?></span>
              <span class="lead small"> </span>
              <span class="lead small"><?php $fornecedor->razao_social; ?></span>
              <span class="lead small">Fornecedor</span>
            </div>
            </div>
          </div>

      <?php endforeach; ?>
      <?php foreach ($candidatos as $candidato) : ?>

        <div class="row justify-content-center align-items-center col-12">
          <div class="card" style="width: 36rem;">
            <div class="card-body">
              <div class="col-2">
              <img class="card-img-top" src="<?php $path_profile_image;?> " alt="<?= $candidato->nome; ?>">
            </div>
              <div class="col-10">
              <h5 class="card-title"><?= $candidato->nome; ?></h5>
              <span class="lead small strong"><?= $candidato->email; ?></span>
              <span class="lead small"> </span>
              <small class="small"><?php $date = new DateTime($candidato->data_nascimento);
                $idade = $date->diff( new DateTime(date('H:i:s')));
                echo $idade->format( '%Y Anos' ); ?></small>
              <span class="lead small">Candidato</span>
            </div>
            </div>
          </div>

      <?php endforeach; ?>
    </div>
</div>
