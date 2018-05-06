<div class="animated fadeIn">
   <div class="row justify-content-center align-items-center">
      <div class="col-lg-8">
         <div class="card">
            <div class="card-header">
               <strong class="card-title">Cadastrar SAC</strong>
            </div>
            <form action="<?php echo site_url('sac/create'); ?>" method="POST" id="form-sac">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-12 form-group">
                        <label class=" form-control-label">Assunto</label>
                        <input type="text" id="titulo" name="titulo" placeholder="Assunto" class="form-control titulo" required>
                     </div>
                       
                     <div class="col-lg-6 form-group">
                        <label class="form-control-label">Produtos</label>
                        <select name="id_produto" class="form-control" id="produto">
                           <option value="0" disabled selected>Selecione um produto</option>
                           <?php foreach ($produtos as $produto): ?>
                              <option value="<?php echo $produto->id_produto ?>"><?php echo $produto->nome; ?></option>
                           <?php endforeach; ?>
                        </select>                         
                     </div>
                          
                     <div class="col-lg-6 form-group">
                        <label class="form-control-label">Cliente</label>
                        <select name="id_cliente" class="form-control" id="produto">
                           <option value="0" disabled selected>Selecione um cliente</option>
                           <?php foreach ($clientes as $cliente): ?>
                              <option value="<?php echo $cliente->id_cliente ?>"><?php echo $cliente->nome; ?></option>
                           <?php endforeach; ?>
                        </select>                         
                     </div>
                       
                     <div class="col-md-12 form-group">
                        <label class=" form-control-label">Descrição</label>
                        <textarea id="descricao" name="descricao" class="form-control descricao" placeholder="Fale o problema tido com o  produto." required></textarea>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                     <i class="fa fa-dot-circle-o"></i> Gravar
                  </button>
                  <a href="<?= site_url('sac/index')?>" class="btn btn-danger btn-sm">
                     <i class="fa fa-ban"></i> Cancelar
                  </a>
               </div>
            </form>
         </div>

      </div>
   </div>
</div>