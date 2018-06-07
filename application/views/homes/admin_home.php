<!-- admin CHART -->
<div class="col-lg-12">

<div class="col-lg-8" style="background-color: purple">

    <div class="card">

        <div class="card-body" >
          <h4 class="mb-3">Produtos mais vendidos</h4>
          <div style="background-color: #F1F2F7; width:200; height:800; display: block">

            <table id="bootstrap-data-table" class="table table-striped table-bordered">

              <thead>
                <tr>
                  <th class="text-center">Nome</th>
                  <th class="text-center">Quantidade</th>
                </tr>
              </thead>

              <tbody>
                  <tr>
                    <!--
                    <td class="text-center"><?= $produto->nome; ?></td>
                    <td class="text-center"><?= $produto->loja; ?></td>
                  -->
                  <td class="text-center" style="background-color: #FFFFFF">
                    Bambolê
                  </td>
                  <td class="text-center" style="background-color: #FFFFFF">
                    XYZ
                  </td>
                      </tr>
                  </tbody>

                </table>

          </div>
        </div>
      </div>

    <div class="card">
        <div class="card-body" >
          <h4 class="mb-3">Melhor funcionário</h4>
          <div style="width:200; height:800; display: block">

            <table id="bootstrap-data-table" class="table table-striped table-bordered">

              <thead>
                <tr style="background-color: #F1F2F7">
                  <th class="text-center">Nome</th>
                  <th class="text-center">Setor</th>
                </tr>
              </thead>

              <tbody>
                  <tr>
                    <!--
                    <td class="text-center"><?= $funcionario->nome; ?></td>
                    <td class="text-center"><?= $funcionario->loja; ?></td>
                    onde o funcionário trabalha-->
                    <td class="text-center" style="background-color: #FFFFFF">
                      Cavalo Branco de Napoleão Bonaparte
                    </td>
                    <td class="text-center" style="background-color: #FFFFFF">
                      ABCDEFGHIJKLMNOXYZ
                    </td>
                      </tr>
                  </tbody>

                </table>

          </div>
        </div>
      </div>

      <div class="card">
          <div class="card-body">
            <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>

              <h4 class="mb-3">Clientes Cadastrados</h4>
              <canvas id="client-chart2" devicePixelRatio width="500" height="300" style="display: block; border:1px solid #d3d3d3;"></canvas>
                  <script>
                    Chart.defaults.global.responsive = false
                    var ctx = document.getElementById("client-chart2").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Vermelho", "Azul", "Amarelo", "Verde", "Roxo", "Laranja"],
                            datasets: [{
                              label: '# clientes',
                              data: [12, 19, 3, 5, 2, 3],
                              backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
                  </script>

    </div>
  </div>
</div> <!-- FIM col-lg-8 -->

<div class="col-lg-4" style="background-color: teal">

  <div class="card">

      <div class="card-body" >
        <h4 class="mb-3">SACs em aberto</h4>
        <div style="background-color: #F1F2F7; width:200; height:800; display: block">

          <table id="bootstrap-data-table" class="table table-striped table-bordered">

            <thead>
              <tr>
                <th class="text-center">Protocolo</th>
                <th class="text-center">Informações</th>
              </tr>
            </thead>

              <tbody>
                <?php if(isset($sac)): ?>
                  <?php foreach($sac as $item): ?>
                      <tr>
                          <td><?=$item->titulo;?></td>

                    <a title="Plus" href="<?= site_url('/sac')?>" >
                      <i class="fa fa-plus-square"></i>

                        </td>
                      </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                  </tbody>

        </div>
      </div>
    </div>

</div><!-- FIM col-lg-4 -->

</div> <!-- FIM col-lg-12 -->

<!-- ./Admin CHART






<div class="col-lg-12">
      <div class="card">
          <div class="card-body"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
              <h4 class="mb-3">Clientes Cadastrados</h4>
              <h1 class="no-data"></h1>
              <canvas id="client-chart" height="266" width="532" style="display: block; width: 532px; height: 266px;"></canvas>
          </div>
      </div>
</div>
<!-- ./Client CHART
