<?php
function miErrorHandler($errno, $errstr, $errfile, $errline) { // Definir una función para manejar errores
    if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING        
        echo "<script>alert('Error: El archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
    }
    
    return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
}

set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado
require_once("../../../miconexion.php"); // Intentar incluir el archivo
restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación

$id = $_GET['id'];
$id = str_replace(".", "", $id); // Elimina el punto que nos llega por GET.

if ($id > 0) {
    // Prepara la instrucción SQL
    $stmt = $conexion->prepare("DELETE FROM sulfato WHERE NumeroFabricacion = $id");    

    if ($stmt->execute()) {
        // Si el borrado se realiza OK
        echo "<script>
            alert('Fabricación borrada');
            window.location.href = '../indexSulfato.php';
        </script>";
    } else {
        // Si aparece un error al borrar
        echo "<script>
            alert('Hubo un error y la fabricación no se borró');
            window.location.href = '../indexSulfato.php';
        </script>";
    }
    
} else {
    echo "<script>
        alert('ID inválido');
        window.location.href = '../indexSulfato.php';
    </script>";
}


?>
