<div class="row" style="margin-top: 5px;">
        <div class="col-lg-10">
          <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?>
          </div>
          <?php elseif ($this->session->flashdata('danger')) : ?>
          <div class="alert alert-danger">
            <span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?>
          </div>
          <?php endif; ?>
        </div>
      </div>


<div class="row justify-content-center align-items-center">
   <div class="col-lg-10">
  <div class="card">
  <div class="card-header">
          <strong class="card-title">Cadastrar Fornecedor</strong>
        </div>
     <form action="<?php echo site_url('fornecedor/cadastrar'); ?>" method="POST" id="form_fornecedor" novalidate="novalidate">
    
    <div class="card-body card-block">
        <div class="row">
          <!--NOME--> 
          <div class="form-group col-12 col-md-6">
            <label class=" form-control-label">Nome</label>
                <input type="text" id="nome" name="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome Completo da Empresa" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>"required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['nome']) ? $errors['nome'] : '' ; ?>
	              </span>
          </div>
          <!--EMAIL-->       
          <div class="form-group col-12 col-md-6">
             <label for="email-input" class=" form-control-label">E-mail</label>
             <input type="email" id="email" name="email" placeholder="e-mail" value="<?php echo isset($old_data['email']) ? $old_data['email'] : null;?>" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['email']) ? $errors['email'] : '' ; ?>
	              </span>
          </div>
      
          <div class="form-group col-12 col-md-4">
             <label class=" form-control-label">Razão Social</label>
             <input type="text" id="razao_social" name="razao_social" placeholder="Razão Social" value="<?php echo isset($old_data['razao_social']) ? $old_data['razao_social'] : null;?>" class="form-control <?php echo isset($errors['razao_social']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['razao_social']) ? $errors['razao_social'] : '' ; ?>
	              </span>
          </div>
        
           <div class="form-group col col-md-4">
              <label class=" form-control-label">CNPJ</label>
               <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" maxlength="18" value="<?php echo isset($old_data['cnpj']) ? $old_data['cnpj'] : null;?>" class="form-control cnpj <?php echo isset($errors['cnpj']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['cnpj']) ? $errors['cnpj'] : '' ; ?>
	              </span>
          </div>
           
          <div class="col-12 col-md-4">
             <label class=" form-control-label">Telefone</label>
             <input type="text" id="telefone" name="telefone" placeholder="(12)3889-9090" maxlength="15" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>" class="form-control telefone <?php echo isset($errors['telefone']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['cep']) ? $errors['cep'] : '' ; ?>
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
             <option value="0">Selecione uma cidade</option>
          </select>
      </div>
            
      <div class="form-group col-12 col-md-3">
         <label class=" form-control-label">CEP</label>
         <input type="num" id="cep" name="cep" placeholder="CEP" maxlength="9" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>" class="form-control <?php echo isset($errors['cep']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['cep']) ? $errors['cep'] : '' ; ?>
	              </span>
          </div>
      
      <div class="form-group col-12 col-md-9">
         <label class=" form-control-label">Logradouro</label>
         <input type="text" id="logradouro" name="logradouro" placeholder="Nome da Rua" value="<?php echo isset($old_data['logradouro']) ? $old_data['logradouro'] : null;?>" class="form-control <?php echo isset($errors['logradouro']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['logradouro']) ? $errors['logradouro'] : '' ; ?>
	              </span>
          </div>
      
         
      <div class="form-group col-12 col-md-3">
         <label class=" form-control-label">Número</label>
         <input type="num" id="numero" name="numero" placeholder="Exemplo: 91" value="<?php echo isset($old_data['numero']) ? $old_data['numero'] : null;?>" class="form-control <?php echo isset($errors['numero']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['numero']) ? $errors['numero'] : '' ; ?>
	              </span>
          </div>
    
      <div class="form-group col-12 col-md-5">
         <label class=" form-control-label">Bairro</label>
         <input type="text" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo isset($old_data['bairro']) ? $old_data['bairro'] : null;?>" class="form-control <?php echo isset($errors['bairro']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['bairro']) ? $errors['bairro'] : '' ; ?>
	              </span>
          </div>
           
      <div class="form-group col-12 col-md-4">
         <label class=" form-control-label">Complemento</label>
         <input type="text" id="complemento" name="complemento" placeholder="complemento" class="form-control">
      </div>
           
   </div>
        
      
    </div>
     <div class="card-footer text-right">
        <a title="Cancelar Cadastro" href="<?=site_url('fornecedor')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i> Cancelar
          </a>
          <button title="Cadastrar Fornecedor" type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Cadastrar
          </button>
          
        </div>
       </form>
  </div>
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