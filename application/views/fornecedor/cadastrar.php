<!-- FORNECEDOR -->
<div class="animated fadeIn">
<div class="row justify-content-center align-items-center">
   <div class="col-lg-8">
  <div class="card">
    <div class="card-header">
      <strong>Cadastrar Fornecedor</strong>
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

     <form action="<?php echo site_url('fornecedor/cadastrar'); ?>" method="POST" id="form_fornecedor"  class="form-horizontal" novalidate="novalidate">
    
    <div class="card-body card-block">
            <div class="row">
           
          <div class="form-group col-12 col-md-6">
             <label class=" form-control-label">Nome</label>
             <input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome completo" class="form-control" required>
           </div>
       
           <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">E-mail</label>
                <input type="text" id="email" name="email" value="<?php echo isset($old_data['email']) ? $old_data['email'] : null;?>"  placeholder="email@provedor.com" class="form-control" >
              </div> <!-- FIM EMAIL -->
      
          <div class="form-group col-12 col-md-4">
             <label class=" form-control-label">Razão Social</label>
             <input type="text" id="razao_social" name="razao_social" value="<?php echo isset($old_data['razao_social']) ? $old_data['razao_social'] : null;?>" placeholder="Razão Social" class="form-control" required>
           </div>
        
           <div class="form-group col col-md-4">
              <label class=" form-control-label">CNPJ</label>
               <input type="text" id="cnpj" name="cnpj" value="<?php echo isset($old_data['cnpj']) ? $old_data['cnpj'] : null;?>" placeholder="XX.XXX.XXX/XXXX-XX" placeholder="CNPJ" class="form-control cnpj" maxlength="18" required>
           </div>
           
          <div class="col-12 col-md-4">
             <label class=" form-control-label">Telefone</label>
             <input type="text" id="tel" name="tel"  value="<?php echo isset($old_data['tel']) ? $old_data['tel'] : null;?>" placeholder="(XX)XXXX-XXXX" class="form-control telefone" pattern="[0-9]{11}" >
         </div>    
           
          <div class="form-group col-12 col-md-6">
          <label class="form-control-label">Estado</label>
           <select name="estado" class="form-control" id="estado">
              <option value="0" disabled selected>Selecione um estado</option>
             <?php foreach ($estados as $estado): ?>
               <option value="<?php echo $estado->id_estado ?>"><?php echo $estado->nome; ?></option>
             <?php endforeach; ?>
           </select>
      </div>
           
       <div class="form-group col-12 col-md-6">
          <label class="form-control-label">Cidade</label>
          <select name="cidade" class="form-control" id="cidade">
             <option value="0">Selecione um estado</option>
          </select>
      </div>
            
      <div class="form-group col-12 col-md-3">
                <label class=" form-control-label">CEP</label>
                <input type="cep" id="cep" name="cep" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>"  placeholder="C.E.P" class="form-control cep" required>
              </div> <!-- FIM CEP -->
      
     <div class="form-group col-12 col-md-9">
                <label class=" form-control-label">Logradouro</label>
                <input type="text" id="logradouro" name="logradouro" value="<?php echo isset($old_data['logradouro']) ? $old_data['logradouro'] : null;?>"  placeholder="Logradouro" class="form-control" required>
              </div> <!-- FIM LOGRADOURO -->
      
         
              <div class="form-group col-12 col-md-3">
                <label class=" form-control-label">Número</label>
                <input type="numero" id="numero" name="numero" value="<?php echo isset($old_data['numero']) ? $old_data['numero'] : null;?>"  placeholder="Número da casa" class="form-control" required>
              </div> <!-- FIM NÚMERO -->
    
              <div class="form-group col-12 col-md-5">
                <label class=" form-control-label">Bairro</label>
                <input type="bairro" id="bairro" name="bairro" value="<?php echo isset($old_data['bairro']) ? $old_data['bairro'] : null;?>"  placeholder="Bairro" class="form-control" required>
              </div> <!-- FIM BAIRRO -->
           
      <div class="form-group col-12 col-md-4">
                <label class=" form-control-label">Complemento</label>
                <input type="complemento" id="complemento" name="complemento" value="<?php echo isset($old_data['complemento']) ? $old_data['complemento'] : null;?>" placeholder="Complemento" class="form-control">
              </div> <!-- FIM COMPLEMENTO -->
           
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

<!-- <script type="text/javascript">
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
</script> -->