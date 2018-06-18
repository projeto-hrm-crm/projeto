<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <?php if($this->session->flashdata('success')): ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('danger')): ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('danger'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <h1 class="margin20">Meus Dados  </h1> 
                            <br>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><b>Nome</b></td>
                                        <td><?=$pessoa[0]->nome;?></td> 
                                       
                                        <td><b>E-mail</b></td>
                                        <td colspan="4"><?=$pessoa[0]->email;?></td>                                    
                                    </tr>
                                    <tr>
                                        <td><b>Endereço</b></td>
                                        <td colspan="3"><?=$endereco[0]->logradouro;?></td>  
                                        <td><b>Número</b></td>
                                        <td><?=$endereco[0]->numero;?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Bairro</b></td>
                                        <td><?=$endereco[0]->bairro;?></td>  
                                        <td><b>Complemento</b></td>
                                        <td><?=$endereco[0]->complemento;?></td>
                                        <td><b>CEP</b></td>
                                        <td><?=$endereco[0]->cep;?></td>
                                    </tr>
                                </tbody>                            
                            </table>
                           <button class="btn btn-primary btn-sm">Alterar Dados</button>
                           <button class="btn btn-primary btn-sm">Alterar Senha</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>