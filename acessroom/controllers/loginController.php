<?php
class loginController extends controller{
	public function lguser(){
		$array = array();
		$this->loadView('login', $array);
	}
	public function login(){
		
		if(isset($_POST['email']) && !empty($_POST['email'])){
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$usuario = new Usuarios();
			if ($usuario->verifica($email, $senha)) {
				header('Location:'.BASE_URL);
			}else{
				header('Location:'.BASE_URL.'login/lguser');
				
			}
		}
	}

	public function logout(){
		unset($_SESSION['email']);
		header('Location:'.BASE_URL);
	}
}