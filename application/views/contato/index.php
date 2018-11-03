<div class="row justify-content-center align-items-center">
  <div class="col-lg-12">
    <?php if($this->session->flashdata('success')): ?>
      <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('danger')): ?>
      <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
        <?php echo $this->session->flashdata('danger'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>


    <div id="contatos">
      <div class="card text-center">
        <h2>Contatos</h2>
        <ul class="sort-by">
          <li class="sort btn" data-sort="name">Organizar por Nome</li>
          <li class="sort btn" data-sort="category">Organizar por Categoria</li>
        </ul>
        <ul class="filter">
          <button type="button" class="btn-outline-dark rounded" id="filter-none">Todos</button>
          <button type="button" class="btn-outline-dark rounded" id="filter-cliente">Clientes</button>
          <button type="button" class="btn-outline-dark rounded" id="filter-fornecedor">Fornecedores</button>
          <button type="button" class="btn-outline-dark rounded" id="filter-candidato">Candidato</button>
          <button type="button" class="btn-outline-dark rounded" id="filter-funcionario">Funcionario</button>
        </ul>
      </div>
      <ul class="list">
        <?php foreach ($funcionarios as $funcionario) : ?>
          <div class="description">
            <div class="col-3">
              <div class="card border-light mb-3">
                <div class="card-title justify-content-center">
                  <div class="col-lg-12 text-align">
                    <img class="card-img-top" src="<?= base_url()."uploads/profileImage/".$funcionario->imagem;?> " alt="<?= $funcionario->nome; ?>" title="<?= $funcionario->nome; ?>">
                  </div>
                  <h5 class="text-center name"><?= $funcionario->nome; ?></h5>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $funcionario->email; ?></p>
                </div>
                <div class="card-body">
                  <p class="card-subtitle mb-2 text-muted text-center small">Idade: <? $date = new DateTime($funcionario->data_nascimento);
                  $idade = $date->diff( new DateTime(date('H:i:s')));
                  echo $idade->format( '%Y anos' ); ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $funcionario->cidade; ?>-<?= $funcionario->estado; ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $funcionario->telefone; ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small category">Funcionario</p>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

        <?php foreach ($clientes as $cliente) : ?>
          <div class="description">
            <div class="col-3">
              <div class="card border-light mb-3">
                <div class="card-title justify-content-center ">
                  <div class="col-lg-12 text-align">
                    <img class="card-img-top" src="<?= base_url()."uploads/profileImage/".$cliente->imagem;?> " alt="<?= $cliente->nome; ?>" title="<?= $cliente->nome; ?>">
                  </div>
                  <h5 class="text-center name"><?= $cliente->nome; ?></h5>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $cliente->email; ?></p>
                </div>
                <div class="card-body">
                  <p class="card-subtitle mb-2 text-muted text-center small">Idade: <? $date = new DateTime($cliente->data_nascimento);
                  $idade = $date->diff( new DateTime(date('H:i:s')));
                  echo $idade->format( '%Y anos' ); ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $cliente->cidade; ?>-<?= $cliente->estado; ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $cliente->telefone; ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small category">Cliente</p>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

        <?php foreach ($candidatos as $candidato) : ?>
          <div class="description">
            <div class="col-3">
              <div class="card border-light mb-3">
                <div class="card-title justify-content-center ">
                  <div class="col-lg-12 text-align">
                    <img class="card-img-top" src="<?= base_url()."uploads/profileImage/".$candidato->imagem;?> " alt="<?= $candidato->nome; ?>" title="<?= $candidato->nome; ?>">
                  </div>
                  <h5 class="text-center name"><?= $candidato->nome; ?></h5>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $candidato->email; ?></p>
                </div>
                <div class="card-body">
                  <p class="card-subtitle mb-2 text-muted text-center small">Idade: <? $date = new DateTime($candidato->data_nascimento);
                  $idade = $date->diff( new DateTime(date('H:i:s')));
                  echo $idade->format( '%Y anos' ); ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $candidato->cidade; ?>-<?= $candidato->estado; ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $candidato->telefone; ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small category">Candidato</p>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

        <?php foreach ($fornecedores as $fornecedor) : ?>
          <div class="description">
            <h4><span </span></h4>
              <div class="col-3">
                <div class="card border-light mb-3">
                  <div class="col-12">
                    <h4 class="card-title text-center"><?= $fornecedor->razao_social; ?></h4>
                    <p class="card-subtitle mb-2 text-muted text-center small name">Responsável: <?= $fornecedor->nome; ?></p>
                    <p class="card-subtitle mb-2 text-muted text-center small"><?= $fornecedor->email; ?></p>
                    <p class="card-subtitle mb-2 text-muted text-center small"><?= $fornecedor->cidade; ?>-<?= $fornecedor->estado; ?></p>
                    <p class="card-subtitle mb-2 text-muted text-center small"><?= $fornecedor->telefone; ?></p>
                    <p class="card-subtitle mb-2 text-muted text-center small category">Fornecedor</p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>

  </div> <!-- end of #container -->
