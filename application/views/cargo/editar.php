<div class="row justify-content-center">
  <div class="col-8">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success mt-4">
        <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-8">
    <div class="card">
      <div class="card-header"><strong>Editar</strong><small> Cargo</small></div>
      <form action="<?php echo base_url() ?>cargo/editar/<?php echo $cargo->id_cargo?>" method="post">
        <div class="card-body card-block">
          <div class="row justify-content-center">
            <div class="col">
              <div class="form-group">
                <label for="nome">Nome do cargo</label>
                <input id="nome" type="text" value="<?php echo $cargo->nome ?>" name="nome" class="form-control">
              </div>
              <div class="form-group">
                <label for="descricao">Descrição do cargo</label>
                <textarea id="descricao" name="descricao" class="form-control"><?php echo $cargo->descricao ?></textarea>
              </div>
              <div class="form-group">
                <label for="salario">Salário por hora</label>
                <input id="salario_cargo" type="text" value="<?php echo $cargo->salario ?>" name="salario" class="form-control">
              </div>
              <div class="form-group">
                <label for="setor">Setor</label>
                <select id="setor" class="form-control" name="id_setor">
                  <?php foreach ($setores as $setor): ?>
                    <option value="<?php echo $setor->id_setor ?>"><?php echo $setor->nome; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">

        <a href="<?=site_url('cargo')?>" class="btn btn-danger btn-sm">
                <i class="fa fa-times"></i> Cancelar
              </a>
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Salvar Alterações
          </button>
          
        </div>
      </form>
    </div>
  </div>
</div>
