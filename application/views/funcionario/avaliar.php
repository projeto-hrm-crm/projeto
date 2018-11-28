<!-- FUNCIONÁRIO -->
<div class="animated fadeIn">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Avaliar Funcionário</strong>
        </div>

        <form action="<?php site_url('funcionario/avaliar/'.$id_funcionario); ?>" method="POST" id="form_funcionario"  class="form-horizontal">
          <div class="card-body card-block">
            <div class="row">

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><b>Funcionário</b></label>
                <p><label class=" form-control-label"><?= htmlspecialchars($funcionario[0]->nome)?></label></p>
              </div> <!-- FIM NOME -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><b>Avaliador</b></label>
                <p><label class=" form-control-label"><?= htmlspecialchars($avaliador[0]->nome)?></label></p>
              </div> <!-- FIM AVALIADOR -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="pontualidade"><b>Pontualidade</b></label><br>
                <select name="pontualidade" class="form-control" id="pontualiadade">
                    <option value="0">Péssimo</option>
                    <option value="1">Ruim</option>
                    <option value="2">Regular</option>
                    <option value="3">Bom</option>
                    <option value="4">Ótimo</option>
                </select>
              </div> <!-- FIM Pontualidade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="comprometimento"><b>Comprometimento</b></label><br>
                <select name="comprometimento" class="form-control" id="comprometimento">
                    <option value="0">Péssimo</option>
                    <option value="1">Ruim</option>
                    <option value="2">Regular</option>
                    <option value="3">Bom</option>
                    <option value="4">Ótimo</option>
                </select>
              </div> <!-- FIM Comprometimento -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="produtividade"><b>Produtividade</b></label><br>
                <select name="produtividade" class="form-control" id="produtividade">
                    <option value="0">Péssimo</option>
                    <option value="1">Ruim</option>
                    <option value="2">Regular</option>
                    <option value="3">Bom</option>
                    <option value="4">Ótimo</option>
                </select>
              </div> <!-- FIM Produtividade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="relacaointerpessoal"><b>Relação interpessoal</b></label><br>
                <select name="relacao_interpessoal" class="form-control" id="relacao_interpessoal">
                    <option value="0">Péssimo</option>
                    <option value="1">Ruim</option>
                    <option value="2">Regular</option>
                    <option value="3">Bom</option>
                    <option value="4">Ótimo</option>
                </select>
              </div> <!-- FIM Relação interpessoal -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="proatividade"><b>Proatividade</b></label><br>
                <select name="proatividade" class="form-control" id="proatividade">
                    <option value="0">Péssimo</option>
                    <option value="1">Ruim</option>
                    <option value="2">Regular</option>
                    <option value="3">Bom</option>
                    <option value="4">Ótimo</option>
                </select>
              </div> <!-- FIM Proatividade -->

              <div class="form-group col-md-12">
                  <label class=" form-control-label">Observação</label>
                  <textarea placeholder="Observação" name="observacao" class="form-control" ></textarea>
              </div> <!-- FIM Observação -->
              
            </div>

          </div>
          <div class="card-footer text-right">
            <a title="Cancelar Cadastro" href="<?=site_url('funcionario/avaliacoes/'.$id_funcionario)?>" class="btn btn-danger btn-sm">
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
