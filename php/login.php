<?php
require_once("usuarios.php");
$user = trim($_POST['user']);
$pass = sha1( trim($_POST['pass']) );
$user1 = new usuarios();
$user1->get($user);

if($user1->usr_usuario){
	//echo "existe el usuario";
	if($user1->usr_pass === $pass){
		session_start();
		$_SESSION['user'] = $user;
		echo json_encode(["msg"=>"correcto", 'success'=>1]);
	}
	else{
		echo json_encode(['msg'=>'La contraseña es incorrecta', 'success'=>0]);
	}
}
else{
	echo json_encode(['msg'=>'El usuario no existe', 'success'=>0]);
}

?>