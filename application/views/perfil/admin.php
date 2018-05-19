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
                            <img src="<?=site_url('assets/images/theme/no-user.png')?>" width="100%">
                            <a href="#" class="btn btn-primary">Alterar Imagem</a>
                            <a href="#" class="btn btn-primary">Editar Dados</a>
                        </div>
                        <div class="col-lg-9">
                            <h1>Supremo Senhor Kaioh</h1> 
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>E-mail</td>
                                        <td colspan="6">xxxxxxxxxxx</td>                                    
                                    </tr>
                                    <tr>
                                        <td>Endereço</td>
                                        <td colspan="3">xxxxxxxxxxx</td>  
                                        <td>Número</td>
                                        <td>xxxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Bairro</td>
                                        <td>xxxxxxxxxxx</td>  
                                        <td>Complemento</td>
                                        <td>xxxxxxxxxxx</td>
                                        <td>CEP</td>
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