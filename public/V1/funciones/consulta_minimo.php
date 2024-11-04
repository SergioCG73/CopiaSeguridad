<?php
if ($producto == "filtrado"){
    $parametro = "id";
}
else {
    $parametro = "NumeroFabricacion";
}

//$consultaMinimo="SELECT * FROM $producto ORDER BY NumeroFabricacion ASC LIMIT 1";
$consultaMinimo="SELECT * FROM $producto ORDER BY $parametro ASC LIMIT 1";
$resultadoMinimo = mysqli_query ($miconexion, $consultaMinimo) 
    or die("No se puede realizar la consulta");
$filaMinimo = mysqli_fetch_array($resultadoMinimo);
mysqli_data_seek($resultadoMinimo, 0);            
extract($filaMinimo);
//$minimo = $filaMinimo['NumeroFabricacion'];   
$minimo = $filaMinimo[$parametro];   
?>