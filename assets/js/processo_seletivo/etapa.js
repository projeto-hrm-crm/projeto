jQuery().ready(function($){


	getEtapas = function(id_etapa) {
		
		 
		$.ajax({
	            url: BASE_URL + "/etapas/visualizar/" + id_etapa,
	            data: 'JSON',
	            success: (value) => {
	                var etapas = JSON.parse(value);
	                
	                $(".listarEtapas").html("");
	                
	                for(var etapa in etapas) {
	                	$('.listarEtapas').append(
	                		`
	                		<tr>
		                		<td> ${etapas[etapa].codigo} </td>
		                		<td> ${etapas[etapa].etapa_nome} </td>
		                		<td> ${etapas[etapa].descricao_etapa} </td>
	                		</tr>
	                		`
	                	)
	                }
	            },
	            error: (error) => {

	            }
	    });
	}

});
