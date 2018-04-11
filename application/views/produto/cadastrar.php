<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Novo Produto</strong>
            </div>
            <form action="" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nome" class="control-label mb-1">Nome do Produto</label>
                                <input id="nome" name="nome" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="lote" class="control-label mb-1">Lote</label>
                                <input id="lote" name="lote" type="text" class="form-control cc-exp" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="codigo" class="control-label mb-1">Código</label>
                                <input id="codigo" name="codigo" type="text" class="form-control cc-exp" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="recebimento" class="control-label mb-1">Data de Recebimento</label>
                                <input id="recebimento" name="recebimento" type="text" class="form-control cc-exp" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="fabricacao" class="control-label mb-1">Data de Fabricação</label>
                                <input id="fabricacao" name="fabricacao" type="text" class="form-control cc-number" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="validade" class="control-label mb-1">Data de Validade</label>
                                <input id="validade" name="validade" type="text" class="form-control cc-exp" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i>
                        Apagar
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-check"></i>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
