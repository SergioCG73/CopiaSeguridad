<?php     
    $id = strtoupper($_POST['id']);    
    $dni = $_POST['dni'];        
    require_once("../Modelo/autoload.php");
    $updateData = new Asalariados();    
    $resultado = $updateData->DeleteDate($id, $dni);
?>