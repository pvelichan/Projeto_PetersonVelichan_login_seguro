<?php
	require_once 'conexao.php';
	class usuario{
		private $id;
		private $senha;
		private $usuario;
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id=$id;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$this->senha=$senha;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario=$usuario;
		}		
		
		public function inserir(){
			$c= new conexao();
			try{
				$stmt=$c->conn->prepare(
					"insert into usuarios(senha,usuario) values(:s,:u)"
				);
				$stmt->bindValue(":s",$this->getSenha());
				$stmt->bindValue(":u",$this->getUsuario());

				return  $stmt->execute();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}	
	}
?>