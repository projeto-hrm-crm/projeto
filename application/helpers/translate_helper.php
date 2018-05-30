<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function getSituationName($situation)
{
	switch($situation)
	{
	    case 'AP':
	        return 'Aguardando Pagamento';
	        break;
	    case 'PG':
	        return 'Pago / Finalizado';
	        break;
	    case 'AE':
	        return 'Aguardando Envio';
	        break;
	    case 'EV':
	        return 'Enviado';
	        break;
	    case 'ET':
	        return 'Entregue';
	        break;
	    case 'CC':
	        return 'Cancelado';
	        break;
	    case 'RB':
	        return 'Reembolso';
	        break;
	    case 'ER':
	        return 'Erro no Pagamento';
	        break;
	     case 'PA':
	        return 'Pedido em Aberto';
	        break;
	}
}


function getSituationClass($situation)
{
	switch($situation)
	{
	    case 'AP':
	        return 'primary';
	        break;
	    case 'PG':
	        return 'success';
	        break;
	    case 'AE':
	        return 'info';
	        break;
	    case 'EV':
	        return 'light';
	        break;
	    case 'ET':
	        return 'secondary';
	        break;
	    case 'CC':
	        return 'danger';
	        break;
	    case 'RB':
	    case 'PA':
	        return 'warning';
	        break;
	    case 'ER':
	        return 'dark';
	        break;

	    }
}