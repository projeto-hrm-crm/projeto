jQuery(document).ready(($) => {
    /**
     * @author Pedro Henrique Guimarães
     *
     * @description Método responsável por fazer consulta de ceps na base dados do IBGE pela api do VIACEP
     * @link https://viacep.com.br/
     * @param {*} cep
     * @return json
     */
    let getCep = cep => {
        return $.ajax({
            url: 'https://viacep.com.br/ws/'+ cep +'/json/',
            dataType: 'json',
        });
    };

    $("#cep").change(function() {
        var cep = $(this).val();
        cep_result = getCep(cep);
        cep_result.done(result => {
          $("#estado").val(result.uf);
          $("#bairro").val(result.bairro);
          $("#cidade").val(result.localidade);
          $("#logradouro").val(result.logradouro);
        });
    });
});
