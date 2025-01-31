<?php 
class Usuarios extends model{
	public function isLogged(){
		if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
			return true;
		}else{
			return false;
		}
	}

	public function verifica($email, $senha){

		$sql = "SELECT * FROM usuarios WHERE email=? AND senha=?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $email);
		$sql->bindValue(2, $senha);
		$sql->execute();
		echo $sql->rowCount();

		if ($sql->rowCount() > 0) {
			$result = $sql->fetch();

			$_SESSION['id'] = $result['id'];
			$_SESSION['usuario'] = $result['usuario'];
			$_SESSION['email'] = $result['email'];

			return true;
		}else{
			return false;
		}
	}

	public function cadastrar($usuario, $email, $senha, $nregistro){
		$sql = "INSERT INTO usuarios (usuario, email, senha, nregistro) VALUES (?, ?, ?, ?)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $usuario);
		$sql->bindValue(2, $email);
		$sql->bindValue(3, $senha);
		$sql->bindValue(4, $nregistro);
		$sql->execute();
	}

	public function getAll(){
		$array = array();
		$sql = "SELECT * FROM usuarios";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function del($id){
		$sql = "DELETE FROM usuarios WHERE id = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $id);
		$sql->execute();
	}

	public function edit($id, $usuario, $email, $senha, $nregistro){
		$sql = "UPDATE usuarios SET usuario = ?, email = ?, senha = ?, nregistro = ? WHERE id = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $usuario);
		$sql->bindValue(2, $email);
		$sql->bindValue(3, $senha);
		$sql->bindValue(4, $nregistro);
		$sql->bindValue(5, $id);
		$sql->execute();

	}
	public function getQuantUsuarios(){
		$array = array();
		$sql = "SELECT COUNT(*) AS quantusuarios
		FROM usuarios";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getBuscausuario($buscausuario){
		$array = array();
		$sql = "SELECT id, usuario, email, senha, nregistro
		FROM usuarios
		WHERE id LIKE ? OR usuario LIKE ? OR email LIKE ? OR senha LIKE ? OR nregistro LIKE ?
		ORDER BY id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $buscausuario);
		$sql->bindValue(2, $buscausuario);
		$sql->bindValue(3, $buscausuario);
		$sql->bindValue(4, $buscausuario);
		$sql->bindValue(5, $buscausuario);
		$sql->execute();
        if($sql->rowCount()> 0){
			$array = $sql->fetchAll();
		}
		return $array;

	}

}

?>