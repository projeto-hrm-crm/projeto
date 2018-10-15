<!-- FUNCIONÁRIO -->
<div class="row justify-content-center align-items-center">
    <div class="col-lg-12">
        <?php if($this->session->flashdata('success')): ?>
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
            <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('danger')): ?>
          <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
            <?php echo $this->session->flashdata('danger'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Solicitações Almoxarifado</strong>
          </div>
          <div class="card-body">
            <a href="<?= site_url('pedido_almoxarifado/cadastrar')?>" class="btn btn-primary btn-sm" title="Cadastrar Novo Funcionário">
              <i class="fa fa-check"></i> Novo Pedido
            </a><br />
            <br />
            <table id="bootstrap-data-table" class="table table-striped table-bordered datatable">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th class="text-center">Setor</th>
                  <th class="text-center">Quantidade</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!is_null($pedidos_almoxarifado)): ?>
                    <?php foreach ($pedidos_almoxarifado as $pedido_almoxarifado): ?>
                      <tr>
                        <td >
                           <?=$pedido_almoxarifado->item; ?><br>
                           <small>Requerente: <?=$pedido_almoxarifado->nome; ?></small>
                         
                         </td>
                        <td class="text-center"><?=$pedido_almoxarifado->setor; ?></td>
                        <td class="text-center"><?=$pedido_almoxarifado->quantidade; ?> <?=$pedido_almoxarifado->medida; ?></td>
                        <td class="text-center">
                           <a title="Informações" href="<?= site_url('pedido_almoxarifado/informacao/'.$pedido_almoxarifado->id_pedido_almoxarifado)?>" class="btn btn-primary">
                             <span class="fa fa-info"></span>
                           </a>
                          <?php if($pedido_almoxarifado->status == 0){  ?>
                                                     
                           <button data-href="<?=site_url('pedido_almoxarifado/alterar_status/'.$pedido_almoxarifado->id_pedido_almoxarifado).'/1';?>" class="btn btn-danger" title="Solicitação Pedido Negado" data-toggle="modal" data-target="#modalNegado">
                              <span class="fa fa-thumbs-down"></span>
                          </button>
                           <button data-href="<?=site_url('pedido_almoxarifado/alterar_status/'.$pedido_almoxarifado->id_pedido_almoxarifado).'/2';?>" class="btn btn-success" title="Solicitação Pedido Aceito" data-toggle="modal" data-target="#modalAceitar">
                              <span class="fa fa-thumbs-up"></span>
                          </button>
                          <?php }  ?>
                         </td>
                       </tr>
                     <?php endforeach ?>
                    <?php endif;?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
</div>

    <div class="modal fade" id="modalAceitar" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Requerimento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja realmente aceitar este pedido?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Cancelar
            </button>
            <a href="#" class="btn btn-primary btn-remove-ok">
              Confirmar
            </a>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="modalNegado" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Requerimento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja realmente rejeitar este pedido?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Cancelar
            </button>
            <a href="#" class="btn btn-primary btn-remove-ok">
              Confirmar
            </a>
          </div>
        </div>
      </div>
    </div>

