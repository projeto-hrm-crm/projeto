jQuery().ready(function($){

	getStatus = function(id, status) {

  		if(status >= 4){
		   	alert("etapa finalizada");

	    }else{
			alert("teste");

			$.ajax({
		            url: BASE_URL + "status/avancar/" + id + "/" + status,
		            //não preciso de retorno só precisa que o update funcione e o valor do status seja alterado
		            data: 'JSON',
		            success: (value) => {
		                var status = JSON.parse(value);
	               
		            },
		            error: (error) => {

		            }
		    });
	    }
	}

});