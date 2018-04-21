<!-- CLIENTE -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a class="btn btn-primary" title="cadastrar" href="<?= site_url('cliente/create')?>">Cadastrar</a>
    <table id="clienteTable" class="table table-striped">
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
  			<?php foreach ($clientes as $cliente): ?>
  				<tr>
  					<td class="text-center"><?= $cliente->id_cliente; ?></td>
  					<td class="text-center"><?= $cliente->nome; ?></td>
            <td class="text-center"><?= $cliente->email; ?></td>
  					<td class="text-center"><?= $cliente->data_nascimento; ?></td>
  					<td class="text-center">
  						<a title="Editar" href="<?= site_url('cliente/edit/'.$cliente->id_cliente)?>">Editar</a> |
              <a title="Excluir" href="<?= site_url('cliente/delete/'.$cliente->id_cliente)?>">Excluir</a>
  					</td>
  				</tr>
        <?php endforeach ?>
  		</tbody>
    </table>
  </body>
</html>
