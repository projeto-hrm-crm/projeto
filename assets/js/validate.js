jQuery(document).ready(function($) {;

    $("#form_produto").validate({
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

   $("#form_fornecedor").validate({

        rules: {
            nome: "required",
            email: "required",
            razao_social: "required",
            cnpj: "required",
            telefone: "required",
            cep: "required",
            bairro: "required",
            numero: "required",
            logradouro: "required",
            compremento: "required",

        },
        messages: {
            nome: "Insira o nome do fornecedor",

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

            cep: {
                required: "Insira o CEP",
            },

            bairro: {
                required: "Informe o bairro",
            },

            numero: {
                required: "Insira o número",
            },

            logradouro: {
                required: "Informe o logradouro",
            },
            complemento: {
                required: "Informe o complemento",
            },
        },

    });

   $("#form-sac").validate({
        rules: {
            titulo: "titulo",
            descricao: "descricao",

        },
        messages: {
            titulo: "Insira um asssunto ao SAC",

            descricao: {
                required: "Insira a descrição de seu problema",
            },


        },

    });

    $('#form-vaga').validate({

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

        submitHandler:function (form, event) {

            event.preventDefault(); //Evita que o formulário seja submetido

            var action = $(form).prop('action'); // Recupera o action do formulário

            /*
            *   Verifica se a url do action do formulário contém a palavra editar
            *   Se sim abre, abre o modal para confirmação setando o evento de submissão do
            *   formulário para o click do botão do modal.
            *   Caso não contenha a palavra editar, o formulário é submetido normalmente.
            */
            if(action.indexOf('editar') >= 0)
            {
                jQuery("#modalAtualizar").modal('show');

                jQuery('.btn-edit').click(function () {
                    form.submit();
                });
            }
            else
            {
                form.submit();
            }

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

    $('#form_candidato').validate({

      rules: {
          nome: "required",
          email: "required",
          data_nacimento: {
              required: true,
              brazilian_date: true,
          },
          cpf: "required",
          telefone: "required",
          cep: "required",
          bairro: "required",
          numero: "required",
          logradouro: "required",

      },
      messages: {
          nome: "Insira o nome do fornecedor",

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

          cep: {
              required: "Insira o CEP",
          },

          bairro: {
              required: "Informe o bairro",
          },

          numero: {
              required: "Insira o número",
          },

          logradouro: {
              required: "Informe o logradouro",
          },
          complemento: {
              required: "Informe o complemento",
          },
      },


    });


    $('#form-pedido').validate({

        highlight:function(input)
        {
            var inputName = $(input)[0].name;

            if(inputName == 'tipo' || inputName == 'compra')
            {
              jQuery(input).parents('.form-check').addClass('text-danger');
            }
            else
            {
              jQuery(input).addClass('is-invalid');
              if($('#produtos-table tbody tr').length == 0) $('#id_produto').addClass('is-invalid');
            }

          
        },

        unhighlight:function(input)
        {
            var inputName = $(input)[0].name;

            if(inputName == 'tipo' || inputName == 'compra')
            {
              jQuery(input).parents('.form-check').removeClass('text-danger');
            }
            else
            {
              jQuery(input).removeClass('is-invalid');
            }
            
        },

        errorPlacement:function(error, element)
        {   
            var inputName = $(element)[0].name;

            if(element.is(':radio'))
            {
              if(inputName == 'tipo')
              {
                jQuery('#error-tipo').removeClass('d-none').append(error);  
              }
              else
              {
                jQuery('#error-compra').removeClass('d-none').append(error);
              }
              
            }
            else
            {
              jQuery(element).parents('.form-group').find('.invalid-feedback').append(error);
            }
            
        },

        submitHandler:function (form, event) {

            event.preventDefault(); //Evita que o formulário seja submetido

            var action = $(form).prop('action'); // Recupera o action do formulário

            /*
            *   Verifica se a url do action do formulário contém a palavra editar
            *   Se sim abre, abre o modal para confirmação setando o evento de submissão do
            *   formulário para o click do botão do modal.
            *   Caso não contenha a palavra editar, o formulário é submetido normalmente.
            */
            if($('#produtos-table tbody tr').length > 0)
            {
              if(action.indexOf('editar') >= 0)
              {
                 
                  jQuery("#modalAtualizar").modal('show');

                  jQuery('.btn-edit').click(function () {
                      form.submit();
                  });
                  
              }
              else
              {
                  form.submit();
              }
            }

        },

        rules: {

            id_pessoa:{
                required: true,
            },

            'id_produto':{
                required: true,
            },

            situacao:{
                required: true,
                regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/
            },

            tipo:{
                required: true,
            },

            compra:{
                required: true,
            },

            descricao:{
              required: true,
              regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/
            }

        },

        messages: {

            id_pessoa:{
                required: 'O campo Cliente é obrigatório',
            },

            'id_produto':{
                required: 'Selecione ao menos um Produto/Serviço',
            },

            situacao:{
                required: 'O campo Situação é obrigatório',
                regex:    'O campo Situação não está no formato correto.'
            },

            tipo:{
                required: 'O campo Tipo é obrigatório',
            },

            compra:{
                required: 'O campo Compra/Venda é obrigatório',
            },

            descricao:{
              required: 'O campo Descrição é obrigatório',
              regex:    'O campo Descrição não está no formato correto.'
            }

        },

    });

    //Métodos de validação extras

    /*
    * @author:Tiago Villalobos
    * Verifica se a data é válida
    */
    $.validator.addMethod('brazilian_date', function(value, element) {

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
    $.validator.addMethod('regex', function(value, element, regexp){
        var re = new RegExp(regexp);

        return this.optional(element) || re.test(value);
    });

    $.validator.addMethod('table_rows', function(value, element){
      return 
    });

});
