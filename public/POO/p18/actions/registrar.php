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
   

    $FechaInicio = $_POST['FechaInicio'];     
    $Reactor = $_POST['Reactor'];
    $NumFabricacion = $_POST['NumFabricacion'];    //Entra del formulario 2670
    $FechaFinal = $_POST['FechaFinal'] ? $_POST['FechaFinal'] : "2024-31-12T23:59";    
    $PesoInicial = $_POST['PesoInicial'];
    $PesoFinal = $_POST['PesoFinal'];    
    $Notas = $_POST['Notas'];    
    //$Duracion = $_POST['Duracion'];     //Se borra porque se efectúa el cálculo más abajo   
    $TiempoParadoEnSegundos = null;

    
    $errors =['errors'=> 'Registro NO añadido'];
    $msg = ['msg' => "Registro añadido correctamente"];
    
    //Calcular TIEMPO PARADO        
    
    $consulta = $conexion->query("SELECT NumeroFabricacion, Hora_Finalizacion, Reactor FROM p18_prueba
                                  WHERE NumeroFabricacion < $NumFabricacion AND Reactor = '$Reactor' ORDER BY NumeroFabricacion DESC LIMIT 1");

    $data = $consulta->fetch(PDO::FETCH_ASSOC);
    
    $Hora_Inicio = new Datetime($FechaInicio);
//---------------- ATENCIÓN. DEBE SER BORRADO
 /*   $datos =['Hora_Inicio' => $FechaInicio, 'Reactor' => $Reactor, 'NumFabricación' => $NumFabricacion]; //SE DEBE BORRAR CUANDO FUNCIONE TODO

    if ($consulta) {                
        echo json_encode($datos);        //JSON para comprobar si los datos recibidos por la BD son correctos
        //echo json_encode($msg);       //Mensaje a mostrar si el registro es añadido correctamente
    }
    else {        
        echo json_encode($errors);        
    }*/
//-------------- me quedo aquí. FUNCIONA HASTA AQUÍ.

    $HoraFinal = new Datetime($data['Hora_Finalizacion']);    //Hora finalización producción anterior a la que se desea registrar   
    $HoraFinalString = $HoraFinal->format('Y-m-d H:i:s'); // Formato de fecha y hora 

    $interval = $HoraFinal -> diff($Hora_Inicio);
    $TiempoParadoEnSegundos = ($interval->days * 24 * 60 * 60) + //Convert days to seconds
                              ($interval->h * 60 * 60) +         //Convert hours to seconds
                              ($interval->i * 60) +              //Convert minutes to seconds
                               $interval->s;                     //Add remaining seconds*/    
    //---- FIN TIEMPO PARADO

    //CALCULO SEMANA 
    $FechaInicioTimeStamp = strtotime($FechaInicio);     //convertir a timestamp
    $Semana = date("W", $FechaInicioTimeStamp);
    //FIN CALCULO SEMANA
    
    //CALCULO DURACIÓN        
        $FechaFinalTimeStamp = strtotime($FechaFinal);
        $Duracion = $FechaFinalTimeStamp - $FechaInicioTimeStamp;        

    //FIN CÁLCULO DURACIÓN
    
    $sql = $conexion->prepare("INSERT INTO p18_prueba (Hora_Inicio, Hora_Finalizacion, NumeroFabricacion, Tiempo_Parado, Reactor, Peso_Inicial, 
                                                       Peso_Final, Notas, Semana, Duracion)
                               VALUES ('$FechaInicio', '$FechaFinal', '$NumFabricacion', $TiempoParadoEnSegundos, '$Reactor', $PesoInicial,
                                        $PesoFinal, '$Notas', $Semana, $Duracion)"); 
    
    $insertData = $sql->execute();  //Ejecuta el sql

    $datos = ['Hora_Inicio' => $FechaInicio, 
              'Hora_Final' => $FechaFinal, 
              'Duración' => $Duracion,
              'Reactor' => $Reactor,
              'Semana' => $Semana,
              'Notas' => $Notas,
              'Peso_Final' => $PesoFinal,
              'NumFabricacion' => $NumFabricacion,
              'Peso_Inicial' => $PesoInicial,
              'Parado' => $TiempoParadoEnSegundos              
              ];        

    if ($sql) {                
        echo json_encode($datos);        //JSON para comprobar si los datos recibidos por la BD son correctos
        //echo json_encode($msg);       //Mensaje a mostrar si el registro es añadido correctamente
    }
    else {        
        echo json_encode($errors);        
    }       
        
?>