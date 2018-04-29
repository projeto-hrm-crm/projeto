<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a class="btn btn-primary" title="cadastrar" href="<?= site_url('setor/insert')?>">Cadastrar Setor</a>
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
  						<a title="Editar" href="<?= site_url('setor/edit/'.$setor->id_setor)?>">Editar</a> |
              <a title="Excluir" href="<?= site_url('setor/remove/'.$setor->id_setor)?>">Excluir</a>
  					</td>
  				</tr>
        <?php endforeach ?>
  		</tbody>
    </table>
  </body>
</html>
