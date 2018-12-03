<div class="animated fadeIn">

   <div class="row justify-content-center align-items-center">
      <div class="col-lg-10">
         <div class="card">
            <div class="card-header">
               <strong class="card-title">Cadastrar SAC</strong>
            </div>
            <form action="<?php echo site_url('sac/cadastrar'); ?>" method="POST" id="form-sac" novalidate="novalidate">
               <div class="card-body">
                   <?php if(sizeof($clientes) <= 0): ?>
                       <div class="row justify-content-center align-items-center">
                           <div class="col-12">
                               <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                   Não existe nenhum cliente cadastrado no sistema, favor cadastre um cliente!
                               </div>
                               <a title="Novo cliente" href="<?= site_url('cliente/cadastrar')?>" class="btn btn-primary btn-sm float-right">
                                   <i class="fa fa-check"></i>
                                   Novo cliente
                               </a>
                           </div>
                       </div>
                   <?php elseif(sizeof($produtos) <= 0): ?>
                       <div class="row justify-content-center align-items-center">
                           <div class="col-12">
                               <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                   Não existe nenhum produto cadastrado no sistema, favor cadastre um produto!
                               </div>
                               <a title="Novo cliente" href="<?= site_url('produto/cadastrar')?>" class="btn btn-primary btn-sm float-right">
                                   <i class="fa fa-check"></i>
                                   Novo produto
                               </a>
                           </div>
                       </div>
                   <?php else: ?>
                  <div class="row">
                     <div class="col-lg-6 form-group">
                        <label class=" form-control-label">Assunto</label>
                        <input type="text" id="titulo" name="titulo" placeholder="Título da Reclamação" class="form-control titulo" required>
                     </div>

                     <div class="col-lg-6 form-group">
                        <label class="form-control-label">Produto</label>
                        <select name="id_produto" class="form-control" id="produto">
                           <option value="0" disabled selected>Selecione um produto</option>
                           <?php foreach ($produtos as $produto): ?>
                              <option value="<?php echo $produto->id_produto ?>"><?php echo $produto->nome; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>

                     <?php if($tipo == "1"){ ?>
                         <div class="form-group col-md-12 col-sm-12">
                            <label for="id_cliente" class="form-control-label">Cliente</label>
                            <select name="id_cliente" class="form-control" id="cliente">
                               <option value="0" disabled selected>Selecione cliente</option>
                               <?php foreach ($clientes as $cliente): ?>
                                  <option value="<?php echo $cliente->id_cliente ?>"><?php echo $cliente->nome; ?></option>
                               <?php endforeach; ?>
                            </select>
                         </div>
                    <?php } else { ?>
                        <div class="form-group col-md-12 col-sm-12" style="display: none">
                            <?php foreach ($clientes as $cliente): ?>
                                <?php if($this->session->userdata('user_login') == $cliente->id_cliente): ?>
                                    <select name="id_cliente" class="form-control" id="cliente">
                                        <option value="<?php echo $cliente->id_cliente ?>"><?php echo $cliente->nome; ?></option>
                                    </select>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php } ?>

                     <div class="col-md-12 form-group">
                        <label class=" form-control-label">Descrição</label>
                        <textarea id="descricao" name="descricao" class="form-control descricao" placeholder="Relate aqui seu problema" required></textarea>
                     </div>
                  </div>
               </div>
               <div class="card-footer text-right">
                  <a title="Cancelar Cadastro" href="<?=site_url('sac')?>" class="btn btn-danger btn-sm">
                     <i class="fa fa-times"></i> Cancelar
                  </a>
                  <button title="Cadastrar SAC" type="submit" class="btn btn-primary btn-sm">
                     <i class="fa fa-plus"></i> Cadastrar
                  </button>

               </div>
           <?php endif; ?>
            </form>
         </div>

      </div>
   </div>
</div>
