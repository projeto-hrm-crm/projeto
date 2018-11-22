<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Candidatos do Processo Seletivo <!--<?php echo($processo_seletivo[0]->codigo) ?> --></strong>
            </div>
            <div class="row" style="margin-top: 5px;">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
                        </div>
                    <?php elseif ($this->session->flashdata('danger')) : ?>
                        <div class="alert alert-danger">
                            <p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
                        </div>
                    <?php endif; ?>
                </div>    
            </div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered datatable">
                     <thead>
                        <tr>
                           <th class="text-center">Candidato</th>
                           <th class="text-center">Nome</th>
                           <th class="text-center">e-mail</th>
                           <th class="text-center">Curriculum</th>
                           <th class="text-center">Ações</th>
                        </tr>
                     </thead>

                     <tbody>
                         <?php foreach ($candidatos as $candidato): ?> 
                           <tr>
                              <td><img src="<?=base_url();?>uploads/profileImage/<?=$candidato->imagem;?>"></td>
                              <td><?php echo $candidato->nome; ?></td>
                              <td><?php echo $candidato->email; ?></td>
                              <td><?php echo $candidato->curriculum; ?></td>

                              <td class="text-center">

                                 <a title="Aprovar" href="" class="btn btn-success">
                                       <span class="fa fa-check"></span>
                                 </a>

                                 <button title="Reprovar" data-href="" class="btn btn-danger" data-toggle="modal" data-target="#modalRemover">
                                   <span class="fa fa-times"></span>
                                 </button>
                              </td><!-- Fim dos botões -->
                           </tr>
                       <?php endforeach ?>
                     </tbody>
                   </table>
                       

        </div>
    </div>
</div>


<div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Processo Seletivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esse processo seletivo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Cancelar
                </button>
                <a href="#" class="btn btn-primary btn-remove-ok">
                    Confirmar
                </a>
            </div>
        </div>
    </div>
  </div>