<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Editar Produto</strong>
            </div>
            <form action="" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nome" class="control-label mb-1">Nome do Produto</label>
                                <input name="produto"  id="nome" value="<?= $produto->nome;?>" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="lote" class="control-label mb-1">Lote</label>
                                <input name="lote" id="lote" value="<?= $produto->lote;?>" type="text" class="form-control cc-exp" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="codigo" class="control-label mb-1">Código</label>
                                <input name="codigo" id="codigo" value="<?= $produto->codigo;?>" type="text" class="form-control cc-exp" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="recebimento" class="control-label mb-1">Data de Recebimento</label>
                                <input name="recebimento" id="recebimento" value="<?= $produto->recebimento;?>" type="text" class="form-control cc-exp" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="fabricacao" class="control-label mb-1">Data de Fabricação</label>
                                <input name="fabricacao" id="fabricacao" value="<?= $produto->fabricacao;?>" type="text" class="form-control cc-number" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="validade" class="control-label mb-1">Data de Validade</label>
                                <input name="validade" id="validade" value="<?= $produto->validade;?>" type="text" class="form-control cc-exp" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i>
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-check"></i>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
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
    </div>
</div>
