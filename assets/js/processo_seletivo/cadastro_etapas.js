function add_etapa()
{
	var div1 = document.createElement('div');
	div1.innerHTML = document.getElementById('template1').innerHTML;
	document.getElementById('newlink').appendChild(div1);
}

jQuery(document).on('click','.remDiv', function(e){
	jQuery(this).parent().remove();
});
