<!-- FUNCIONÁRIO -->
<div class="animated fadeIn">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Avaliar Funcionário</strong>
        </div>

        <form action="<?php site_url('funcionario/evaluate'.$id); ?>" method="POST" id="form_funcionario"  class="form-horizontal">
          <div class="card-body card-block">
            <div class="row">

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><?= htmlspecialchars($funcionario[0]->nome)?></label>
              </div> <!-- FIM NOME -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"></label>
              </div> <!-- FIM label vazia -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="produtividade">Produtividade</label><br>
                <input type="radio" name="produtividade" id="produtividade_ruim" value="0" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '0' ? 'checked' : ''?> /><label for="produtividade_ruim">Ruim</label>
                <input type="radio" name="produtividade" id="produtividade_mruim" value="1" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '1' ? 'checked' : ''?> /><label for="produtividade_mruim" >Muito ruim</label>
                <input type="radio" name="produtividade" id="produtividade_regular" value="2" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '2' ? 'checked' : ''?> checked/><label for="produtividade_regular">Regular</label>
                <input type="radio" name="produtividade" id="produtividade_bom" value="3" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '3' ? 'checked' : ''?> /><label for="produtividade_bom" >Bom</label>
                <input type="radio" name="produtividade" id="produtividade_mbom" value="4" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '4' ? 'checked' : ''?> /><label for="produtividade_mbom" >Muito bom</label>
              </div> <!-- FIM Produtividade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"></label>
              </div> <!-- FIM label vazia -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="pontualidade">Pontualidade</label><br>
                <input type="radio" name="pontualidade" id="pontualidade_ruim" value="0" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '0' ? 'checked' : ''?> /><label for="pontualidade_ruim">Ruim</label>
                <input type="radio" name="pontualidade" id="pontualidade_mruim" value="1" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '1' ? 'checked' : ''?> /><label for="pontualidade_mbom" >Muito ruim</label>
                <input type="radio" name="pontualidade" id="pontualidade_regular" value="2" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '2' ? 'checked' : ''?> checked/><label for="pontualidade_regular">Regular</label>
                <input type="radio" name="pontualidade" id="pontualidade_bom" value="3" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '3' ? 'checked' : ''?> /><label for="pontualidade_bom" >Bom</label>
                <input type="radio" name="pontualidade" id="produtividade_mbom" value="4" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '4' ? 'checked' : ''?> /><label for="pontualidade_mbom" >Muito bom</label>
              </div> <!-- FIM Pontualidade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"></label>
              </div> <!-- FIM label vazia -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="proatividade">Proatividade</label><br>
                <input type="radio" name="proatividade" id="proatividade_ruim" value="0" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '0' ? 'checked' : ''?> /><label for="proatividade_ruim">Ruim</label>
                <input type="radio" name="proatividade" id="proatividade_mruim" value="1" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '1' ? 'checked' : ''?> /><label for="proatividade_mbom" >Muito ruim</label>
                <input type="radio" name="proatividade" id="proatividade_regular" value="2" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '2' ? 'checked' : ''?> checked/><label for="proatividade_regular">Regular</label>
                <input type="radio" name="proatividade" id="proatividade_bom" value="3" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '3' ? 'checked' : ''?> /><label for="proatividade_bom" >Bom</label>
                <input type="radio" name="proatividade" id="proatividadee_mbom" value="4" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '4' ? 'checked' : ''?> /><label for="proatividade_mbom" >Muito bom</label>
              </div> <!-- FIM Pontualidade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"></label>
              </div> <!-- FIM label vazia -->

            </div>

          </div>
          <div class="card-footer text-right">
            <a title="Cancelar Cadastro" href="<?=site_url('funcionario')?>" class="btn btn-danger btn-sm">
              <i class="fa fa-times"></i> Cancelar
            </a>
            <button title="Cadastrar Funcionário" type="submit" class="btn btn-primary btn-sm">
              <i class="fa fa-plus"></i> Cadastrar
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
