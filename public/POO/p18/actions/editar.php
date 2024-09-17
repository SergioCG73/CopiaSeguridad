<?php
echo "editar.php";

// Definir una función para manejar errores
function miErrorHandler($errno, $errstr, $errfile, $errline) {
    // Verifica si el error es del tipo E_WARNING
    if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) {
        // Mostrar una alerta o mensaje personalizado
        echo "<script>alert('Error: El archivo requerido no se ha encontrado.');</script>";
    }

    // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
    return false;
}

// Establecer el manejador de errores personalizado
set_error_handler("miErrorHandler");

// Intentar incluir el archivo
require_once("../miconexion.php");

// Restaurar el manejador de errores predeterminado después de la operación
restore_error_handler();

?>









