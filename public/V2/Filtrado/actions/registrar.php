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

    $Fecha = $_POST['Fecha'];                        // $Fecha ="2024-10-24";    
    $Id = $_POST['IDFiltrado'];                             // $Id = "500";    
    $Producciones = $_POST['Producciones'];
    $VolumenM216 = $_POST['VolumenM216'];    // $VolumenInicial = 5000;    
    $VolumenAgua = $_POST['VolumenAgua'];       // $VolumenFinal = 20000;
    $Densidad = $_POST['Densidad'];              // $Densidad = 1.40;
    $Riqueza = $_POST['Riqueza'];               // $Riqueza = 18;
    $Basicidad = $_POST['Basicidad'];        // $AcidoLibre = 1.5;
    $VolumenFiltrado = $_POST['VolumenFiltrado'];
    $Notas = $_POST['Notas'];                 // $Notas = "prueba";
    $errors =['errors'=> 'Registro NO añadido'];
    $msg = ['msg' => "Registro añadido correctamente"];

// ----- INICIO CÁLCULO SEMANA 
    $FechaTimeStamp = strtotime($Fecha);     //convertir a timestamp
    $Semana = date("W", $FechaTimeStamp);
    
// ----- FIN CALCULO SEMANA

// ----- VOLÚMENES ------ Se igua a Null para evitar que no se agregue la producción al no poner volúmenes

    if (empty($VolumenM216)) {
        //$VolumenM216 = "NULL";
        $VolumenM216 = 0;
    }

    if (empty($VolumenAgua)) {
        //$VolumenAgua = "NULL";
        $VolumenAgua = 0;
    }

    if (empty($Densidad)) {
        //$Densidad = "NULL";
        $Densidad = 0;
    }

    if (empty($Riqueza)) {
        //$Riqueza = "NULL";
        $Riqueza = 0;
    }

    if (empty($Basicidad)) {
        //$Basicidad = "NULL";
        $Basicidad = 0;
    }

    if (empty($VolumenFiltrado)) {
        //$VolumenFiltrado = "NULL";
        $VolumenFiltrado = 0;
    }


// ------------------    
    $sql = $conexion->prepare("INSERT INTO filtrado (id, Fecha, Semana, Producciones, Volumen_M216, Volumen_Agua, 
                                                       Densidad, Riqueza, Basicidad, Notas, Volumen_Filtrado) 
                               VALUES ($Id, '$Fecha', '$Semana', '$Producciones', $VolumenM216, $VolumenAgua, $Densidad, 
                                       $Riqueza, $Basicidad, '$Notas', $VolumenFiltrado)"); 
    $insert = $sql->execute();  //Ejecuta el sql    */

    $sql=".";

    $datos = ['ID_Filtrado' => $Id,
              'Fecha' => $Fecha,
              'Semana' => $Semana,
              'Producciones' => $Producciones,
              'Volumen_M216' => $VolumenM216,
              'Volumen_Agua' => $VolumenAgua,
              'Densidad' => $Densidad,
              'Riqueza' => $Riqueza,
              'Basicidad' => $Basicidad,              
              'Notas' => $Notas,
              'Volumen_Filtado' => $VolumenFiltrado    
              ];        

    if ($sql) {                
        echo json_encode($datos);        //JSON para comprobar si los datos recibidos por la BD son correctos
        //echo json_encode($msg);       //Mensaje a mostrar si el registro es añadido correctamente
    }
    else {        
        echo json_encode($errors);        
    }
?>
