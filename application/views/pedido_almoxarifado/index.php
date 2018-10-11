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
                          <a title="Solicitação Atendida" href="<?= site_url('almoxarifado/editar/'.$pedido_almoxarifado->id_pedido_almoxarifado)?>" class="btn btn-success">
                          <span class="fa fa-thumbs-up"></span></a>
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

    <div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Excluir Entrada</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja Realmente Excluir Esse Entrada?
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
