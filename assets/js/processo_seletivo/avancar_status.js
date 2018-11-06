jQuery().ready(function($){

	getStatus = function(id, status) {

  		if(status >= 4){
		   	alert("etapa finalizada");

	    }else{
	    	status++;
		    
			$.ajax({

		            url: BASE_URL + "status/avancar/" + id + "/" + status,
		            data: 'JSON',
		            success: (value) => {

	               		alert(status);
		            },
		            error: (error) => {
		            	alert("não atualizado");
		            }
		    });
	    }
	}

});