<div class="animated fadeIn">
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Fornecedores</strong>
                </div>
                <div class="card-body">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
  		<thead>
  			<tr>
  				<th class="text-center">ID</th>
  				<th>Info</th>
  				<th>E-mail</th>
  				<th>Telefone</th>
  				<th class="text-center">Ações</th>
  			</tr>
  		</thead>

  		<tbody>
  			<?php foreach ($fornecedores as $fornecedor): ?>
  				<tr>
  					<td class="text-center"><?=$fornecedor->id_fornecedor; ?></td>
  					<td>
                  <?= $fornecedor->nome;?> 
               </td>
               <td><?= $fornecedor->email; ?></td>
               <td><?= $fornecedor->telefone; ?></td>
  					<td class="text-center">
                  
                  
                  <a href="<?=site_url('fornecedor/editar/'.$fornecedor->id_fornecedor);?>" class="btn btn-primary">
                        <span class="fa fa-edit"></span>
                    </a>
                    <a href="<?=site_url('fornecedor/excluir/'.$fornecedor->id_fornecedor);?>" class="btn btn-danger">
                        <span class="fa fa-close"></span>
                    </a>
  					</td>
  				</tr>
        <?php endforeach ?>
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