jQuery(document).ready(($) => {

    $("#cliente_sac_form").on('submit', function(e){
        e.preventDefault();

        var sac_subject = $("#sac_subject").val();
        var sac_product_id = $("#sac_product_id").val();
        var sac_description = $("#sac_description").val();

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'sac/ajaxCreate',
            data: { 
                'sac_subject': sac_subject, 
                'sac_product_id': sac_product_id,
                'sac_description': sac_description
            },
            success: function(msg){
                console.log(msg);
            }
        });

        
    });
});
