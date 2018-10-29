<?php if ($this->session->flashdata('permissions_ok') != ""): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('permissions_ok');?></div>
<?php endif;?>

  <div class="row justify-content-center align-items-center">
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-secondary active">
      <input type="radio" name="todos" id="todos" autocomplete="off" checked> Todos
    </label>
    <label class="btn btn-secondary">
      <input type="radio" name="funcionarios" id="funcionarios" autocomplete="off"> Funcionários
    </label>
    <label class="btn btn-secondary">
      <input type="radio" name="fornecedores" id="fornecedores" autocomplete="off"> Fornecedores
    </label>
    <label class="btn btn-secondary">
      <input type="radio" name="candidatos" id="candidatos" autocomplete="off"> Candidatos
    </label>
    <label class="btn btn-secondary">
      <input type="radio" name="clientes" id="clientes" autocomplete="off"> Clientes
    </label>
  </div>

  <?php foreach ($clientes as $cliente) : ?>
    <div class="card" style="width: 36rem;">
      <div class="card-body">
        <div class="col-2">
        <img class="card-img-top" src="..." alt="Card image cap">
      </div>
        <div class="col-10">
        <h5 class="card-title">Camilo Silva</h5>
        <span class="lead small">camilosilva@teste.com</span>
        <span class="lead small strong"> (12) 99789454</span>
        <br>
        <small class="small">Conosco a 8 anos</small>
        <span class="lead small">35 anos de idade</span>
      </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php foreach ($funcionarios as $funcionario) : ?>
    <div class="card" style="width: 36rem;">
      <div class="card-body">
        <div class="col-2">
        <img class="card-img-top" src="..." alt="Card image cap">
      </div>
        <div class="col-10">
        <h5 class="card-title">Camilo Silva</h5>
        <span class="lead small">camilosilva@teste.com</span>
        <span class="lead small strong"> (12) 99789454</span>
        <br>
        <small class="small">Conosco a 8 anos</small>
        <span class="lead small">35 anos de idade</span>
      </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php foreach ($fornecedores as $fornecedor) : ?>
    <div class="card" style="width: 36rem;">
      <div class="card-body">
        <div class="col-2">
        <img class="card-img-top" src="..." alt="Card image cap">
      </div>
        <div class="col-10">
        <h5 class="card-title">Camilo Silva</h5>
        <span class="lead small">camilosilva@teste.com</span>
        <span class="lead small strong"> (12) 99789454</span>
        <br>
        <small class="small">Conosco a 8 anos</small>
        <span class="lead small">35 anos de idade</span>
      </div>
      </div>
    </div>
  <?php endforeach; ?>
  <?php foreach ($candidatos as $candidato) : ?>
    <div class="card" style="width: 36rem;">
      <div class="card-body">
        <div class="col-2">
        <img class="card-img-top" src="..." alt="Card image cap">
      </div>
        <div class="col-10">
        <h5 class="card-title">Camilo Silva</h5>
        <span class="lead small">camilosilva@teste.com</span>
        <span class="lead small strong"> (12) 99789454</span>
        <br>
        <small class="small">Conosco a 8 anos</small>
        <span class="lead small">35 anos de idade</span>
      </div>
      </div>
    </div>
  <?php endforeach; ?>

</div>
