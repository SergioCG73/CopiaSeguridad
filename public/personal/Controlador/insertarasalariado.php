<?php
    require_once("../Modelo/autoload.php");
    $insertData = new Asalariados();
    $dni = strtoupper($_POST['dni']);
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $Fecha_Alta = $_POST['fecha_alta'];
    $Id_Puesto = $_POST['puesto'];    
   
    $resultado = $insertData->InsertarAsalariado($dni, $nombre, $apellidos, $Id_Puesto, $Fecha_Alta);    
?>