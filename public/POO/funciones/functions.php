<?php

function formatear($FechaHoraInicio, $FechaHoraFinal, $PesoInicial, $PesoFinal, $Duracion, $Parado, $NumeroFabricacion) {
    $NumeroFabricacion = number_format($NumeroFabricacion, 0, "", ".");
    // Formateo de las fechas para que muestre el formato D-m-Y H:i                           
    $Hora_Inicio = new DateTime($FechaHoraInicio);
    $Hora_Final = new DateTime($FechaHoraFinal);                  
    $Fecha_Hora_Inicio = $Hora_Inicio->format('d-M-y - H:i');
    $Fecha_Hora_Final = $Hora_Final->format('d-M-y - H:i');

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
        $minutos = intval(($Duracion - ($horas * 3600))/60);        
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
        $minutos = $Parado - ($horasparado * 3600);        
        $minutosparado = intval($minutos / 60);
        $Parado = "$horasparado h y $minutosparado'";
    }

    // Retorna las fechas formateadas en un array
    return array($Fecha_Hora_Inicio, $Fecha_Hora_Final, $PesoInicial, $PesoFinal, $Duracion, $Parado, $NumeroFabricacion);    
}

function formatearFerrico($Fecha, $Volumen_Inicial, $Volumen_Final, $Densidad, $Riqueza, $Acido){
    $FechaFormateada = new DateTime($Fecha);
    $FechaFormateada = $FechaFormateada->format('d - M - y');
    $Volumen_Inicial = number_format($Volumen_Inicial, 0, "", ".") . " Kg";
    $Volumen_Final = number_format($Volumen_Final, 0, "", ".") . " Kg";
    $Densidad = number_format($Densidad, 3, ",", "") . " gr/c<sup>3</sup>";
    $Riqueza = number_format($Riqueza, 2, ",", "") . " %";
    $Acido = number_format($Acido, 2, ",", "") . " %";
    
    return array($FechaFormateada, $Volumen_Inicial, $Volumen_Final, $Densidad, $Riqueza, $Acido);
}

function formatearHB10($Fecha, $Volumen, $Densidad, $Riqueza, $Basicidad){
    $FechaFormateada = new DateTime($Fecha);
    $FechaFormateada = $FechaFormateada->format('d - M - y');    
    $Volumen = number_format($Volumen, 0, "", ".");    
    $Densidad = number_format($Densidad, 3, ",", "") . " gr/c<sup>3</sup>";    
    $Riqueza = number_format($Riqueza, 2, ",", "") . " %";    
    $Basicidad = number_format($Basicidad, 2, ",", "") . " %";
    
    return array($FechaFormateada, $Volumen, $Densidad, $Riqueza, $Basicidad);
}

function formatearS3($Fecha, $Volumen, $Densidad, $Riqueza){
    $FechaFormateada = new DateTime($Fecha);
    $FechaFormateada = $FechaFormateada->format('d - M - y');    
    $Volumen = number_format($Volumen, 0, "", ".");    
    $Densidad = number_format($Densidad, 3, ",", "") . " gr/c<sup>3</sup>";    
    $Riqueza = number_format($Riqueza, 2, ",", "") . " %";    
    
    return array($FechaFormateada, $Volumen, $Densidad, $Riqueza);
}
?>