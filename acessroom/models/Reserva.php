<?php 
class Reserva extends model{

	public function listar(){
		$array = array();
		$sql = "SELECT * FROM sala";
		$sql = $this->db->query($sql);
		if($sql->rowCount()> 0){
			$array = $sql->fetchAll();
		}
		return $array; 
	}

	public function cadastrar($idsala, $periodo, $dtlocacao, $dtdevolucao, $nregistro){

		
		$sql = "INSERT INTO reserva (idsala, periodo, dtlocacao, dtdevolucao, nregistro) VALUES (?, ?, ?, ?, ?)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $idsala); 
		$sql->bindValue(2, $periodo);
		$sql->bindValue(3, $dtlocacao);
		$sql->bindValue(4, $dtdevolucao);
		$sql->bindValue(5, $nregistro);
		$sql->execute();
		$up = "UPDATE sala SET status = 'LOCADO' WHERE idsala = ?";
		$up = $this->db->prepare($up);
		$up->bindValue(1, $idsala);
		$up->execute();
	}

	public function getAll(){
		$array = array();
		$sql = "SELECT r.idreserva, s.idsala,  s.sala, r.periodo, r.dtlocacao, r.dtdevolucao, r.nregistro, u.usuario
		FROM usuarios u
		INNER JOIN reserva r
		ON r.nregistro = u.nregistro 
		INNER JOIN sala s
		ON r.idsala = s.idsala
		ORDER BY r.idreserva DESC";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getIdResSala(){
		$array = array();
		$sql = "SELECT idreserva, idsala FROM reserva GROUP BY idsala DESC";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

public function getIdusuario(){
		$array = array();
		$sql = "SELECT u.usuario, r.nregistro
		FROM usuarios u
		INNER JOIN reserva r
		ON u.nregistro = r.nregistro";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function edit($idreserva, $dtdevolucao, $idsala){
		$sql = "UPDATE reserva SET dtdevolucao = ? WHERE idreserva = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $dtdevolucao);
		$sql->bindValue(2, $idreserva);
		$sql->execute();
		$livre = "UPDATE sala SET status = 'LIVRE' WHERE idsala = ?";
		$livre = $this->db->prepare($livre);
		$livre->bindValue(1, $idsala);
		$livre->execute();	
	}

	public function getQuantReservas(){
		$array = array();
		$sql = "SELECT COUNT(*) AS quantreservas
		FROM reserva";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getBusca($busca) {
		$array = array();
		$sql = "SELECT r.idreserva, s.idsala, s.sala, r.periodo, r.dtlocacao, r.dtdevolucao, r.nregistro,u.usuario
		FROM usuarios u
		INNER JOIN reserva r
		ON r.nregistro = u.nregistro
 		INNER JOIN sala s
		ON r.idsala = s.idsala
		WHERE r.idreserva LIKE ? OR s.idsala LIKE ? OR r.periodo LIKE ? OR r.dtlocacao LIKE ? OR r.dtdevolucao LIKE ? OR r.nregistro LIKE ? OR u.usuario LIKE ?
		ORDER BY r.idreserva";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $busca);
		$sql->bindValue(2, $busca);
		$sql->bindValue(3, $busca);
		$sql->bindValue(4, $busca);
		$sql->bindValue(5, $busca);
		$sql->bindValue(6, $busca);
		$sql->bindValue(7, $busca);
		$sql->execute();
		if($sql->rowCount()> 0){
 			$array = $sql->fetchAll();
		}
		 return $array;
		}
	}
?>
