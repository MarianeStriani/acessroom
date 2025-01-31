<h1 style="text-align: center; color:darkblue">Gerenciamento de Salas</h1>
<hr>
<form class="d-flex" role="search" method="post" action="<?php echo BASE_URL;?>sala/buscasala">
    <input class="form-control me-2" type="search" placeholder="O que você procura?" aria-label="PESQUISAR" name="txtbuscasala">
    <button class="btn btn-outline-primary" type="submit">PROCURAR</button>
</form>
<hr>
<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadastroModal">
  Adicionar sala
</button>
<hr>

 <!-- CADASTRAR SALA -->
<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de sala</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>sala/cadastrar">
		  <div class="mb-3">
		    <label class="form-label">Sala</label>
		    <input type="text" class="form-control" name="txtnome">
		  </div>
      <div class="mb-3">
        <label class="form-label">Capacidade de alunos</label>
        <input type="text" class="form-control" name="txtnsala">
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success">Cadastrar</button></form>
      </div>
    </div>
  </div>
</div>

<!-- Lista de salas -->
<table class="table table-striped table-hover shadow rounded" style="color:darkblue">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Sala</th>
      <th scope="col">Capacidade de Alunos</th>
      <th scope="col">Status</th>

      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
        if(isset($_POST['txtbuscasala']) && !empty($_POST['txtbuscasala'])){
          foreach($listabuscasala as $item){ ?>
   <tr>
      <th scope="row"><?php echo $item['idsala'];?></th>
      <td><?php echo $item['sala'];?></td>
      <td><?php echo $item['nsala'];?></td>
      <td><?php echo $item['status'];?></td>
      <td>
        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item['idsala'];?>">Editar</button>
      <!-- -->
      <!-- EDITAR SALAS-->
<div class="modal fade" id="editModal<?php echo $item['idsala'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de sala</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>sala/editar/<?php echo $item['idsala'];?>">
      <div class="mb-3">
        <label class="form-label">Sala</label>
        <input type="text" class="form-control" name="txtnome" value="<?php echo $item['sala'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Capacidade de alunos</label>
        <input type="text" class="form-control" name="txtnsala" value="<?php echo $item['nsala'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <input type="text" class="form-control" name="txtstatus" value="<?php echo $item['status'];?>">
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-warning">Editar</button></form>
      </div>
    </div> 
  </div>
</div>  
      <!-- EXCLUIR SALAS -->
      <a href="<?php echo BASE_URL;?>sala/del/<?php echo $item['idsala'];?>"class="link-danger">Excluir</a></td>
    </tr>
    <?php }
    }else{
      foreach ($lista as $item) {  
      ?>   
    <tr>
      <th scope="row"><?php echo $item['idsala'];?></th>
      <td><?php echo $item['sala'];?></td>
      <td><?php echo $item['nsala'];?></td>
      <td><?php echo $item['status'];?></td>
      <td>
      <!-- botao modal editar -->
      <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item['idsala'];?>">Editar</button>
      <!-- -->
      <!-- EDITAR SALAS-->
<div class="modal fade" id="editModal<?php echo $item['idsala'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de sala</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>sala/editar/<?php echo $item['idsala'];?>">
      <div class="mb-3">
        <label class="form-label">Sala</label>
        <input type="text" class="form-control" name="txtnome" value="<?php echo $item['sala'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Capacidade de alunos</label>
        <input type="text" class="form-control" name="txtnsala" value="<?php echo $item['nsala'];?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <input type="text" class="form-control" name="txtstatus" value="<?php echo $item['status'];?>">
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-warning">Editar</button></form>
      </div>
    </div> 
  </div>
</div>  
      <!-- EXCLUIR SALAS -->
      <a href="<?php echo BASE_URL;?>sala/del/<?php echo $item['idsala'];?>"class="link-danger">Excluir</a></td>
    </tr>
	<?php } ?>
<?php }?>
  </tbody>
</table>
<!-- -->