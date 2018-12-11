jQuery().ready(function($){

	getStatus = function(id, status) {

  		if(status >= 4){
		   	alert("Etapa Finalizada");

	    }else{
	    	status++;
		    
			$.ajax({

		            url: BASE_URL + "status/avancar/" + id + "/" + status,
		            data: 'JSON',
		            success: (value) => {
		            	if (status == 2){
		            		alert("Etapa aberta");
		            	}else{
		            		alert("Etapa em andamento");
		            	}
	               		
		            },
		            error: (error) => {
		            	alert("não atualizado");
		            }
		    });
	    }
	}

});