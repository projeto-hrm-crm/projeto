jQuery(document).ready(function($) {

  var id_usuario = null;
  if($("#form_funcionario, #form_candidato, #form_cliente, #form_fornecedor").attr('id_usuario')){
    id_usuario = $("#form_funcionario, #form_candidato, #form_cliente, #form_fornecedor").attr('id_usuario');
    console.log(id_usuario)

    console.log($('#form'))
  }

  $("#form_produto").validate({
    rules: {
      nome: {
        required:true,
        regex: /^[a-zA-Z0-9]+/,

      },

      lote: {
        required: true,
        digits:true,

      },

      codigo: {
        required: true,
      },

      recebimento: {
        required: true,
        validaDataBR:true,
        dataMaiorQue: '#fabricacao',

      },

      fabricacao: {
        required: true,
        validaDataBR: true,
      },

      validade: {
        required: true,
        brazilian_date: true,
        dataMaiorQue: '#fabricacao',
      },
      id_fornecedor: {
        required:true,
      },
    },
    messages:{
      fabricacao:{
        max: 'Informe uma data anterior ou igual à atual.',

      },
      nome:{
        regex: 'O campo nome pode conter apenas letras e números',
      },
    }
  });

  $("#form_remanejamento").validate({
    rules: {

      id_cargo: {
        required: true,
      },

      id_funcionario: {
        required: true,
      },

      id_setor: {
        required:true,
      },
    },
  });



  $("#form_almoxarifado").validate({
    rules: {
      nome:{
        required: true,
        regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/,
      },

      recebimento: {
        required: true,
        validaDataBR: true,
        // max: new Date(),
      },

      quantidade:{
        required:true,
        digits:true,
      },

      valor:{
        required:true,
      },

      id_unidade_medida: {
        required: true
      }
    },

    messages: {
      nome:{
        required: 'Por favor, insira o nome do produto.',
        regex:    'Por favor, insira apenas letras e números.',
      },
    },
  });

  $("#form_sugestao").validate({
    rules: {
      nome:{
        required: true,
        regex: /^[a-zA-ZÀ-Úà-ú\s\p{P} ]+$/
      },

      email: {
        required: true,
        email:true
      },

      sugestao: {
        required: true,
      }
    },
    messages: {
      nome:{
        required: 'Por favor, insira o seu nome.',
        regex:    'Por favor, insira apenas letras.',
      },
    },
  });

  $("#form_habilidade").validate({
    rules: {
      nome: "required",
    }
  });

  $("#form_processo_seletivo").validate({
    rules: {
      nome: "required",
      id_vaga: "required",
      descricao: "required",
      "nome_etapa[]":"required",
      "descricao_etapa[]":"required",
      codigo: {
        required: true,
      },
      id_usuario: {
        required: true,
      },
      data_inicio: {
        required: true,
        brazilian_date: true,
      },

      data_fim: {
        required: true,
        brazilian_date: true,
        dataMaiorQue: '#data_inicio',
      },
    },
  });

  $("#form_agenda_editar").validate({
    rules: {
      titulo: "required",

      cor: {
        required: true,
      },

      inicio: {
        required: true,
        brazilian_date: true,
      },

      horaInicio: {
        required: true,
      },

      fim: {
        required: true,
        brazilian_date: true,
        dataMaiorQue: '#start',
      },
      horaFim: {
        required: true,
      },
    },
  });

  $("#form_agenda_cadastrar").validate({
    rules: {
      titulo: "required",

      cor: {
        required: true,
      },

      inicio: {
        required: true,
        brazilian_date: true,
      },

      horaInicio: {
        required: true,
      },

      fim: {
        required: true,
        brazilian_date: true,
        dataMaiorQue: '#inicio',
      },
      horaFim: {
        required: true,
      },
    },
  });

  // @Beto Cadilhe
  $("#form_fornecedor").validate({

    highlight:function(input)
    {
      jQuery(input).addClass('is-invalid');
    },

    unhighlight:function(input){
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
      nome: {
        required:true,
        letras:true,
      },

      email: {
        required:true,
        email:true,
        remote:BASE_URL+'unique/'+id_usuario,

      },
      senha: "required",
      senha2: {
        equalTo: "#senha"
      },

      razao_social: {
        required:true,
        regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/,
      },

      cnpj:{
        required:true,
        cnpj:true,
      },

      telefone: "required",
      estado: "required",
      cidade: "required",

      logradouro: {
        required:true,
        regex: /^[A-Za-z0-9]/,
      },

      numero: {
        required:true,
        digits:true,
      },

      bairro: {
        required:true,
        regex: /^[A-Za-z0-9]/,
      },

      complemento: {
        regex: /^[A-Za-z0-9]/,
      },

      cep: {
        required:true,
        minlength: 9
      }

    },

    messages: {

      nome:{
        required: 'O campo Nome é obrigatório',
        regex:    'O campo não está no formato correto',
      },

      email:{
        email:"Digite um email válido",
        required: 'O campo E-mail é obrigatório',
        remote: 'Este email já está em uso.'
      },
      senha2: {
        equalTo: 'A confirmação de senha não confere.'
      },

      razao_social:{
        required: 'O campo Razão Social é obrigatório',
        regex:    'O campo não está no formato correto',
      },

      cnpj:{
        required: 'O campo CNPJ é obrigatório',
        cnpj:    'O cnpj não está no formato correto',
      },

      logradouro:{
        required: 'O campo logradouro é obrigatório',
        regex:    'O campo não está no formato correto',
      },

      numero:{
        required: 'O campo Número é obrigatório',
        digits:   'O campo não está no formato correto',
      },
    },
  });

  $("#cliente_sac_form").validate({
    rules: {
      sac_subject: "required",
      sac_description: "required",
      id_produto: "required",
    },
  });

  $("#form-sac").validate({
    rules: {
      titulo: "titulo",
      descricao: "descricao",
      id_produto: "required",
      id_cliente: "required",
    },
    messages: {
      titulo: "Insira um asssunto ao SAC",

      descricao: {
        required: "Insira a descrição de seu problema",
      },


    },

  });

  $("#form_setor").validate({
    rules: {
      nome: {
        required:true,
        regex: /^[a-zA-Z0-9]+/,
        maxlength:45,
      },

      sigla: {
        required:true,
        letras:true,
        maxlength:10,
      },

      descricao: {
        required:true,
        maxlength:1000,
      },

    },

    messages: {

      nome:{
        required: 'Insira o nome do setor',
        regex:    'Por favor, insira apenas letras e números.',
      },

      sigla:{
        required: 'Adicione uma sigla',
        regex:    'Por favor, insira apenas letras.',
      },

      descricao:{
        required: 'Adicione uma descrição',
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
        jQuery('.btn.bg-primary').prop('disabled', true);
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
        regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P}|\.\,\!\?\-\\\/\+\*\~ ]+$/
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
      nome: {
        maxlength: 70,
        minlength: 3,
        required:true,
        letras:true,
      },
      senha: "required",
      senha2: {
        equalTo: "#senha"
      },
      email: {
        maxlength: 150,
        required:true,
        email:true,
        remote:BASE_URL+'unique/'+id_usuario,

      },
      data_nacimento: {
        required: true,
        validaDataBR: true,
      },
      cpf:{
        required:true,
        cpf:true,
      },
      tel: "required",
      cep: "required",
      cidade: "required",
      estado: "required",
      bairro: {
        maxlength: 70,
        minlength: 3,
        required:true,
        letras:true,
      },
      numero:{
        maxlength: 10,
        required:true,
        digits: true,
      },
      logradouro:{
        minlength: 3,
        maxlength: 70,
        required:true,
        regex: /^[A-Za-z0-9]/,
      },
      complemento:{
        maxlength: 70,
        regex: /^[A-Za-z0-9]/,
      },
      sexo:{
        required:true }
      },

      messages: {

        complemento:{
          regex:    'O campo complemento pode conter apenas letras e numeros.'
        },
        logradouro:{
          regex:    'O campo complemento pode conter apenas letras e numeros.'
        },
        sexo:{
          required:"Please select a Color<br/>"
        },
        email:{
          remote: 'Este email já está em uso.'
        },
        senha2: {
          equalTo: 'A confirmação de senha não confere.'
        },
      },


    });

    $('#form_cliente').validate({
      rules: {
        nome: {
          maxlength: 70,
          minlength: 3,
          required:true,
          letras:true,
        },
        senha: "required",
        senha2: {
          equalTo: "#senha"
        },
        email: {
          maxlength: 150,
          required:true,
          email:true,
          remote:BASE_URL+'unique/'+id_usuario,

        },
        senha: "required",
        senha2: {
          equalTo: "#senha"
        },
        data_nacimento: {
          required: true,
          validaDataBR: true,
        },
        cpf:{
          required:true,
          cpf:true,
        },
        tel: "required",
        cep: "required",
        cidade: "required",
        estado: "required",
        bairro: {
          maxlength: 70,
          minlength: 3,
          letras:true,
          required:true,
        },
        numero:{
          maxlength: 10,
          required:true,
          digits: true,
        },
        logradouro:{
          maxlength: 70,
          required:true,
          regex: /^[A-Za-z0-9]/,
        },
        complemento:{
          maxlength: 70,
          regex: /^[A-Za-z0-9]/,
        }

      },
      messages: {

        complemento:{
          regex:    'O campo complemento pode conter apenas letras e numeros.'
        },
        logradouro:{
          regex:    'O campo complemento pode conter apenas letras e numeros.'
        },
        email:{
          remote: 'Este email já está em uso.'
        },
        senha2: {
          equalTo: 'A confirmação de senha não confere.'
        },
      },

    });

    $('#form_funcionario').validate({
      rules: {
        nome: {
          maxlength: 70,
          minlength: 3,
          required:true,
          letras:true,
        },
        id_cargo:{
          required:true,
        },
        email: {
          maxlength: 150,
          required:true,
          email:true,
          remote:BASE_URL+'unique/'+id_usuario,

        },
        senha: "required",
        senha2: {
          equalTo: "#senha"
        },
        data_nacimento: {
          required: true,
          validaDataBR: true,
        },
        cpf:{
          required:true,
          cpf:true,
        },
        tel: "required",
        cep: "required",
        cidade: "required",
        estado: "required",
        bairro: {
          maxlength: 70,
          minlength: 3,
          letras:true,
          required:true,
        },
        numero:{
          maxlength: 10,
          required:true,
          digits: true,
        },
        logradouro:{
          minlength: 3,
          maxlength: 70,
          required:true,
          regex: /^[A-Za-z0-9]/,
        },
        complemento:{
          maxlength: 70,
          regex: /^[A-Za-z0-9]/,
        }
      },
      messages: {
        complemento:{
          regex:    'O campo complemento pode conter apenas letras e numeros.'
        },
        logradouro:{
          regex:    'O campo complemento pode conter apenas letras e numeros.'
        },
        email:{
          remote: 'Este email já está em uso.'
        },
        senha2: {
          equalTo: 'A confirmação de senha não confere.'
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
          regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P}|\.\,\!\?\-\\\/\+\*\~ ]+$/
        },

        tipo:{
          required: true,
        },

        compra:{
          required: true,
        },

        descricao:{
          required: true,
          regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P}|\.\,\!\?\-\\\/\+\*\~ ]+$/
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

    $('#form_cargo').validate({
      rules: {

        nome:{
          required: true,
          regex: /^[a-zA-ZÀ-Úà-ú\s\p{P} ]+$/
        },

        descricao:{
          required:       true,
          regex: /^[A-Za-z0-9]/
          // regex: /^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/
        },

        salario:{
          required: true,
        },
      },

      messages: {

        nome:{
          required: 'O campo Nome é obrigatório',
          regex:    'O campo Nome não está no formato correto.'
        },

        descricao:{
          required:       'O campo Descriçao é obrigatório',
          regex:    'O campo Descricao não está no formato correto.'
        },

        salario:{
          required: 'O campo salário é obrigatório',
        },

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

    /**
    * @author: Camila Sales
    * Verifica se o cpf é válido
    **/
    $.validator.addMethod("cpf", function(value, element) {
      value = jQuery.trim(value);
      cpf = value.replace(/[^\d]+/g,'')

      while(cpf.length < 11) cpf = "0"+ cpf;
      var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
      var a = [], b = new Number, c = 11;
      for (i=0; i<11; i++){
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
      }

      ((x = b % 11) < 2) ? a[9] = 0 : a[9] = 11-x ;
      b = 0;
      c = 11;
      for (y=0; y<10; y++) b += (a[y] * c--);
      ((x = b % 11) < 2) ? a[10] = 0 : a[10] = 11-x;

      var retorno = true;
      if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

      return this.optional(element) || retorno;
    }, "Informe um CPF válido.");

    /**
    * @author: Camila Sales
    * Verifica se o campo contem apenas letras
    **/
    $.validator.addMethod("letras", function(value, element) {
      return this.optional(element) || /^[a-z-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/i.test(value);
    }, "Somente letras");

    /**
    * @author: Camila Sales
    * Mensagens Padroes
    **/
    $.extend($.validator.messages, {
      required: "Esse campo é obrigatorio",
      brazilian_date: "Digite uma data valida!",
      email: "Digite um email valido",
      digits: "O valor do campo deve ser númerico",
      minlength: "Este campo deve ter no mínimo {0} caracteres.",
      maxlength: "Este campo deve ter no máximo {0} caracteres.",

    });

    $.validator.addMethod("dataMaiorQue", function(value, element, params){
      var data = value.split('/');
      var dataAtual = data[2] + '-' + data[1] + '-' + data[0];
      var data = jQuery(params).val().split('/');
      var dataFinal = data[2] + '-' + data[1] + '-' + data[0];

      return new Date(dataAtual) >= new Date(dataFinal);

    }, 'Informe uma data maior ou igual a data anterior');


    /**
    * @author Tiago Villalobos
    *
    * Validação de CNPJ
    */
    $.validator.addMethod("cnpj", function (value, element) {

      var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
      if (value.length == 0) {
        return false;
      }

      value = value.replace(/\D+/g, '');
      digitos_iguais = 1;

      for (i = 0; i < value.length - 1; i++)
      if (value.charAt(i) != value.charAt(i + 1)) {
        digitos_iguais = 0;
        break;
      }
      if (digitos_iguais)
      return false;

      tamanho = value.length - 2;
      numeros = value.substring(0, tamanho);
      digitos = value.substring(tamanho);
      soma = 0;
      pos = tamanho - 7;
      for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
        pos = 9;
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(0)) {
        return false;
      }
      tamanho = tamanho + 1;
      numeros = value.substring(0, tamanho);
      soma = 0;
      pos = tamanho - 7;
      for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
        pos = 9;
      }

      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

      return (resultado == digitos.charAt(1));
    }, 'Informe um CNPJ válido');



    /**
    * @author: Camila Sales
    * Validação data
    **/
    $.validator.addMethod("validaDataBR", function (value, element) {
      //contando chars
      if (value.length != 10) return (this.optional(element) || false);
      // verificando data
      var data = new Date();
      var anoAtual = data.getYear();
      var mesAtual = data.getMonth() + 1;
      var diaAtual = data.getDate();
      if (anoAtual < 1000){
        anoAtual+=1900;
      }

      var data = value;
      var dia = data.substr(0, 2);
      var barra1 = data.substr(2, 1);
      var mes = data.substr(3, 2);
      var barra2 = data.substr(5, 1);
      var ano = data.substr(6, 4);
      if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return (this.optional(element) || false);
      if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return (this.optional(element) || false);
      if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return (this.optional(element) || false);
      if (ano < 1900 || ano > anoAtual) return (this.optional(element) || false);
      if (ano >= anoAtual && mes > mesAtual) return (this.optional(element) || false);
      if ((ano >= anoAtual && dia > diaAtual) && (mes >= mesAtual && dia > diaAtual)) return (this.optional(element) || false);

      return (this.optional(element) || true);
    }, "Informe uma Data Válida.");

    /**
    * @author: Camila Sales
    * Validação telefone
    **/
    $.validator.addMethod("telefone", function (value, element) {
      return this.optional(element) || /\([0-9]{2}\) [0-9]{4}-[0-9]{4}/.test(value);
    }, "Insira um telefone válido");

    /**
    * @author: Camila Sales
    * Validação celular
    **/
    $.validator.addMethod("celular", function (value, element) {
      return this.optional(element) || /\([0-9]{2}\) [0-9]{5}-[0-9]{4}/.test(value);
    }, "Insira um celular válido ");


    /**
    * @author: Camila Sales
    * Alteração da validação conforme o tamano do campo de telefone
    * para alterar o elemento deve conter a classe  alter_mask
    **/
    telefone = $('.alter_mask');
    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };
    telefone.mask(SPMaskBehavior, spOptions);
    telefone.on('input',function(){
      if (telefone.val()!= undefined && telefone.val().replace(/\D/g, '').length === 11) {
        telefone.removeClass('fixo_numero');
        telefone.addClass('celular_numero');
        telefone.rules("add", {
          required: true,
          telefone: false,
          celular: true
        });
      }else {
        telefone.addClass('fixo_numero');
        telefone.removeClass('celular_numero');
        telefone.rules("add", {
          required: true,
          celular: false,
          telefone: true
        });
      }
    })
    //final da alteração do telefone
  });
