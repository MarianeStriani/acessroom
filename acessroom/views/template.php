<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acess Room</title>
	<link rel="stylesheet" 
	href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css">

	<link rel="stylesheet" 
	href="<?php echo BASE_URL;?>assets/css/style.css">
</head>
<body class="bg-light ">
<!--Barra de navegação -->
<nav class="navbar navbar-expand-lg bg-blue navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?php echo BASE_URL;?>assets/images/chave-inteligente.png"  width="40" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" 
          href="<?php echo BASE_URL;?>home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" 
          href="<?php echo BASE_URL;?>reserva/cadreserva">Reservas de Sala</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" 
          href="<?php echo BASE_URL;?>sala">Gerenciamento de Salas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" 
          href="<?php echo BASE_URL;?>reserva">Gerenciamento de Reservas</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" 
          href="<?php echo BASE_URL;?>usuario"> Gerenciamento de Usuários</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['usuario'];?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo BASE_URL;?>login/logout">Sair</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<!-- -->
<div class="container mt-3">
	<?php 
		$this->loadView($viewName, $viewData);
	?>
</div>


<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery-3.6.0.min.js"></script>	

<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/bootstrap.bundle.min.js"></script>	
</body>
</html>