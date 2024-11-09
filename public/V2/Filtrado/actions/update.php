<?php

function miErrorHandler($errno, $errstr, $errfile, $errline) { // Definir una función para manejar errores     
    if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING
        echo "<script>alert('Error: Sergio el archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
    }
    
    return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
}

set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado
require_once("../../../miconexion.php"); // Intentar incluir el archivo
restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación

$errors =['data'=> false];
$IdFiltracion = $_POST['IdFiltracion'];    
$IdFiltracion = str_replace(".", "", $IdFiltracion);   // Elimina el punto que nos llega por POST.
$Fecha = $_POST['Fecha'];                              
$Producciones = $_POST['Producciones'];              
$VolumenM216 = $_POST['VolumenM216'];
$VolumenAgua = $_POST['VolumenAgua'];
$VolumenFiltrado = $_POST['VolumenFiltrado'];
$Densidad = $_POST['Densidad'];
$Riqueza = $_POST['Riqueza'];
$Basicidad = $_POST['Basicidad'];
$Notas = $_POST['Notas'];

$post = ['Id Filtracion'      => $IdFiltracion,
         'Fecha'              => $Fecha,
         'Producciones'       => $Producciones,
         'VolumenM216'        => $VolumenM216,
         'VolumenAgua'        => $VolumenAgua,
         'VolumenFiltrado'    => $VolumenFiltrado,
         'Densidad'           => $Densidad,
         'Riqueza'            => $Riqueza,
         'Basicidad'          => $Basicidad,
         'Notas'              => $Notas
        ];

$sql = $conexion->prepare("UPDATE filtrado SET Fecha = '$Fecha', Producciones = '$Producciones', Volumen_M216 = $VolumenM216, 
                           Volumen_Filtrado = $VolumenFiltrado, Volumen_Agua = $VolumenAgua, Densidad = $Densidad, Riqueza = $Riqueza, 
                           Basicidad = $Basicidad, Notas = '$Notas'
                           WHERE id = $IdFiltracion");

$updateProduccion = $sql->execute();
echo json_encode($post);

?>
