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

});
