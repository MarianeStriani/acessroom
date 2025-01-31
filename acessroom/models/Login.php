<?php
class Login extends model{
	public function isLogged(){
		if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
			return true;
		}else{
			return false;
		}
	}

	public function verifica($email, $senha){
		$sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $email);
		$sql->bindValue(2, $senha);
		$sql->execute();

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

}