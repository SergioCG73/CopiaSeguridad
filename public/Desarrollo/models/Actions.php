<?php 

require_once "Conexion.php"; //Importar la conexión

class Actions extends Conexion {

    public function __construct() {
        parent::__construct();  // Llamar al constructor de la clase padre 
    }

    public function getProductos(){
        if ($this->conect) {
            $sql = "SELECT * FROM productos";
            $query = $this->conect->prepare($sql);
            $query->execute();
            $datos = $query->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }
        else{
            return ["error" => "Error al conectar a la base de datos"];
        }
    }        

    public function getEquipos($Producto_id){
        if ($this->conect) {
            $sql = "SELECT * FROM equipos WHERE Producto_id = :Producto_id";
            $query = $this->conect->prepare($sql);
            $query->bindParam(":Producto_id", $Producto_id, PDO::PARAM_INT);
            $query->execute();
            $datos = $query->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }
        else{
            return ["error" => "Error al conectar a la base de datos"];
        }
    }
}

?>