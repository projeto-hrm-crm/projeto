jQuery(document).ready(function($) {

	/**
	* @author Pedro Henrique Guimarães
	* 
	* Ajax request para buscar as notificações
	*
	*/
	function getNotifications(){
		var notificationsDiv = $('.notification-div');
		notificationsDiv.html("");
		$.ajax({
			url: BASE_URL + "/notifications", 
			data: 'JSON', 
			success: (value) => {
				value = JSON.parse(value);
				for (var i = 0; i < value.length; i++) {
					notificationsDiv.append(
						`
					    <a class="dropdown-item media bg-flat-color-6" href="#" style="min-width: 300px;">
					      <i class="fa fa-check" style="color:#237029"></i>
					      <div>
					      	${value[i].notificacao}
					      	 <br>	
						      <small class="text-right">
						      	${value[i].criacao}
						      </small>
					      </div>
					    </a>
						`
					)
				}
			},
			error: (error) => {

			}
		});
	}

	/**
	* @author Pedro Henrique Guimarães
	* 
	* Ajax request para buscar o total de notificações
	*
	*/
	function countNotifications(){
		var count = $('.count');
		$.ajax({
			url: BASE_URL + "/notifications/count", 
			data: 'JSON', 
			success: (value) => {
				value = JSON.parse(value);
				count.html(value)
			},
			error: (error) => {

			}
		});
	}


	$("#notification").click(function() {
		getNotifications();
	});


	// Notificação 
	countNotifications();
	setInterval(countNotifications, 3000);

});