<?php
abstract class abstractDB{
 private static $db_host = 'localhost';
 private static $db_user = 'root';
 private static $db_pass = '';
 protected $db_name = 'mt_gestorvideos';
 protected $query;
 protected $rows = array();
 protected $conn;
 # métodos abstractos para ABM de clases que hereden
 abstract protected function get();
 abstract protected function set();
 abstract protected function edit();
 abstract protected function delete();

 # los siguientes métodos pueden definirse con exactitud
 # y no son abstractos
# Conectar a la base de datos
public function open_connection(){
 $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
 $this->conn->set_charset("utf8");
}
# Desconectar la base de datos
public function close_connection() {
$this->conn->close();
}
# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
protected function execute_single_query() {
 $this->open_connection();
 //$this->query = $this->conn->real_escape_string($this->query);
 $result = $this->conn->query($this->query);
 $this->close_connection();
 return $result;
}
# Traer resultados de una consulta en un Array
protected function get_results_from_query() {
 $this->open_connection();
 $result = $this->conn->query($this->query);
 $filas = $result->num_rows;
if($filas === 0){
	$this->rows = array();
}else{
	while ($this->rows[] = $result->fetch_assoc());
}
 $result->close();
 $this->close_connection();
 array_pop($this->rows);
}

}//fin de clase
?>