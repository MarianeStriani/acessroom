<?php
class homeController extends controller{

	public function __construct(){
		$usuario = new Usuarios();;
		if($usuario->isLogged()== false){
			header("Location: ".BASE_URL."login/lguser");
			exit;
		}
	}
	public function index(){
		$dados = array();
		$sala = new Salas();
		$dados['listastatus']=$sala->getDash();
		$quantsala = new Salas();
		$dados['quantsala']=$quantsala->getQuantSala();
		$quantusuario = new Usuarios();
		$dados['quantusuario']=$quantusuario->getQuantUsuarios();
		$quantreserva = new Reserva();
		$dados['quantreserva']=$quantreserva->getQuantReservas();
		$this->loadTemplate('home', $dados);

	}
	
	

}

?>