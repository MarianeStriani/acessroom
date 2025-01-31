<h1 style="text-align: center; color:darkblue">Gerenciamento de Usuário</h1>
<hr>
<form class="d-flex" role="search" method="post" action="<?php echo BASE_URL;?>usuario/buscausuario">
    <input class="form-control me-2" type="search" placeholder="O que você procura?" aria-label="PESQUISAR" name="txtbuscausuario">
    <button class="btn btn-outline-primary" type="submit">PROCURAR</button>
</form>
<br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Adicionar usuário
</button>
<hr>

<!--CADASTRAR -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de usuário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL;?>usuario/cadastrar">
		  <div class="mb-3">
		    <label class="form-label">Nome do Funcionário</label>
		    <input type="text" class="form-control" name="txtnome">
		  </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="txtemail">
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="text" class="form-control" name="txtsenha">
      </div>
      <div class="mb-3">
        <label class="form-label">Nº de Registro</label>
        <input type="text" class="form-control" name="txtnregistro">
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success">Cadastrar</button></form>
      </div>
    </div>
  </div>
</div>

<!-- Lista de usuarios -->
<table class="table table-striped table-hover shadow rounded" style="color:darkblue">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">Nº de Registro</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>

  	<?php
      if(isset($_POST['txtbuscausuario']) && !empty($_POST['txtbuscausuario'])){
        foreach($listabuscausuario as $item){ ?>
        <tr>
          <th scope="row"><?php echo $item['id'];?></th>
          <td><?php echo $item['usuario'];?></td>
          <td><?php echo $item['email'];?></td>
          <td><?php echo $item['senha'];?></td>
          <td><?php echo $item['nregistro'];?></td>
          <td>
            <!-- EDITAR -->
      <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item['id'];?>">Editar</button>
      <!-- -->
      <!-- Modal -->
<div class="modal fade" id="editModal<?php echo $item['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de usuário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL;?>usuario/editar/<?php echo $item['id'];?>">
      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="txtnome" value="<?php echo $item['usuario'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="txtemail" value="<?php echo $item['email'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="text" class="form-control" name="txtsenha" value="<?php echo $item['senha'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Nº de Registro </label>
        <input type="text" class="form-control" name="txtnregistro" value="<?php echo $item['nregistro'];?>">
      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-warning">Editar</button></form>
      </div>
    </div>
  </div>
</div>  
      <a href="<?php echo BASE_URL;?>usuario/del/<?php echo $item['id'];?>"class="link-danger">Excluir</a></td>
    </tr>

    <?php }
      }else{
          foreach ($lista as $item) {     
        ?>
        <tr>
          <th scope="row"><?php echo $item['id'];?></th>
          <td><?php echo $item['usuario'];?></td>
          <td><?php echo $item['email'];?></td>
          <td><?php echo $item['senha'];?></td>
          <td><?php echo $item['nregistro'];?></td>
       

      <td>
      <!-- EDITAR -->
      <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item['id'];?>">Editar</button>
      <!-- -->
      <!-- Modal -->
<div class="modal fade" id="editModal<?php echo $item['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de usuário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL;?>usuario/editar/<?php echo $item['id'];?>">
      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="txtnome" value="<?php echo $item['usuario'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="txtemail" value="<?php echo $item['email'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="text" class="form-control" name="txtsenha" value="<?php echo $item['senha'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Nº de Registro </label>
        <input type="text" class="form-control" name="txtnregistro" value="<?php echo $item['nregistro'];?>">
      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-warning">Editar</button></form>
      </div>
    </div>
  </div>
</div>  
      <a href="<?php echo BASE_URL;?>usuario/del/<?php echo $item['id'];?>"class="link-danger">Excluir</a></td>
    </tr>
	 <?php } ?>
  <?php } ?>

  </tbody>
</table>
<!-- -->