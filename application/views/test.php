<div class="row">
	<div class="col-md-12">
		
	
<form action="<?= base_url('pessoa/atualizar'); ?>" method="POST">
	
	<input type="text" name="id_pessoa" value="<?php if(isset($pessoa)) echo $pessoa[0]->id ?>">
	<legend>Pessoa</legend>
	<label>Nome</label>
	<input type="text" name="nome" value="<?php if(isset($pessoa)) echo $pessoa[0]->nome_pessoa ?>">
	<label>E-Mail</label>
	<input type="text" name="email" value="<?php if(isset($pessoa)) echo $pessoa[0]->email ?>">

	<legend>Endereço</legend>
	<label>CEP</label>
	<input type="text" name="cep" value="<?php if(isset($pessoa)) echo $pessoa[0]->cep ?>">
	<label>Estado</label>
	<input type="text" name="estado" value="<?php if(isset($pessoa)) echo $pessoa[0]->estado ?>">
	<label>Cidade</label>
	<input type="text" name="cidade" value="<?php if(isset($pessoa)) echo $pessoa[0]->cidade ?>">
	<label>Bairro</label>
	<input type="text" name="bairro" value="<?php if(isset($pessoa)) echo $pessoa[0]->bairro ?>">
	<label>Logradouro</label>
	<input type="text" name="logradouro" value="<?php if(isset($pessoa)) echo $pessoa[0]->logradouro ?>">
	<label>Número</label>
	<input type="text" name="endereco_numero" value="<?php if(isset($pessoa)) echo $pessoa[0]->numero_endereco ?>">
	<label>Complemento</label>
	<input type="text" name="complemento" value="<?php if(isset($pessoa)) echo $pessoa[0]->complemento ?>">


	<legend>Documento</legend>
	<label>Número</label>
	<input type="text" name="documento_numero" value="<?php if(isset($pessoa)) echo $pessoa[0]->documento ?>">
	<label>Tipo</label>
	<input type="text" name="tipo" value="<?php if(isset($pessoa)) echo $pessoa[0]->tipo_documento ?>">


	<legend>Telefone</legend>
	<label>Número</label>
	<input type="text" name="telefone_numero" value="<?php if(isset($pessoa)) echo $pessoa[0]->telefone ?>">




	<button type="submit">SUBMIT</button>

</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>E-Mail</th>
			<th>Documento</th>
			<th>Documento - Tipo</th>
			<th>Telefone</th>
			<th>CEP</th>
			<th>Estado</th>
			<th>Cidade</th>
			<th>Bairro</th>
			<th>Logradouro</th>
			<th>Número</th>
			<th>Complemento</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pessoas as $pessoa): ?>
			<tr>
				<td>
					<?php echo $pessoa->nome_pessoa ?>
				</td>
				<td>
					<?php echo $pessoa->email ?>
				</td>
				<td>
					<?php echo $pessoa->documento ?>
				</td>
				<td>
					<?php echo $pessoa->tipo_documento ?>
				</td>
				<td>
					<?php echo $pessoa->telefone ?>
				</td>
				<td>
					<?php echo $pessoa->cep ?>
				</td>
				<td>
					<?php echo $pessoa->estado ?>
				</td>
				<td>
					<?php echo $pessoa->cidade ?>
				</td>
				<td>
					<?php echo $pessoa->bairro ?>
				</td>
				<td>
					<?php echo $pessoa->logradouro ?>
				</td>
				<td>
					<?php echo $pessoa->numero_endereco ?>
				</td>
				<td>
					<?php echo $pessoa->complemento ?>
				</td>
				<td>
					<a href="<?php echo base_url('pessoa/editar/'.$pessoa->id); ?>" class="btn btn-primary btn-sm btn-block">
						Editar
					</a>
					<a href="<?php echo base_url('pessoa/remover/'.$pessoa->id); ?>" class="btn btn-danger btn-sm btn-block">
						Remover
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

	</div>
</div>

