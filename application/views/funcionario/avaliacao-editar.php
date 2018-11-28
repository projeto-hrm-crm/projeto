<!-- FUNCIONÁRIO -->
<form action="<?php site_url('funcionario/avaliacao-editar/'.$id_avaliacao); ?>" method="POST" id="form_funcionario"  class="form-horizontal">
<div class="animated fadeIn">
    
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card">
        
        <div class="card-header">
          <strong class="card-title">Avaliar Funcionário</strong>
        </div>

        
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
                <select name="pontualidade" class="form-control" id="pontualidade">
                    <option value="0" <?php if($avaliacao[0]->pontualidade==0){echo "selected";}?>>Péssimo</option>
                    <option value="1" <?php if($avaliacao[0]->pontualidade==1){echo "selected";}?>>Ruim</option>
                    <option value="2" <?php if($avaliacao[0]->pontualidade==2){echo "selected";}?>>Regular</option>
                    <option value="3" <?php if($avaliacao[0]->pontualidade==3){echo "selected";}?>>Bom</option>
                    <option value="4" <?php if($avaliacao[0]->pontualidade==4){echo "selected";}?>>Ótimo</option>
                </select>
              </div> <!-- FIM Pontualidade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="comprometimento"><b>Comprometimento</b></label><br>
                <select name="comprometimento" class="form-control" id="comprometimento">
                    <option value="0" <?php if($avaliacao[0]->comprometimento==0){echo "selected";}?>>Péssimo</option>
                    <option value="1" <?php if($avaliacao[0]->comprometimento==1){echo "selected";}?>>Ruim</option>
                    <option value="2" <?php if($avaliacao[0]->comprometimento==2){echo "selected";}?>>Regular</option>
                    <option value="3" <?php if($avaliacao[0]->comprometimento==3){echo "selected";}?>>Bom</option>
                    <option value="4" <?php if($avaliacao[0]->comprometimento==4){echo "selected";}?>>Ótimo</option>
                </select>
              </div> <!-- FIM Comprometimento -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="produtividade"><b>Produtividade</b></label><br>
                <select name="produtividade" class="form-control" id="produtividade">
                    <option value="0" <?php if($avaliacao[0]->produtividade==0){echo "selected";}?>>Péssimo</option>
                    <option value="1" <?php if($avaliacao[0]->produtividade==1){echo "selected";}?>>Ruim</option>
                    <option value="2" <?php if($avaliacao[0]->produtividade==2){echo "selected";}?>>Regular</option>
                    <option value="3" <?php if($avaliacao[0]->produtividade==3){echo "selected";}?>>Bom</option>
                    <option value="4" <?php if($avaliacao[0]->produtividade==4){echo "selected";}?>>Ótimo</option>
                </select>
              </div> <!-- FIM Produtividade -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="relacaointerpessoal"><b>Relação interpessoal</b></label><br>
                <select name="relacao_interpessoal" class="form-control" id="relacao_interpessoal">
                    <option value="0" <?php if($avaliacao[0]->proatividade==0){echo "selected";}?>>Péssimo</option>
                    <option value="1" <?php if($avaliacao[0]->proatividade==1){echo "selected";}?>>Ruim</option>
                    <option value="2" <?php if($avaliacao[0]->proatividade==2){echo "selected";}?>>Regular</option>
                    <option value="3" <?php if($avaliacao[0]->proatividade==3){echo "selected";}?>>Bom</option>
                    <option value="4" <?php if($avaliacao[0]->proatividade==4){echo "selected";}?>>Ótimo</option>
                </select>
              </div> <!-- FIM Relação interpessoal -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label" for="proatividade"><b>Proatividade</b></label><br>
                <select name="proatividade" class="form-control" id="proatividade">
                    <option value="0" <?php if($avaliacao[0]->proatividade==0){echo "selected";}?>>Péssimo</option>
                    <option value="1" <?php if($avaliacao[0]->proatividade==1){echo "selected";}?>>Ruim</option>
                    <option value="2" <?php if($avaliacao[0]->proatividade==2){echo "selected";}?>>Regular</option>
                    <option value="3" <?php if($avaliacao[0]->proatividade==3){echo "selected";}?>>Bom</option>
                    <option value="4" <?php if($avaliacao[0]->proatividade==4){echo "selected";}?>>Ótimo</option>
                </select>
              </div> <!-- FIM Proatividade -->

              <div class="form-group col-md-12">
              <label class="form-control-label"><red>*</red>Observação</label>
                <textarea placeholder="Observação" name="observacao" class="form-control"><?php if (isset($avaliacao[0]->observacao)) {
                 echo $avaliacao[0]->observacao;
                }?></textarea>
              </div>

            </div>

          </div>
          <div class="card-footer text-right">
            <a title="Cancelar Cadastro" href="<?=site_url('funcionario/avaliacoes/'.$id_funcionario)?>" class="btn btn-danger btn-sm">
              <i class="fa fa-times"></i> Cancelar
            </a>
            <button title="Atualizar avaliação" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarAvaliacao">
              <i class="fa fa-plus"></i> Cadastrar
            </button>
          </div>
           

      </div>
      
    </div>
  </div>
          
</div>
   <div class="modal fade" id="editarAvaliacao" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Atualizar Avaliação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Deseja Realmente Atualizar Essa Avaliação?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                      Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                      Confirmar
                    </button>
                  </div>
                </div>
              </div>
            </div>
        </form>
