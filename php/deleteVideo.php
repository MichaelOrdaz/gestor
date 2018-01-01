<?php
include_once("videos.php");
$id = $_POST['vt_id'];
$video = new videos();
$video->get($id);
$result = false;
if( $video->unlinkVideo() ){
	$result = $video->delete($id);
}
/*
ya elimina de la db me falta eliminar del servidor
*/
if($result){
	$array = ["msg"=>"Video Eliminado", "type"=>"success"];
	echo json_encode($array);
}
else{
	$array = ["msg"=>"Error al borrar, Intenta nuevamente", "type"=>"error"];
	echo json_encode($array);
}

?>