<!DOCTYPE html>
<!-- <pre>
  <?php print_r($fornecedores) ?>
</pre> -->
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a class="btn btn-primary" title="cadastrar" href="<?= site_url('fornecedor/create')?>">Cadastrar</a>
    <table id="fornecedorTable" class="table table-striped">
  		<thead>
  			<tr>
  				<th class="text-center">ID</th>
  				<th class="text-center">Nome</th>
  				<th class="text-center">CNPJ</th>
  				<th class="text-center">E-mail</th>
  				<th class="text-center">Telefone</th>
  				<th class="text-center">Razao Social</th>
  				<th class="text-center">Ações</th>
  			</tr>
  		</thead>

  		<tbody>
  			<?php foreach ($fornecedores as $fornecedor): ?>
  				<tr>
  					<td class="text-center"><?= $fornecedor->id_fornecedor; ?></td>
  					<td class="text-center"><?= $fornecedor->nome; ?></td>
            <td class="text-center"><?= $fornecedor->cnpj; ?></td>
            <td class="text-center"><?= $fornecedor->email; ?></td>
            <td class="text-center"><?= $fornecedor->telefone; ?></td>
  					<td class="text-center"><?= $fornecedor->razao_social; ?></td>
  					<td class="text-center">
  						<a title="Editar" href="<?= site_url('fornecedor/edit/'.$fornecedor->id_fornecedor)?>">Editar</a> |
              <a title="Excluir" href="<?= site_url('fornecedor/delete/'.$fornecedor->id_fornecedor)?>">Excluir</a>
  					</td>
  				</tr>
        <?php endforeach ?>
  		</tbody>
    </table>
  </body>
</html>
