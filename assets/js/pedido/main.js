jQuery(document).ready(function($) {



    $('#id_produto').change(function(){
      if($('#produtos-table tbody tr').length >= 0) $('#id_produto').removeClass('is-invalid');
    });

    $('body').on('click', '.btn-remove', function(){
        if($('#produtos-table tbody tr').length == 1)
        {
            $('#id_produto').addClass('is-invalid');
        }
    });

    $('#id_produto').change(function(){

        var selectedOption = $('#id_produto option:selected');
        var select = $('#id_produto');


        if(selectedOption.val() > 0)
        {
            var table = $('#produtos-table > tbody');
            var tableFoot = $('#produtos-table > tfoot');
            var total = $('#total');
            var totalQtd = $('#total-qtd');
            var tr    = $('<tr>');
            var input = $('<input>').prop({
                type:  'number',
                class: 'form-control form-control-sm input-qtd',
                value: '1',
                min:   '1',
                name:  'qtd_produto[]'
            });
            var inputReadOnly = $('<input>').prop({
                value:    selectedOption.val(),
                class:    'form-control form-control-sm',
                name:     'id_produto[]',
                readonly: true
            }).css({
                'background-color':'transparent',
                'border': '0',
                'font-size': '1em'
            });

            var btnRemove = $('<button>').prop({
                class: 'btn btn-danger btn-sm btn-block text-white btn-remove',
            }).html('<i class="fa fa-close"></i>');

            var tdId  = $('<td>').prop({
                width: '5%',
                class: 'td-id'
            }).html(inputReadOnly);
            tr.append(tdId);


            var tdName  = $('<td>').prop({
                width: '50%',
                class: 'td-nome'
            }).data('id', selectedOption.val()).text(selectedOption.text());
            tr.append(tdName);

            var tdQtd = $('<td>').prop({
                    width: '15%',
                    class: 'td-qtd'
                }).append(input);
            tr.append(tdQtd);

            if($('#label_pessoa').text() == 'Cliente')
            {
                var tdValue = $('<td>').prop({
                        width: '20%',
                        class: 'td-value'
                    }).data('default', selectedOption.data('value'))
                    .text('R$ '+ selectedOption.data('value').replace('.', ','));

                tr.append(tdValue);

            }

            var tdAction = $('<td>').prop({
                width: '10%',
            }).html(btnRemove);
            tr.append(tdAction);

            table.append(tr);

            $('#total').addClass('d-none');

            if($('#label_pessoa').text() == 'Cliente')
            {
                $('#total').removeClass('d-none');
            }

            selectedOption.prop('selected', true);
            selectedOption.prop('disabled', true);
            select.val('');


            var sumQtd = 0;
            $.each($('.input-qtd'), function(index, input){
                sumQtd += parseFloat($(input).val());
            });


            calculateTotal($('.td-value'), total);
            calculateTotal($('.input-qtd'), totalQtd, true);

            tableFoot.removeClass('d-none');

        }



    });


    $('body').on('change', '.input-qtd', function() {

        var total    = $('#total');
        var totalQtd = $('#total-qtd');
        var qtd      = $(this);

        var tdValue = qtd.parents('tr').children('.td-value');

        var result = 'R$ ' + ((parseInt(qtd.val()) * parseFloat(tdValue.data('default')))*1000).toFixed(2).replace('.', ',');


        tdValue.text(result);

        calculateTotal($('.td-value'), total);
        calculateTotal($('.input-qtd'), totalQtd, true);


    });


    $('body').on('click', '.btn-remove', function(event){
        event.preventDefault();

        var total = $('#total');
        var totalQtd = $('#total-qtd');

        var select = $('#id_produto');

        var productId    = $(this).parents('tr').children('.td-nome').data('id');

        select.find('option[value="'+ productId +'"]').prop('disabled', false);

        $(this).closest('tr').remove();

        calculateTotal($('.td-value'), total);
        calculateTotal($('.input-qtd'), totalQtd, true);

    });


    function calculateTotal(selector, receiver, input = false)
    {
        var sum = 0;
        $.each(selector, function(index, element){
            sum += input ? parseFloat($(element).val()) : parseFloat($(element).text().replace('R$ ', '').replace(',', '.'));
        });

        receiver.text(input ? sum : 'R$ ' + sum.toFixed(2).replace('.', ','));

        if(parseInt(receiver.text()) === 0)
        {
            receiver.closest('tfoot').addClass('d-none');
        }
    }

    // 0 = Venda - cliente
    // 1 = Compra - fornecedor
    $('.compra-radio').change(function(){

    	var value = $(this).val();
        var url   = window.location.href.replace('cadastrar','');

        $('#th-valor').removeClass('d-none');

        $('#id_produto').empty();

        if(value == 'V')
        {
            $.ajax({

                url:       window.location.href.replace('cadastrar','') + 'produtos',
                dataType:  'JSON',

                success:function(resp)
                {
                    var select = $('#id_produto');

                    select.append('<option value="">Selecione um Produto</option>');

                    $.each(resp, function(index, item){
                        select.append(
                            '<option value="' + item.id_produto + '" data-value="' + item.valor + '">' +
                                item.nome +
                            '</option>'
                        );
                    });
                },

                error:function(resp)
                {

                }

            });
        }
        else
        {
            var select = $('#id_produto');
            $('#th-valor').addClass('d-none');
            select.append('<option value="">Selecione um Fornecedor</option>');
        }

        url += value == 'V' ? 'clientes' : 'fornecedores';

		$.ajax({

			url:       url,
			dataType:  'JSON',
			type:      'POST',

			success:function(resp)
			{

				if(resp.length > 0)
                {
                    var select = $('[name="id_pessoa"]');

                    select.empty();
                    select.append('<option value="">Selecione</option>');

                    $.each(resp, function(index, item){
                        var name = value == 'C' ? item.razao_social  : item.nome;
                        // var id   = value == 1 ? item.id_fornecedor : item.id_pessoa;

                        select.append('<option value="' + item.id_pessoa + '" data-id="' + item.id_fornecedor + '">'
                            + name + '</option>');
                    });

                    if(value == 'C')
                    {

                        $('#id_pessoa').change(function(){

                            var value = $(this).find('option:selected').data('id');

                            if($('#label_pessoa').text() == 'Fornecedor')
                            {
                                $('#produtos-table > tbody').empty();
                                $('#produtos-table > tfoot').addClass('d-none');
                                $('#id_produto option').prop('disabled', false);

                                $.ajax({

                                    url:      window.location.href.replace('cadastrar','') + 'produtos/fornecedor/' + value,
                                    dataType: 'JSON',

                                    success:function(resp)
                                    {
                                        var select = $('#id_produto');

                                        select.empty();
                                        select.append('<option value="">Selecione um Produto</option>');

                                        $.each(resp, function(index, item){
                                            select.append(
                                                '<option value="' + item.id_produto + '" data-value="' + item.valor + '">' +
                                                    item.nome +
                                                '</option>'
                                            );
                                        });
                                    },

                                    error:function(resp)
                                    {

                                    }

                                });

                            }


                        });


                    }
                    else
                    {
                        $.ajax({

                            url:       window.location.href.replace('cadastrar','') + 'produtos',
                            dataType:  'JSON',

                            success:function(resp)
                            {
                                console.log(resp);
                                var select = $('#id_produto');

                                select.empty();
                                select.append('<option value="">Selecione um Produto</option>');

                                $.each(resp, function(index, item){
                                    select.append(
                                        '<option value="' + item.id_produto + '" data-value="' + item.valor + '">' +
                                            item.nome +
                                        '</option>'
                                    );
                                });
                            },

                            error:function(resp)
                            {

                            }

                        });
                    }


                    $('#label_pessoa').text(value == 'C' ? 'Fornecedor' : 'Cliente');

                    $('#produtos-table > tbody').empty();
                    $('#produtos-table > tfoot').addClass('d-none');
                    $('#id_produto option').prop('disabled', false);

                }
			},

			error:function(resp)
			{
				//console.log(resp);
			}


		});



    });



    if($('#label_pessoa').text() == 'Fornecedor')
    {
        $('#id_pessoa').change(function(){

            var value = $(this).find('option:selected').data('id');


                $('#produtos-table > tbody').empty();
                $('#produtos-table > tfoot').addClass('d-none');
                $('#id_produto option').prop('disabled', false);

                $.ajax({

                    url:      BASE_URL + 'pedido/produtos/fornecedor/' + value,
                    dataType: 'JSON',

                    success:function(resp)
                    {
                        var select = $('#id_produto');

                        select.empty();
                        select.append('<option value="">Selecione um Produto</option>');

                        $.each(resp, function(index, item){
                            select.append(
                                '<option value="' + item.id_produto + '" data-value="' + item.valor + '">' +
                                    item.nome +
                                '</option>'
                            );
                        });
                    },

                    error:function(resp)
                    {

                    }

                });




        });

    }




});
