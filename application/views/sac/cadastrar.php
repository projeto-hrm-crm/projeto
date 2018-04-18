<div class="animated fadeIn">
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Cadastrar Reclamação</strong>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('sac/create'); ?>" method="POST" class="form-horizontal">
                       <div class="row form-group">
                         <div class="col-md-2"><label class=" form-control-label">Assunto</label></div>
                         <div class="col-md-10"><input type="text" id="titulo" name="titulo" placeholder="Assunto" class="form-control"></div>
                       </div>
                       <div class="row form-group">
                         <div class="col-md-2"><label class=" form-control-label">Produto</label></div>
                         <div class="col-md-10">
                           <select id="id_produto" name="id_produto" class="form-control">
                              <option value="0">Produtos</option>
                           </select>                          
                          </div>
                       </div>
                       <div class="row form-group">
                         <div class="col-md-2"><label class=" form-control-label">Descrição</label></div>
                         <div class="col-md-10">
                            <textarea id="mensagem" name="mensagem" class="form-control" placeholder="Fale o problema tido com o produto."></textarea>
                          </div>
                       </div>
                       
                       <div class="card-footer">
                         <button type="submit" class="btn btn-primary btn-sm">
                           <i class="fa fa-dot-circle-o"></i> Enviar
                         </button>
                         <a href="<?= site_url('sac/index')?>" class="btn btn-danger btn-sm">
                         <i class="fa fa-ban"></i> Cancelar
                         </a>
                       </div>
                     </form>
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
