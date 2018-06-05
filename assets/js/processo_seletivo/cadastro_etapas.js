function validate(frm)
{
	var ele = frm.elements['feedurl[]'];
	if (! ele.length)
	{
		alert(ele.value);
	}
	for(var i=0; i<ele.length; i++)
	{
		alert(ele[i].value);
	}
	return true;
}
function add_etapa()
{
	var div1 = document.createElement('div');
	// Get template data
	div1.innerHTML = document.getElementById('template1').innerHTML;
	// append to our form, so that template data
	//become part of form
	document.getElementById('newlink').appendChild(div1);
}

function remove_etapa()
{
	var node = document.getElementById('template1');
	node.parentNode.removeChild(node);
	// if (node.parentNode) {
	// }
}
