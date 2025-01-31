<div class="container mt-5">
  <div class="row justify-content-evenly">

    <div class="card shadow bg-blue rounded d-grid gap-2 d-md-flex mb-3 " style="width: 30rem;">
      <div class="card-body">
        <h3 class="card-title text-light">Reservas na hora atual:</h3>
        <div class="shadow rounded-2">
          <div id="donutchart" style="width: 100%; height: 300px;">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php 
                foreach($listastatus as $item){


                ?>
                ['<?php echo $item['status'];?>', <?php echo $item['registros'];?>],
              <?php } ?>
              ]);


              var options = {
                pieHole: 0.4,
                slices: {
                  1: { color: '#198754' },    // fatia 1 corresponde a livre
                  0: { color: '#F9D057' }, // fatia 0 corresponde a inativo
                  2: { color: '#BB2D3B' },  // fatia 2 cooresponde a locado
                }
              };

              var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
              chart.draw(data, options);
            }
          </script>
          </div>
        </div>
      </div>
    </div>


    <div class="card text-center shadow bg-blue rounded mb-3" style="width: 30rem;">
      <div class="card-body">
        <h3 class="card-title text-light">Até o momento consta em nosso sistema: </h3>
      
          <?php 
            foreach($quantsala as $item){
          ?>

        <div class="card shadow bg-white rounded-2 d-grid d-md-flex mb-3 mx-auto p-2" style="max-width: 16rem;">
          <h4 class="card-title text-darkblue"> <?php echo $item['quantsala'];?></h4>
          <h4 class="card-text text-darkblue">Salas Cadastradas</h4>
          <?php } ?>
        </div>
       
          <?php 
            foreach($quantusuario as $item){
          ?>

        <div class="card shadow bg-white rounded-2 d-grid d-md-flex mb-3 mx-auto p-2" style="max-width: 16rem;">
          <h4 class="card-title text-darkblue"><?php echo $item['quantusuarios'];?></h4>
          <h4 class="card-text text-darkblue">Usuários Cadastrados</h4>
          <?php } ?>
        </div>
        
         <?php 
            foreach($quantreserva as $item){
          ?>

        <div class="card shadow bg-white rounded-2 d-grid d-md-flex mb-3 mx-auto p-2" style="max-width: 16rem;">
          <h4 class="card-title text-darkblue"><?php echo $item['quantreservas'];?></h4>
          <h4 class="card-text text-darkblue">Reservas Realizadas</h4>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
