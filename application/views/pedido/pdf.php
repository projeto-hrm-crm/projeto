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


<?php print_r($pedido); ?>


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
    		<strong> Nº:</strong> <?php echo $pedido->id_pedido; ?>
    	</p>
    </td>
  </tr>
  <tr>
    <td class="border-left padding">
    	<strong> Data:</strong> 21/04/2018
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
    	Tiago Villalobos
    </td>
    <td width="25%" class="border-right ">
    	<strong>Documento:</strong>
    	<br>
    	340.124.578.37
    </td>
    <td width="25%" class="">
    	<strong>Telefone:</strong>
    	<br>
    	(12) 3887 - 9006
    </td>
  </tr>
</table>

<table width="100%" class="border-left border-right border-bottom" cellspacing="0">
	<tr>
    	<td width="33%" class="border-right ">
            <strong>Endereço:</strong>
            <br>
            Rua do Contorno, 199   
        </td>
    	<td width="33%" class="border-right ">
            <strong>Bairro:</strong>
            <br>
            Pontal Santa Marina
        </td>
    	<td width="33%" class="">
            <strong>Cidade:</strong>
            <br>
            Caraguatatuba - SP
        </td>
  	</tr>
</table>


<br>
<strong>Descrição</strong>


<table width="100%" class="border-all" cellspacing="0">
    <tr>
        <td style="text-align: justify;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </td>
    </tr>
     <tr>
        <td class="border-top">
            <small><strong>Situação do Pedido:</strong> Aguardando pagamento</small>
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

    <tr>
        <td class="border-right border-top">
            150    
        </td>
        <td class="border-right border-top">
            Um produto
        </td>
        <td class="border-right border-top" align="right">
            R$ 15,00
        </td>
        <td class="border-right border-top" align="right">
            2
        </td>
        <td class="border-top" align="right">
            R$ 30,00
        </td>
    </tr>
</table>

<table align="right">
     <tr>
        <td>
           <strong>R$ 30,00</strong>
        </td>
    </tr>
</table>
<br>

<p align="center">Caraguatatuba, 22 de Maio de 2018</p>
<br>
<table width="100%"  cellspacing="0">

    <tr>
        <td align="center">
            ________________________________
            <br>
            Tiago Villalobos
        </td>
        <td align="center">
            ________________________________
            <br>
            Responsável
        </td>
    </tr>
</table>



