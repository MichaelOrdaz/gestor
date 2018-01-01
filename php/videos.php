<?php
require_once("abstractDB.php");
class videos extends abstractDB{
	private static $RUTA_SERVIDOR = "../videos/";
	public $rutaTemporal;
	public $varFile;
	public $pathInfo;

	public $vt_titulo;	
	public $vt_id;	
	public $vt_descripcion;
	public $vt_location;

function __construct($File = "", $post = "") {
	
	if( is_array($File) ){//si es un array entra al ciclo
		$this->open_connection();
 		$this->db_name = 'mt_gestorvideos';
 		$this->varFile = $File;
 		$this->pathInfo = pathinfo($this->varFile['name']);
 		$this->rutaTemporal = $this->varFile['tmp_name'];
 		$this->vt_titulo = trim($post['titulo']);
 		$this->vt_descripcion = trim($post['descrip']);

 		$this->crearSemilla();
 		$ram = mt_rand(1000, 9999);
 		$this->vt_location = self::$RUTA_SERVIDOR.$this->vt_titulo."-dni".$ram.".".$this->pathInfo['extension'];//	../videos/titulo en el post-dni1254.mp4

 		$this->vt_titulo = $this->conn->real_escape_string($this->vt_titulo);
		$this->vt_descripcion = $this->conn->real_escape_string($this->vt_descripcion);
		$this->vt_location = $this->conn->real_escape_string($this->vt_location);
	}
	
 }//endConstruct
	
 	public function get($id='') {
	 	if($id != ''){
		 $this->query = " SELECT * FROM mt_videotraining WHERE vt_id = '$id'";
	 	 $this->get_results_from_query();
	 	}
	 	if(count($this->rows) == 1){
	 		foreach($this->rows[0] as $propiedad=>$valor){
	 			$this->$propiedad = $valor;
	 		}
	 	}
	 }

 public function set() {
 	if( !$this->vt_id ){//no existe entonces si puedo dar de alta
			$this->query = "INSERT INTO mt_videotraining VALUES (default, '".$this->vt_titulo."', '".$this->vt_location."', '".$this->vt_descripcion."')";
 			$this->execute_single_query();
 			return true;
 	}
 	else{
 		return false;
 	}
 }
 
 
 public function edit( $video_data = array() ) {
	$this->open_connection();
 	foreach ($video_data as $campo=>$valor){
 		$$campo = $this->conn->real_escape_string($valor);
 	}
 	$this->query = "UPDATE mt_videotraining SET vt_titulo='$vt_titulo', vt_descripcion='$vt_descripcion' WHERE vt_id = '$vt_id'";
 	$this->execute_single_query();
 }


 public function delete(){
 	$this->query = " DELETE FROM mt_videotraining WHERE vt_id = ".$this->vt_id;
 	return $this->execute_single_query();
 }

 public function uploadFile(){
 	if(is_uploaded_file($_FILES['video']['tmp_name'])){
		if( strcmp( $this->pathInfo['extension'], "mp4") === 0 ){
			move_uploaded_file($this->rutaTemporal, utf8_decode( $this->vt_location ) );
			$result = $this->set();
			if($result){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}

 }

public function crearSemilla(){
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}

public function getAllVideos(){
	$matriz;
	$this->query = "SELECT * FROM mt_videotraining";
 	$this->get_results_from_query();
 	if(count($this->rows) > 0){
 		for($i=0; $i<count($this->rows); $i++){
 			$matriz[] = $this->rows[$i];
 		}
 		return $matriz;
 	}
 	else{
 		return array();
 	}
}

public function unlinkVideo(){
	return unlink( $this->vt_location );
}

 function __destruct() {
	//$this->close_connection();
	//$this = null;
 }
}
?>