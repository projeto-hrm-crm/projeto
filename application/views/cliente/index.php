  <div class="row" >
    <div class="col-lg-10">
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
          <a title="Cadastrar Novo Cliente" href="<?= site_url('cliente/cadastrar')?>" class="btn btn-primary btn-sm">
            <i class="fa fa-check"></i> Novo Cadastro
          </a><br />
          <br />
          <table id="bootstrap-data-table" class="table table-striped table-bordered datatable">

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
                    <?php echo ($cliente->sexo == 0)? "Masculino" : "Feminino"; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $cliente->data_nascimento; ?>
                  </td>
                  <td class="text-center">
                    <a title="Editar Cliente" href="<?= site_url('cliente/editar/'.$cliente->id_cliente)?>" class="btn btn-primary btn-sm">
                      <span class="fa fa-pencil-square-o"></span></a>
                       <button data-href="cliente/excluir/<?php echo $cliente->id_cliente?>" class="btn btn-danger btn-sm" title="Excluir Cliente" data-toggle="modal" data-target="#modalRemover">
                            <span class="fa fa-times"></span>
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
                Deseja Realmente Excluir Esse Cliente?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                    Cancelar
                </button>
                <a href="#" class="btn btn-primary btn-remove-ok btn-sm">
                    Confirmar
                </a>
            </div>
        </div>
    </div>
