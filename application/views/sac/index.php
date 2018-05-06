<div class="animated fadeIn">
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Ordens</strong>
                </div>
                <div class="card-body">
                  
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="10%">Código</th>
                                <th>Titulo</th>
                                <th width="20%">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($sac)): ?>
                                <?php foreach($sac as $item): ?>
                                    <tr>
                                        <td><?=$item->id_sac;?></td>
                                        <td><?=$item->titulo;?></td>
                                        <td>
                                            <a href="<?php echo site_url('sac/editar/'.$item->id_sac); ?>" class="btn btn-primary">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <a href="<?php echo site_url('sac/excluir/'.$item->id_sac); ?>" class="btn btn-danger">
                                                <span class="fa fa-close"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
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