<style>

	* {
		font-family: arial;
	}

	.border-left {
		border-left: 1px solid #000;
	}

	.border-right {
		border-right: 1px solid #000;
	}

	.border-top {
		border-top: 1px solid #000;
	}

	.border-bottom {
		border-bottom: 1px solid #000;
	}

	.border-bottom {
		border-bottom: 1px solid #000;
	}

	.border-all{
		border: 1px solid #000;
	}

	.padding {
		padding: 10px;
	}

</style>

<table width="100%" class="border-all" cellspacing="0">
  <tr>
    <td rowspan="2" align="left" width="20%" class="padding">
    	<img src="<?php echo base_url('assets/images/logo.png'); ?>" width="80">
    </td>
    <td rowspan="2" align="left" class="padding" style="vertical-align: top;">
    	<p>Empresa Sem Nome</p><br>
    	<p>Rua da empresa sem nome, 50 - Cidade - ST</p>
    	<p>Telefone: (XX) XXXX - XXXX - www.empresa.com.br</p>
    </td>
    <td width="20%" class="border-left border-bottom padding">
    	<p>
    		<strong> Nº:</strong> <?php echo $pedido->id ?>
    	</p>
    </td>
  </tr>
  <tr>
    <td class="border-left padding">
    	<strong> Data:</strong> <?php echo swicthTimestamp($pedido->data, FALSE); ?>
    </td>
  </tr>
</table>


<h2 align="center">Pedido de Produtos/Serviços</h2>


<strong>Dados do Cliente</strong>
<table width="100%" class="border-all" cellspacing="0">
  <tr>
    <td width="50%" class="border-right ">
    	<strong>Nome:</strong>
    	<br>
    	<?php echo $pedido->cliente; ?>
    </td>
    <td width="25%" class="border-right ">
    	<strong><?php echo strtoupper($pedido->tipo_documento); ?>:</strong>
    	<br>
    	<?php echo $pedido->documento; ?>
    </td>
    <td width="25%" class="">
    	<strong>Telefone:</strong>
    	<br>
    	<?php echo $pedido->telefone; ?>
    </td>
  </tr>
</table>

<table width="100%" class="border-left border-right border-bottom" cellspacing="0">
	<tr>
		<td width="100%" colspan="2" class="border-bottom">
	        <strong>Endereço:</strong>
	        <br>
	        <?php echo $pedido->logradouro.', '.$pedido->endereco_numero.' '.$pedido->complemento; ?>   
	    </td>
	</tr>
	<tr>
    	<td width="50%" class="border-right ">
            <strong>Bairro:</strong>
            <br>
            <?php echo $pedido->bairro; ?>
        </td>
    	<td width="50%" class="">
            <strong>Cidade:</strong>
            <br>
            <?php echo $pedido->cidade.' - '.$pedido->estado; ?>
        </td>
  	</tr>
</table>


<br>
<strong>Descrição</strong>


<table width="100%" class="border-all" cellspacing="0">
    <tr>
        <td style="text-align: justify;">
        	<?php echo $pedido->descricao; ?>
        </td>
    </tr>
     <tr>
        <td class="border-top">
            <small><strong>Situação do Pedido:</strong> <?php echo getSituationName($pedido->situacao); ?></small>
        </td>
    </tr>
</table>
<br>

<strong>Produtos/Serviços</strong>
<table width="100%" class="border-all" cellspacing="0">
    <tr>
        <th class="border-right" align="left" width="10%">
            Código    
        </th>
        <th class="border-right" align="left" width="50%">
            Descrição
        </th>
        <th class="border-right" align="right" width="15%">
            Unitário
        </th>
        <th class="border-right" align="right" width="10%">
            Qtd
        </th>
        <th align="right" width="15%">
            Total
        </th>
    </tr>
    
    	<?php 
    		$total = 0;
    		foreach ($pedido_produtos as $produto): 
   	 	?>
	    <tr>
	        <td class="border-right border-top">
	        	<?php echo $produto->id_produto; ?> 
	        </td>
	        <td class="border-right border-top">
	            <?php echo $produto->nome; ?> 
	        </td>
	        <td class="border-right border-top" align="right">
	            <?php echo 'R$ '.number_format($produto->valor, 2, ',',''); ?> 
	        </td>
	        <td class="border-right border-top" align="right">
	            <?php echo $produto->quantidade; ?> 
	        </td>
	        <td class="border-top" align="right">
	            <?php echo 'R$ '.number_format(($produto->valor * $produto->quantidade), 2, ',',''); ?> 
	        </td>
	    </tr>
	    <?php 
				$total += $produto->valor * $produto->quantidade;
			endforeach 
		?>

</table>

<table align="right">
     <tr>
        <td>
           <strong><?php echo 'R$ '.number_format(($total), 2, ',',''); ?> </strong>
        </td>
    </tr>
</table>
<br>

<p align="center">Caraguatatuba, <?php echo strftime("%d de %B de %Y", strtotime(date('Y-m-d'))); ?></p>
<br>
<table width="100%"  cellspacing="0">

    <tr>
        <td align="center">
            ________________________________
            <br>
            <?php echo $pedido->cliente; ?>
        </td>
        <td align="center">
            ________________________________
            <br>
            Responsável
        </td>
    </tr>
</table>



