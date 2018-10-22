jQuery().ready(function(e){
	var i = 0;

	jQuery('#addnew').click(function(){
		i++;
		jQuery('#newlink').append('<div class="cloned-div'+(i)+'"><div class="form-row"><div class="form-group col-12"><label class="form-control-label">Nome</label><input type="text" name="nome_etapa[]'+(i)+'" placeholder="Nome da etapa" class="form-control" required></div><div class="form-group col-12"><label class="form-control-label mt-2">Descrição</label><textarea auto-resize placeholder="Descrição da etapa"name="descricao_etapa[]'+(i)+'" class="form-control" required></textarea></div><a name="button" class="btn btn-danger btn-sm remDiv mt-2 mb-3 text-white text-right"><span class="fa fa-times text-right"></span>Excluir</a></div></div>');
	})

});

jQuery(document).on('click','.remDiv', function(e){
	jQuery(this).parent().remove();
});
