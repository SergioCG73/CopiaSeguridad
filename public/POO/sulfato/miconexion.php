<?php
    require_once("config/database.php");

    try {
        $conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
        //echo "Conectado";
    }
    
    catch (PDOException $e) {
        echo "¡Error en la conexión: " . $e->getMessage();
        die();
        $conexion = null;
    }

?>
