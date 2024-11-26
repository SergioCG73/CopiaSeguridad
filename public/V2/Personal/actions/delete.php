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

$dni = $_GET['id'] ?? null;

//$id = str_replace(".", "", $id); // Elimina el punto que nos llega por GET.

if ($dni <> "") {
    // Prepara la instrucción SQL
    $stmt = $conexion->prepare("DELETE FROM personal WHERE DNI = '$dni'");    

    if ($stmt->execute()) {
        // Si el borrado se realiza OK
        echo "<script>
            alert('Registro borrado');
            window.location.href = '../indexPersonal.php';
        </script>";
    } else {
        // Si aparece un error al borrar
        echo "<script>
            alert('Hubo un error y el registrono se borró');
            window.location.href = '../indexPersonal.php';
        </script>";
    }
    
} else {
    echo "<script>
        alert('DNI no válido');
        window.location.href = '../indexPersonal.php';
    </script>";
}
?>
