<?php

$calculosemana = substr($fechainicio,0,10);
$dia = date('N', strtotime($calculosemana));	

if ($dia==7){
	$semana = ltrim(date('W', strtotime($calculosemana))+1,"0");
}
else{
	$semana = ltrim(date('W', strtotime($calculosemana)),"0");
}

?>