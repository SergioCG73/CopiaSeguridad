<?php
echo "editar.php";

// Definir una función para manejar errores
function miErrorHandler($errno, $errstr, $errfile, $errline) {    
    if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING        
        echo "<script>alert('Error: El archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
    }    
    return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
}

set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado
require_once("../miconexion.php"); // Intentar incluir el archivo
restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación

?>









