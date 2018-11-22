<div class="container">
   <div class="row justify-content-md-center">
      <div class="col col-lg-10">
         <div class="card">
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#"><b>Lambda ERP</b></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="../"><i class="fa fa-chevron-right"></i> Voltar Ao Inicio</a>
                  </li>
                </ul>
              </div>
            </nav>
            <form action="#" method="post" id="formulario" enctype="multipart/form-data">
           <div class="card-body">               
               <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                  <li class="nav-item">
                   <a class="nav-link show active " id="pills-informacao-tab" data-toggle="pill" href="#pills-informacao" role="tab" aria-controls="pills-informacao" aria-selected="false">Dados da Empresa</a>
                 </li>
                 
                 <li class="nav-item">
                   <a class="nav-link " id="pills-modulo-tab" data-toggle="pill" href="#pills-modulo" role="tab" aria-controls="pills-modulo" aria-selected="false">Módulos</a>
                 </li>
                  
                  <li class="nav-item">
                   <a class="nav-link" id="pills-usuario-tab" data-toggle="pill" href="#pills-usuario" role="tab" aria-controls="pills-usuario" aria-selected="true">Dados Usuário</a>
                 </li>
                  
                  <!--
                 <li class="nav-item">
                   <a class="nav-link disabled" id="pills-empresa-tab" data-toggle="pill" href="#pills-empresa" role="tab" aria-controls="pills-contact" aria-selected="false">Regionalização</a>
                 </li>-->
                                    
                  <li class="nav-item">
                   <a class="nav-link " id="pills-endereco-tab" data-toggle="pill" href="#pills-endereco" role="tab" aria-controls="pills-endereco" aria-selected="false">Endereço</a>
                 </li>
               </ul>
               <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-informacao" role="tabpanel" aria-labelledby="pills-informacao-tab">
                    <div class="row">                    
                    
                     <div class="col-xs-12 col-lg-8">
                        <div class="input-field">
                           <label>Nome Fantasia</label>
                           <input class="form-control" type="text" placeholder="" name="nome_fantasia" id="nome-fantasia">
                       </div>
                    </div>
                       
                     <div class="col-xs-12 col-lg-4">
                        <div class="input-field">
                           <label>Sigla</label>
                           <input class="form-control" type="text" placeholder="" name="sigla" id="sigla">
                        </div>
                     </div>
                       
                     <div class="col-xs-12 col-lg-6">
                       <div class="input-field">
                           <label>Razão Social</label>
                           <input class="form-control" type="text" placeholder="" name="razao_social" id="razao-social">
                       </div>
                     </div>
                        
                     <div class="col-xs-12 col-lg-6">
                       <div class="input-field">
                           <label>CNPJ</label>
                           <input class="form-control" type="text" placeholder="" name="cnpj" id="cnpj">
                       </div>
                     </div>
                        
                     <div class="col-xs-12 col-lg-4" >
                       <div class="input-field">
                           <label>Inscrição Estadual</label>
                           <input class="form-control" type="text" placeholder="" name="inscricao_estadual" id="inscricao-estadual">
                       </div>
                     </div>                       
                       <div class="col-xs-12 col-lg-4" >
                          <div class="input-field">
                              <label>Classificação</label>
                              <input class="form-control" type="text" placeholder="" name="classificacao" id="classificacao">
                          </div>
                       </div>                       
                       <div class="col-xs-12 col-lg-4" >
                          <div class="input-field">
                              <label>Número de Funcionários</label>
                              <input class="form-control" type="text" placeholder="" name="numero_funcionario" id="numero-funcionario">
                          </div>
                       </div>                       
                       <div class="col-xs-12 col-lg-6" >
                          <div class="input-field">
                              <label>Domínio Site</label>
                              <input class="form-control" type="text" placeholder="" name="dominio" id="dominio">
                          </div>
                       </div> 
                       <div class="col-xs-12 col-lg-6" >
                          <div class="input-field">
                              <label>Cor de Preferência</label>
                              <input class="form-control" type="text" placeholder="" name="cor" id="cor">
                          </div>
                       </div> 
                     
                       <div class="col-xs-12 col-lg-12" >
                          <div class="input-field margin20">
                            <label>Finalidade de Uso</label>
                            <select name="finalidade" class="form-control" id="finalidade">
                                <option>Qual a finalidade de uso?</option>
                                <option value="1">Uso Comercial</option>
                                <option value="2">Uso Educacional</option>
                            </select>
                        </div>
                       </div>
                         <div class="col-xs-12 col-lg-12" >
                           <div class="input-field">
                               <label for="logo">Envie sua logo (Dimensão recomendada 400x400px)</label>
                               <input type="file" class="form-control-file" id="logo" name="logo">
                           </div>
                       </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success add_company" type="button" data-next="pills-modulo">Próximo Passo</button>
                     </div>
                  </div>
                  
                  <div class="tab-pane fade" id="pills-modulo" role="tabpanel" aria-labelledby="pills-modulo-tab">
                    <p class="margin30 text-center">Vamos Começar a Configuração do Lambda! Aqui Você Escolher os Módulos que Irão Compor o Sistema!</p>
                    <div class="row" id="modulos">
                                               
                    </div>
                   <div class="text-right">
                     <button class="btn btn-success choose_modules" type="button" data-next="pills-usuario">Escolher <i class="fas spin"></i></button>
                    </div>
                  </div> 

                 <div class="tab-pane fade client-tab" id="pills-usuario" role="tabpanel" aria-labelledby="pills-usuario-tab">
                    <p class="text-center">Comece a Utilizar o Lambda, preencha o formulario abaixo para iniciar as configurações!</p>

                    <div class="input-field">
                        <label>Nome Completo</label>
                        <input class="form-control" type="text" placeholder="" name="nome" id="nome">
                    </div>
                    <div class="input-field">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="" name="email" id="email">
                    </div>
                    <div class="row">
                       <div class="col-xs-12 col-lg-6">
                          <div class="input-field">
                              <label>Senha</label>
                              <input class="form-control" type="password" placeholder="" name="senha" id="senha">
                          </div>
                       </div>
                       <div class="col-xs-12 col-lg-6 margin20">
                          <div class="input-field">
                              <label>Confirme a Senha</label>
                              <input class="form-control" type="password" placeholder="" name="confirma_senha" id="confirma-senha">
                          </div>
                       </div>
                    </div>                    
                    
                    <div class="text-right">
                     <button class="btn btn-success add_user" data-next="pills-endereco">
                     Cadastrar 
                     <i class="fas spin"></i>
                     </button>
                    </div>
                  </div>
                 
                  
                 <!--<div class="tab-pane fade" id="pills-empresa" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <p class="text-center">Selecione as informações referente a regionalização de seu negócio.</p>

                        <div class="input-field">
                            <label>Moeda</label>
                            <select name="moeda" class="form-control" id="moeda">
                                <option>Selecione uma moeda</option>
                                <option value="Real">Real</option>
                                <option value="Dolar">Dolar</option>
                                <option value="Euro">Euro</option>
                            </select>
                        </div>
                    
                        <div class="input-field">
                            <label>Idioma</label>
                            <select name="idioma" class="form-control" id="idioma">
                                <option>Selecione um idioma</option>
                                <option value="Português (PT-BR)">Português (PT-BR)</option>
                                <option value="Inglês">Inglês</option>
                                <option value="Espanhol">Espanhol</option>
                            </select>
                        </div>
                    
                        <div class="input-field margin20">
                            <label>Fuso Horário</label>
                            <select name="fuso-horario" class="form-control" id="fuso-horario">
                                <option>Selecione um fuso horário</option>
                                <option value="GMT+3">GMT+3</option>
                                <option value="GMT+2">GMT+2</option>
                                <option value="GMT+13">GMT+13</option>
                            </select>
                        </div>
                         
                        <div class="text-right">
                           <button class="btn btn-success nextStage" type="button" data-next="pills-informacao">Próximo Passo</button>
                        </div>
                  </div>-->
                  
                 
                  <div class="tab-pane fade" id="pills-endereco" role="tabpanel" aria-labelledby="pills-endereco-tab">
                     <div class="row">                        
                        <div class="col-xs-12 col-lg-3">
                           <div class="input-field">
                              <label>CEP</label>
                              <input class="form-control" type="text" placeholder="" name="cep" id="cep">
                           </div>
                        </div>                        
                        <div class="col-xs-12 col-lg-7">
                           <div class="input-field">
                              <label>Endereço</label>
                              <input class="form-control" type="text" placeholder="" name="logradouro" id="logradouro">
                           </div>
                        </div>                           
                        <div class="col-xs-12 col-lg-2">
                           <div class="input-field">
                              <label>Número</label>
                              <input class="form-control" type="text" placeholder="" name="numero" id="numero">
                          </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">   
                           <div class="input-field">
                              <label>Bairro</label>
                              <input class="form-control" type="text" placeholder="" name="bairro" id="bairro">
                          </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                           <div class="input-field">
                              <label>Cidade</label>
                              <input class="form-control" type="text" placeholder="" name="cidade" id="cidade">
                          </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                           <div class="input-field">
                              <label>Estado</label>
                              <input class="form-control" type="text" placeholder="" name="estado" id="estado">
                          </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 margin20">
                           <div class="input-field">
                              <label>País</label>
                              <input class="form-control" type="text" placeholder="" name="pais" id="pais">
                          </div>
                        </div>                        
                     </div>
                     <div class="text-right">
                        <button class="btn btn-success" type="button" id="finalizar">Finalizar</button>
                     </div>
                  </div>
            </div>
         </div>
         </form>
      </div>     
   </div>   
</div>