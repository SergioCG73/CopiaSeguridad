<?php 

function miErrorHandler($errno, $errstr, $errfile, $errline) { // Definir una función para manejar errores     
    if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING
        echo "<script>alert('Error: El archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
    }
    
    return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
}

set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado
require_once("../miconexion.php"); // Intentar incluir el archivo
restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación


$errors =['data'=> false];
$TipoUpdate = $_POST['TipoUpdate'];

if ($TipoUpdate == "1") {  //Se actualiza Pesos o Notas
    $NumeroFabricacion = $_POST['NumeroFabricacion'];
    $NumeroFabricacion = str_replace(".", "", $NumeroFabricacion); // Elimina el punto que nos llega por POST.    
    $PesoInicial = $_POST['PesoInicialOutput'];
    $PesoFinal = $_POST['PesoFinalOutput'];
    $Notas = $_POST['NotasOutput'];

    $post = ['Numero Fabricación' => $NumeroFabricacion,
             'Tipo actualización' => $TipoUpdate,
             'Peso Inicial' => $PesoInicial,
             'Peso Final' => $PesoFinal,
             'Notas' => $Notas 
            ];

    $sql = $conexion->prepare("UPDATE p18_prueba SET Peso_Inicial = $PesoInicial, Peso_Final = $PesoFinal, Notas = '$Notas' 
                               WHERE NumeroFabricacion = '$NumeroFabricacion'");
    
    $updateProduccion = $sql->execute();
    echo json_encode($post);
}

if ($TipoUpdate == "2"){   //Se actualiza el REACTOR
    $NumeroFabricacion = $_POST['NumeroFabricacion'];
    $NumeroFabricacion = str_replace(".", "", $NumeroFabricacion);
    $Reactor = $_POST['Reactor'];
    $FechaInicialOutput = $_POST['FechaInicialOutput'];

    $post = ['Numero Fabricación' => $NumeroFabricacion,
             'Tipo actualización' => $TipoUpdate,
             'Reactor' => $Reactor,
             'Fecha Inicial Output' => $FechaInicialOutput
            ];
    
    //echo json_encode($post);

    $sql = $conexion->prepare("SELECT NumeroFabricacion, Hora_Finalizacion FROM p18_prueba 
                               WHERE Reactor= '$Reactor' AND NumeroFabricacion < $NumeroFabricacion
                               ORDER BY NumeroFabricacion DESC LIMIT 1");

    $getProducciones = $sql->execute();  //Ejecuta el sql      
    $getProducciones = $sql->fetchAll(PDO::FETCH_ASSOC);   //Crea un array asociativo con los datos obtenidos   

    //echo json_encode($getProducciones);       
    
    $FechaInicio_segundos = strtotime($FechaInicialOutput);
    $FechaFinal = $getProducciones[0]['Hora_Finalizacion'];
    $FechaFinal_segundos = strtotime($FechaFinal);         
    $TiempoParado = $FechaInicio_segundos - $FechaFinal_segundos; // En segundos

    $update = ["FechaInicial" => $FechaInicialOutput,
               "FechaFinal" => $FechaFinal,              
               "Fecha Inicio en segundos" => $FechaInicio_segundos,
               "Fecha Final en segundos" => $FechaFinal_segundos,
               "Tiempo Parado" => $TiempoParado
              ];
        
    $sql = $conexion->prepare("UPDATE p18_prueba SET Reactor = '$Reactor', Tiempo_Parado = $TiempoParado 
                               WHERE NumeroFabricacion = '$NumeroFabricacion'");
    $updateProduccion = $sql->execute();

    echo json_encode($update);
}

if ($TipoUpdate == "3"){ //Se actualiza FECHA INICIAL
    $NumeroFabricacion = $_POST['NumeroFabricacion'];
    $NumeroFabricacion = str_replace(".", "", $NumeroFabricacion);
    $Reactor = $_POST['Reactor'];
    $FechaInicialOutput = $_POST['FechaInicialOutput'];
    $FechaFinalOutput = $_POST['FechaFinalOutput'];

    $post = ['Numero Fabricación' => $NumeroFabricacion,
             'Tipo actualización' => $TipoUpdate,
             'Reactor' => $Reactor,
             'Fecha Inicial' => $FechaInicialOutput,
             'Fecha Final' => $FechaFinalOutput
            ];    

            $sql = $conexion->prepare("SELECT `NumeroFabricacion`, `Hora_Finalizacion` FROM `p18_prueba` 
            WHERE `NumeroFabricacion` < $NumeroFabricacion AND Reactor = '$Reactor' 
            ORDER BY NumeroFabricacion DESC LIMIT 1");

            $getProducciones = $sql->execute();  //Ejecuta el sql
            $getProducciones = $sql->fetchAll(PDO::FETCH_ASSOC);   //Crea un array asociativo con los datos obtenidos

            $FechaFinal = $getProducciones[0]['Hora_Finalizacion'];
    
    //echo json_encode($post);
    //echo json_encode($getProducciones);

    //--------------------- INICIO CÁCULO TIEMPO PARADO ---------------------------------------
    $FechaInicio_segundos = strtotime($FechaInicialOutput);    
    $FechaFinal_segundos = strtotime($FechaFinal);
    $TiempoParado = $FechaInicio_segundos - $FechaFinal_segundos;
    
    //---------------------- FIN CÁLCULO TIEMPO PARADO ----------------------------------------

    //---------------------- INICIO CÁLCULO DURACIÓN ------------------------------------------    
    $FechaFinalOutput = $_POST['FechaFinalOutput'];
    $FechaFinalOutput_segundos = strtotime($FechaFinalOutput);
    $Duracion = $FechaFinalOutput_segundos - $FechaInicio_segundos;
    //---------------------- FIN CÁLCULO DURACIÓN ------------------------------------------

    $update = ["Fecha Inicial" => $FechaInicialOutput,
               "Fecha Inicial en segundos" => $FechaInicio_segundos,
               "Fecha Final anterior fab en mismo reactor" => $FechaFinal,
               "Fecha Final, en segundos, anterior fab en mismo reactor" => $FechaFinal_segundos,
               "Tiempo Parado" => $TiempoParado,
               "Fecha Final formulario" => $FechaFinalOutput,
               "Fecha Final formulario en segundos" => $FechaFinalOutput_segundos,
               "Duracion" => $Duracion
              ];    

    $sql = $conexion->prepare("UPDATE p18_prueba SET Hora_Inicio = '$FechaInicialOutput', Duracion = $Duracion, Tiempo_Parado = $TiempoParado 
                               WHERE NumeroFabricacion = $NumeroFabricacion") ;
    $updateProduccion = $sql->execute();
    echo json_encode($update); 
}

if ($TipoUpdate == "4") {    //Se actualiza FECHA FINAL
        $NumeroFabricacionOutput = $_POST['NumeroFabricacion'];
        $NumeroFabricacion = str_replace(".", "", $NumeroFabricacionOutput);
        $Reactor = $_POST['Reactor'];
        $FechaInicialOutput = $_POST['FechaInicialOutput'];
        $FechaFinalOutput = $_POST['FechaFinalOutput'];
    
        $post = ['Numero Fabricación' => $NumeroFabricacion,
                 'Tipo actualización' => $TipoUpdate,
                 'Reactor' => $Reactor,
                 'Fecha Inicial' => $FechaInicialOutput,
                 'Fecha Final' => $FechaFinalOutput
                ];    
        
//        echo json_encode($post);

//---------------------- INICIO CÁLCULO DURACIÓN ------------------------------------------    
    $FechaFinalOutput = $_POST['FechaFinalOutput'];
    $FechaFinalOutput_segundos = strtotime($FechaFinalOutput);
    $FechaInicioOutput_segundos = strtotime($FechaInicialOutput);
    $Duracion = $FechaFinalOutput_segundos - $FechaInicioOutput_segundos; 
//---------------------- FIN CÁLCULO DURACIÓN ---------------------------------------------

$sql = $conexion->prepare("UPDATE p18_prueba SET Hora_Finalizacion = '$FechaFinalOutput', Duracion = $Duracion 
                           WHERE NumeroFabricacion = $NumeroFabricacion");
$sql->execute();

$update =['Número fabricacion' => $NumeroFabricacion,
          'Fecha Final Output' => $FechaFinalOutput,
          'Duracion' => $Duracion          
         ];

//echo json_encode($update);

// ------------------------ INICIO CÁLCULO TIEMPO PARADO ----------------------------------
$sql = $conexion->prepare("SELECT NumeroFabricacion, Hora_Inicio FROM p18_prueba
                           WHERE NumeroFabricacion > $NumeroFabricacion AND Reactor = '$Reactor'
                           LIMIT 1");

$sql->execute();
$getProducciones = $sql->fetchAll(PDO::FETCH_ASSOC);   //Crea un array asociativo con los datos obtenidos


if (empty($getProducciones)) {
    echo json_encode($getProducciones);
}
else {
    $NumeroFabricacionSQL = $getProducciones[0]['NumeroFabricacion'];
    $Hora_InicioSQL = $getProducciones[0]['Hora_Inicio'];
    $date = new DateTime($Hora_InicioSQL);
    //$Hora_InicioSQL = $date->format('Y-m-d\TH:i');
    $Hora_InicioSQL_segundos = strtotime($Hora_InicioSQL);
    $TiempoParado = $Hora_InicioSQL_segundos - $FechaFinalOutput_segundos;

// --------------------------- FIN CÁLCULO TIEMPO PARADO ----------------------------------    
    $update = ['Fecha Final Output' => $FechaFinalOutput,
               'Fecha Final Output (seg)' => $FechaFinalOutput_segundos,
               'Fecha Inicial Output' => $FechaInicialOutput,
               'Fecha Inicio Output (seg)' => $FechaInicioOutput_segundos,
               'Duracion' => $Duracion,
               'Numero Fabricacion SQL' => $NumeroFabricacionSQL,
               'Hora Inicio SQL' => $Hora_InicioSQL,
               'Hora Inicio SQL segundos' => $Hora_InicioSQL_segundos,
               'Tiempo Parado' => $TiempoParado
              ];
    
    $sql = $conexion->prepare("UPDATE p18_prueba SET Tiempo_Parado = $TiempoParado WHERE NumeroFabricacion = $NumeroFabricacionSQL");
    $updateProduccion = $sql->execute();   
    echo json_encode($update);
}
}

?>