<!-- CANDIDATO -->

<div class="animated fadeIn">
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Cliente</strong>
                </div>
                <div class="card-body">

                   <a href="<?= site_url('candidato/create')?>" class="btn btn-primary btn-sm">
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
                          <th class="text-center">Vaga</th>
                  				<th class="text-center">Ações</th>
                  			</tr>
                  		</thead>

                  		<tbody>
                  			<?php foreach ($candidatos as $candidato): ?>
                  				<tr>
                  					<td class="text-center"><?= $candidato->id_candidato; ?></td>
                  					<td class="text-center"><?= $candidato->nome; ?></td>
                            <td class="text-center"><?= $candidato->email; ?></td>
                            <td class="text-center">
                              <?php
                                if($candidato->sexo == 0){
                                  echo "Homem";
                                }
                                if($candidato->sexo == 1){
                                  echo "Mulher";
                                }
                              ?>
                            </td>
                  					<td class="text-center">
                              <?php
                                $source = $candidato->data_nascimento;
                                $date = new DateTime($source);
                                echo $date->format('d/m/Y');
                              ?>
                            </td>
                            <td class="text-center"><?= $candidato->vaga; ?></td>
                  					<td class="text-center">
                  						<a title="Editar" href="<?= site_url('candidato/edit/'.$candidato->id_candidato)?>" class="btn btn-primary">
      										        <span class="fa fa-edit"></span></a>
                              <a title="Excluir" href="<?= site_url('candidato/delete/'.$candidato->id_candidato)?>" class="btn btn-danger">
      										        <span class="fa fa-close"></span></a>
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
