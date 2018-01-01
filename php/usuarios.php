<?php
require_once("abstractDB.php");
class usuarios extends abstractDB{
	public $usr_nombre;
	private $usr_id;
	public $usr_paterno;
	public $usr_materno;
	public $usr_tipo;
	public $usr_usuario;
	public $usr_pass;
	public $usr_codigo_tienda;

 	function __construct() {
 		$this->db_name = 'mt_gestorvideos';
 		$this->open_connection();
 	}
 	public function get($user='') {
	 	if($user != ''){
	 	$user  = $this->conn->real_escape_string($user);
		 $this->query = " SELECT * FROM mt_user WHERE usr_usuario = '$user'";
	 	 $this->get_results_from_query();
	 	}
	 	if(count($this->rows) == 1){
	 		foreach($this->rows[0] as $propiedad=>$valor){
	 			$this->$propiedad = $valor;
	 		}
	 	}
	 }

 public function set($user_data=array()) {
 	if(array_key_exists('usr_usuario', $user_data)){
 		$this->get($user_data['usr_usuario']);
 		if($user_data['usr_usuario'] != $this->usr_usuario){
 			foreach ($user_data as $campo=>$valor){
 				$$campo = $this->conn->real_escape_string($valor);
 			};
			$this->query = "INSERT INTO mt_user VALUES (default, '$usr_nombre', '$usr_paterno', '$usr_materno', '$tipo', '$usr_usuario', '$usr_pass', '$usr_codigo_tienda') ";
 			$this->execute_single_query();
 		}
 	}
 }
 public function edit($user_data=array()) {
 	foreach ($user_data as $campo=>$valor){
 		$$campo = $this->conn->real_escape_string($valor);
 	}
 	$this->query = "UPDATE mt_user SET usr_nombre='$usr_nombre', usr_paterno='$usr_paterno', usr_materno='$usr_materno', usr_tipo='$usr_tipo', usr_usuario='$usr_usuario', usr_pass='$usr_pass' usr_codigo_tienda='$usr_codigo_tienda' WHERE usr_usuario = '$usr_usuario'";
 	$this->execute_single_query();
 }
 public function delete($user='') {
 	$user  = $this->conn->real_escape_string($user);
 	$this->query = " DELETE FROM mt_user WHERE usr_usuario = '$user'";
 	$this->execute_single_query();
 }

 function __destruct() {

 }

}
?>