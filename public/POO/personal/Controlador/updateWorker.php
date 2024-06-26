<?php    
    require_once("../Modelo/autoload.php");
    $updateData = new Asalariados();
    $dni = strtoupper($_POST['dni']);    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $Id_Puesto = $_POST['puesto'];    
    $Fecha_Alta = $_POST['fecha_alta'];    
    $Fecha_Baja = $_POST['fecha_baja'];    
    

    //echo $dni," ",$nombre," ",$apellidos," ",$Id_Puesto," ",$Fecha_Alta, " ", $Fecha_Baja; exit;    
    $resultado = $updateData->UpdateWorker($nombre, $dni, $apellidos, $Id_Puesto, $Fecha_Alta, $Fecha_Baja);
    
    
?>