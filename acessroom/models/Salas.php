<?php 
class Salas extends model{
	

	public function cadastrar($sala, $nsala, $status){
		$sql = "INSERT INTO sala (sala, nsala, status) VALUES (?, ?, ?)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $sala);
		$sql->bindValue(2, $nsala);
		$sql->bindValue(3, $status);
		$sql->execute();
	}

	public function getAll(){
		$array = array();
		$sql = "SELECT * FROM sala";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function del($idsala){
		$sql = "DELETE FROM sala WHERE idsala = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $idsala);
		$sql->execute();
	}

	public function edit($idsala, $sala, $nsala, $status){
		$sql = "UPDATE sala SET sala = ?, nsala = ?, status = ? WHERE idsala = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $sala);
		$sql->bindValue(2, $nsala);
		$sql->bindValue(3, $status);
		$sql->bindValue(4, $idsala);
		$sql->execute();

	}
	
	public function getDash(){
		$array = array();
		$sql = "SELECT status, COUNT(*) AS registros
			FROM sala
			WHERE status IN ('INATIVO', 'LOCADO', 'LIVRE')
			GROUP BY STATUS ";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getQuantSala(){
		$array = array();
		$sql = "SELECT COUNT(*) AS quantsala
		FROM sala";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	
	public function getBuscasala($buscasala){
		$array = array();
		$sql = "SELECT idsala, sala, nsala, status
		FROM sala
		WHERE idsala LIKE ? OR sala LIKE ? OR nsala LIKE ? OR status LIKE ?
		ORDER BY idsala";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $buscasala);
		$sql->bindValue(2, $buscasala);
		$sql->bindValue(3, $buscasala);
		$sql->bindValue(4, $buscasala);
		$sql->execute();
        if($sql->rowCount()> 0){
			$array = $sql->fetchAll();
		}
		return $array;

	}

}

?>