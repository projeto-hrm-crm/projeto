$(document).ready(() => {
  $("[name='cpf']")         .mask('000.000.000-00', {reverse:false});
  $("[name='cnpj']")        .mask('00.000.000/0000-00', {reverse:false});
  $("[name='telefone']")    .mask('(00) 00000-0000', {reverse:false});
  $("[name='cep']")         .mask('00000-000', {reverse:false});

  $('#ck-pf').change((e) => {
    $('.pj-form').hide();
    $('.pf-form').show();

    $("[name='cnpj']").attr('required', false);
    $("[name='cpf']").attr('required', true);
  });
  $('#ck-pj').change((e) => {
    $('.pf-form').hide();
    $('.pj-form').show();

    $("[name='cpf']").attr('required', false);
    $("[name='cnpj']").attr('required', true);
  });

  $("[name='estado']").change((e) => {
    $("[name='cidade']").html("");

    $.ajax({
      url: '/projeto/filtrar_cidades/' + e.target.value,
      success:function(data){
        var cidades = jQuery.parseJSON(data);

        for (var i = 0; i < cidades.length; i++) {
          $("[name='cidade']").append("<option value="+ cidades[i]["id_cidade"] +">"+ cidades[i]["nome"] +"</option>");
        }
      }
    });
  });
});
