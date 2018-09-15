<!-- FUNCIONÁRIO -->
<div class="animated fadeIn">
  <div class="row" >
    <div class="col-md-12">
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
          <strong class="card-title">Funcionarios</strong>
        </div>

        <div class="card-body">

          <table id="bootstrap-data-table" class="table table-striped table-bordered datatable">

            <thead>
              <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Horas</th>
              </tr>
            </thead>

            <tbody>
              <?php if (!is_null($funcionarios)): ?>
                  <?php foreach ($funcionarios as $funcionario): ?>
                    <tr>
                      <td class="text-center"><?= $funcionario->nome; ?></td>
                      <td class="text-center"><?= $funcionario->email; ?></td>
                      <td class="text-center">
                        <a title="Editar funcionário" href="<?= site_url('ponto/editar/'.$funcionario->id_funcionario)?>" class="btn btn-primary">
                        <span class="fa fa-edit"></span></a>
                       </td>
                     </tr>
                   <?php endforeach ?>
                  <?php endif;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
