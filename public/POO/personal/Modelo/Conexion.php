<?php
class Conexion {    
    private $host = "localhost";
    private $username = "sergiocg";
    private $password ="1011";
    private $database = "aquaweb";
    private $char = "utf8";
    private $conectar;

    public function __construct() {
        $connectionString = "mysql:host=".$this->host.";dbname=".$this->database.";charset=".$this->char;
        try {                        
            $this->conectar = new PDO($connectionString, $this->username, $this->password);
            $this->conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            
        } catch (PDOException $e) {
            echo "Fallo conexión"; exit;
            throw new Exception("Error de conexión: " . $e->getMessage());
        }
    }
    
    public function connect() {
        return $this->conectar;
    }
}
?>