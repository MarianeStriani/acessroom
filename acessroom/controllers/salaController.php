<?php
class salaController extends controller{
	public function __construct(){
		$usuario = new Usuarios();;
		if($usuario->isLogged()== false){
			header("Location: ".BASE_URL."login/lguser");
			exit;
		}
	}

	public function index(){
		$dados = array();
		$salas = new Salas();
		$dados['lista'] = $salas->getAll();
		$this->loadTemplate('sala', $dados);
	}

	public function cadastrar(){
		$sala = $_POST['txtnome'];
		$nsala = $_POST['txtnsala'];
		$status = "INATIVO";
		$salas = new Salas();
		$salas->cadastrar($sala, $nsala, $status);
		header('Location:'.BASE_URL.'sala');
	}

	public function del($idsala){
		$sala = new Salas();
		$sala->del($idsala);
		header("Location:".BASE_URL."sala");
	}

	public function editar($idsala){
		$sala = $_POST['txtnome'];
		$nsala = $_POST['txtnsala'];
		$status = $_POST['txtstatus'];
		$salas = new Salas();
		$salas->edit($idsala, $sala, $nsala, $status);
		header('Location:'.BASE_URL.'sala');
	}

	public function buscasala(){
		$dados = array();
		$buscasala = '%'.$_POST['txtbuscasala'].'%';
		$salas = new Salas();
		$dados['listabuscasala'] = $salas->getBuscasala($buscasala);
		$this->loadTemplate('sala', $dados);
	}

}

?>