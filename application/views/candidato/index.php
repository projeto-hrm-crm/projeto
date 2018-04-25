<!-- candidato -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a class="btn btn-primary" title="cadastrar" href="<?= site_url('candidato/create')?>">Cadastrar</a>
    <table id="candidatoTable" class="table table-striped">
  		<thead>
  			<tr>
  				<th class="text-center">ID</th>
  				<th class="text-center">Nome</th>
  				<th class="text-center">E-mail</th>
          <th class="text-center">Sexo</th>
  				<th class="text-center">Data Nascimento</th>
  				<th class="text-center">Ações</th>
  			</tr>
  		</thead>

  		<tbody>
  			<?php foreach ($candidatos as $candidato): ?>
  				<tr>
  					<td class="text-center"><?= $candidato->id_candidato; ?></td>
  					<td class="text-center"><?= $candidato->nome; ?></td>
            <td class="text-center"><?= $candidato->email; ?></td>
            <td class="text-center">
              <?php
                if($candidato->sexo == 0){
                  echo "Homem";
                }
                if($candidato->sexo == 1){
                  echo "Mulher";
                }
              ?>
            </td>
  					<td class="text-center">
              <?php
                $source = $candidato->data_nascimento;
                $date = new DateTime($source);
                echo $date->format('d/m/Y');
              ?>
            </td>
  					<td class="text-center">
  						<a title="Editar" href="<?= site_url('candidato/edit/'.$candidato->id_candidato)?>">Editar</a> |
              <a title="Excluir" href="<?= site_url('candidato/delete/'.$candidato->id_candidato)?>">Excluir</a>
  					</td>
  				</tr>
        <?php endforeach ?>
  		</tbody>
    </table>
  </body>
</html>
