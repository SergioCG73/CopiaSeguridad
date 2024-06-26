<?php 
    $dni = strtoupper($_GET['dni']);
    require_once("../Modelo/autoload.php");
    $updateData = new Asalariados();    
    $resultado = $updateData->DeleteWorker($dni);
?>