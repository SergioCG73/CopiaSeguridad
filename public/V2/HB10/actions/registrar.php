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

    $Fecha = $_POST['Fecha'];                        // $Fecha ="2024-10-24";          
    $NumFabricacion = $_POST['NumFabricacion'];     // $NumFabricacion = "500";
    $Volumen = $_POST['Volumen'];    // $VolumenInicial = 5000;          
    $Densidad = $_POST['Densidad'];              // $Densidad = 1.40;
    $Riqueza = $_POST['Riqueza'];               // $Riqueza = 18;
    $Basicidad = $_POST['Basicidad'];        // $AcidoLibre = 1.5;
    $Notas = $_POST['Notas'];                 // $Notas = "prueba";
    $errors =['errors'=> 'Registro NO añadido'];
    $msg = ['msg' => "Registro añadido correctamente"];

// ----- INICIO CÁLCULO SEMANA 
    $FechaTimeStamp = strtotime($Fecha);     //convertir a timestamp
    $Semana = date("W", $FechaTimeStamp);
// ----- FIN CALCULO SEMANA

// ----- VOLÚMENES ------ Se igua a Null para evitar que no se agregue la producción al no poner volúmenes
    if (empty($Volumen)) {
        $Volumen = "NULL";
    }

    if (empty($Densidad)) {
        $Densidad = "NULL";
    }

    if (empty($Riqueza)) {
        $Riqueza = "NULL";
    }

    if (empty($Basicidad)) {
        $Basicidad = "NULL";
    }

// ------------------    
    $sql = $conexion->prepare("INSERT INTO hb10 (NumeroFabricacion, Fecha, Semana, Volumen, Densidad, Riqueza, Basicidad, Notas) 
                               VALUES ($NumFabricacion, '$Fecha', '$Semana', $Volumen, $Densidad, $Riqueza, $Basicidad, '$Notas')");
    $insert = $sql->execute();  //Ejecuta el sql    

    $datos = ['Fecha' => $Fecha,
              'NumFabricacion' => $NumFabricacion,
              'Semana' => $Semana,
              'Volumen' => $Volumen,              
              'Densidad' => $Densidad,
              'Riqueza' => $Riqueza,
              'Basicidad' => $Basicidad,              
              'Notas' => $Notas            
              ];        

    if ($sql) {                
        echo json_encode($datos);        //JSON para comprobar si los datos recibidos por la BD son correctos
        //echo json_encode($msg);       //Mensaje a mostrar si el registro es añadido correctamente
    }
    else {        
        echo json_encode($errors);        
    }
?>
