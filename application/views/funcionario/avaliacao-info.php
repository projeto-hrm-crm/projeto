<!-- FUNCIONÁRIO -->
<div class="animated fadeIn">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Informações da Avaliação</strong>
        </div>


          <div class="card-body card-block">
            <div class="row">

              <div class="form-group col-12 col-md-4">
                <label class=" form-control-label"><b>Funcionário</b></label>
                <p><label class=" form-control-label"><?= htmlspecialchars($funcionario[0]->nome)?></label></p>
              </div> <!-- FIM NOME -->

              <div class="form-group col-12 col-md-4">
                <label class=" form-control-label"><b>Avaliador</b></label>
                <p><label class=" form-control-label"><?=htmlspecialchars($avaliador[0]->nome)?></label></p>
              </div> <!-- FIM AVALIADOR -->

              <div class="form-group col-12 col-md-4">
                <label class=" form-control-label"><b>Data Avaliação</b></label>
                <p><label class=" form-control-label"><?=switchDate(substr($avaliacao[0]->data_avaliacao, 0, 10))." as ".substr($avaliacao[0]->data_avaliacao, 10, 10)?></label></p>
              </div>

              <div class="form-group col-12 col-md-3">
                <label class=" form-control-label" for="pontualidade"><b>Pontualidade</b></label><br>
                <p>
                   <label class=" form-control-label">
                   <?php
                     if($avaliacao[0]->pontualidade==0){echo "Péssimo";}
                     if($avaliacao[0]->pontualidade==1){echo "Ruim";}
                     if($avaliacao[0]->pontualidade==2){echo "Regular";}
                     if($avaliacao[0]->pontualidade==3){echo "Bom";}
                     if($avaliacao[0]->pontualidade==4){echo "Ótimo";}
                   ?>
                   </label>
                 </p>
              </div> <!-- FIM Pontualidade -->

              <div class="form-group col-12 col-md-3">
                <label class=" form-control-label" for="comprometimento"><b>Comprometimento</b></label><br>
                <p>
                   <label class=" form-control-label">
                   <?php
                     if($avaliacao[0]->comprometimento==0){echo "Péssimo";}
                     if($avaliacao[0]->comprometimento==1){echo "Ruim";}
                     if($avaliacao[0]->comprometimento==2){echo "Regular";}
                     if($avaliacao[0]->comprometimento==3){echo "Bom";}
                     if($avaliacao[0]->comprometimento==4){echo "Ótimo";}
                   ?>
                   </label>
                 </p>
              </div> <!-- FIM Comprometimento -->

              <div class="form-group col-12 col-md-3">
                <label class=" form-control-label" for="produtividade"><b>Produtividade</b></label><br>
                <p>
                   <label class=" form-control-label">
                   <?php
                     if($avaliacao[0]->produtividade==0){echo "Péssimo";}
                     if($avaliacao[0]->produtividade==1){echo "Ruim";}
                     if($avaliacao[0]->produtividade==2){echo "Regular";}
                     if($avaliacao[0]->produtividade==3){echo "Bom";}
                     if($avaliacao[0]->produtividade==4){echo "Ótimo";}
                   ?>
                   </label>
                 </p>
              </div> <!-- FIM Produtividade -->

              <div class="form-group col-12 col-md-3">
                <label class=" form-control-label" for="relacaointerpessoal"><b>Relação interpessoal</b></label><br>
                <p>
                   <label class=" form-control-label">
                   <?php
                     if($avaliacao[0]->relacao_interpessoal==0){echo "Péssimo";}
                     if($avaliacao[0]->relacao_interpessoal==1){echo "Ruim";}
                     if($avaliacao[0]->relacao_interpessoal==2){echo "Regular";}
                     if($avaliacao[0]->relacao_interpessoal==3){echo "Bom";}
                     if($avaliacao[0]->relacao_interpessoal==4){echo "Ótimo";}
                   ?>
                   </label>
                 </p>
              </div> <!-- FIM Relação interpessoal -->

              <div class="form-group col-12 col-md-3">
                <label class=" form-control-label" for="proatividade"><b>Proatividade</b></label><br>
                <p>
                   <label class=" form-control-label">
                   <?php
                     if($avaliacao[0]->proatividade==0){echo "Péssimo";}
                     if($avaliacao[0]->proatividade==1){echo "Ruim";}
                     if($avaliacao[0]->proatividade==2){echo "Regular";}
                     if($avaliacao[0]->proatividade==3){echo "Bom";}
                     if($avaliacao[0]->proatividade==4){echo "Ótimo";}
                   ?>
                   </label>
                 </p>
              </div> <!-- FIM Proatividade -->
                  <div class="form-group col-12 col-md-12">
                    <label class=" form-control-label" for="proatividade"><b>Observação:</b></label><br>
                    <p>
                      <label class=" form-control-label">
                      <?php
                        echo $avaliacao[0]->observacao;
                      ?>
                      </label>
                    </p>
                  </div> <!-- FIM Proatividade -->
            </div>

          </div>
          <div class="card-footer text-right">
            <a title="Voltar a avaliações" href="<?=site_url('funcionario/avaliacoes/'.$id_funcionario)?>" class="btn btn-primary btn-sm">
              Voltar às Avaliações
            </a>
          </div>


      </div>
    </div>
  </div>
</div>
