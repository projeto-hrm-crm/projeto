<div class="row justify-content-center align-items-center">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <strong>Cadastrar grupo</strong>
      </div>
      <div class="row" style="margin-top: 5px;">
        <div class="col-md-12">
          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success">
              <span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?>
            </div>
          <?php elseif ($this->session->flashdata('danger')) : ?>
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <form action="<?php echo site_url('grupo/cadastrar'); ?>" method="POST" class="form-horizontal" id="form_grupo" novalidate="novalidate">
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="form-group col-6">
              <label class=" form-control-label"><red>*</red>Nome do grupo</label>
              <input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome do Grupo" class="form-control" required>
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <label for="id_modulo" class="control-label mb-1"><red>*</red>Modulo</label>
              <select name="id_modulo" id="id_modulo" class="form-control <?php echo isset($errors['id_modulo']) ? 'is-invalid' : '' ?>">
                <option value="">Selecione um Módulo</option>
                <?php foreach ($modulos as $modulo): ?>
                  <option value="<?php echo $modulo->id_modulo ?>" <?php echo isset($old_data['id_modulo']) ? 'selected' : '' ?>>
                    <?= $modulo->modulo_nome ?>
                  </option>

                <?php endforeach; ?>
              </select>
              <span class="invalid-feedback">Módulo inválido.</span>
            </div>
            <div class="form-group col-12">
              <label class=" form-control-label"><red>*</red>Descrição</label>
              <textarea auto-resize placeholder="Descrição do Grupo" id="descricao" name="descricao" class="form-control" required></textarea>
            </div>

          </div>
        </div>
        <div class="card-footer text-right">

          <a title="Cancelar Cadastro" href="<?= site_url('grupo')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i> Cancelar
          </a>
          <button title="Cadastrar grupo" type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Cadastrar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
