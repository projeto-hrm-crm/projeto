jQuery(document).ready(function ($) {
  $(document).on('change', '#estado', function() {
    cidade = $('#cidade');
    mudaCidade($(this),cidade);
  });

  /**
   * @author Camila Pereira Sales
   *
   * Seleciona as cidades conforme o estado selecionado
   *
   * @param {object} estado elemento do select do estado
   * @param {object} cidade elemento onde será atribuido as cidades
  */
  function mudaCidade(estado,cidade){
    var options = "<option value='' selected>Selecione</option>";
    if(estado.val() !== "") {
      var url = "http://localhost/projeto/filtrar_cidades/" + estado.val();
      $.get(url, function (data) {
        console.log(data)
        data = JSON.parse(data);

        $.each(data, function (index, element) {
          options += "<option value='" + element.id_cidade + "'>" + element.nome + "</option>";
        });
        cidade.empty(); //ZERA O CAMPO DE CIDADE
        cidade.append(options); //ADICIONA AS CIDADES DE ACORDO COM ESTADO
      });
    }
    cidade.empty();
    cidade.append(options); //ADICIONA AS CIDADES DE ACORDO COM ESTADO
  }


});
