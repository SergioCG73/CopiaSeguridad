<?php     
    $id = strtoupper($_POST['id']);    
    require_once("../Modelo/autoload.php");
    $updateData = new Asalariados();    
    $resultado = $updateData->DeleteDate($id);
?>