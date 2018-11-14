    <section id="acesso">
        <div class="row acesso-content">

            <div class="col-five acesso-intro">
                <h1 class="intro-header" data-aos="fade-up">Perfis de Acesso</h1>

                <p data-aos="fade-up">O Perfil de Acesso define quais funcionalidades estarão habilitadas no acesso ao sistema de um grupo de usuários. 
                O administrador pode conceder acessos diferentes para cada perfil de usuário. Os grupos de usuários disponíveis sao:
                <ul>
                <li>Administrador</li>
                <li>Cliente</li>
                <li>Funcionário</li>
                </ul>
                </p>
            </div>

            <div class="col-seven acesso-table">
                <div class="row">

<!-- Acesso -->
                    <div class="col-six plan-wrap">
                        <div class="plan-block primary" data-aos="fade-up">

                            <div class="plan-top-part">
                                <h3 class="plan-block-title">Área restrita</h3>
                            </div>

                            <div class="plan-bottom-part">
                                <p class="plan-block-features">Demo:<br>Login:<i>admin@admin.com</i><br>Senha:<i>admin</i></p>                                
                                <a class="button button-primary large" href="<?php echo base_url();?>login" target="_blank">Acessar</a>
                            </div>

                        </div>
                    </div>

<!-- sugestão-->

<div class="col-six plan-wrap">
                        <div class="plan-block" data-aos="fade-up"> 

                            <div class="plan-top-part">
                                <h3 class="plan-block-title">Sugestões</h3>
                            </div>

                            <div class="plan-bottom-part">
                                <p class="plan-block-features">Ajude a identificar erros e colabore no aprimoramento do sistema com seu conhecimento</p>                            
                                  <a class="button button-primary large" href="<?php echo base_url();?>sugestao/cadastrar" target="_blank">Enviar sugestão</a>
                            </div>  
                     
                        </div>
                    </div> <!-- end plan-wrap -->


                </div>               
            </div> 

        </div> 
    </section>