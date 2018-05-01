<!-- candidato -->

<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <strong>Cadastro de Candidato</strong>
    </div>
    <div class="row" style="margin-top: 5px;">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
					</div>
				<?php elseif ($this->session->flashdata('danger')) : ?>
					<div class="alert alert-danger">
						<p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
    <div class="card-body card-block">

      <form action="<?php echo site_url('candidato/create'); ?>" method="POST" class="form-horizontal" novalidate="novalidate">
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Nome</label></div>
          <div class="col-12 col-md-9"><input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome completo" class="form-control" title="Campo obrigatório" required></div>
        </div> <!-- FIM NOME -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">E-mail</label></div>
          <div class="col-12 col-md-9"><input type="text" id="email" name="email" value="<?php echo isset($old_data['email']) ? $old_data['email'] : null;?>"  placeholder="email@provedor.com" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,6}$" title="Digite um e-mail válido"></div>
        </div> <!-- FIM EMAIL -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Data de Nascimento</label></div>
          <div class="col-12 col-md-9"><input type="date" id="data_nacimento" name="data_nacimento" value="<?php echo isset($old_data['data_nascimento']) ? $old_data['data_nascimento'] : null;?>"  placeholder="Data de nascimento" class="form-control"></div>
        </div> <!-- FIM DATA DE NASCIMENTO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Sexo</label></div>
          <div class="col-12 col-md-9">
            <input type="radio" name="sexo" id="sexo_masc" value="0" required /><label for="sexo_masc">Masculino</label>
            <input type="radio" name="sexo" id="sexo_fem" value="1" required /><label for="sexo_fem" >Feminino</label></div>
        </div> <!-- FIM SEXO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">DDD</label></div>
          <div class="col-12 col-md-9"><input type="text" id="ddd" name="ddd" value="<?php echo isset($old_data['ddd']) ? $old_data['ddd'] : null;?>"  placeholder="DDD" class="form-control"  title="O DDD contém dois dígitos" data-mask="(00)"></div>
        </div> <!-- FIM DDD -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Telefone</label></div>
          <div class="col-12 col-md-9"><input type="text" id="tel" name="tel"  value="<?php echo isset($old_data['tel']) ? $old_data['tel'] : null;?>" placeholder="Número de telefone" class="form-control" pattern="[0-9]{11}" title="Residencial ou celular" ></div>
        </div> <!-- FIM TELEFONE -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">CPF</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cpf" name="cpf" value="<?php echo isset($old_data['cpf']) ? $old_data['cpf'] : null;?>" placeholder="CPF" class="form-control" " title="O CPF deve conter 11 dígitos decimais" data-mask="000.000.000-00"></div>
        </div> <!-- FIM CPF -->
        <!-- INÍCIO ENDEREÇO -->
        <!-- PAÍS: INSERIR CAIXA DE SELECT QUE PUXA OS PAÍSES DO BD -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">País</label></div>
          <div class="col-12 col-md-9"><input type="text" id="pais" name="pais" value="<?php echo isset($old_data['pais']) ? $old_data['pais'] : null;?>"  placeholder="País de moradia" class="form-control" pattern="[A-Za-z]" ></div>
        </div> <!-- FIM PAÍS -->
        <!-- ESTADO: INSERIR CAIXA DE SELECT QUE PUXA OS PAÍSES DO BD -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Estado</label></div>
          <div class="col-12 col-md-9"><input type="text" id="estado" name="estado" value="<?php echo isset($old_data['estado']) ? $old_data['estado'] : null;?>"  placeholder="Estado de moradia" class="form-control" pattern="[A-Za-z]" ></div>
        </div> <!-- FIM ESTADO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Cidade</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cidade" name="cidade" value="<?php echo isset($old_data['cidade']) ? $old_data['cidade'] : null;?>"  placeholder="Cidade de moradia" class="form-control" pattern="[A-Za-z]" ></div>
        </div> <!-- FIM CIDADE -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Endereço</label></div>
          <div class="col-12 col-md-9"><input type="rua" id="rua" name="rua"  value="<?php echo isset($old_data['rua']) ? $old_data['rua'] : null;?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control" pattern="[A-Za-z]" title="Campo obrigatório" required></div>
        </div> <!-- FIM ENDEREÇO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Número</label></div>
          <div class="col-12 col-md-9"><input type="rua_num" id="rua_num" name="rua_num" value="<?php echo isset($old_data['numero']) ? $old_data['numero'] : null;?>"  placeholder="Número da casa" class="form-control" pattern="[0-9]" title="Campo obrigatório" required></div>
        </div> <!-- FIM NÚMERO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Complemento</label></div>
          <div class="col-12 col-md-9"><input type="complemento" id="complemento" name="complemento" value="<?php echo isset($old_data['complemento']) ? $old_data['complemento'] : null;?>" placeholder="Complemento" class="form-control" title="Campo opcional" ></div>
        </div> <!-- FIM COMPLEMENTO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Bairro</label></div>
          <div class="col-12 col-md-9"><input type="complemento" id="complemento" name="complemento" value="<?php echo isset($old_data['bairro']) ? $old_data['bairro'] : null;?>"  placeholder="Complemento" class="form-control" title="Campo obrigatório" required></div>
        </div> <!-- FIM BAIRRO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">CEP</label></div>
          <div class="col-12 col-md-9"><input type="cep" id="cep" name="cep" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>"  placeholder="C.E.P" class="form-control" title="Campo obrigatório" data-mask="00000-000" required></div>
          <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank" style="padding-left: 15px;">Não sabe o CEP?</a>
        </div> <!-- FIM CEP -->

        <div class="card-footer text-left">
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Cadastrar
          </button>
          <a href="<?= site_url('candidato')?>" class="btn btn-danger btn-sm">
          <i class="fa fa-ban"></i> Cancelar
          </a>
        </div> <!-- FIM BOTÕES -->
      </form>
    </div>

  </div>
