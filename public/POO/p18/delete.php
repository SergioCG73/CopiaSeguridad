<?php
//require_once("miconexion.php");
require_once("../Includes/miconexion.php");

$id = $_GET['id'];
//$id = str_replace(".", "", $id); // Elimina el punto que nos llega por GET.

if ($id > 0) {
    // Prepara la instrucción SQL
    $stmt = $conexion->prepare("DELETE FROM p18_prueba WHERE NumeroFabricacion = $id");    

    if ($stmt->execute()) {
        // Si el borrado se realiza OK
        echo "<script>
            alert('Fabricación borrada');
            window.location.href = '_index.html';
        </script>";
    } else {
        // Si aparece un error al borrar
        echo "<script>
            alert('Hubo un error y la fabricación no se borró');
            window.location.href = '_index.html';
        </script>";
    }
    
} else {
    echo "<script>
        alert('ID inválido');
        window.location.href = '_index.html';
    </script>";
}


?>
