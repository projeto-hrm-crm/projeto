
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
     <form action="<?php echo site_url('fornecedor/cadastrar'); ?>" method="POST" id="form_fornecedor" >
    <div class="card-body card-block">
      
        <div class="row">
           
          <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Nome</label>
             <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" required>             
           </div>
       
          <div class="form-group col-12 col-md-6">
             <label for="email-input" class=" form-control-label">E-mail</label>
             <input type="email" id="email" name="email" placeholder="e-mail" class="form-control" required>
           </div>
      
          <div class="form-group col-12 col-md-4">
             <label class=" form-control-label">Razão Social</label>
             <input type="text" id="razao_social" name="razao_social" placeholder="Razão Social" class="form-control" required>
           </div>
        
           <div class="form-group col col-md-4">
              <label class=" form-control-label">CNPJ</label>
               <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" class="form-control cnpj" maxlength="18" required>
           </div>
           
          <div class="col-12 col-md-4">
             <label class=" form-control-label">Telefone</label>
             <input type="text" id="telefone" name="telefone" placeholder="(12)3889-9090" class="form-control telefone" maxlength="15" required>
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
            
      <div class="form-group col-12 col-md-3">
         <label class=" form-control-label">CEP</label>
         <input type="num" id="cep" name="cep" placeholder="CEP" class="form-control cep" maxlength="9" required>
      </div>
      
      <div class="form-group col-12 col-md-9">
         <label class=" form-control-label">Logradouro</label>
         <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro" class="form-control" required>
      </div>
      
         
      <div class="form-group col-12 col-md-3">
         <label class=" form-control-label">Número</label><input type="num" id="numero" name="numero" placeholder="Exemplo: 91" class="form-control" required>
      </div>
    
      <div class="form-group col-12 col-md-5">
         <label class=" form-control-label">Bairro</label>
         <input type="text" id="bairro" name="bairro" placeholder="Bairro" class="form-control" required>
      </div>
           
      <div class="form-group col-12 col-md-4">
         <label class=" form-control-label">Complemento</label>
         <input type="text" id="complemento" name="complemento" placeholder="complemento" class="form-control">
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