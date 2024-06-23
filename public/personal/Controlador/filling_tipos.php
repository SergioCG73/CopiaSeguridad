<?php    
    require_once("../Modelo/autoload.php");
    $fillselect = new Modelo();
    $consulta = "SELECT * FROM tipos ORDER BY Id_Tipo";
    $resultado = $fillselect->RellenarSelect($consulta);

    foreach ($resultado as $valores) {
        echo '<option value="' . $valores["Id_Tipo"] . '">' . $valores["Tipo"] . '</option>';
    }    
?>