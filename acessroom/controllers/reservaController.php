<?php
class reservaController extends controller{
	public function __construct(){
		$usuario = new Usuarios();;
		if($usuario->isLogged()== false){
			header("Location: ".BASE_URL."login/lguser");
			exit;
		}
	}
	public function index(){
		$dados = array();
		$reserva = new Reserva();
		$dados['listac'] = $reserva->getAll();
		$this->loadTemplate('reserva', $dados);
	}

    public function cadastrar(){
		$hora = new DateTime(); // Pega o momento atual
        $hora = $hora->format('H:i:s');
        if($reserva = $hora >= "07:45:00" && $hora < "12:45:00"){
        	$periodo = "MANHÃ";
        }else if($hora >= "12:45:00" && $hora < "18:45:00"){
        	$periodo = "TARDE";
        }else {
        	$periodo = "NOITE";
        }
        $idsala = $_POST['idsala'];
        $nregistro = $_POST['txtnregistro'];
		$dtlocacao = date('Y-m-d H:i:s');
		$dtdevolucao = " - ";
		$usuario = $_GET['listau'];
		$reserva = new Reserva();
		$reserva->cadastrar($idsala, $periodo, $dtlocacao, $dtdevolucao, $nregistro);
		header('Location:'.BASE_URL.'reserva/cadreserva');
	}

    public function cadreserva(){
    	$dados = array();
    	$salas = new Salas();
    	$reserva = new Reserva();
    	$dados['listar'] = $reserva->getIdResSala();
		$dados['lista'] = $salas->getAll();
		$this->loadView('cadreserva', $dados);
    }

	public function del($idreserva){
		$reserva = new Reserva();
		$reserva->del($idreserva);
		header("Location:".BASE_URL."reserva");
	}

	public function editar($idreserva){
		$idsala = $_POST['idsala'];
		$dtdevolucao = date('Y-m-d H:i:s');
		$reserva = new Reserva();
		$reserva->edit($idreserva, $dtdevolucao, $idsala);
		header('Location:'.BASE_URL.'reserva/cadreserva');
	}
	
   public function busca(){
		$dados = array();
		$busca = '%'.$_POST['txtbusca'].'%';
		$reserva = new Reserva();
		$dados['listabusca'] = $reserva->getBusca($busca);
		$this->loadTemplate('reserva', $dados);
	}
}


?>