jQuery().ready(function(e){
	var i = 0;

	jQuery('#addnew').click(function(){
		i++;
		jQuery('#novaPermissao').append('<div class="cloned-div'+(i)+'"><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"><label class="form-check-label" for="inlineCheckbox1"></label></div></div>');
	})

  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
    <label class="form-check-label" for="inlineCheckbox1">1</label>
  </div>

});

jQuery(document).on('click','.remDiv', function(e){
	jQuery(this).parent().remove();
});
