jQuery().ready(function() {;

    jQuery("#form_produto").validate({
        rules: {
            nome: "required",

            lote: {
                required: true,
            },

            codigo: {
                required: true,
            },

            recebimento: {
                required: true,
            },

            fabricacao: {
                required: true,
            },

            validade: {
                required: true,
            },
        },
        messages: {
            nome: "Insira o nome do produto",

            lote: {
                required: "Insira o lote do produto",
            },

            codigo: {
                required: "Insira o código do produto",
            },

            recebimento: {
                required: "Insira a data de recebimento",
            },

            fabricacao: {
                required: "Insira a data de fabricação",
            },

            validade: {
                required: "Insira a data de validade",
            },
        },

    });
                           
   jQuery("#form_fornecedor").validate({
        rules: {
            nome: "required",
            email: "required",
            razao_social: "required",
            cnpj: "required",
            telefone: "required",

        },
        messages: {
            nome: "Insira o nome do produto",

            email: {
                required: "Insira o e-mail",
            },

            razao_social: {
                required: "Informe a razão social",
            },

            cnpj: {
                required: "Insira o número do CNPJ",
            },

            telefone: {
                required: "Insira o número de Telefone",
            },
        },

    });

    jQuery('#form-vaga').validate({

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
                min:      1
            },

            requisitos:{
                required: true,
                regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/
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
                min:      'O campo Quantidade deve conter um número maior que 0'
            },

            requisitos:{
                required: 'O campo Requisitos é obrigatório',
                regex:    'O campo Requisitos não está no formato correto.'
            },

        },

    });




    //Métodos de validação extras

    /*
    * @author:Tiago Villalobos
    * Verifica se a data é válida
    */
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

    /**
    * @author: Tiago Villalobos
    * Validação com expressão regular
    **/
    jQuery.validator.addMethod('regex', function(value, element, regexp){
        var re = new RegExp(regexp);

        return this.optional(element) || re.test(value);
    });


});
