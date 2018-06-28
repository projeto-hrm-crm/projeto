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
                <label class=" form-control-label"><b>Funcionário</b></label>
                <p><label class=" form-control-label"><?= htmlspecialchars($funcionario[0]->nome)?></label></p>
              </div> <!-- FIM NOME -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><b>Avaliador</b></label>
                <p><label class=" form-control-label"><?= htmlspecialchars($funcionario[0]->nome)?></label></p>
              </div> <!-- FIM AVALIADOR -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="pontualidade"><b>Pontualidade</b></label><br>
                <input type="radio" name="pontualidade" id="pontualidade_pessimo" value="0" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '0' ? 'checked' : ''?> /><label for="pontualidade_pessimo" > &nbsp; Péssimo &nbsp; </label>
                <input type="radio" name="pontualidade" id="pontualidade_ruim" value="1" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '1' ? 'checked' : ''?> /><label for="pontualidade_ruim"> &nbsp; Ruim &nbsp; </label>
                <input type="radio" name="pontualidade" id="pontualidade_regular" value="2" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '2' ? 'checked' : ''?> checked/><label for="pontualidade_regular"> &nbsp; Regular &nbsp; </label>
                <input type="radio" name="pontualidade" id="pontualidade_bom" value="3" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '3' ? 'checked' : ''?> /><label for="pontualidade_bom" > &nbsp; Bom &nbsp; </label>
                <input type="radio" name="pontualidade" id="pontualidade_otimo" value="4" <?php echo isset($old_data['pontualidade']) && $old_data['pontualidade'] == '4' ? 'checked' : ''?> /><label for="pontualidade_otimo" > &nbsp; Ótimo </label>
              </div> <!-- FIM Pontualidade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="comprometimento"><b>Comprometimento</b></label><br>
                <input type="radio" name="comprometimento" id="comprometimento_pessimo" value="0" <?php echo isset($old_data['comprometimento']) && $old_data['comprometimento'] == '0' ? 'checked' : ''?> /><label for="comprometimento_pessimo" > &nbsp; Péssimo &nbsp; </label>
                <input type="radio" name="comprometimento" id="comprometimento_ruim" value="1" <?php echo isset($old_data['comprometimento']) && $old_data['comprometimento'] == '1' ? 'checked' : ''?> /><label for="comprometimento_ruim"> &nbsp; Ruim &nbsp; </label>
                <input type="radio" name="comprometimento" id="comprometimento_regular" value="2" <?php echo isset($old_data['comprometimento']) && $old_data['comprometimento'] == '2' ? 'checked' : ''?> checked/><label for="comprometimento_regular"> &nbsp; Regular &nbsp; </label>
                <input type="radio" name="comprometimento" id="comprometimento_bom" value="3" <?php echo isset($old_data['comprometimento']) && $old_data['comprometimento'] == '3' ? 'checked' : ''?> /><label for="comprometimento_bom" > &nbsp; Bom &nbsp; </label>
                <input type="radio" name="comprometimento" id="comprometimento_otimo" value="4" <?php echo isset($old_data['comprometimento']) && $old_data['comprometimento'] == '4' ? 'checked' : ''?> /><label for="comprometimento_otimo" > &nbsp; Ótimo </label>
              </div> <!-- FIM Comprometimento -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="produtividade"><b>Produtividade</b></label><br>
                <input type="radio" name="produtividade" id="produtividade_pessimo" value="0" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '0' ? 'checked' : ''?> /><label for="produtividade_pessimo" > &nbsp; Péssimo &nbsp; </label>
                <input type="radio" name="produtividade" id="produtividade_ruim" value="1" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '1' ? 'checked' : ''?> /><label for="produtividade_ruim"> &nbsp; Ruim &nbsp; </label>
                <input type="radio" name="produtividade" id="produtividade_regular" value="2" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '2' ? 'checked' : ''?> checked/><label for="produtividade_regular"> &nbsp; Regular &nbsp; </label>
                <input type="radio" name="produtividade" id="produtividade_bom" value="3" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '3' ? 'checked' : ''?> /><label for="produtividade_bom" > &nbsp; Bom &nbsp; </label>
                <input type="radio" name="produtividade" id="produtividade_otimo" value="4" <?php echo isset($old_data['produtividade']) && $old_data['produtividade'] == '4' ? 'checked' : ''?> /><label for="produtividade_otimo" > &nbsp; Ótimo </label>
              </div> <!-- FIM Produtividade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="relacaointerpessoal"><b>Relação interpessoal</b></label><br>
                <input type="radio" name="relacaointerpessoal" id="relacaointerpessoal_pessimo" value="0" <?php echo isset($old_data['relacaointerpessoal']) && $old_data['pontualidade'] == '0' ? 'checked' : ''?> /><label for="relacaointerpessoal_pessimo" > &nbsp; Péssimo &nbsp; </label>
                <input type="radio" name="relacaointerpessoal" id="relacaointerpessoal_ruim" value="1" <?php echo isset($old_data['relacaointerpessoal']) && $old_data['pontualidade'] == '1' ? 'checked' : ''?> /><label for="relacaointerpessoal_ruim"> &nbsp; Ruim &nbsp; </label>
                <input type="radio" name="relacaointerpessoal" id="relacaointerpessoal_regular" value="2" <?php echo isset($old_data['relacaointerpessoal']) && $old_data['pontualidade'] == '2' ? 'checked' : ''?> checked/><label for="proatividade_regular"> &nbsp; Regular &nbsp; </label>
                <input type="radio" name="relacaointerpessoal" id="relacaointerpessoal_bom" value="3" <?php echo isset($old_data['relacaointerpessoal']) && $old_data['pontualidade'] == '3' ? 'checked' : ''?> /><label for="relacaointerpessoal_bom" > &nbsp; Bom &nbsp; </label>
                <input type="radio" name="relacaointerpessoal" id="relacaointerpessoal_otimo" value="4" <?php echo isset($old_data['relacaointerpessoal']) && $old_data['pontualidade'] == '4' ? 'checked' : ''?> /><label for="relacaointerpessoal_otimo" > &nbsp; Ótimo </label>
              </div> <!-- FIM Relação interpessoal -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="proatividade"><b>Proatividade</b></label><br>
                <input type="radio" name="proatividade" id="proatividade_pessimo" value="0" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '0' ? 'checked' : ''?> /><label for="proatividade_pessimo" > &nbsp; Péssimo &nbsp; </label>
                <input type="radio" name="proatividade" id="proatividade_ruim" value="1" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '1' ? 'checked' : ''?> /><label for="proatividade_ruim"> &nbsp; Ruim &nbsp; </label>
                <input type="radio" name="proatividade" id="proatividade_regular" value="2" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '2' ? 'checked' : ''?> checked/><label for="proatividade_regular"> &nbsp; Regular &nbsp; </label>
                <input type="radio" name="proatividade" id="proatividade_bom" value="3" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '3' ? 'checked' : ''?> /><label for="proatividade_bom" > &nbsp; Bom &nbsp; </label>
                <input type="radio" name="proatividade" id="proatividade_otimo" value="4" <?php echo isset($old_data['proatividade']) && $old_data['pontualidade'] == '4' ? 'checked' : ''?> /><label for="proatividade_otimo" > &nbsp; Ótimo </label>
              </div> <!-- FIM Proatividade -->

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
