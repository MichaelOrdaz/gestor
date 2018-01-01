<?php
require_once("videos.php");
//titulo, descrip, video, vt

if( $_FILES['video']['error'] !== 4 ){
	echo "entro al if";
	$video = new videos($_FILES, $_POST);
	//si se subio un nuevo video lo procesamos
	
}
else{//si no existe solo modificamos los campos de la base de datos
	echo "entro al else";

	$video = new videos();
	//$video->edit( ['vt_titulo'=>$_POST['titulo'], 'vt_descripcion'=>$_POST['descrip'], 'vt_id'=>$_POST['vt'] ] );

}
?>