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
$VolumenInicial = $_POST['VolumenInicial'];
$VolumenFinal = $_POST['VolumenFinal'];
$Densidad = $_POST['Densidad'];
$Riqueza = $_POST['Riqueza'];
$AcidoLibre = $_POST['AcidoLibre'];
$Notas = $_POST['Notas'];


if (empty($VolumenInicial)) {
    //$VolumenInicial = "null";
    $VolumenInicial = 0;
}

if (empty($VolumenFinal)) {
    //$VolumenFinal = "null";
    $VolumenFinal = 0;
}

if (empty($Densidad)) {
    //$Densidad = "NULL";
    $Densidad = 0;
}

if (empty($Riqueza)) {
    //$Riqueza = "NULL";
    $Riqueza = 0;
}

if (empty($AcidoLibre)) {
    //$AcidoLibre = "NULL";
    $AcidoLibre = 0;
}

$post = ['Numero Fabricación' => $NumeroFabricacion,
         'Fecha'              => $Fecha,         
         'VolumenInicial'     => $VolumenInicial,
         'VolumenFinal'       => $VolumenFinal,
         'Densidad'           => $Densidad,
         'Riqueza'            => $Riqueza,
         'AcidoLibre'         => $AcidoLibre,
         'Notas'              => $Notas
        ];
        
$sql = $conexion->prepare("UPDATE ferrico SET Fecha = '$Fecha', Volumen_Inicial = $VolumenInicial, Volumen_Final = $VolumenFinal, 
                           Densidad = $Densidad, Riqueza = $Riqueza, Acido = $AcidoLibre, Notas = '$Notas'
                           WHERE NumeroFabricacion = '$NumeroFabricacion'");

$updateProduccion = $sql->execute();
echo json_encode($post);

?>
