<div class="animated fadeIn">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10">
            <div class="card">

                <div class="card-header">
                    <strong>Atualizar Fornecedor</strong>
                </div>

                <form action="<?php echo base_url('fornecedor/editar/'.$fornecedor[0]->id_fornecedor); ?>" method="POST" id="form_fornecedor" id_usuario ="<?php echo $fornecedor[0]->id_usuario; ?>">

                    <div class="card-body card-block">

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Nome</label>
                                <input type="text" id="nome" name="nome" placeholder="Nome" value="<?= htmlspecialchars($fornecedor[0]->nome)?>" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="email-input" class=" form-control-label"><red>*</red>Email</label>
                                <input type="email" id="email" name="email" placeholder="e-mail" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->email)?>">
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label class=" form-control-label"><red>*</red>Razão Social</label>
                                <input type="text" id="razao_social" name="razao_social" placeholder="Razão Social" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->razao_social)?>" required>
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col col-md-4">
                                <label class=" form-control-label"><red>*</red>CNPJ</label>
                                <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" class="form-control cnpj" value="<?= htmlspecialchars($fornecedor[0]->cnpj)?>" required>
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class=" form-control-label"><red>*</red>Telefone</label>
                                <input type="text" id="telefone" name="telefone" placeholder="(12)3889-9090" class="form-control telefone alter_mask" maxlength="15"  value="<?= htmlspecialchars($fornecedor[0]->telefone)?>" required>
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12 col-md-3">
                                <label class=" form-control-label"><red>*</red>CEP</label>
                                <input type="num" id="cep" name="cep" placeholder="CEP" class="form-control cep"  value="<?= htmlspecialchars($fornecedor[0]->cep)?>" required>
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label class="form-control-label"><red>*</red>Estado</label>
                                <input type="text" name="estado" class="form-control" id="estado" placeholder="Estado" value="<?php echo $fornecedor[0]->estado;?>">
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12 col-md-5">
                                <label class="form-control-label"><red>*</red>Cidade</label>
                                <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" value="<?php echo $fornecedor[0]->cidade;?>">
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12 col-md-9">
                                <label class=" form-control-label"><red>*</red>Logradouro</label>
                                <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->logradouro)?>" required>
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12 col-md-3">
                                <label class=" form-control-label"><red>*</red>Número</label>
                                <input type="num" id="numero" name="numero" placeholder="Número" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->numero)?>" required>
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12 col-md-5">
                                <label class=" form-control-label"><red>*</red>Bairro</label>
                                <input type="text" id="bairro" name="bairro" placeholder="Bairro" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->bairro)?>" required>
                                <span class="invalid-feedback"></span>
                            </div>


                            <div class="form-group col-12 col-md-4">
                                <label class=" form-control-label">Complemento</label>
                                <input type="text" id="complemento" name="complemento" placeholder="complemento" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->complemento)?>">
                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <a href="<?= base_url('fornecedor')?>" class="btn btn-danger btn-sm" title="Cancelar Edição">
                            <i class="fa fa-times"></i> Cancelar
                        </a>
                        <button title="Atualizar Cadastro" type="submit" class="btn btn-primary btn-sm">
                            <span class="fa fa-check"></span>
                            Atualizar
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAtualizar" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Atualizar Fornecedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Deseja realmente atualizar esse fornecedor?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Cancelar
                </button>
                <button  type="submit" class="btn btn-primary btn-edit">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>
