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
                brazilian_date: true,
            },

            fabricacao: {
                required: true,
                brazilian_date: true,
            },

            validade: {
                required: true,
                brazilian_date: true,
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
                brazilian_date: "Insira uma data valida",
            },

            fabricacao: {
                required: "Insira a data de fabricação",
                brazilian_date: "Insira uma data valida",
            },

            validade: {
                required: "Insira a data de validade",
                brazilian_date: "Insira uma data valida",
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
