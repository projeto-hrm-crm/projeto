<div class="animated fadeIn">
    <div class="row" >
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
                    <strong class="card-title">Fornecedor</strong>
                </div>
                <div class="card-body">
          <a title="Cadastrar Novo Fornecedor" href="<?= site_url('fornecedor/cadastrar')?>" class="btn btn-primary btn-sm">
            <i  class="fa fa-check"></i> Novo Cadastro
          </a><br />
          <br />

                   <table class="table table-striped table-bordered datatable">
                     <thead>
                        <tr>
                           <th class="text-center">ID</th>
                           <th>Info</th>
                           <th>E-mail</th>
                           <th>Telefone</th>
                           <th class="text-center">Ações</th>
                        </tr>
                     </thead>

                     <tbody>
                        <?php foreach ($fornecedores as $fornecedor): ?>
                           <tr>
                              <td class="text-center"><?=$fornecedor->id_fornecedor; ?></td>
                              <td>
                                 <?= $fornecedor->nome;?> 
                              </td>
                              <td><?= $fornecedor->email; ?></td>
                              <td><?= $fornecedor->telefone; ?></td>
                              <td class="text-center">
                                 
                                 <a href="<?=site_url('fornecedor/editar/'.$fornecedor->id_fornecedor);?>" class="btn btn-primary" title="Editar Fornecedor">
                                    <span class="fa fa-pencil-square-o"></span>
                                </a>
                                <button data-href="<?=site_url('fornecedor/excluir/'.$fornecedor->id_fornecedor);?>" class="btn btn-danger" title="Excluir Fornecedor" data-toggle="modal" data-target="#modalRemover">
                                    <span class="fa fa-times"></span>
                                </button>
                                   
                              </td>
                           </tr>
                       <?php endforeach ?>
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
                <h5 class="modal-title">Excluir Fornecedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja Realmente Excluir Esse Fornecedor?
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