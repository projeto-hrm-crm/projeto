$(document).ready(function() {

	function setConfirmModalEvent(type, form = null)
	{
		if(type === 'edit')
		{
			$('.btn-edit').click(function(event){
		        event.preventDefault();
			});

			$('.btn-edit-ok').click(function(){
				form.submit();
			});	
		}
		
		if(type === 'remove')
		{
			$('#modalRemover').on('show.bs.modal', function(e) {
			    $(this).find('.btn-remove-ok').attr('href', $(e.relatedTarget).data('href'));
			});	
		}
	}


	setConfirmModalEvent('edit', $('#form-vaga'));
	setConfirmModalEvent('remove');
	
});