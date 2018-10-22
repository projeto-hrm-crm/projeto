<div class="animated fadeIn">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Cadastrar Candidato</strong>
                </div>
                <form action="<?php echo site_url('candidato/cadastrar'); ?>" method="POST" id="form_candidato" novalidate="novalidate">
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Nome</label>
                                <input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome completo" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="email-input" class=" form-control-label"><red>*</red>E-mail</label>
                                <input type="email" id="email" name="email" placeholder="email@provedor.com" class="form-control" value="<?php echo isset($old_data['email']) ? $old_data['email'] : null;?>" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class="form-control-label"><red>*</red>Data de Nascimento</label>
                                <input type="text" id="data_nascimento" name="data_nascimento" value="<?php echo isset($old_data['data_nascimento']) ? $old_data['data_nascimento'] : null;?>"  placeholder="00/00/0000" class="form-control data" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                              <label class="form-control-label" for='sexo'><red>*</red>Sexo</label><br>
                              <input type="radio" name="sexo" id="sexo_masc" value="0" <?php echo isset($old_data['sexo']) && $old_data['sexo'] == '0' ? 'checked' : ''?> checked/><label for="sexo_masc">Masculino</label>
                              <input type="radio" name="sexo" id="sexo_fem" value="1" <?php echo isset($old_data['sexo']) && $old_data['sexo'] == '1' ? 'checked' : ''?> /><label for="sexo_fem" >Feminino</label>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>CPF</label>
                                <input type="text" id="cpf" name="cpf" value="<?php echo isset($old_data['cpf']) ? $old_data['cpf'] : null;?>" placeholder="000.000.000-00" class="form-control cpf">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Telefone</label>
                                <input type="text" id="telefone" name="tel"  value="<?php echo isset($old_data['tel']) ? $old_data['tel'] : null;?>" placeholder="(00)0000-0000" class="form-control alter_mask">
                            </div>
                            <!-- INÍCIO ENDEREÇO -->
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>CEP</label>
                                <input type="cep" id="cep" name="cep" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>"  placeholder="00000-000" class="form-control cep" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="estado"><red>*</red>Estado</label>
                                <input type="text" name="estado" id="estado" placeholder="Estado" class="form-control">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="cidade"><red>*</red>Cidade</label>
                                <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="form-control">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Bairro</label>
                                <input type="bairro" id="bairro" name="bairro" value="<?php echo isset($old_data['bairro']) ? $old_data['bairro'] : null;?>"  placeholder="Bairro" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Endereço</label>
                                <input type="logradouro" id="logradouro" name="logradouro"  value="<?php echo isset($old_data['logradouro']) ? $old_data['logradouro'] : null;?>"  placeholder="Nome da rua/av./praça/alameda" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Número</label>
                                <input type="numero" id="numero" name="numero" value="<?php echo isset($old_data['numero']) ? $old_data['numero'] : null;?>"  placeholder="Número da residência" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label">Complemento</label>
                                <input type="complemento" id="complemento" name="complemento" value="<?php echo isset($old_data['complemento']) ? $old_data['complemento'] : null;?>" placeholder="Complemento" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a title="Cancelar Cadastro" href="<?=site_url('candidato')?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                            Cancelar
                        </a>
                        <button title="Cadastrar Candidato" type="submit" class="btn btn-primary btn-sm" name="cadastrar">
                            <i class="fa fa-plus"></i>
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
