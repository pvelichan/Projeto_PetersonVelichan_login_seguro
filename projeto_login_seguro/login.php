<html>
   <head>
	<title>Login</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
   <head>
   <script>
			$(function() {	$('#inserir').hide();	});
		</script>
	<body>
		<h2>Login</h2>
		<form action="autentica.php" method="POST">
			<p>Nome: <input type="text" name="usuario"></p>
			<p>Senha: <input type="password" name="senha"></p>
			<button type="submit">Login</button>
		</form>
		
		<button class="btn btn-secundary" onclick="$('#inserir').show()">Inserir</button>
		<?php
			require_once 'usuario.php';
			$c= new usuario();
			if(isset($_POST['usuario'])){
				$c->setSenha (hash ('sha256',"825".hash('sha256',$_POST['senha'].hash ('sha256', "048").hash ('sha256', "clero_locoloco"))));
				$c->setUsuario($_POST['usuario']);
				$c->inserir();
				unset($_POST['usuario']);
				
			}
		?>
		<div id="inserir" class="container">
			<h2>Inserir Usuario</h2>
			<form method="POST">
				<p>Nome: <input type="text" name="usuario"
				  placeholder="Digite seu nome aqui" required></p>
				<p>
				<p>Senha: <input type="password" name="senha"
				  placeholder="Digite sua senha aqui" required></p>
				<input class="btn btn-primary" type="submit" value="Inserir">
				<button class="btn btn-secundary" onclick="$('#inserir').hide()">Cancelar</button>
				</p>
			</form>
		</div>
	</body>
</html>