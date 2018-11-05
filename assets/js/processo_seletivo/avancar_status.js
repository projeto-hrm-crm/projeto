jQuery().ready(function($){


	getStatus = function(status) {
		 
		$.ajax({
	            url: BASE_URL + "status/avancar/" + status,
	            data: 'JSON',
	            success: (value) => {
	                var status = JSON.parse(value);
	                alert("Eu sou um alert!");
	                $(".procuraStatus").html("");
	
	               
	            },
	            error: (error) => {

	            }
	    });
	}

});