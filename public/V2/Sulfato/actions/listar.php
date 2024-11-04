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
        
    $registros = isset($_POST['registros']) ? $_POST['registros'] : 10;    
    $search_criteria = isset($_POST['search_criteria']) ? $_POST['search_criteria'] : null;    
    
    if ($search_criteria !="") {          
        $registros = "100";        
        $sql = $conexion->prepare("SELECT * FROM sulfato
                                    WHERE NumeroFabricacion 
                                    LIKE '%" . $search_criteria . "%'
                                    OR Reactor LIKE '%" . $search_criteria . "%'
                                    OR Hora_Inicio LIKE '%" . $search_criteria . "%'
                                    ORDER BY NumeroFabricacion DESC 
                                    LIMIT " . $registros);
    }    
    else {        
        $sql = $conexion->prepare("SELECT * FROM sulfato ORDER BY NumeroFabricacion DESC LIMIT $registros");
    }

    $getProducciones = []; //Creamos el array producciones
    $errors =['data'=> false];

    $getProducciones = $sql->execute();  //Ejecuta el sql      
    $getProducciones = $sql->fetchAll(PDO::FETCH_ASSOC);   //Crea un array asociativo con los datos obtenidos        
        
    if (count($getProducciones) > 0) {                
        echo json_encode($getProducciones);            
    }
    else {        
        echo json_encode($errors);        
    }
?>