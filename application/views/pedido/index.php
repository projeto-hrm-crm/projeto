<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
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
                    <strong class="card-title">Pedidos</strong>
                </div>
                <div class="card-body">
                    <a href="<?= site_url('pedido/cadastrar')?>" class="btn btn-primary btn-sm" title="Cadastrar Novo Produto">
                        <i class="fa fa-check"></i> Novo Cadastro
                    </a><br><br>
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Pedido para</th>
                                <th>Tipo de pedido</th>
                                <th>Situação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($pedidos)): ?>
                                <?php foreach($pedidos as $pedido): ?>
                                    <tr>
                                        <td><?= $pedido->codigo;?></td>
                                        <td><?= $pedido->nome;?></td>
                                        <td><?= $pedido->tipo;?></td>
                                        <td><?= $pedido->transacao;?></td>
                                        <td>
                                            <a title="Atualizar Pedido" href="pedido/editar/<?php echo $pedido->id_produto?>" class="btn btn-primary" title="Editar produto">
                                                <span class="fa fa-edi btn-sm"></span>
                                            </a>
                                            <button title="Excluir Pedido" data-href="pedido/excluir/<?php echo $pedido->id_produto?>" class="btn btn-danger" title="Excluir produto" data-toggle="modal" data-target="#modalRemover">
                                                <span class="fa fa-times btn-sm"></span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja Realmente Excluir Esse Produto?
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
