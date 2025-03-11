<?php

class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "poo";
    protected $conect; // Cambiado de private a protected

    public function __construct() {
        $connectionString = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=utf8";
        try {
            $this->conect = new PDO($connectionString, $this->user, $this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            $this->conect = null;
            echo "ERROR: " . $e->getMessage();
        }
    }
}

?>
