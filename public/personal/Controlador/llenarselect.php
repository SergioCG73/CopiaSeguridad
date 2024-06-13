<?php        
    require_once("../Modelo/autoload.php");            

    $fillselect = new Modelo();
    $consulta = "SELECT * FROM puestos ORDER BY Puesto";
    $resultado = $fillselect->RellenarSelect($consulta);    

    foreach ($resultado as $valores) {
        echo '<option value="' . $valores["Id_Puesto"] . '">' . $valores["Puesto"] . '</option>';
    }
?>