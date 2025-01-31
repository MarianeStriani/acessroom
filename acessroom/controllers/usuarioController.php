<?php
class usuarioController extends controller{
	public function __construct(){
		$usuario = new Usuarios();;
		if($usuario->isLogged()== false){
			header("Location: ".BASE_URL."login/lguser");
			exit;
		}
	}
	
	public function index(){
		$dados = array();
		$usuario = new Usuarios();
		$dados['lista'] = $usuario->getAll();
		$this->loadTemplate('usuario', $dados);
	}

	public function cadastrar(){
		$nome = $_POST['txtnome'];
		$email = $_POST['txtemail'];
		$senha = $_POST['txtsenha'];
		$nregistro = $_POST['txtnregistro'];
		$usuario = new Usuarios();
		$usuario->cadastrar($nome, $email, $senha, $nregistro);
		header('Location:'.BASE_URL.'usuario');
	}

	public function loginss(){
    	$dados = array();
    	$usuarios = new Usuarios();
		$dados['lista'] = $usuarios->getAll();
		$this->loadView('login', $dados);
    }

	public function del($id){
		$usuario = new Usuarios();
		$usuario->del($id);
		header("Location:".BASE_URL."usuario");
	}

	public function editar($id){
		$nome = $_POST['txtnome'];
		$email = $_POST['txtemail'];
		$senha = $_POST['txtsenha'];
		$nregistro = $_POST['txtnregistro'];
		$usuario = new Usuarios();
		$usuario->edit($id, $nome, $email, $senha, $nregistro);
		header('Location:'.BASE_URL.'usuario');
	}

	public function buscausuario(){
		$dados = array();
		$buscausuario = '%'.$_POST['txtbuscausuario'].'%';
		$usuario = new Usuarios();
		$dados['listabuscausuario'] = $usuario->getBuscausuario($buscausuario);
		$this->loadTemplate('usuario', $dados);
	}
}

?>