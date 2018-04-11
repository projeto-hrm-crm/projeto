<div class="animated fadeIn">
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Produtos</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Fabricação</th>
                                <th>Validade</th>
                                <th>Lote</th>
                                <th>Recebimento</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($produtos)): ?>
                                <?php foreach($produtos as $produto): ?>
                                    <tr>
                                        <td><?= $produto->codigo;?></td>
                                        <td><?= $produto->nome;?></td>
                                        <td><?= $produto->fabricacao;?></td>
                                        <td><?= $produto->validade;?></td>
                                        <td><?= $produto->lote;?></td>
                                        <td><?= $produto->recebimento;?></td>
                                        <td>
                                            <button type="button" name="editar" class="btn btn-primary">
                                                <span class="fa fa-edit"></span>
                                            </button>
                                            <button type="button" name="remover" class="btn btn-danger">
                                                <span class="fa fa-close"></span>
                                            </button>
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
