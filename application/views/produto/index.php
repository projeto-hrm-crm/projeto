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
                    <strong class="card-title">Produtos</strong>
                </div>
                <div class="card-body">
                    <a href="<?= site_url('produto/cadastrar')?>" class="btn btn-primary btn-sm" title="Cadastrar produto">
                        <i class="fa fa-check"></i> Novo Cadastro
                    </a><br><br>
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Lote</th>
                                <th>Recebimento</th>
                                <th>Valor</th>
                                <th>Fornecedor</th>
                                <th>Ações</th>
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
                                        <td><?= number_format(floatval($produto->valor)/100,2,',','.');?></td>
                                        <td><?= $produto->razao_social;?></td>
                                        <td>
                             
                             
                                            <?php 
                                                $type = "a";
                                                $label = " <span class='fa fa-edit'></span>";
                                                $classes = ['btn', 'btn-primary'];
                                                $attr = [
                                                    'href' => 'produto/editar/'. $produto->id_produto,
                                                    'title' => 'Atualizar Produto'
                                                ];
                                                $this->Button->build($type, $label, $classes, $attr, 'Produto', 'Editar');
                                            ?>
                                       
                                    
                                            <button data-href="produto/excluir/<?php echo $produto->id_produto?>" class="btn btn-danger" title="Excluir Produto" data-toggle="modal" data-target="#modalRemover">
                                                <span class="fa fa-times"></span>
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
                Deseja realmente excluir esse produto?
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
