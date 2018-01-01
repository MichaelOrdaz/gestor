<?php
session_start();
if(isset( $_SESSION['user']) ){
	header("location: dashboard.php");
}
else{
?>
<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"  />
		<meta charset="utf-8">
		<link rel="shortcut icon" href="img/favicon.png" />
		<title>Microtec</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="css/custom.css" />
	</head>
	<body class="login">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<img src="img/logo.png" class="img-responsive logo-login"/>
					</h3>
				</div>
				<div class="panel-body">
					<form role="form" name="logeo" id="logeo" action="#" method="POST">
						<div class="form-group">
							<label for="user">Usuario</label>
							<input type="text" name="user" class="form-control" id="user" maxlength="20" placeholder="Nombre de Usuario" required />
						</div>
						<div class="form-group">
							<label for="pass">Contraseña</label>
							<input type="password" name="pass" class="form-control" id="pass" maxlength="20" placeholder="Contraseña" required />
						</div>
						<!--
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember" id="remember" /> Recordarme
							</label>
						</div>
						-->
						<button type="submit" class="btn btn-primary btn-block btn-lg">Entrar</button>
					</form>
					<br>
					<div id="resp">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script
  	src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/sweetalert.js"></script>
	<script src="js/customjs.js"></script>
	<script>$(function(){setTimeout( ()=>{ document.querySelector("#user").focus();}, 10) });</script>
	</body>
</html>
<?php
}
?>