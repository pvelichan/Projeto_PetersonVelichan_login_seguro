<?php
	class conexao{
		private $host="localhost";
		private $user="root";
		private $db="login_seguro";
		private $pass="";
		public $conn;
		public function __construct(){
			try{
				$this->conn=new PDO(
					"mysql:host=".$this->host.
					";dbname=".$this->db,$this->user,$this->pass
				);
				$this->conn->setAttribute(
					PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION
				);
			}catch(PDOException $e){
				echo "ERRO: ".$e->getMessage();
			}
		}	
	}
?>