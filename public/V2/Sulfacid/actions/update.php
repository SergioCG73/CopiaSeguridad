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

$errors =['data'=> false];
$NumeroFabricacion = $_POST['NumeroFabricacion'];    
$NumeroFabricacion = str_replace(".", "", $NumeroFabricacion); // Elimina el punto que nos llega por POST.    
$Fecha = $_POST['Fecha'];
$Volumen = $_POST['Volumen'];
$Densidad = $_POST['Densidad'];
$Riqueza = $_POST['Riqueza'];
$Ph = $_POST['Ph'];
$Notas = $_POST['Notas'];


if (empty($Volumen)) {
    $Volumen = "NULL";
}

if (empty($Densidad)) {
    $Densidad = "NULL";
}

if (empty($Riqueza)) {
    $Riqueza = "NULL";
}

if (empty($Ph)) {
    $Ph = "NULL";
}

$post = ['Numero Fabricación' => $NumeroFabricacion,
         'Fecha'              => $Fecha,         
         'Volumen'            => $Volumen,         
         'Densidad'           => $Densidad,
         'Riqueza'            => $Riqueza,
         'Ph'                 => $Ph,
         'Notas'              => $Notas
        ];
        
$sql = $conexion->prepare("UPDATE sulfacid SET Fecha = '$Fecha', Volumen = $Volumen,  
                           Densidad = $Densidad, Riqueza = $Riqueza, Ph = $Ph, Notas = '$Notas'
                           WHERE NumeroFabricacion = '$NumeroFabricacion'");

$updateProduccion = $sql->execute();
echo json_encode($post);

?>
