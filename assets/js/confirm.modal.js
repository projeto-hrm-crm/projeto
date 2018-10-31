jQuery(document).ready(function($) {

	$('#modalRemover').on('show.bs.modal', function(event) {
	    $(this).find('.btn-remove-ok').attr('href', $(event.relatedTarget).data('href'));
	});
   
   $('#modalNegado').on('show.bs.modal', function(event) {
	    $(this).find('.btn-remove-ok').attr('href', $(event.relatedTarget).data('href'));
	});
   
   $('#modalAceitar').on('show.bs.modal', function(event) {
	    $(this).find('.btn-remove-ok').attr('href', $(event.relatedTarget).data('href'));
	});

});
