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
                    <strong class="card-title"><?=$sac[0]->titulo;?></strong><br>

                </div>
                <div class="card-body">

                    <?=$sac[0]->descricao;?><br>
                    <br>
                    <table  class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Mensagens</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($iteracao)): ?>
                                <?php foreach($iteracao as $item): ?>
                                    <tr>

                                        <td>

                                            <?php echo $item->mensagem;?>
                                            <br>
                                            <br>
                                            <b>
                                                <?php if($item->id_grupo_acesso=="1"){ echo "Suporte: "; }else{ echo "Cliente: "; } ?>
                                                <?php echo $item->nome;?></b>
                                            <br>
                                            <small>Respondido: <?php echo switchDate(substr($item->data, 0, 10))." as ".substr($item->data, 10, 10);?></small>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <a title="Cancelar" href="<?=site_url('sac')?>" class="btn btn-danger btn-sm">
                      <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <a title="Cadastrar SAC" href="<?= site_url('sac/mensagem/'.$sac[0]->id_sac)?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-check"></i> Responder
                    </a>

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
