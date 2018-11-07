   </body>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="<?php echo base_url();?>assets/client/js/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url();?>assets/client/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $.ajax({
            method: "GET",
            url: BASE_URL+"config",
            success : function(data){                
                data = jQuery.parseJSON(data)               
                var itens = ""
                var n = data['sub_modulos'].length
                for (var i = 0; i < n; i++){
                    itens += "<div class='col-lg-3 text-center margin20'> <i class='"+data['sub_modulos'][i]['icone']+" fa-3x margin10'></i> <p><b>"+data['sub_modulos'][i]['nome']+"</b> <br> <small>"+data['sub_modulos'][i]['descricao']+"</small> </p> <div class='form-group form-check'><input type='checkbox' name='sub_modulos[]' value='"+data['sub_modulos'][i]['id_sub_modulo']+"' id='sub_modulos"+data['sub_modulos'][i]['id_sub_modulo']+"' class='form-check-input'> <label for='sub_modulos"+data['sub_modulos'][i]['id_sub_modulo']+"'  class='form-check-label'>QUERO ESTE</label></div> </div>"
                }                
                $("#modulos").html(itens)                
            }
        });
       
       $(".nextStage").click(function(e){
          e.preventDefault()
          var next = $(this).data("next");
          
          $(".tab-pane").removeClass("show active");
          $(".nav-link").removeClass("show active");
          
          $("#"+next).addClass("show active");
          $("#"+next+"-tab").addClass("show active");
          
       });
       
       $("#finalizar").click(function(){
          
          $.ajax({
             method: "POST",
             url: BASE_URL+"config/create",
             data: jQuery("#formulario").serialize(),
             success : function(data){ 
                
             }
          })
          
          
       })
       
       
    </script>

</html>