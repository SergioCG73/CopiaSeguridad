<?php        
    
    $id = $_GET['id'];     
    require_once("../Modelo/autoload.php");    
    $readData = new Asalariados();            
    $resultado = $readData->getOneAsalariado($id);                   
    $DNI = $resultado->DNI;    
    $Nombre = $resultado->Nombre;
    $Apellidos = $resultado->Apellidos;
    $Id_Puesto = $resultado->Id_Puesto;
    $FechadeAlta = $resultado->Fecha_Alta;    
?>
