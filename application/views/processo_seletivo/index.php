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
                    <strong class="card-title">Processos Seletivos</strong>
                  </div>

             <div class="card-body">
                    <a title="Cadastrar Processo Seletivo" href="<?= site_url('processo_seletivo/cadastrar')?>" class="btn btn-primary btn-sm">
            <i class="fa fa-check"></i> Novo Cadastro
          </a><br />
          <br />

               <table id="bootstrap-data-table" class="table table-striped table-bordered datatable">
                     <thead>
                        <tr>
                           <th class="text-center">Código</th>
                           <th class="text-center">Nome</th>
                           <th class="text-center">Cargo</th>
                           <th class="text-center">Número de Vagas</th>
                           <th class="text-center">Ações</th>
                        </tr>
                     </thead>

                     <tbody>
                        <?php foreach ($processos_seletivos as $processo_seletivo): ?>
                           <tr>
                              <td class="text-center"><?=$processo_seletivo->codigo; ?></td>
                              <td class="text-center"><?=$processo_seletivo->nome; ?></td>
                              <td class="text-center"><?=$processo_seletivo->nome_cargo; ?></td>
                              <td class="text-center"><?=$processo_seletivo->vagas; ?></td>

                              <td class="text-center">

                                 <a title="Editar" href="<?=site_url('processo_seletivo/editar/'.$processo_seletivo->id_processo_seletivo);?>" class="btn btn-primary">
                                       <span class="fa fa-pencil-square-o"></span>
                                   </a>

                                 <a title="Informação" href="<?=site_url('processo_seletivo/info/'.$processo_seletivo->id_processo_seletivo);?>" class="btn btn-warning">
                                       <span class="fa fa-clipboard"></span>
                                 </a>

                                 <a title="candidatos" href="<?=site_url('processo_seletivo/candidatos/'.$processo_seletivo->id_processo_seletivo);?>" class="btn btn-secondary">
                                       <span class="fa fa-address-card"></span>
                                  </a>

                                 <button title="Excluir Processo" data-href="<?=site_url('processo_seletivo/excluir/'.$processo_seletivo->id_processo_seletivo);?>" class="btn btn-danger" data-toggle="modal" data-target="#modalRemover">
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

<div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Processo Seletivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esse processo seletivo?
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
