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
          <strong class="card-title">funcionario</strong>
        </div>
        <div class="card-body">

          <a href="<?= site_url('funcionario/cadastrar')?>" class="btn btn-primary btn-sm">
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
              <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                  <td class="text-center"><?= $funcionario->nome; ?></td>
                  <td class="text-center"><?= $funcionario->email; ?></td>
                  <td class="text-center">
                    <?php
                    if($funcionario->sexo == 0){
                      echo "Homem";
                    }
                    if($funcionario->sexo == 1){
                      echo "Mulher";
                    }
                    ?>
                  </td>

                  <td class="text-center">
                    <?php
                    $source = $funcionario->data_nascimento;
                    $date = new DateTime($source);
                    echo $date->format('d/m/Y');
                    ?>
                  </td>
                  <td class="text-center">
                    <a title="Editar" href="<?= site_url('funcionario/editar/'.$funcionario->id_funcionario)?>" class="btn btn-primary">
                      <span class="fa fa-edit"></span></a>
                        <button data-href="funcionario/excluir/<?php echo $funcionario->id_funcionario?>" class="btn btn-danger" title="Excluir Funcionário" data-toggle="modal" data-target="#modalRemover">
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
    </div>
    <div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Excluir Funcionário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja realmente excluir esse funcionário?
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
