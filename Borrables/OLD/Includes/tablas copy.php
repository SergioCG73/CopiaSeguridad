<?php 

switch($producto){    
    case "p18":{        
        switch($Reactor){  
            case "R200":
                $linea03 = "<td class='R200'>$Reactor</br></td>";            
            break;

            case "R201":
                $linea03 = "<td class='R201'>$Reactor</br></td>";                
            break;

            case "R202":
                $linea03 = "<td class='rojo'>$Reactor</br></td>";             
            break;
        }              

        if ($Hora_Finalizacion == "31-12-2023 23:59"){    
            $linea06 = "<td class='rojo'>$Hora_Finalizacion</td>";
        }
        else{
            $linea06 = "<td>$Hora_Finalizacion</td>";
        }

        if ($Tiempo == "-----"){
            $linea08 ="<td class='rojo'>$Tiempo</td>";
        }
        else{
            $linea08 = "<td>$Tiempo</td>";
        }
        
        if ($Tiempo_Parado == "ERROR"){
            $linea09 ="<td class='rojo'>$Tiempo_Parado</td>";
        }
        else{
            $linea09 = "<td>$Tiempo_Parado</td>";
        }

        echo "<link href='../css/P18/estiloindexP18.css' rel='stylesheet type='text/css' float='left'/>";        
        echo "    
            <tr>        
                <td>$NumeroFabricacion<br></td>
                <td>$Semana</br></td>
                $linea03
                <td>$Hora_Inicio</br></td>                
                <td>$Peso_Inicial</br></td>
                $linea06
                <td>$Peso_Final</br></td>     
                $linea08
                $linea09
                <td>$Notas</br></td>                   
                <td><a href='../p18/formEditarP18.php?id=$NumeroFabricacion'><img src='../Images/lapiz_icon_color.png'r</a></td> 
                <td> <a onclick='return alertaBorrar();' href='../Actions/eliminar.php?id=$NumeroFabricacion&producto=p18'><img src='../Images/basura_icon_color.png'></a>                
            </tr>";	            
        }
    break;
    
    case "filtrado":        
        
        if($Densidad == "0,000 g/ml"){
            $linea07 ="<td class='rojo'>Sin Dato</td>";
        }
        else{
            $linea07 = "<td>$Densidad</td>";
        }

        if($Riqueza == "0,00%"){
            $linea08 ="<td class='rojo'>Sin Dato</td>";
        }
        else{
            $linea08 = "<td>$Riqueza</td>";
        }

        if($Basicidad == "0,00"){
            $linea09 ="<td class='rojo'>Sin Dato</td>";
        }
        else{
            $linea09 = "<td>$Basicidad</td>";
        }

        if($Volumen_Filtrado == "Sin dato"){
            $linea10 = "<td class='rojo'>$Volumen_Filtrado</td>";
        }
        else{
            $linea10 = "<td>$Volumen_Filtrado</td>";
        }        
        
        echo "<link href='style.css' rel='stylesheet type='text/css'/>";   
        echo "    
            <tr>        
                <td class='_40px'>$id</br></td>        
                <td>$Fecha</br></td>
                <td>$Semana</br></td>
                <td>$Producciones</br></td>
                <td>$Volumen_M216</br></td>
                <td>$Volumen_Agua</br></td>                
                $linea07
                $linea08                                            
                $linea09
                $linea10                
                <td>$Notas</br></td>                   
                <td><a href='../filtrado/formeditar.php?id=$id'><img src='../Images/lapiz_icon_color.png'r</a></td> 
                <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?id=$id&producto=filtrado'><img src='../Images/basura_icon_color.png'></a>  				
            </tr>";        
    break;
       
    case "sulfato":{
        
        switch($Reactor){  
            case "R200":
                $linea03 = "<td class='R200'>$Reactor</br></td>";            
            break;

            case "R201":
                $linea03 = "<td class='R201'>$Reactor</br></td>";                
            break;

            case "R202":
                $linea03 = "<td class='R202'>$Reactor</br></td>";                
            break;
        }

        if ($Hora_Finalizacion == "31-12-2023 23:59"){    
            $linea06 = "<td class='rojo'>$Hora_Finalizacion</td>";
        }
        else{
            $linea06 = "<td>$Hora_Finalizacion</td>";
        }        
        
        if ($Tiempo == "-----"){
            $linea08 ="<td class='rojo'>$Tiempo</td>";
        }
        else{
            $linea08 = "<td>$Tiempo</td>";
        }

        echo "<link href='../css/Sulfato/estiloindexSulfato.css' rel='stylesheet type='text/css' float='left'/>";   
        echo "    
            <tr>        
                <td>$NumeroFabricacion</br></td>        
                <td>$Semana</br></td>
                $linea03            
                <td>$Hora_Inicio</br></td>                
                <td>$Peso_Inicial</br></td>
                $linea06
                <td>$Peso_Final</br></td>     
                $linea08
                <td>$Tiempo_Parado</br></td>
                <td>$Notas</br></td>                   
                <td><a href='../sulfato/formEditarSulfato.php?id=$NumeroFabricacion'><img src='../Images/lapiz_icon_color.png'r</a></td> 
                <td> <a onclick='return alertaBorrar();' href='../Actions/eliminar.php?id=$NumeroFabricacion&producto=sulfato'><img src='../Images/basura_icon_color.png'></a>  				
            </tr>";	
    break;
    }

    case "ferrico":{        

        if ($Volumen_Inicial == "Sin dato"){
            $linea04 = "<td class='rojo'>$Volumen_Inicial</td>";
        }
        else{
            $linea04 = "<td>$Volumen_Inicial</td>";
        }

        if ($Volumen_Final == "Sin dato"){
            $linea05 = "<td class='rojo'>$Volumen_Final</td>";
        }
        else{
            $linea05 = "<td>$Volumen_Final</td>";
        }

        if ($Densidad == "Sin dato"){
            $linea06 = "<td class='rojo'>$Densidad</td>";
        }
        else{
            $linea06 = "<td>$Densidad</td>";
        }

        if ($Riqueza == "Sin dato"){
            $linea07 = "<td class='rojo'>$Riqueza</td>";
        }
        else{
            $linea07 = "<td>$Riqueza</td>";
        }

        if ($Acido == "Sin dato"){
            $linea08 = "<td class='rojo'>$Acido</td>";
        }
        else{
            $linea08 = "<td>$Acido</td>";
        }

        echo "<link href='../css/Ferrico/estiloindexFerrico.css' rel='stylesheet type='text/css' float='left'/>";   
        echo"    
            <tr>        
                <td>$NumeroFabricacion</br></td>        
                <td>$Fecha</br></td>
                <td>$Semana<br></td>                
                $linea04
                $linea05
                $linea06    
                $linea07 
                $linea08                                           
                <td align='center'>$Notas</br></td>                   
                <td align='center'><a href='formEditarFerrico.php?id=$NumeroFabricacion'><img src='../Images/lapiz_icon_color.png'r</a></td>                              
                <td align='center'><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?id=$NumeroFabricacion&producto=ferrico'><img src='../Images/basura_icon_color.png'></a>                
        </tr>";
    break;   
    }
    
    case "hb10":{
        if($Densidad == "Sin dato"){
            $linea04 = "<td class='rojo'>$Densidad</td>";
        }
        else
        {
            $linea04 = "<td>$Densidad</td>";
        }
        
        if($Riqueza == "Sin dato"){
            $linea05 = "<td class='rojo'>$Riqueza</td>";
        }
        else
        {
            $linea05 = "<td>$Riqueza</td>";
        }
        
        if($Basicidad == "Sin dato"){
            $linea06 = "<td class='rojo'>$Basicidad</td>";
        }
        else
        {
            $linea06 = "<td>$Basicidad</td>";
        }
        
        if($Volumen == "-----"){
            $linea07 = "<td class='rojo'>$Volumen</td>";
        }
        else
        {
            $linea07 = "<td>$Volumen</td>";
        }
        
        echo "<link href='../css/HB10/estiloindexHB.css' rel='stylesheet type='text/css' float='left'/>";   
        echo "    
            <tr>        
                <td>$NumeroFabricacion</br></td>        
                <td>$Fecha</br></td>
                <td>$Semana</br></td>            
                $linea04
                $linea05
                $linea06
                $linea07                                    
                <td>$Notas</br></td>                   
                <td><a href='../hb10/formEditarHB.php?id=$NumeroFabricacion'><img src='../Images/lapiz_icon_color.png'r</a></td> 
                <td> <a onclick='return alertaBorrar();' href='../Actions/eliminar.php?id=$NumeroFabricacion&producto=hb10'><img src='../Images/basura_icon_color.png'></a>  				
            </tr>";	
    break;
    }

    case "sulfacid":{             
        if($Densidad == "Sin dato"){
            $linea04 = "<td class='rojo'>$Densidad</td>";
        }
        else
        {
            $linea04 = "<td>$Densidad</td>";
        }

        if($Riqueza == "Sin dato"){
            $linea05 = "<td class='rojo'>$Riqueza</td>";
        }
        else
        {
            $linea05 = "<td>$Riqueza</td>";
        }

        if($ph == "Sin dato"){
            $linea06 = "<td class='rojo'>$ph</td>";
        }
        else
        {
            $linea06 = "<td>$ph</td>";
        }

        if($Volumen == "Sin dato"){
            $linea07 = "<td class='rojo'>$Volumen</td>";
        }
        else
        {
            $linea07 = "<td>$Volumen</td>";
        }

        echo "    
            <tr>        
                <td>$NumeroFabricacion</br></td>        
                <td>$Semana</br></td>
                <td>$Fecha</br></td>                                
                $linea04
                $linea05
                $linea06                
                $linea07                                
                <td>$Notas</br></td>                   
                <td><a href='../sulfacid/formEditarS3.php?id=$NumeroFabricacion'><img src='../Images/lapiz_icon_color.png'r</a></td> 
                <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?id=$NumeroFabricacion&producto=sulfacid'><img src='../Images/basura_icon_color.png'></a>  				
            </tr>";	       
    break;
    }    
}
?>
