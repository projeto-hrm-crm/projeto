jQuery(document).ready(($) => {


    $("#cliente_sac_form").on('submit', function(e){
        e.preventDefault();

        var sac_subject     = $("#sac_subject").val();
        var sac_product_id  = $("#sac_product_id").val();
        var sac_description = $("#sac_description").val();

        $.ajax({
            url: BASE_URL + 'sac/ajaxCreate',
            type: 'POST',
            data: { 
                'sac_subject': sac_subject, 
                'sac_product_id': sac_product_id,
                'sac_description': sac_description
            },
            success: function(msg){
                var result = JSON.parse(msg);
                if (result.status == 'ok') {
                    $(".sac-ajax-success").show();
                    $("#sac_subject").val("");
                    $("#sac_product_id").val("");
                    $("#sac_description").val(""); 
                    $(".sac-ajax-success").fadeOut(5000);
                } else {
                    $(".sac-ajax-error").show();
                }

                   
            }
        });

        
    });
});
