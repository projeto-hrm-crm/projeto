$(document).ready(function() {
	var form = jQuery('#form-vaga');

	form.validate({

	    highlight:function(input)
	    {
	        jQuery(input).addClass('is-invalid');
	    },

	    unhighlight:function(input) 
	    {
	        jQuery(input).removeClass('is-invalid');
	    },

	    errorPlacement:function(error, element)
	    {
	        jQuery(element).parents('.form-group').find('.invalid-feedback').append(error);
	    },

	    rules: {
	    	
	    	id_cargo:{
	    		required: true,
	    		digits:   true,
	    	},

	    	data_oferta:{
	    		required:       true,
	    		brazilian_date: true,
	    	},

	    	quantidade:{
	    		required: true,
	    		digits:   true,
	    	},

	    	requisitos:{
	    		required: true
	    	},

	    },

	    messages: {
	    	
	    	id_cargo:{
	    		required: 'O campo Cargo é obrigatório',
	    		digits:   'O campo Cargo deve conter um número inteiro',
	    	},

	    	data_oferta:{
	    		required:       'O campo Data da Oferta é obrigatório',
	    		brazilian_date: 'O campo Data da Oferta deve conter um data válida',
	    	},

	    	quantidade:{
	    		required: 'O campo Quantidade é obrigatório',
	    		digits:   'O campo Quantidade deve conter um número inteiro',
	    	},

	    	requisitos:{
	    		required: 'O campo Requisitos é obrigatório'
	    	},

	    },

	});

	jQuery.validator.addMethod('brazilian_date', function(value, element) { 
	    
	    var check = false;
       	
       	var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;

       	if(re.test(value))
       	{      
            var adata = value.split('/');  

            var gg   = parseInt(adata[0], 10);  
            var mm   = parseInt(adata[1], 10);  
            var aaaa = parseInt(adata[2], 10);  

            var xdata = new Date(aaaa, mm-1, gg);  

            if((xdata.getFullYear() == aaaa) && (xdata.getMonth () == mm - 1) && (xdata.getDate() == gg))
            {
                check = true;  
            }
            else  
            {
                check = false;  
            }
                 
       	} 
       	else
       	{
            check = false;  
       	}  
            
       	return this.optional(element) || check;  

	});


});