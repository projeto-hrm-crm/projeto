<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Informações do Pedido n° <?=$pedido[0]->id_pedido_almoxarifado;?></strong>
            </div>
            
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                           <div class="col-sm-12">
                              <b><?=$pedido[0]->item; ?> - <?=$pedido[0]->descricao; ?></b><br>
                                Quantidade: <?=$pedido[0]->quantidade; ?> x <?=$pedido[0]->medida; ?> <br>
                                Setor: <?=$pedido[0]->setor; ?>
                              
                              <br>
                              <br>
                              Solicitado: <?php echo switchDate(substr($pedido[0]->data_solicitacao, 0, 10))." as ".substr($pedido[0]->data_solicitacao, 10, 10);?> <br>
                              Requerente <?=$requerente->nome;?>
                              <br>
                              <br>
                              <?php
                                 if($pedido[0]->status != 0){
                              ?>
                              Respondido: <?php echo switchDate(substr($pedido[0]->data_entrega, 0, 10))." as ".substr($pedido[0]->data_entrega, 10, 10);?><br>
                              Por <?=$requerido->nome;?>
                              <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a title="Cancelar Cadastro" href="<?php echo site_url('pedido_almoxarifado')?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Voltar
                    </a>
                </div>
            
        </div>
    </div>
</div>
