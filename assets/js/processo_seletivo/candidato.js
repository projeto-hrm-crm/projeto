jQuery().ready(function($){

	aprovar = function(id_candidato) {

		var avaliacao = "aprovado";
		
		$.ajax({

	            url: BASE_URL + "candidato/aprovar" + id_candidato + "/" + avaliacao,
	            data: 'JSON',
	            success: (value) => {
	            	alert("candidato Aprovado");
	            },
	            error: (error) => {
	            	alert("não atualizado");
	            }
	    });
	    
	}//fim de aprovar

	reprovar = function(id_candidato) {

		var avaliacao = "reprovado";
		
		$.ajax({

	            url: BASE_URL + "candidato/reprovar" + id_candidato + "/" + avaliacao,
	            data: 'JSON',
	            success: (value) => {

               		alert("candidato reprovado");
	            },
	            error: (error) => {
	            	alert("não atualizado");
	            }
	    });
	    
	}//fim de reprovar

});