<?php 

/*SQL PARA PROBAR
SELECT * FROM `p18_prueba` WHERE NumeroFabricacion = "1001";
UPDATE p18_prueba SET Reactor = "R201", Tiempo_Parado = "100" WHERE NumeroFabricacion = "1001"*/

function miErrorHandler($errno, $errstr, $errfile, $errline) { // Definir una función para manejar errores     
    if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING
        echo "<script>alert('Error: El archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
    }
    
    return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
}

set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado
require_once("../miconexion.php"); // Intentar incluir el archivo
restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación

$ModificadoReactor = $_POST['ReactorModificado'];  //$ModificadoReactor = "1";
/*$FechaInicio = $_POST['FechaInicio'];*/  $FechaInicio = "2022-05-11 08:00:00";
$NumeroFabricacion = $_POST['NumeroFabricacion'];  //$NumeroFabricacion = "1.001";  
$NumeroFabricacion = str_replace(".", "", $NumeroFabricacion); // Elimina el punto que nos llega por GET.
$Reactor = $_POST['Reactor']; //$Reactor = "R201";          //Sustituirlo por un POST

if ($ModificadoReactor == "1") {
    //echo "Reactor modificado";
    /*$sql = $conexion->prepare("SELECT NumeroFabricacion, Hora_Finalizacion FROM p18_prueba WHERE Reactor= '$Reactor'
                               AND NumeroFabricacion < '$NumeroFabricacion' ORDER BY NumeroFabricacion DESC LIMIT 1");*/
    
    $sql = $conexion->prepare("SELECT NumeroFabricacion, Hora_Finalizacion FROM p18_prueba WHERE Reactor= '$Reactor'
                               AND NumeroFabricacion < '$NumeroFabricacion' ORDER BY NumeroFabricacion DESC LIMIT 1");

    //$sql = $conexion->prepare("SELECT NumeroFabricacion, Hora_Finalizacion FROM p18_prueba WHERE Reactor = '$Reactor' DESC LIMIT 5");    BORRAR                               
}
else {
    $sql = $conexion->prepare( "SELECT NumeroFabricacion FROM p18_prueba WHERE Reactor = 'R200' LIMIT 1");        
}

$getProducciones = $sql->execute();  //Ejecuta el sql      
$getProducciones = $sql->fetchAll(PDO::FETCH_ASSOC);   //Crea un array asociativo con los datos obtenidos        

$FechaFinal = $getProducciones[0]['Hora_Finalizacion'];

$FechaInicio = strtotime($FechaInicio);
$FechaFinal = strtotime($FechaFinal);

$TiempoParado = $FechaInicio - $FechaFinal; // En segundos


$sql = $conexion->prepare("UPDATE p18_prueba SET Reactor = '$Reactor', Tiempo_Parado = $TiempoParado WHERE NumeroFabricacion = '$NumeroFabricacion'");
//$sql = $conexion->prepare("UPDATE p18_prueba SET Reactor = 'R222', Tiempo_Parado = '1234' WHERE NumeroFabricacion = '1001'");
$updateProduccion = $sql->execute();

$datos = ['Tiempo_Parado' => $TiempoParado,
          'Fecha_Inicio' => $FechaInicio,
            'Fecha_Final' => $FechaFinal];

/*if (count($getProducciones) > 0) {                
    echo json_encode($getProducciones);        
}
else {        
    echo json_encode($errors);        
}*/


if (count($datos) > 0) {                
    echo json_encode($datos);        
}
else {        
    echo json_encode($errors);        
}


?>