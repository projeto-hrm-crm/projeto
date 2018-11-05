function statusUp()
{
	var status

	$.ajax({
        url: 'database/editar.php',
        method: 'POST',
        data: {'status': status,'id': id},
        dataType: 'json'
    });
}

