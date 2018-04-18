<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a class="btn btn-primary" title="cadastrar" href="<?= site_url('funcionario/create')?>">Cadastrar</a>
    <table id="funcionarioTable" class="table table-striped">
  		<thead>
  			<tr>
  				<th class="text-center">ID</th>
  				<th class="text-center">Nome</th>
  				<th class="text-center">email</th>
  				<th class="text-center">Data Nascimento</th>
  				<th class="text-center">Ações</th>
  			</tr>
  		</thead>

  		<tbody>
  			<?php foreach ($funcionarios as $funcionario): ?>
  				<tr>
  					<td class="text-center"><?= $funcionario->id_funcionario; ?></td>
  					<td class="text-center"><?= $funcionario->nome; ?></td>
            <td class="text-center"><?= $funcionario->email; ?></td>
  					<td class="text-center"><?= $funcionario->data_nascimento; ?></td>
  					<td class="text-center">
  						<a title="Editar" href="<?= site_url('funcionario/edit/'.$funcionario->id_funcionario)?>">Editar</a> |
              <a title="Excluir" href="<?= site_url('funcionario/delete/'.$funcionario->id_funcionario)?>">Excluir</a>
  					</td>
  				</tr>
        <?php endforeach ?>
  		</tbody>
    </table>
  </body>
</html>
