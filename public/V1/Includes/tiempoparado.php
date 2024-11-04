<?php

/*
$valor1 = $horainicio
$valor6 = $horafinal
$valor8 = $reactor_numero;
$valor9 = $parado;

*/

require ("../Includes/miconexion.php");

$consulta ="SELECT MAX(Hora_Finalizacion) FROM p18 WHERE Reactor='$reactor'";
$resultado = mysqli_query ($miconexion, $consulta) 
		or die("No se puede realizar la consulta");    
$fila = mysqli_fetch_array($resultado);
$horaconsultada1 = $fila[0]; //Ultima hora de finalización en fabricacíon P18

$consulta ="SELECT MAX(Hora_Finalizacion) FROM sulfato WHERE Reactor='$reactor'";
$resultado = mysqli_query ($miconexion, $consulta) 
		or die("No se puede realizar la consulta");    
$fila = mysqli_fetch_array($resultado);
$horaconsultada2 = $fila[0]; //Ultima hora de finalización en fabricacíon Sulfato

/*
echo "Reactor $reactor;";
echo "<br>";
echo "Hora 1: $horaconsultada1";
echo "<br>";
echo "Hora 2: $horaconsultada2"; exit;
*/
/*
if ($reactor =="R201"){
	$consulta ="SELECT MAX(Hora_Finalizacion) FROM sulfato WHERE Reactor='R201'";
	$resultado = mysqli_query ($miconexion, $consulta) 
		or die("No se puede realizar la consulta");    
		$fila = mysqli_fetch_array($resultado);	
	$horaconsultadaSulfato = $fila[0];	//última hora finalizacion en fabricación de SULFATO
}
else {
	$horaconsultadaSulfato = NULL;	
}
*/

if ($horaconsultada1 > $horaconsultada2){
	$horaconsultada = $horaconsultada1;
} 
else{	
	//debería aparecer un mensaje de error indicado ERROR EN LA FECHAS Y HORAS
	$horaconsultada = $horaconsultada2;	
}

$tiempoparado = (strtotime($fechainicio) - strtotime($horaconsultada)); 

//implementar un sistema para que si $parado es negativo mande un mensaje de error

if ($tiempoparado>100000000){
	$tiempoparado = 0;
}



?>
