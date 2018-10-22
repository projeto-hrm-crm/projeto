<div class="animated fadeIn">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Cadastrar Habilidade</strong>
                </div>
                <form action="<?php echo base_url() ?>habilidade/editar/<?=$habilidade[0]->id_habilidade;?>" method="post" id="form_habilidade" novalidate="novalidate">
                    <div class="card-body card-block">
                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class=" form-control-label"><red>*</red>Nome</label>
                                <input type="text" id="nome" name="nome" value="<?=$habilidade[0]->nome;?>" placeholder="Habilidade" name="nome" class="form-control" required>
                            </div>
                        </div>
                       
                   </div>
                   <div class="card-footer text-right">
                        <a title="Cancelar Cadastro" href="<?=site_url('perfil')?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Cancelar
                        </a>
                        <button title="Cadastrar Habilidade" type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
