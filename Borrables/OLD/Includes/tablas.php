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

       // echo "<link href='../css/P18/estiloindexP18.css' rel='stylesheet type='text/css' float='left'/>";        
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
        
        //echo "<link href='style.css' rel='stylesheet type='text/css'/>";   
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

        //echo "<link href='../css/Sulfato/estiloindexSulfato.css' rel='stylesheet type='text/css' float='left'/>";   
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

        //echo "<link href='../css/Ferrico/estiloindexFerrico.css' rel='stylesheet type='text/css' float='left'/>";   
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
        
        //echo "<link href='../css/HB10/estiloindexHB.css' rel='stylesheet type='text/css' float='left'/>";   
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

//------------------ PARTE NUEVA --------------------------
    case "camiones":{
        echo "<link href='css/style_index.css' rel='stylesheet' type='text/css'/>";           
        echo "
            <table class='tabla'>
                <thead>        
                    <tr>
                        <th>Fecha</th>            
                        <th colspan='2'>$FechasCEE[0]</th>                                            
                        <th colspan='2'>$FechasCEE[1]</th> 
                        <th colspan='2'>$FechasCEE[2]</th>
                        <th colspan='2'>$FechasCEE[3]</th>
                        <th colspan='2'>$FechasCEE[4]</th>
                        <th colspan='2'>$FechasCEE[5]</th>
                        <th colspan='2'>$FechasCEE[6]</th>                        
                    </tr>                    

                    <tr>
                        <th scope='col'></th>
                        <td><a href='../muelles/formEditar.php?Fecha=$Fechas[0]'><img src='../Images/lapiz_icon_color.png'r</a></td>
                        <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?Fecha=$Fechas[0]&producto=camiones'><img src='../Images/basura_icon_color.png'></a>
                        <td><a href='../muelles/formEditar.php?Fecha=$Fechas[1]'><img src='../Images/lapiz_icon_color.png'r</a></td>
                        <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?Fecha=$Fechas[1]&producto=camiones'><img src='../Images/basura_icon_color.png'></a>
                        <td><a href='../muelles/formEditar.php?Fecha=$Fechas[2]'><img src='../Images/lapiz_icon_color.png'r</a></td>
                        <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?Fecha=$Fechas[2]&producto=camiones'><img src='../Images/basura_icon_color.png'></a>
                        <td><a href='../muelles/formEditar.php?Fecha=$Fechas[3]'><img src='../Images/lapiz_icon_color.png'r</a></td>
                        <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?Fecha=$Fechas[3]&producto=camiones'><img src='../Images/basura_icon_color.png'></a>
                        <td><a href='../muelles/formEditar.php?Fecha=$Fechas[4]'><img src='../Images/lapiz_icon_color.png'r</a></td>
                        <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?Fecha=$Fechas[4]&producto=camiones'><img src='../Images/basura_icon_color.png'></a>
                        <td><a href='../muelles/formEditar.php?Fecha=$Fechas[5]'><img src='../Images/lapiz_icon_color.png'r</a></td>
                        <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?Fecha=$Fechas[5]&producto=camiones'><img src='../Images/basura_icon_color.png'></a>
                        <td><a href='../muelles/formEditar.php?Fecha=$Fechas[6]'><img src='../Images/lapiz_icon_color.png'r</a></td>
                        <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?Fecha=$Fechas[6]&producto=camiones'><img src='../Images/basura_icon_color.png'></a>
                    </tr>

                    <tr>
                        <th scope='col'>Producto</th>
                        <th>Carga</th>
                        <th>Descarga</th>
                        <th>Carga</th>
                        <th>Descarga</th>
                        <th>Carga</th>
                        <th>Descarga</th>
                        <th>Carga</th>
                        <th>Descarga</th>
                        <th>Carga</th>
                        <th>Descarga</th>
                        <th>Carga</th>
                        <th>Descarga</th>                        
                        <th>Carga</th>
                        <th>Descarga</th>                        
                    </tr>

                    <tbody>
                        <tr>
                            <th>P18</th>
                            <td>$Cargasp18[0]</td>
                            <td>$Descargasp18[0]</td>
                            <td>$Cargasp18[1]</td>
                            <td>$Descargasp18[1]</td>
                            <td>$Cargasp18[2]</td>
                            <td>$Descargasp18[2]</td>
                            <td>$Cargasp18[3]</td>
                            <td>$Descargasp18[3]</td>
                            <td>$Cargasp18[4]</td>
                            <td>$Descargasp18[4]</td>
                            <td>$Cargasp18[5]</td>
                            <td>$Descargasp18[5]</td>
                            <td>$Cargasp18[6]</td>
                            <td>$Descargasp18[6]</td>                            
                        </tr>

                        <tr>
                            <th>Sulfato</th>
                            <td>$Cargassulfato[0]</td>
                            <td>$Descargassulfato[0]</td>
                            <td>$Cargassulfato[1]</td>
                            <td>$Descargassulfato[1]</td>
                            <td>$Cargassulfato[2]</td>
                            <td>$Descargassulfato[2]</td>
                            <td>$Cargassulfato[3]</td>
                            <td>$Descargassulfato[3]</td>
                            <td>$Cargassulfato[4]</td>
                            <td>$Descargassulfato[4]</td>
                            <td>$Cargassulfato[5]</td>
                            <td>$Descargassulfato[5]</td>
                            <td>$Cargassulfato[6]</td>
                            <td>$Descargassulfato[6]</td>                            
                        </tr>

                        <tr>
                            <th>HCL</th>
                            <td>$Cargashcl[0]</td>
                            <td>$Descargashcl[0]</td>
                            <td>$Cargashcl[1]</td>
                            <td>$Descargashcl[1]</td>
                            <td>$Cargashcl[2]</td>
                            <td>$Descargashcl[2]</td>
                            <td>$Cargashcl[3]</td>
                            <td>$Descargashcl[3]</td>
                            <td>$Cargashcl[4]</td>
                            <td>$Descargashcl[4]</td>
                            <td>$Cargashcl[5]</td>
                            <td>$Descargashcl[5]</td>
                            <td>$Cargashcl[6]</td>
                            <td>$Descargashcl[6]</td>                            
                        </tr>

                        <tr>
                            <th>HB10</th>
                            <td>$Cargashb10[0]</td>
                            <td>$Descargashb10[0]</td>
                            <td>$Cargashb10[1]</td>
                            <td>$Descargashb10[1]</td>
                            <td>$Cargashb10[2]</td>
                            <td>$Descargashb10[2]</td>
                            <td>$Cargashb10[3]</td>
                            <td>$Descargashb10[3]</td>
                            <td>$Cargashb10[4]</td>
                            <td>$Descargashb10[4]</td>
                            <td>$Cargashb10[5]</td>
                            <td>$Descargashb10[5]</td>
                            <td>$Cargashb10[6]</td>
                            <td>$Descargashb10[6]</td>                            
                        </tr>

                        <tr>
                            <th>SulfaCID</th>
                            <td>$Cargass3[0]</td>
                            <td>$Descargass3[0]</td>
                            <td>$Cargass3[1]</td>
                            <td>$Descargass3[1]</td>
                            <td>$Cargass3[2]</td>
                            <td>$Descargass3[2]</td>
                            <td>$Cargass3[3]</td>
                            <td>$Descargass3[3]</td>
                            <td>$Cargass3[4]</td>
                            <td>$Descargass3[4]</td>
                            <td>$Cargass3[5]</td>
                            <td>$Descargass3[5]</td>
                            <td>$Cargass3[6]</td>
                            <td>$Descargass3[6]</td>                        
                        </tr>

                        <tr>
                            <th>Ferrico</th>
                            <td>$Cargasferrico[0]</td>
                            <td>$Descargasferrico[0]</td>
                            <td>$Cargasferrico[1]</td>
                            <td>$Descargasferrico[1]</td>
                            <td>$Cargasferrico[2]</td>
                            <td>$Descargasferrico[2]</td>
                            <td>$Cargasferrico[3]</td>
                            <td>$Descargasferrico[3]</td>
                            <td>$Cargasferrico[4]</td>
                            <td>$Descargasferrico[4]</td>
                            <td>$Cargasferrico[5]</td>
                            <td>$Descargasferrico[5]</td>
                            <td>$Cargasferrico[6]</td>
                            <td>$Descargasferrico[6]</td>                            
                        </tr>

                        <tr>
                            <th>Sosa</th>
                            <td>$Cargassosa[0]</td>
                            <td>$Descargassosa[0]</td>
                            <td>$Cargassosa[1]</td>
                            <td>$Descargassosa[1]</td>
                            <td>$Cargassosa[2]</td>
                            <td>$Descargassosa[2]</td>
                            <td>$Cargassosa[3]</td>
                            <td>$Descargassosa[3]</td>
                            <td>$Cargassosa[4]</td>
                            <td>$Descargassosa[4]</td>
                            <td>$Cargassosa[5]</td>
                            <td>$Descargassosa[5]</td>
                            <td>$Cargassosa[6]</td>
                            <td>$Descargassosa[6]</td>
                        </tr>

                        <tr>
                            <th>Sulfúrico</th>
                            <td></td>
                            <td>$Descargassulfurico[0]</td>
                            <td></td>
                            <td>$Descargassulfurico[1]</td>
                            <td></td>
                            <td>$Descargassulfurico[2]</td>
                            <td></td>
                            <td>$Descargassulfurico[3]</td>
                            <td></td>
                            <td>$Descargassulfurico[4]</td>
                            <td></td>
                            <td>$Descargassulfurico[5]</td>
                            <td></td>
                            <td>$Descargassulfurico[6]</td>                            
                        </tr>

                        <tr>
                            <th>Hipoclorito</th>
                            <td></td>
                            <td>$Descargashipo[0]</td>
                            <td></td>
                            <td>$Descargashipo[1]</td>
                            <td></td>
                            <td>$Descargashipo[2]</td>
                            <td></td>
                            <td>$Descargashipo[3]</td>
                            <td></td>
                            <td>$Descargashipo[4]</td>
                            <td></td>
                            <td>$Descargashipo[5]</td>
                            <td></td>
                            <td>$Descargashipo[6]</td>                            
                        </tr>
                    </tbody>

                </thead>
            </table>";                
    break;
    }

// -------------------- FIN PARTE NUEVA ----------------------------

}
?>