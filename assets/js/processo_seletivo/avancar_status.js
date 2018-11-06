jQuery().ready(function($){

	getStatus = function(id, status) {
		console.log(id);
		console.log(status);
  		if(status >= 4){
		   	alert("etapa finalizada");

	    }else{
			alert("passou ufa!");

			$.ajax({
		            url: BASE_URL + "status/avancar/" + id + "/" + status,
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