<?php

Class Parameter {
	
	public function __construct(){
		$this->db = $this->getDB();
	}

	// Connect Database
	private function getDB() {
		$dbhost="localhost";
		$dbuser="root";
		$dbpass="";
		$dbname="api";

		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
		$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbConnection;
	}

	public function getAllParameter(){
        $sql = "SELECT * FROM parameter ORDER BY no ASC";
        $stmt = $this->db->query($sql); 
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;
	}

	public function getParameter($no){
        $sql = "SELECT * FROM parameter WHERE no=?";
        $stmt = $this->db->prepare($sql); 
        $stmt->execute(array($no));
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data;
	}

	public function insertParameter($field, $type, $deskripsi){
        $sql = "INSERT INTO parameter (field, type, deskripsi) VALUES (?,?,?)";
        $stmt = $this->db->prepare($sql); 
        $status = $stmt->execute(array($field, $type, $deskripsi));
        return $status;
	}

	public function updateParameter($field, $type, $deskripsi, $no){
        $sql = "UPDATE parameter SET field=?, type=?, deskripsi=? WHERE no=?";
        $stmt = $this->db->prepare($sql); 
        $status = $stmt->execute(array($field, $type, $deskripsi));
        return $status;
	}

	public function deleteParameter($no){
        $sql = "DELETE FROM parameter WHERE no=?";
        $stmt = $this->db->prepare($sql); 
        $status = $stmt->execute(array($no));
        return $status;
	}
}
?>