<?php        
    require_once("../Modelo/autoload.php");
    $insertData = new Asalariados();
    $dni = strtoupper($_POST['dni']);
    $Fecha_Inicio = $_POST['fecha_inicio'];
    $Fecha_Final = $_POST['fecha_final'];
    $Tipo = $_POST['tipo'];
    $Notas = $_POST['notas'];
    $resultado = $insertData->InsertarVacaciones($dni, $Fecha_Inicio, $Fecha_Final, $Tipo, $Notas);
?>
