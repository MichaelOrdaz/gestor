<?php
require_once("videos.php");
$tipoError = $_FILES['video']['error'];
if($tipoError == 0){
	$videoN = new videos($_FILES['video'], $_POST);//instancia de video
	$result = $videoN->uploadFile();
	if($result){
		echo json_encode( ['status'=>'success', 'msg'=>'Archivo subido exitosamente'] );
	}
	else{
		echo json_encode( ['status'=>'fail', 'msg'=>'Fallo al subir el archivo, intente nuevamente'] );
	}

}
else{
	switch($tipoError){
		case 3: $msg = "El fichero fue sólo parcialmente subido, intente nuevamente";
		break;
		case 7: $msg = "No se pudo escribir el fichero en el disco, intente nuevamente";
		break;
	}
	echo json_encode( ['status'=>'fail', 'msg'=>$msg] );
}
?>