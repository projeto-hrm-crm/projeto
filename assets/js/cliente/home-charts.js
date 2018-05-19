jQuery(document).ready(($) => {

    var months = [
      'Janeiro', 'Fevereiro', 'Março', 'Abril',
      'Maio', 'Junho', 'Julho', 'Agosto',
      'Setembro','Outubro' ,'Novembro', 'Dezembro'
    ];

    month = months.map((item) => item.substr(0, 3));

    getCurrentDate = function() {
      var utc =  new Date();
      utc = utc.getMonth();
      return months[utc];
    }

    getLastDate = function() {
      var utc =  new Date();
      utc = utc.getMonth();
      return months[utc - 1];
    }

    var client_chart = document.getElementById('client-chart').getContext('2d');


    $.ajax({
      url : 'http://localhost/projeto/cliente/chart',
      data: 'json',
      success: function(data) {
        console.log(data);
        if (data.status == 'ok') {
          console.log(data);return
          var clientChart = new Chart(client_chart, {
            type: 'line',
            data: {
              labels: month,
              backgroundColor: '#000000',
              borderColor: '#000000',
              datasets: [{
      					label: getCurrentDate(),
      					data: data.data,
      					fill: false,
      				}]
            }
          });
        }
      }
    })
});
