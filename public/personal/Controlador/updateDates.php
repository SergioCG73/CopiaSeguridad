<?php       
    require_once("../Modelo/autoload.php");
    $updateData = new Asalariados();
    $id = $_POST['id'];    
    $DNI = $_POST['dni'];        
    $Fecha_Inicio = $_POST['fechainicio'];
    $Fecha_Fin = $_POST['fechafin'];    
    $Notas = $_POST['notas'];
    $Tipo = $_POST['tipo'];       

    $resultado = $updateData->UpdateDate($id, $Fecha_Inicio, $Fecha_Fin, $Notas, $Tipo, $DNI);
?>