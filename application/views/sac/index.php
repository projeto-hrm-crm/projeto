    <div class="row" >
        <div class="col-lg-12">
           <?php if($this->session->flashdata('success')): ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                        <?php echo $this->session->flashdata('success'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('danger')): ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                        <?php echo $this->session->flashdata('danger'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">SAC</strong>
                </div>
                <div class="card-body">
                  <a title="Cadastrar SAC" href="<?= site_url('sac/cadastrar')?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-check"></i> Novo Cadastro
                  </a><br />
                  <br />
                    <table  class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th width="20%" class="text-center" >Código</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Status</th>
                                <th width="20%" class="text-center" >Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($sac)): ?>
                                <?php foreach($sac as $item): ?>
                                    <tr>

                                        <td><?php echo $item->id_sac;?></td>
                                        <td><?=$item->titulo;?></td>
                                        <td><?=$item->id_cliente;?></td>
                                        <td><?php if($item->encerrado){echo "FECHADO";}else{echo "EM ABERTO";} ?></td>
                                        <td>
                                            <a  href="<?=site_url('sac/editar/'.$item->id_sac);?>" class="btn btn-primary" title="Atualizar SAC">
                                                <span class="fa fa-pencil-square-o"></span>
                                            </a>
                                        <!--    analizando o desenvolvimento do projeto, esta função de remoção se tornou inviavel para uso

                                            <button data-href="<?=site_url('sac/excluir/'.$item->id_sac);?>" class="btn btn-danger" title="Excluir SAC" data-toggle="modal" data-target="#modalRemover">
                                                <span class="fa fa-times"></span>
                                            </button>
                                        -->
                                            <a  href="<?=site_url('sac/iteracao/'.$item->id_sac);?>" class="btn btn-success" title="Iterações SAC">
                                                <span class="fa fa-comment-o"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

</div>
<script src="<?= base_url('assets/js/lib/data-table/datatables.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/dataTables.buttons.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/buttons.bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/jszip.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/pdfmake.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/vfs_fonts.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/buttons.html5.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/buttons.print.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/buttons.colVis.min.js');?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/datatables-init.js');?>"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
  } );
</script>


</div>
       <div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir SAC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esse SAC?
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
