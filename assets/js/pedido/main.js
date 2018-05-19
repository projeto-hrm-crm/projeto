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


            var tdName  = $('<td>').prop({
                width: '50%',
                class: 'td-nome'
            }).data('id', selectedOption.val()).text(selectedOption.text());
            
            var tdQtd = $('<td>').prop({
                    width: '15%',
                    class: 'td-qtd'
                }).append(input);

            var tdValue = $('<td>').prop({
                    width: '20%', 
                    class: 'td-value'
                }).data('default', selectedOption.data('value'))
                .text('R$ '+ selectedOption.data('value').replace('.', ','));

            var tdAction = $('<td>').prop({
                width: '10%',
            }).html(btnRemove);

            tr.append(tdId);
            tr.append(tdName);
            tr.append(tdQtd);
            tr.append(tdValue);
            tr.append(tdAction);

            table.append(tr);

            // $('option:selected', this).remove();
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

        var result = 'R$ ' + (parseInt(qtd.val()) * parseFloat(tdValue.data('default'))).toFixed(2).replace('.', ',');


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
    $('.compra-radio').click(function(){
    	var value = $(this).val();

    	console.log(value);
    	if(value == 1)
    	{
    		$.ajax({

    			url:       base_url + 'json_fornecedores',
    			dataType:  'JSON',
    			type:      'POST',

    			success:function(resp)
    			{
                    console.log(resp);
    				if(resp.length > 0)
                    {
                        var select = $('[name="id_pessoa"]');
                        
                       // select.empty();

                        select.append('<option value="">Selecione</option>');

                        $.each(resp, function(index, item){
                            console.log(item);
                            var option = $('option');

                            option.val(item.id_pessoa);
                            option.text(item.razao_social);
                            console.log(option);
                            select.append(option);

                        });

                    }
    			},

    			error:function(resp)
    			{
    				//console.log(resp);
    			}


    		});
    	}


    });

});