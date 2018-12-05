<div class="row justify-content-center align-items-center">
  <div class="col-lg-12">
    <?php if ($this->session->flashdata('success')) : ?>
      <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?>
      </div>
    <?php elseif ($this->session->flashdata('danger')) : ?>
      <div class="alert alert-danger">
        <span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger');?>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="card-header">
        <strong class="card-title">Setores</strong>
      </div>

      <div class="card-body">
        <?php
          $type     = "a";
          $label    = "<span class='fa fa-check'></span> Novo Cadastro";
          $classes  = ['btn', 'btn-primary', 'btn-sm'];
          $attr     = [
            'id'    => 'id',
            'href'  => site_url('setor/cadastrar'),
            'title'       => 'Cadastrar Setor',
          ];

          if(!is_null($create_button))
          $edit_button->build($type, $label, $classes, $attr);
        ?>

        <br />
        <br />

        <table class="table table-striped table-bordered datatable">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Sigla</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($setores as $setor): ?>
                <tr>
                  <td><?= $setor->nome; ?></td>
                  <td><?= $setor->sigla; ?></td>
                  <td><?= $setor->descricao; ?></td>
                  <td>
                    <?php
                      $type     = "a";
                      $label    = "<span class='fa fa-pencil-square-o'></span>";
                      $classes  = ['btn', 'btn-primary'];
                      $attr     = [
                        'id'    => 'id',
                        'href'  => site_url('setor/editar/'.$setor->id_setor),
                        'title'       => 'Atualizar Setor',
                      ];

                      if(!is_null($edit_button))
                      $edit_button->build($type, $label, $classes, $attr);
                    ?>

                    <?php
                      $type           = "button";
                      $label          = "<span class='fa fa-times'></span>";
                      $classes        = ['btn', 'btn-danger'];
                      $attr           = [
                        'id'          => 'id',
                        'data-href'   => "setor/excluir/".$setor->id_setor,
                        'data-toggle' => 'modal',
                        'data-target' => '#modalRemover',
                        'title'       => 'Desativar Setor'
                      ];

                      if (!is_null($delete_button))
                        $delete_button->build($type, $label, $classes, $attr);
                    ?>
                  </td>
                </tr>
              <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal remover -->

<div class="modal fade" id="modalRemover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Setor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        Deseja realmente excluir esse setor?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          Cancelar
        </button>
        <a href="#" class="btn btn-primary btn-remove-ok">
          Confirmar
        </a>
      </div>
    </div>
  </div>
</div>
