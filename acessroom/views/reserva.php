<!-- Lista de reservas de salas -->
<h1 style="text-align: center ; color:darkblue">Gerenciamento de Reservas</h1>
<hr>
<form class="d-flex" role="search" method="post" action="<?php echo BASE_URL;?>reserva/busca">
    <input class="form-control me-2" type="search" placeholder="O que você procura?" aria-label="PESQUISAR" name="txtbusca">
    <button class="btn btn-outline-primary" type="submit">PROCURAR</button>
</form>
<hr>

<table class="table table-striped table-hover shadow rounded"style="color:darkblue">

  <thead>
    <tr>
      <th scope="col">ID da Reserva</th>
      <th scope="col">Sala</th>
      <th scope="col">Periodo</th>
      <th scope="col">Locação</th>
      <th scope="col">Devolução</th>
      <th scope="col">Nº de Registro</th>
      <th scope="col">Usuário</th>
    </tr>
  </thead>

  <tbody>

  <?php
    if(isset($_POST['txtbusca']) && !empty($_POST['txtbusca'])){
      foreach($listabusca as $item){ ?>
        <tr>
          <th scope="row"><?php echo $item['idreserva'];?></th>
          <td><?php echo $item['sala'];?></td>
          <td><?php echo $item['periodo'];?></td>
          <td><?php echo $item['dtlocacao'];?></td>
          <td><?php echo $item['dtdevolucao'];?></td>
          <td><?php echo $item['nregistro'];?></td>
          <td><?php echo $item['usuario'];?></td>
        </tr>
      <?php }
        }else{
          foreach($listac as $item){?>
        <tr>
          <th scope="row"><?php echo $item['idreserva'];?></th>
          <td><?php echo $item['sala'];?></td>
          <td><?php echo $item['periodo'];?></td>
          <td><?php echo $item['dtlocacao'];?></td>
          <td><?php echo $item['dtdevolucao'];?></td>
          <td><?php echo $item['nregistro'];?></td>
          <td><?php echo $item['usuario'];?></td>
        </tr>
      <?php
    }
  }
  ?>
	 
  </tbody>
</table>
<!-- -->