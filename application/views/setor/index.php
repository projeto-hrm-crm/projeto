<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="col-md-12">
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success">
          <p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
        </div>
      <?php elseif ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger">
          <p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
        </div>
      <?php endif; ?>
    </div>

    <a class="btn btn-primary" title="cadastrar" href="<?= site_url('setor/cadastrar')?>">Cadastrar Setor</a>
    <table id="setorTable" class="table table-striped">
  		<thead>
  			<tr>
  				<th class="text-center">ID</th>
          <th class="text-center">Nome</th>

  			</tr>
  		</thead>

  		<tbody>
  			<?php foreach ($setores as $setor): ?>
  				<tr>
  					<td class="text-center"><?= $setor->id_setor; ?></td>
            <td class="text-center"><?= $setor->nome; ?></td>

  					<td class="text-center">
  						<a title="Editar" href="<?= site_url('setor/editar/'.$setor->id_setor)?>">Editar</a> |
              <a title="Excluir" href="<?= site_url('setor/excluir/'.$setor->id_setor)?>">Excluir</a>
  					</td>
  				</tr>
        <?php endforeach ?>
  		</tbody>
    </table>
  </body>
</html>
