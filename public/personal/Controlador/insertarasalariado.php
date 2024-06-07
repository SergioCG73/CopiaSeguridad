<?php
    require_once("../Modelo/autoload.php");
    $insertData = new Asalariados();
    $dni = strtoupper($_POST['dni']);
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $Fecha_Alta = $_POST['fecha_alta'];
    $Id_Puesto = $_POST['puesto'];
    
    /*Validacion DIN
    $partes = explode('-', $dni);
    $numeros = $partes[0];
    $letra = strtoupper($partes[1]);

    if (substr("TRWAGMYFPDXBNJZSQVHLCKE",$numeros%23,1) == $letra)
       echo '<p>El DNI: '.$nif.' es correcto!</p>';
    else
       echo '<p>La letra introducida no es corrrecta!</p>';
    
*/  

    $resultado = $insertData->InsertarAsalariado($dni, $nombre, $apellidos, $Id_Puesto, $Fecha_Alta);    
?>