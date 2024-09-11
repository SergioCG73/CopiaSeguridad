<?php 
    //require_once("miconexion.php");
    //require_once("../../Includes/miconexion.php");    

    try {
        require_once("miconexion.php");        
    }

    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }    
    
    $registros = isset($_POST['registros']) ? $_POST['registros'] : 10;    
    $search_criteria = isset($_POST['search_criteria']) ? $_POST['search_criteria'] : null;  
    
    if ($search_criteria !="") {          
        $registros = "80";        
        $sql = $conexion->prepare("SELECT * FROM p18 
                                    WHERE NumeroFabricacion 
                                    LIKE '%" . $search_criteria . "%'
                                    OR Reactor LIKE '%" . $search_criteria . "%'
                                    OR Hora_Inicio LIKE '%" . $search_criteria . "%'
                                    ORDER BY NumeroFabricacion DESC 
                                    LIMIT " . $registros);
    }
    else {        
        $sql = $conexion->prepare("SELECT * FROM p18 ORDER BY NumeroFabricacion DESC LIMIT $registros");
    }

    $producciones = []; //Creamos el array producciones
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