<?php
if ($producto == "filtrado"){
    $parametro = "id";
}
else {
    $parametro = "NumeroFabricacion";
}

//$consultaMaximo="SELECT * FROM $producto ORDER BY NumeroFabricacion DESC LIMIT 1";
$consultaMaximo="SELECT * FROM $producto ORDER BY $parametro DESC LIMIT 1";

$resultadoMaximo = mysqli_query ($miconexion, $consultaMaximo) 
    or die("No se puede realizar la consulta");
$filaMaximo = mysqli_fetch_array($resultadoMaximo);
mysqli_data_seek($resultadoMaximo, 0);            
extract($filaMaximo);
//$maximo = $filaMaximo['NumeroFabricacion'];    
$maximo = $filaMaximo[$parametro];    
?>