<!-- CLIENTE -->
<div class="animated fadeIn">
  <div class="row" >
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Cliente</strong>
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
        <div class="card-body">

          <a href="<?= site_url('cliente/create')?>" class="btn btn-primary btn-sm">
            <i class="fa fa-check"></i> Cadastrar
          </a><br />
          <br />
          <table id="bootstrap-data-table" class="table table-striped table-bordered">

            <thead>
              <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Sexo</th>
                <th class="text-center">Data Nascimento</th>
                <th class="text-center">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($clientes as $cliente): ?>
                <tr>
                  <td class="text-center"><?= $cliente->nome; ?></td>
                  <td class="text-center"><?= $cliente->email; ?></td>
                  <td class="text-center">
                    <?php
                    if($cliente->sexo == 0){
                      echo "Homem";
                    }
                    if($cliente->sexo == 1){
                      echo "Mulher";
                    }
                    ?>
                  </td>
                  <td class="text-center">
                    <?php
                    $source = $cliente->data_nascimento;
                    $date = new DateTime($source);
                    echo $date->format('d/m/Y');
                    ?>
                  </td>
                  <td class="text-center">
                    <a title="Editar" href="<?= site_url('cliente/editar/'.$cliente->id_cliente)?>" class="btn btn-primary">
                      <span class="fa fa-edit"></span></a>
                       <button data-href="cliente/deletar/<?php echo $cliente->id_candidato?>" class="btn btn-danger" title="Excluir Cliente" data-toggle="modal" data-target="#modalRemover">
                            <span class="fa fa-close"></span>
                        </button>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Excluir Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja realmente excluir esse cliente?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secundary" data-dismiss="modal">
              Cancelar
            </button>
            <a href="#" class="btn btn-primary btn-remove-ok">
              Confirmar
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
