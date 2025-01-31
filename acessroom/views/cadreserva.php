<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title style="color:darkblue">Escolha sua sala</title>
		<link rel="stylesheet" 
	href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css">

	<link rel="stylesheet" 
	href="<?php echo BASE_URL;?>assets/css/style.css">

</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg bg-blue navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?php echo BASE_URL;?>assets/images/chave-inteligente.png" width="40" height="40">
    </a>
  </div>
</nav>
<br>
<h1 style="text-align: center; color:darkblue">Reservas de salas</h1>
<br>

<div class="box-btn mx-auto shadow rounded p-4">
<?php 
foreach ($lista as $item) { 
?>
<!-- Button trigger modal -->
<button type="button" class="btn <?php 
if($item['status'] == "INATIVO"){
echo "btn-warning disabled btn-lg shadow rounded";
}else if($item['status'] == "LIVRE"){
echo "btn-success btn-lg shadow rounded";
}else if($item['status'] == "LOCADO"){
  echo "btn-danger btn-lg shadow rounded";
}
?>
" style="margin:10px 10px" data-bs-toggle="modal" data-bs-target="#Md<?php echo $item['idsala'];?>">
  <?php echo $item['sala'];?>
</button>

<div class="modal fade" id="Md<?php echo $item['idsala'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:darkblue">Reserva da Sala de <?php echo $item['sala'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body my-3" style="margin: 40px 30px">
        <button type="button" class="btn <?php 
          if($item['status'] == "INATIVO"){
            echo "btn-secondary disabled opacity-0";
          }else if($item['status'] == "LOCADO"){
            echo "btn-secondary disabled opacity-0";
          }else if($item['status'] == "LIVRE"){
              echo "btn-success active";
          }
          ?> " data-bs-toggle="modal" data-bs-target="#cadastraModal<?php echo $item['idsala'];?>" aria-pressed="true">Vamos reservar a chave?</button>
        <br>
        <br>
        <button type="button" class="btn <?php 
          if($item['status'] == "INATIVO"){
            echo "btn-secondary disabled opacity-0";
          }else if($item['status'] == "LOCADO"){
              echo "btn-danger active ";
          }else if($item['status'] == "LIVRE"){
              echo "btn-secondary disabled opacity-0";
          }
          ?> " data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item['idsala'];?>">Vamos devolver a chave?</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cadastraModal<?php echo $item['idsala'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="color:darkblue">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva da Sala <?php echo $item['sala'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form method="post" action="<?php echo BASE_URL;?>reserva/cadastrar">
              <input type="hidden" name="idsala" value="<?php echo $item['idsala'];?>">
      <div class="mb-3">
        <label class="form-label">Numero de Registro</label>
        <input type="text" class="form-control" name="txtnregistro">
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" onclick="funcao1()">Confirmar a reserva</button>
      </form>
      </div>
    </div>
  </div>
</div>
 
      <!-- -->
      <?php 
      foreach($listar as $itemr){
        if($item['idsala'] == $itemr['idsala']){
            $idreserva = $itemr['idreserva'];
        }
      }

      ?>
      <!-- Modal devolver -->
<div class="modal fade" id="editModal<?php echo $item['idsala'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="color:darkblue">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Devolver reserva da Sala <?php echo $item['sala'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>reserva/editar/<?php echo $idreserva;?>" >
           <input type="hidden" name="idsala" value="<?php echo $item['idsala'];?>">
          <h6>Deseja confirmar a entrega de chave? <h6>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" onclick="funcao2()">Confirmar a devolução</button></form>
      </div>
    </div> 
  </div>
</div> 

<?php } ?>
</div>
<script>
function funcao1()
{
alert("Esta sala foi reservada com sucesso, tenha um excelente dia.");
}
</script>
<script>
function funcao2()
{
alert(" A chave desta sala foi entregue com sucesso, tenha um excelente descanso e até a proxima reserva.");
}
</script>

<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery-3.6.0.min.js"></script>	

<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/bootstrap.bundle.min.js"></script>		
</body>
</html>