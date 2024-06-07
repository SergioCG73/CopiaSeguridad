<?php 

//CALCULO DE LA ANTIGÜEDAD EN LA EMPRESA //
$FechadeAlta_ = $FechadeAlta;
$FechaActual = date("Y-m-d");
$FechaActual = strtotime($FechaActual);
$FechadeAlta = strtotime($FechadeAlta);
$Antiguedad = ($FechaActual - $FechadeAlta)/86400;

switch ($Antiguedad){
    case ($Antiguedad<=365):
        $Antiguedad = "$Antiguedad días";
        //echo "La antigüedad es de: $Antiguedad días";
    break;

    case ($Antiguedad>365):       
        $años = intdiv($Antiguedad,365);    
        $dias = number_format(fmod($Antiguedad,365),0);        
        //echo "Antigüedad: $años años y $dias días";    
        $Antiguedad = "$años años y $dias días";
    break;
}


?>