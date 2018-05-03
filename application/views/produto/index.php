<div class="animated fadeIn">
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Produtos</strong>
                </div>
                <div class="card-body">
                    <table id="vagas" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Lote</th>
                                <th>Recebimento</th>
                                <th>Fornecedor</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($produtos)): ?>
                                <?php foreach($produtos as $produto): ?>
                                    <tr>
                                        <td><?= $produto->codigo;?></td>
                                        <td><?= $produto->nome;?></td>
                                        <td><?= $produto->lote;?></td>
                                        <td><?= $produto->recebimento;?></td>
                                        <td><?= $produto->razao_social;?></td>
                                        <td>
                                            <a href="produto/editar/<?php echo $produto->id_produto?>" class="btn btn-primary">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <a href="produto/deletar/<?php echo $produto->id_produto?>" class="btn btn-danger">
                                                <span class="fa fa-close"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
        </div>
    </div>
</div>
