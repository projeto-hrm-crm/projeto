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
                        <div class="col-lg-3">
                            <img src="<?=site_url('assets/images/theme/no-user.png')?>" width="100%" class="margin20"><br>
                            <br>
                            <a href="#" class="btn btn-primary" style="width: 100%">Alterar Imagem</a>
                        </div>
                        <div class="col-lg-9">
                            <h1 class="margin20">Teste  </h1> 
                            <br>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><b>E-mail</b></td>
                                        <td colspan="6">xxxxxxxxxxx</td>                                    
                                    </tr>
                                    <tr>
                                        <td><b>Endereço</b></td>
                                        <td colspan="3">xxxxxxxxxxx</td>  
                                        <td><b>Número</b></td>
                                        <td>xxxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td><b>Bairro</b></td>
                                        <td>xxxxxxxxxxx</td>  
                                        <td><b>Complemento</b></td>
                                        <td>xxxxxxxxxxx</td>
                                        <td><b>CEP</b></td>
                                        <td>xxxxxxxxxxx</td>
                                    </tr>
                                </tbody>                            
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>