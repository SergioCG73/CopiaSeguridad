<?php 

require_once("../Modelo/autoload.php");
$llenarselectasalariados= new Modelo();
$consulta = "SELECT * FROM asalariados ORDER BY DNI";
$resultado = $llenarselectasalariados->RellenarSelectAsalariados($consulta);

foreach ($resultado as $valores) {    
    echo '<option value="' . $valores["DNI"] . '" >' . $valores["Nombre"] .' '. $valores["Apellidos"] .'</option>';
}

?>
