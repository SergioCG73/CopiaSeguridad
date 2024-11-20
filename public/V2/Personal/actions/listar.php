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

    $tipo = $_POST["tipo"];
    $search_criteria = $_POST["search_criteria"];

    if ($search_criteria !="") {          
        $registros = "20";        
        $sql = $conexion->prepare("SELECT * FROM personal
                                    WHERE DNI LIKE '%" . $search_criteria . "%'                                   
                                    OR Nombre LIKE '%" . $search_criteria . "%'
                                    OR Apellidos LIKE '%" . $search_criteria . "%'                                    
                                    ORDER BY DNI DESC LIMIT 5");     
    }    
    else { 
        if ($tipo == "Empleados") {
            $sql = $conexion->prepare("SELECT * FROM personal WHERE Fecha_Baja IS NULL ORDER BY Fecha_Alta DESC");
        }
    
        if ($tipo == "Exempleados") {
            $sql = $conexion->prepare("SELECT * FROM personal WHERE Fecha_Baja IS NOT NULL ORDER BY Fecha_Alta DESC");
        }
    
        if ($tipo == "Todos") {
            $sql = $conexion->prepare("SELECT * FROM personal ORDER BY Fecha_Alta DESC");
        }        
    }   

    $getEmpleados = []; //Creamos el array producciones
    $errors =['data'=> false];

    $getEmpleados = $sql->execute();  //Ejecuta el sql      
    $getEmpleados = $sql->fetchAll(PDO::FETCH_ASSOC);   //Crea un array asociativo con los datos obtenidos   
        
    if (count($getEmpleados) > 0) {                
        echo json_encode($getEmpleados);            
    }
    else {        
        echo json_encode($errors);        
    }
?>
