<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"><?php echo $title;?></strong>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Tipo</th>
                                <th>Ação</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Tabela</th>
                                <th>Produto editado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($logs)): ?>
                                <?php foreach($logs as $log): ?>
                                    <tr>
                                        <td><?php echo $log->usuario;?></td>
                                        <td><?php echo $log->tipo;?></td>
                                        <td><?php echo $log->acao;?></td>
                                        <td><?php echo $log->descricao;?></td>
                                        <td><?php echo date("d/m/Y",strtotime($log->data));?></td>
                                        <td><?php echo $log->tabela;?></td>
                                        <td><?php echo $log->produto_editado;?></td>
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
