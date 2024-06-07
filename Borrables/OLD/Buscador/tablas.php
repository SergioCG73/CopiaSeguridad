<?php

require ("../Includes/densidades.php");

if (($producto == "p18") or ($producto == "sulfato")){

    if ($Reactor == "R200"){
        $linea = "<td class='R200'>$Reactor<br></td>";
    }        

    if ($Reactor == "R201"){
        $linea = "<td class='R201'>$Reactor<br></td>";
    }                   

    if ($Reactor == "R202"){
        $linea = "<td class='R202'>$Reactor<br></td>";
    }                   

      echo "    
        <table class='tablaP18'> 
            <tbody>           
                <tr class='fila'>        
                    <td class='Fab'>$NumeroFabricacion<br></td>        
                    <td class='Semana'>$Semana<br></td>
                    <!--<td class='Reactor'>$Reactor<br></td>-->
                    $linea
                    <td class='FechaI'>$Hora_Inicio<br></td>
                    <td class='PesoI'>$Peso_Inicial</br></td>                
                    <td class='FechaF'>$Hora_Finalizacion<br></td>              
                    <td class='PesoF'>$Peso_Final</br></td> 
                    <td class='Duracion'>$Tiempo</br></td>               
                    <td class='Parado'>$Tiempo_Parado</br></td>               
                </tr>	
          </tbody>   
        </table>";   
}

if ($producto == "ferrico"){        
       
    $columna04 = "<td class='VolumenI'>$Volumen_Inicial</br></td>";
    $columna05 = "<td class='VolumenI'>$Volumen_Final</br></td>";

    if (($DensidadBD < $densidadFerricoMinima) or ($DensidadBD > $densidadFerricoMaxima)){
        $columna06 = "<td class='DensidadError'>$Densidad</br></td>";
    }
    else{
        $columna06 = "<td class='Densidad'>$Densidad</br></td>";
    }

        echo "    
        <table class='tablaFe'> 
            <tbody>           
            <tr>        
                <td class='Fab'>$NumeroFabricacion<br></td>        
                <td class='Semana'>$Semana<br></td>
                <td class='Fecha'>$Fecha<br></td>
                <!--<td class='VolumenI'>$Volumen_Inicial</br></td> -->
                $columna04                
                <!--<td class='VolumenF'>$Volumen_Final</br></td> -->
                $columna05
                <!--<td class='Densidad'>$Densidad</br></td> -->
                $columna06
                <td class='Riqueza'>$Riqueza</br></td> 
                <td class='Acido'>$Acido</br></td>                 
            </tr>	
            </tbody>   
        </table>";    
}

if ($producto == "hb10"){
    if (($DensidadBD < $densidadHB10Minima) or ($DensidadBD > $densidadHB10Maxima)){
        $columna04 = "<td class='DensidadError'>$Densidad</br></td>";

    }
    else{
        $columna04 = "<td class='Densidad'>$Densidad</br></td>";
    }    

    if ($Riqueza == "Sin dato"){        
        $columna05 = "<td class='RiquezaError'>$Riqueza</br></td>";
    }    
    
    if (($RiquezaBD<$riquezaHB10Minima) or ($RiquezaBD>$riquezaHB10Maxima)){        
        $columna05 = "<td class='RiquezaError'>$Riqueza</br></td>";
    }
    else{
        $columna05 = "<td class='Riqueza'>$Riqueza</br></td>";
    }

    if ($Basicidad =="Sin dato"){        
        $columna06 = "<td class='BasicidadError'>$Basicidad</br></td>";
    }    
        
    if (($BasicidadBD<$basicidadHB10Minima) or ($BasicidadBD>$basicidadHB10Maxima)){        
        $columna06 = "<td class='BasicidadError'>$Basicidad</br></td>";
    }
    else{
        $columna06 = "<td class='Basicidad'>$Basicidad</br></td>";
    }

    if ($Volumen == "Sin dato"){
        $columna07 = "<td class='VolumenError'>$Volumen</br></td>";
    }
    else{
        $columna07 = "<td class='Volumen'>$Volumen</br></td>";
    }
        echo "    
        <table class='tablaHB'> 
            <tbody>           
            <tr>        
                <td class='Fab'>$NumeroFabricacion<br></td>        
                <td class='Semana'>$Semana<br></td>
                <td class='Fecha'>$Fecha<br></td>                
                $columna04 
                $columna05      
                $columna06                                                         
                $columna07
            </tr>	
            </tbody>   
        </table>";    
}

if ($producto == "sulfacid"){

    if (($DensidadBD < $densidadS3Minima) or ($DensidadBD > $densidadS3Maxima)){
        $columna04 = "<td class='DensidadError'>$Densidad</br></td>";
    }
    else{
        $columna04 = "<td class='Densidad'>$Densidad</br></td>";
    }    

    if ($Riqueza == "Sin datos"){        
        $columna05 = "<td class='RiquezaError'>$Riqueza</br></td>";
    }    
    
    if (($RiquezaBD<$riquezaHB10Minima) or ($RiquezaBD>$riquezaHB10Maxima)){        
        $columna05 = "<td class='RiquezaError'>$Riqueza</br></td>";
    }
    else{
        $columna05 = "<td class='Riqueza'>$Riqueza</br></td>";
    }

    if (($phBD<$phS3Minima) or ($phBD>$phS3Maxima)){        
        $columna06 = "<td class='phError'>$ph</br></td>";
    }
    else{
        $columna06 = "<td class='Riqueza'>$ph</br></td>";
    }

    if ($ph == "Sin dato"){        
        $columna06 = "<td class='phError'>$ph</br></td>";
    }
       
    if ($Volumen == "Sin dato"){
        $columna07 = "<td class='VolumenError'>$Volumen</br></td>";
    }
    else{        
        $columna07 = "<td class='Volumen'>$Volumen</br></td>";
    }

        echo "    
        <table class='tablaS3'> 
            <tbody>           
            <tr>        
                <td class='Fab'>$NumeroFabricacion<br></td>        
                <td class='Semana'>$Semana<br></td>
                <td class='Fecha'>$Fecha<br></td>                
                $columna04 
                $columna05      
                $columna06
                $columna07
            </tr>	
            </tbody>   
        </table>";    
}

?>