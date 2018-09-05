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
        data = JSON.parse(data);
        if (data.status == 'ok') {
          var clientChart = new Chart(client_chart, {
            type: 'line',
            data: {
              labels: month,
              datasets: [{
                backgroundColor: '#63c2de',
                borderColor: '#63c2de',
      					label: "Clientes",
      					data: data.data,
      					fill: false,
      				}]
            }
          });
        }
      }
    })
});
