jQuery(document).ready(function($) {

	/**
	 * @author Pedro Henrique Guimarães
	 * 
	 * Ajax request que seta a notificação como "view = 1", ou seja visualizada. 
	 */
	setViewed = function($notification_id) {
		$.ajax({
			url: BASE_URL + "notifications/viewed/" + $notification_id, 
			dataType: 'GET', 
			success: (value) => {

			},
			error: (error) => {

			}
		});
	}

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
					if (value[i].view == 0) {
						notificationsDiv.append(
							`
							<a class="dropdown-item media bg-flat-color-6" href="${value[i].link}" onclick="setViewed(${value[i].id_notificacao})" style="min-width: 300px;">
							<div>
								${value[i].notificacao}
								<br>	
								<small class="text-right">
									${value[i].criacao}
								</small>
							</div>
							<span class="badge badge-danger">Nova!</span>
							</a>
							`
						)
					} else {
						notificationsDiv.append(
							`
							<a class="dropdown-item media bg-flat-color-6" href="${value[i].link}"style="min-width: 300px;">
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
		count.removeClass("bg-danger");
		$.ajax({
			url: BASE_URL + "/notifications/count", 
			data: 'JSON', 
			success: (value) => {
				value = JSON.parse(value);
				if (value > 0) {
					count.addClass("bg-danger");
					count.html(value)
				}
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