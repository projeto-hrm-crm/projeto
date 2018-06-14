function add_etapa()
{
	var div1 = document.createElement('div');
	// Get template data
	div1.innerHTML = document.getElementById('template1').innerHTML;
	// append to our form, so that template data
	//become part of form
	document.getElementById('newlink').appendChild(div1);
}
cloneform = jQuery('#template1').html();

jQuery(document).on('click','.remDiv, .addDiv', function(e){
	console.log(e.attr('name'));
   thisClass = e.target.className;
   thisClass == 'remDiv' ?
   (jQuery('.'+thisClass).length > 1 ?
   jQuery(this).closest('.cloned-div').prev().add(jQuery(this).closest('.cloned-div')).remove() : 0) :
   jQuery('#template1').append(cloneform);
});

function remove_etapa()
{
	console.log(234234)
	var clonedParent = jQuery(this);
	console.log(clonedParent);
	// $(this).parents('div.cloned-div').remove();
}



jQuery(document).ready(($) => {


})
