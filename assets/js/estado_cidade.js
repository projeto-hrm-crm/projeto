$(document).ready(function () {
  $(document).on('change', '#estado', function() {
    cidade = $('#cidade');
    mudaCidade($(this),cidade);
  });

  /**
  * Seleciona as cidades conforme o estado selecionado
  * @param {object} estado elemento do select do estado
  * @param {object} cidade elemento onde será atribuido as cidades
  * @author Camila Pereira Sales
  */
  function mudaCidade(estado,cidade){
    var options = "<option value='' selected>Selecione</option>";
    if(estado.val() !== "") {
      var url = "http://localhost/projeto/filtrar_cidades/" + estado.val();
      $.get(url, function (data) {
        data = JSON.parse(data);
        console.log(data.length)
        $.each(data, function (index, element) {
          console.log(1);
          options += "<option value='" + element.id_cidade + "'>" + element.nome + "</option>";
        });
        console.log(options);

        cidade.empty();//ZERA O CAMPO DE CIDADE
        cidade.append(options);//ADICIONA AS CIDADES DE ACORDO COM ESTADO
      });
    }

    cidade.empty();
    cidade.append(options);//ADICIONA AS CIDADES DE ACORDO COM ESTADO
  }


});
