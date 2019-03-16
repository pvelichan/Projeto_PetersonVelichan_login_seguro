<?php
	if(isset($_POST['usuario']) && isset($_POST['senha'])){
		$conn =new PDO("mysql:host=localhost;dbname=login_seguro","root","");
		$stmt=$conn->prepare("select * from usuarios where ".
			"usuario=:u and senha=:s");
		$stmt->bindValue(":u",$_POST['usuario']);
		$stmt->bindValue(":s",hash ('sha256', "825".hash('sha256',$_POST['senha'].hash ('sha256', "048").hash ('sha256', "clero_locoloco"))));
		$stmt->execute();
		if($stmt->rowCount()==1){
			session_start();
			$_SESSION['usuario']=$_POST['usuario'];
			header("Location:index.php");
		}else{
			echo "<p>Usuario ou senha inválido!</p>";
			echo "<p><a href='login.php'>Tente Novamente</a></p>";
		}		
	}else{
		echo "<p>Usuario ou senha inválido!</p>";
		echo "<p><a href='login.php'>Tente Novamente</a></p>";
	}
?>
