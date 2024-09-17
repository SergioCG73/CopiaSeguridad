<?php 
   require_once("miconexion.php");

    $FechaInicio = $_POST['FechaInicio'];     
    $Reactor = $_POST['Reactor'];
    $NumFabricacion = $_POST['NumFabricacion'];    //Entra del formulario 2670
    $FechaFinal = $_POST['FechaFinal'] ? $_POST['FechaFinal'] : "2024-31-12T23:59";    
    $PesoInicial = $_POST['PesoInicial'];
    $PesoFinal = $_POST['PesoFinal'];    
    $Notas = $_POST['Notas'];    
    //$Duracion = $_POST['Duracion'];        
    $TiempoParadoEnSegundos = null;
    
    
    $errors =['errors'=> 'Registro NO añadido'];
    $msg = ['msg' => "Registro añadido correctamente"];
    
    //Calcular TIEMPO PARADO        
    
    $consulta = $conexion->query("SELECT NumeroFabricacion, Hora_Finalizacion, Reactor FROM p18
                                  WHERE NumeroFabricacion < $NumFabricacion AND Reactor = '$Reactor' ORDER BY NumeroFabricacion DESC LIMIT 1");
    
    $data = $consulta->fetch(PDO::FETCH_ASSOC);

    $Hora_Inicio = new Datetime($FechaInicio);
    $HoraFinal = new Datetime($data['Hora_Finalizacion']);    //Hora finalización producción anterior a la que se desea registrar   
    //$HoraFinalString = $HoraFinal->format('Y-m-d H:i:s'); // Formato de fecha y hora 

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
    
    $sql = $conexion->prepare("INSERT INTO p18 (Hora_Inicio, Hora_Finalizacion, NumeroFabricacion, Tiempo_Parado, Reactor, Peso_Inicial, 
                                                       Peso_Final, Notas, Semana, Duracion)
                               VALUES ('$FechaInicio', '$FechaFinal', '$NumFabricacion', $TiempoParadoEnSegundos, '$Reactor', $PesoInicial,
                                        $PesoFinal, '$Notas', $Semana, $Duracion)");
    
    $insertData = $sql->execute();  //Ejecuta el sql

    $datos = ['Hora_Inicio' => $FechaInicio, 
              'Hora_Final' => $FechaFinal,              
              'Reactor' => $Reactor,
              'NumFabricacion' => $NumFabricacion,
              'Parado' => $TiempoParadoEnSegundos,
              'Peso_Inicial' => $PesoInicial,
              'Peso_Final' => $PesoFinal,
              'Notas' => $Notas,
              'Semana' => $Semana,
              'Duración' => $Duracion];

    if ($sql) {                
        echo json_encode($datos);        //JSON para comprobar si los datos recibidos por la BD son correctos
        //echo json_encode($msg);       //Mensaje a mostrar si el registro es añadido correctamente
    }
    else {        
        echo json_encode($errors);        
    }
?>