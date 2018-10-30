jQuery().ready(function($){


	getEtapas = function(id_etapa) {

		if (!id_etapa)
			return;
			 
		$.ajax({
	            url: BASE_URL + "/Home/getEtapasProcesso/" + id_etapa,
	            data: 'JSON',
	            success: (value) => {
	                var value = JSON.parse(value);
	                loadCalendar(value);
	            },
	            error: (error) => {

	            }
	    });
	}

});
