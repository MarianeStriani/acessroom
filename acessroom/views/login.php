<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acess Room</title>
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/stylelogin.css"> 
</head>
<body>
	<div class="card" style="width: 16rem;">

	<img class="align-self-center mt-3"src="<?php echo BASE_URL;?>assets/images/chave-inteligente.png"  width="50" height="50">
		
  <div class="card-body text-center">
  	<form action="<?php echo BASE_URL;?>login/login" method="post">
        <div class="mb-3">
		  <label for="emailFormControlInput1" class="form-label">E-mail</label>
		  <input type="email" class="form-control" id="emailFormControlInput1" placeholder="name@example.com" name="email">
		</div>
		<div class="mb-3">
		  <label for="senhaFormControlInput1" class="form-label">Senha</label>
		  <input type="password" class="form-control " id="senhaFormControlInput1" placeholder="*********" name="senha">
		</div>
        <button class="btn btn-warning" type="submit" value="Logar">Entrar</button>
    	</div>
    </form>
  </div>		
</body>
</html>