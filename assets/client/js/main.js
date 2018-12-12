jQuery(document).ready(function($) {
   $('#cor').colorpicker();
   
   modules = [];

    $.ajax({
        method: "GET",
        url: BASE_URL+"config",
        success : function(data){                
            data = jQuery.parseJSON(data)   
           
            var modulos = ""
            var n1 = data['modulos'].length
            
            for (var i = 0; i < n1; i++){
                modulos += "<div class='col-lg-6 text-center margin20'> <i class='"+data['modulos'][i]['icone']+" fa-3x margin10'></i> <p><b>"+data['modulos'][i]['nome']+"</b> <br> <small>"+data['modulos'][i]['descricao']+"</small> </p> <div class='form-group form-check'><input type='checkbox' name='modulos[]' value='"+data['modulos'][i]['id_modulo']+"' id='modulos"+data['modulos'][i]['id_modulo']+"' class='form-check-input-modulo'> <label for='modulos"+data['modulos'][i]['id_modulo']+"'  class='form-check-input-modulo'>VER OS MÓDULOS</label></div></div>";
                modules[data['modulos'][i]['id_modulo']] = [];
            }
           
            $("#modulos").html(modulos);
           
            var sub_modulos = ""
            var n2 = data['sub_modulos'].length
            for (var i = 0; i < n2; i++){
                sub_modulos += "<div class='col-lg-3 text-center margin20 hidden mostrar"+data['sub_modulos'][i]['id_modulo']+"'> <i class='"+data['sub_modulos'][i]['icone']+" fa-3x margin10'></i> <p><b>"+data['sub_modulos'][i]['nome']+"</b> <br> <small>"+data['sub_modulos'][i]['descricao']+"</small> </p> <div class='form-group form-check'><input type='checkbox' name='sub_modulos[]' value='"+data['sub_modulos'][i]['id_sub_modulo']+"."+data['sub_modulos'][i]['id_modulo']+"' id='sub_modulos"+data['sub_modulos'][i]['id_sub_modulo']+"' data-modulo='"+data['sub_modulos'][i]['id_modulo']+"' class='form-check-input submodulos'> <label for='sub_modulos"+data['sub_modulos'][i]['id_sub_modulo']+"'  class='form-check-label submodulos'>QUERO ESTE</label></div> </div>"
            }                
           
           $("#modulos").append(sub_modulos)  
           
           $(".submodulos").click(function(){  
                var modulo = $(this).val();
                //alert(modulo);

                if(modulo==1) {
                   if($('#sub_modulos'+modulo).is(':checked')){                         
                     $('#sub_modulos4').attr('checked', true);                        
                   }else{

                   }
                }
                if(modulo==8) {
                   if($('#sub_modulos'+modulo).is(':checked')){                         
                     $('#sub_modulos2').attr('checked', true);                       
                   }else{

                   }
                }
                if(modulo==12) {
                   if($('#sub_modulos'+modulo).is(':checked')){                         
                     $('#sub_modulos4').attr('checked', true);                          
                     $('#sub_modulos2').attr('checked', true); 
                   }else{

                   }
                }
                if(modulo==16) {
                   if($('#sub_modulos'+modulo).is(':checked')){                         
                     $('#sub_modulos7').attr('checked', true);                          
                     $('#sub_modulos5').attr('checked', true);
                   }else{

                   }
               }                      
            });
           
           $(".form-check-input-modulo").click(function(){
              var modulo = $(this).val();
               if($(this).is(":checked") == true) {
                  $(".mostrar"+modulo).fadeIn();
               }else {
                  $(".mostrar"+modulo).fadeOut();
               }
            });
        }
    });



    $(".nextStage").click(function(e){
        e.preventDefault()
        var next = $(this).data("next");
        
        $(".tab-pane").removeClass("show active");
        $(".nav-link").removeClass("show active"); 

        showLoader($('.client_loader_gif'), $('.client-tab'));
        $(this).attr('disabled', 'disabled');

        $.ajax({
            method: "POST",
            url: BASE_URL+"config/create",
            data: jQuery("#formulario").serialize(),
            success : function(data){ 
                var res = JSON.parse(data);
                if (res.status == 200) {
                    $("#"+next).addClass("show active");
                    $("#"+next+"-tab").addClass("show active");
                    hideLoader($('.client_loader_gif'), $('.client-tab'));
                    $(this).removeAttr('disabled');
                } else {
                    $(this).addClass("show active");
                    $(this).addClass("show active");
                }
            }
        })    

    });

    $(".add_company").click((e) => {
        e.preventDefault();
        
        showLoader();

        
        let data = {
            nome_fantasia:          $("#nome-fantasia").val(),
            sigla:                  $("#sigla").val(),
            razao_social:           $("#razao-social").val(),
            cnpj:                   $("#cnpj").val(),
            inscricao_estadual:     $("#inscricao-estadual").val(),
            classificacao:          $("#classificacao").val(),
            numero_funcionarios:    $("#numero-funcionario").val(), 
            dominio:                $("#dominio").val(),
            cor:                    $("#cor").val(), 
            finalidade:             $("#finalidade").val(), 
        }
        

        $.ajax({
            method: "POST",
            url: BASE_URL + "config/createCompany",
            data: data,
            success : (data) => { 
               data = JSON.parse(data);
               if (data.status == 200) {
               localStorage.setItem('id_empresa', data.id_empresa);
               localStorage.setItem('id_grupo_acesso', data.id_grupo_acesso);
                hideLoader();
            }
            }, 

            error: (error) => {

            }
        }) 



    });

    $(".choose_modules").click((e) => {
        e.preventDefault();
        
        var _modules = [];
        $('input:checked').each(function() {
            _modules.push($(this).val());
        });

        showLoader();

        $.ajax({
            method: "POST",
            url: BASE_URL + "config/insertModules",
            data: {modules: _modules},
            success : (data) => { 
               data = JSON.parse(data);
               if (data.status == 200) {
                    console.log(data);
                    hideLoader();
                } else {
                    console.log(data.status, data.error);     
                }
            }, 

            error: (error) => {

            }
        }) 



    });

    $(".add_user").click((e) => {
        e.preventDefault();
        
        showLoader();

        
        let data = {
            nome:       $("#nome").val(),
            email:      $("#email").val(),
            senha:      $("#senha").val(),
            finalidade: $("#finalidade").val()
        }
        

        $.ajax({
            method: "POST",
            url: BASE_URL + "config/createProfile",
            data: data,
            success : (data) => { 
               data = JSON.parse(data);
               if (data.status == 200)
                hideLoader();
            }, 

            error: (error) => {

            }
        }) 



    });

    let showLoader = function() {
        $("#formulario :input").prop("disabled", true);
        $(".spin").addClass("fa-spinner fa-pulse");
    }

    let hideLoader = function() {
        $("#formulario :input").prop("disabled", false);  
        $(".spin").removeClass("fa-spinner fa-pulse");
    }

    $("#finalizar").click(function(){
    
    
    })
});