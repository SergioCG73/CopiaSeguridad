<?php

function formatear($FechaHoraInicio, $FechaHoraFinal, $PesoInicial, $PesoFinal, $Duracion, $Parado) {
    // Formateo de las fechas para que muestre el formato D-m-Y H:i                           
    $Hora_Inicio = new DateTime($FechaHoraInicio);         
    $Hora_Final = new DateTime($FechaHoraFinal);                  
    $Fecha_Hora_Inicio = $Hora_Inicio->format('d-m-Y H:i');        
    $Fecha_Hora_Final = $Hora_Final->format('d-m-Y H:i');

    //Formateo de los pesos para que muestre los valores con punto de miles    
    $PesoInicial = number_format($PesoInicial,0,"",".");
    $PesoFinal = number_format($PesoFinal,0,"",".");

    //Formateo de los tiempos de duracion
    $horas = intval($Duracion/3600);     
    $minutos = (($Duracion - ($horas*3600))/60);        

    if ($minutos < 1) {
        $minutos = "";
        $Duracion = "$horas h";
    }
    else {
        $minutos = intval(($Duracion - ($horas*3600))/60);        
        $Duracion = "$horas h y $minutos'";
    }

    //Formateo de los tiempos de paro de los reactores
    $horasparado = intval($Parado/3600);    
    $minutosparado = (($Parado - ($horasparado*3600))/60);

    if ($horasparado < 1){                
        $minutosparado = intval($Parado/60);
        $Parado = "$minutosparado '";
    }
    elseif ($minutosparado < 1){        
        $Parado = "$horasparado h";
    }
    else {        
        $minutos = $Parado - ($horasparado*3600);        
        $minutosparado = intval($minutos/60);
        $Parado = "$horasparado h y $minutosparado'";
    }

    // Retorna las fechas formateadas en un array
    return array($Fecha_Hora_Inicio, $Fecha_Hora_Final, $PesoInicial, $PesoFinal, $Duracion, $Parado);    
}


?>