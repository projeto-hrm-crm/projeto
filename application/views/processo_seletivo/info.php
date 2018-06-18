
<div class="row justify-content-center align-items-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">
        <strong>Info do Processo Seletivo <?php echo($info[0]->codigo) ?></strong>
      </div>
        <div class="card-body card-block">

          <div class="row">
            <div class="form-group col-12 col-md-6">
              <h4>Nome</h4><span><?php echo($info[0]->nome); ?></span>
            </div>
          


            <?php foreach ($etapas as $etapa): ?>
              <div class="form-group col-12">
                <label class=" form-control-label">Descrição da Etapa</label>
                <input type="number" name="id_etapa[]" value="<?php echo $etapa->id_etapa ?>" readonly>
                <textarea auto-resize name="descricao_etapa[]" class="form-control" required><?php print_r($etapa->descricao); ?></textarea>
                <span class="invalid-feedback" id="invalid-descricao">
                  Campo obrigatório
                </span>
              </div>
            <?php endforeach; ?>



            <div class="form-group col-12">
              <label class=" form-control-label">Descrição do Processo</label>
              <textarea auto-resize id="descricao" name="descricao" class="form-control" required><?php print_r($info[0]->descricao); ?></textarea>
              <span class="invalid-feedback" id="invalid-descricao">
                Campo obrigatório
              </span>
            </div>

        </div>

      </div>
    </div>
  </div>
</div>
