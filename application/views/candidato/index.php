<!-- CANDIDATO -->
<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
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
                    <strong class="card-title">Candidatos</strong>
                </div>
        <div class="card-body">

          <a href="<?= site_url('candidato/cadastrar')?>" class="btn btn-primary btn-sm" title="Cadastrar candidato">
            <i class="fa fa-check"></i> Novo Cadastro
          </a><br />
          <br />
          <table class="table table-striped table-bordered datatable">

            <thead>
              <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Sexo</th>
                <th class="text-center">Data Nascimento</th>
                <!-- <th class="text-center">Vaga</th> -->
                <th class="text-center">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($candidatos as $candidato): ?>
                <tr>
                  <td class="text-center"><?= $candidato->nome; ?></td>
                  <td class="text-center"><?= $candidato->email; ?></td>
                  <td class="text-center">
                    <?php echo ($candidato->sexo == 0)? "Masculino" : "Feminino"; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $candidato->data_nascimento; ?>
                  </td>
                  <td class="text-center">
                    <a title="Editar candidato" href="<?= site_url('candidato/editar/'.$candidato->id_candidato)?>" class="btn btn-primary">
                      <span class="fa fa-edit"></span></a>
                        <button data-href="candidato/excluir/<?php echo $candidato->id_candidato?>" class="btn btn-danger" title="Excluir candidato" data-toggle="modal" data-target="#modalRemover">
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
                <h5 class="modal-title">Excluir Candidato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja Realmente Excluir Esse Candidato?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">
                    Cancelar
                </button>
                <a href="#" class="btn btn-primary btn-remove-ok">
                    Confirmar
                </a>
            </div>
        </div>
    </div>
</div>
