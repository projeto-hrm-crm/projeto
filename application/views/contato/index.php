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
        <div class="card-title justify-content-center">
          <h5>Contatos</h5>
        </div>
        <input type="text" class="search form-control align-self-center mx-1 col-lg-4"/>
      </br>
      <ul class="sort-by">
        <button type="button" class="sort btn-outline-dark rounded" data-sort="name">Organizar por Nome</button>
        <button type="button" class="sort btn-outline-dark rounded" data-sort="category">Organizar por Categoria</button>
      </ul>
      <ul class="filter">
        <button type="button" class="btn-outline-dark rounded" id="filter-none">Todos</button>
        <button type="button" class="btn-outline-dark rounded" id="filter-cliente">Clientes</button>
        <button type="button" class="btn-outline-dark rounded" id="filter-fornecedor">Fornecedores</button>
        <button type="button" class="btn-outline-dark rounded" id="filter-candidato">Candidato</button>
        <button type="button" class="btn-outline-dark rounded" id="filter-funcionario">Funcionario</button>
      </ul>
    </div>

    <div>
      <div class="list-group" id="list-tab" role="tablist">
        <ul class="pagination justify-content-center"></ul>
      </div>
    </div>

    <div class="list row justify-content-center align-items-center">
      <?php foreach ($funcionarios as $funcionario) : ?>
        <div class="card rounded col-lg-5 mx-1 description">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-5">
                <img class="card-img rounded" src="<?= base_url()."uploads/profileImage/".$funcionario->imagem;?> ">
              </div>
              <div class="col-lg-7">
                <h5 class="text-center name"><?= $funcionario->nome; ?></h5>
                <p class="card-subtitle mb-2 text-muted text-center small"><?= $funcionario->email; ?></p>
                <p class="card-subtitle mb-2 text-muted text-center small">Idade:
                  <?php $date = new DateTime($funcionario->data_nascimento);
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

          <div class="card rounded col-lg-5 mx-1 description">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-5">
                  <img class="card-img rounded" src="<?= base_url()."uploads/profileImage/".$cliente->imagem;?> ">
                </div>
                <div class="col-lg-7">
                  <h5 class="text-center name"><?= $cliente->nome; ?></h5>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $cliente->email; ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small">Idade: <?php $date = new DateTime($cliente->data_nascimento);
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
          <div class="card rounded col-lg-5 mx-1 description">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-5">
                  <img class="card-img rounded" src="<?= base_url()."uploads/profileImage/".$candidato->imagem;?> ">
                </div>
                <div class="col-lg-7">
                  <h5 class="text-center name"><?= $candidato->nome; ?></h5>
                  <p class="card-subtitle mb-2 text-muted text-center small"><?= $candidato->email; ?></p>
                  <p class="card-subtitle mb-2 text-muted text-center small">Idade: <?php $date = new DateTime($candidato->data_nascimento);
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
          <div class="card rounded col-lg-4 mx-3 description">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <h4 class="card-title text-center name"><?= $fornecedor->razao_social; ?></h4>
                  <p class="card-subtitle mb-2 text-muted text-center small">Responsável: <?= $fornecedor->nome; ?></p>
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
</div>
</div>
