<div class="row justify-content-center align-items-center">
   <div class="col-lg-8">
  <div class="card">
    <div class="card-header">
      <strong>Cadastro de Fornecedores</strong>
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
     <form action="<?php echo site_url('fornecedor/cadastrar'); ?>" method="POST" id="form_fornecedor" class="form-horizontal" novalidate="novalidate">
    <div class="card-body card-block">
      
        <div class="row">
          <!-- NOME --> 
          <div class="form-group col-12 col-md-6">
            


            <label class=" form-control-label">Nome</label>
                <input type="text" id="nome" name="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" name="nome" placeholder="Nome Completo" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                 <span class="invalid-feedback">
	                <?php echo isset($errors['nome']) ? $errors['nome'] : '' ; ?>
	              </span>
              </div>
       
          <!-- EMAIL -->
           <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">E-mail</label>
                <input type="text" id="email" name="email" value="<?php echo isset($old_data['email']) ? $old_data['email'] : null;?>"  placeholder="email@provedor.com" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" required>
                 <span class="invalid-feedback">
	                <?php echo isset($errors['email']) ? $errors['email'] : '' ; ?>
	              </span>
              </div>
          
          <!-- RAZÃO SOCIAL -->
              <div class="form-group col-12 col-md-4">
             <label class=" form-control-label">Razão Social</label>
             <input type="text" id="razao_social" name="razao_social" value="<?php echo isset($old_data['razao_social']) ? $old_data['razao_social'] : null;?>"  placeholder="Razão Social" class="form-control <?php echo isset($errors['razao_social']) ? 'is-invalid' : '' ?>" required>
                 <span class="invalid-feedback">
	                <?php echo isset($errors['razao_social']) ? $errors['razao_social'] : '' ; ?>
	              </span>
              </div>
        
           <!-- CNPJ -->
           <div class="form-group col-12 col-md-4">
                <label class=" form-control-label">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" value="<?php echo isset($old_data['cnpj']) ? $old_data['cnpj'] : null;?>" placeholder="XX.XXX.XXX/YYYY-ZZ" class="form-control <?php echo isset($errors['cnpj']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['cnpj']) ? $errors['cnpj'] : '' ; ?>
	              </span>
              </div>
           
          <!-- TELEFONE -->
          <div class="form-group col-12 col-md-4">
                <label class=" form-control-label">Telefone</label>
                <input type="text" id="telefone" name="telefone"  value="<?php echo isset($old_data['telefone']) ? $old_data['telefone'] : null;?>" placeholder="(XX)XXXX-XXXX" pattern="[0-9]{11}"  class="form-control <?php echo isset($errors['telefone']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['telefone']) ? $errors['telefone'] : '' ; ?>
	              </span>
              </div>
           
           
      
   
       <div class="form-group col-12 col-md-6">
          <label class="form-control-label">Estado</label>
           <select name="id_estado" class="form-control" id="estado">
              <option value="0" disabled selected>Selecione um estado</option>
             <?php foreach ($estados as $estado): ?>
               <option value="<?php echo $estado->id_estado ?>"><?php echo $estado->nome; ?></option>
             <?php endforeach; ?>
           </select>
      </div>
           
       <div class="form-group col-12 col-md-6">
          <label class="form-control-label">Cidade</label>
          <select name="id_cidade" class="form-control" id="cidade">
             <option value="0">Selecione um estado</option>
          </select>
      </div>

      <!-- CEP -->            
      <div class="form-group col-12 col-md-3">
                <label class=" form-control-label">CEP</label>
                <input type="cep" id="cep" name="cep" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>"  placeholder="C.E.P" class="form-control <?php echo isset($errors['cep']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['cep']) ? $errors['cep'] : '' ; ?>
	              </span>
              </div>

      <!-- LOGRADOURO -->
      <div class="form-group col-12 col-md-9">
                <label class=" form-control-label">Logradouro</label>
                <input type="logradouro" id="logradouro" name="logradouro"  value="<?php echo isset($old_data['logradouro']) ? $old_data['logradouro'] : null;?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control <?php echo isset($errors['logradouro']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['cnpj']) ? $errors['logradouro'] : '' ; ?>
	              </span>
              </div>
      
      <!-- NUMERO -->   
              <div class="form-group col-12 col-md-3">
                <label class=" form-control-label">Número</label>
                <input type="numero" id="numero" name="numero" value="<?php echo isset($old_data['numero']) ? $old_data['numero'] : null;?>"  placeholder="Número da casa" class="form-control <?php echo isset($errors['numero']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['numero']) ? $errors['numero'] : '' ; ?>
	              </span>
              </div>
    
              <!-- BAIRRO -->
              <div class="form-group col-12 col-md-5">
                <label class=" form-control-label">Bairro</label>
                <input type="bairro" id="bairro" name="bairro" value="<?php echo isset($old_data['bairro']) ? $old_data['bairro'] : null;?>"  placeholder="Bairro" class="form-control <?php echo isset($errors['bairro']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['bairro']) ? $errors['bairro'] : '' ; ?>
	              </span>
              </div>
           
           <!-- COMPLEMENTO -->
              <div class="form-group col-12 col-md-4">
                <label class=" form-control-label">Complemento</label>
                <input type="complemento" id="complemento" name="complemento" value="<?php echo isset($old_data['complemento']) ? $old_data['complemento'] : null;?>" placeholder="Complemento" class="form-control <?php echo isset($errors['complemento']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['complemento']) ? $errors['complemento'] : '' ; ?>
	              </span>
              </div>
           
   </div>
        
      
    </div>
     <div class="card-footer text-right">
        <a href="<?=site_url('fornecedor')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i> Cancelar
          </a>
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Cadastrar
          </button>
          
        </div>
       </form>
  </div>
</div>
<script type="text/javascript">
   $("#estado").change(function(){
      
      var id = $("#estado").val();     
      
      $.ajax({
           type: "GET", 
           url: "<?=site_url("filtrar_cidades");?>/"+id,
           contentType: "application/json; charset=utf-8",
           cache: false,
           success: function(retorno) {
             // Interpretando retorno JSON...
              
             var cidades = JSON.parse(retorno);
            $("#cidade").html(null); 
             // Listando cada cliente encontrado na lista...
             $.each(cidades,function(i, cidade){
                 var item = "<option value='"+cidade.id_cidade+"'> "+cidade.nome+"</option>";
                 $("#cidade").append(item);
             });
           } 
       }); 
   }); 
</script>