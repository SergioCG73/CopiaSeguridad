<?php 

//CALCULO DE LA ANTIGÜEDAD EN LA EMPRESA //
$FechadeAlta_formateada = $FechadeAlta;
$FechadeBaja_formateada = $FechadeBaja;
$FechaActual = date("Y-m-d");
$FechaActual = strtotime($FechaActual);
$FechadeAlta = strtotime($FechadeAlta);

if (empty($FechadeBaja)){    
    $Antiguedad = ($FechaActual - $FechadeAlta)/86400;
}
else{    
    $FechadeBaja = strtotime($FechadeBaja);    
    $Antiguedad = ($FechadeBaja - $FechadeAlta)/86400;    
}


switch ($Antiguedad){
    case ($Antiguedad<=365):
        $Antiguedad = "$Antiguedad días";
    break;

    case ($Antiguedad>365):       
        $años = intdiv($Antiguedad,365);    
        $dias = number_format(fmod($Antiguedad,365),0);                
        $Antiguedad = "$años años y $dias días";        
    break;
}

?>