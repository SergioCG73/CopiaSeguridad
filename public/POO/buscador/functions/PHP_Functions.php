<?php
    function formatear($Fabricacion, $FechaHoraInicio, $FechaHoraFinal,  $Reactor, $PesoInicial, 
                        $PesoFinal, $Duracion, $Parado) {

    /*if ($FechaHoraInicio < $FechaHoraFinal){
        echo ("Hora menor a inicial");        
    }*/
                            
    // Formateo de las fechas para que muestre el formato D-m-Y H:i                           
    $Hora_Inicio = new DateTime($FechaHoraInicio);
    $Hora_Final = new DateTime($FechaHoraFinal);
    $FHora_Inicio = $Hora_Inicio->format('d-m-Y H:i');
    $FHora_Final = $Hora_Final->format('d-m-Y H:i');
    $FFabricacion = number_format($Fabricacion, 0, "", ".");
    $Reactor = $Reactor;
    
    //Formatear color reactores

    if ($Reactor == "R200"){
        $FReactor = "<td class='R200'>R200</td>";
    }

    if ($Reactor == "R201"){
        $FReactor = "<td class='R201'>R201</td>";
    }

    if ($Reactor == "R202"){
        $FReactor = "<td class='R202'>R202</td>";
    }
    
    //Formateo de los pesos para que muestre los valores con punto de miles
    $FPesoInicial = number_format($PesoInicial,0,"",".") . " Kg";
    $FPesoFinal = number_format($PesoFinal,0,"",".") . " Kg";
    
    //Formateo de los tiempos de duracion
    $horas = intval($Duracion/3600);
    $minutos = (($Duracion - ($horas*3600))/60);

    if ($minutos < 1) {
        $minutos = "";
        $FDuracion = "$horas h";
    }
    else {
        $minutos = intval(($Duracion - ($horas*3600))/60);
        $FDuracion = "$horas h y $minutos'";
    }    

    //Formateo de los tiempos de paro de los reactores
    $horasparado = intval($Parado/3600);
    $minutosparado = (($Parado - ($horasparado*3600))/60);

    if ($horasparado < 1){
        $minutosparado = intval($Parado/60);
        $FParado = "$minutosparado '";
    }
    elseif ($minutosparado < 1){
        $FParado = "$horasparado h";
    }
    else {
        $minutos = $Parado - ($horasparado*3600);
        $minutosparado = intval($minutos/60);
        $FParado = "$horasparado h y $minutosparado'";
    }

    //Formateo de las notas

    if (!empty($Notas)){
        $FNotas = "abc";
    }
    else {
        $FNotas = "";
    }

    // Retorna las fechas formateadas en un array 
  
  return array($FFabricacion, $FHora_Inicio, $FHora_Final, 
               $FReactor, $FPesoInicial, $FPesoFinal,
               $FDuracion, $FParado, $FNotas); 
}

function formatearFerrico($Fabricacion, $Fecha, $Semana, $Volumen_Inicial, $Volumen_Final, 
                          $Densidad, $Riqueza, $Acido_libre, $Notas){

$FFabricacion = number_format($Fabricacion, 0, "", "."); //Formateo de la fabricación
$Fecha = new DateTime($Fecha);                         //Formateo de la fecha 1/2
$FFecha = $Fecha->format('d-m-Y');                 //Formateo de la fecha 2/2

//Formateo de los pesos para que muestre los valores con punto de miles
$FVolumen_Inicial = number_format($Volumen_Inicial,0,"",".") . " Kg";
$FVolumen_Final = number_format($Volumen_Final,0,"",".") . " Kg";

$FDensidad = number_format($Densidad, 3, ",","") . " gr/ml";  //Formateo de la DENSIDAD
$FRiqueza = number_format($Riqueza, 3, ",", "") . " %";      //Formateo de la RIQUEZA

if (empty($Acido_libre)){    
    $FAcido_libre = "no data";
}
else {
    $FAcido_libre = number_format($Acido_libre, 2, ",", "") . " %";      //Formateo de la ACIDO LIBRERIQUEZA    
}

//Formateo de las NOTAS
if (!empty($Notas)){
    $FNotas = "abc";
}
else {
    $FNotas = "";
}

return array($FFabricacion, $FFecha, $Semana, $FVolumen_Inicial, $FVolumen_Final, $FDensidad, $FRiqueza,
             $FAcido_libre, $FNotas);

}

function formatearHB10($Fabricacion, $Fecha, $Semana, $Volumen, $Densidad, $Riqueza, $Basicidad, $Notas){

$FFabricacion = number_format($Fabricacion, 0, "", "."); //Formateo de la fabricación
$Fecha = new DateTime($Fecha);                         //Formateo de la fecha 1/2
$FFecha = $Fecha->format('d-m-Y');                 //Formateo de la fecha 2/2

//Formateo de los pesos para que muestre los valores con punto de miles
$FVolumen = number_format($Volumen,0,"",".") . " lts";

$FDensidad = number_format($Densidad, 3, ",","") . " gr/ml";  //Formateo de la DENSIDAD
$FRiqueza = number_format($Riqueza, 3, ",", "") . " %";      //Formateo de la RIQUEZA

if (empty($Basicidad)){    
    $FBasicidad = "no data";
}
else {
    $FBasicidad = number_format($Basicidad, 2, ",", "") . " %";      //Formateo de la ACIDO LIBRERIQUEZA    
}

//Formateo de las NOTAS
if (!empty($Notas)){
    $FNotas = "abc";
}
else {
    $FNotas = "";
}

return array($FFabricacion, $FFecha, $Semana, $FVolumen, $FDensidad, $FRiqueza, $FBasicidad, $FNotas);
}

function formatearSulfacid($Fabricacion, $Fecha, $Semana, $Volumen, $Densidad, $Riqueza, $Basicidad, $Notas){

    $FFabricacion = number_format($Fabricacion, 0, "", "."); //Formateo de la fabricación
    $Fecha = new DateTime($Fecha);                         //Formateo de la fecha 1/2
    $FFecha = $Fecha->format('d-m-Y');                 //Formateo de la fecha 2/2
    
    //Formateo de los pesos para que muestre los valores con punto de miles
    $FVolumen = number_format($Volumen,0,"",".") . " lts";
    
    $FDensidad = number_format($Densidad, 3, ",","") . " gr/ml";  //Formateo de la DENSIDAD
    $FRiqueza = number_format($Riqueza, 3, ",", "") . " %";      //Formateo de la RIQUEZA
    
    if (empty($Basicidad)){    
        $FBasicidad = "no data";
    }
    else {
        $FBasicidad = number_format($Basicidad, 2, ",", "") . " %";      //Formateo de la ACIDO LIBRERIQUEZA    
    }
    
    //Formateo de las NOTAS
    if (!empty($Notas)){
        $FNotas = "abc";
    }
    else {
        $FNotas = "";
    }

    
    
    return array($FFabricacion, $FFecha, $Semana, $FVolumen, $FDensidad, $FRiqueza, $FBasicidad, $FNotas);
    }

function tablaP18($table, $data){
        echo "<link href='css/style.css' rel='stylesheet' text='text/css'>";
        echo "<div class='styled-table'>
                <table>
                <thead class='p18'>
                    <tr>
                        <th>Fabricacion Nº</th>                        
                        <th>Reactor</th>
                        <th>Hora Inicio</th>
                        <th>Peso Inicio</th>
                        <th>Hora Final</th>
                        <th>Peso Final</th>
                        <th>Duración</th>
                        <th>Tiempo Parado</th>
                        <th>Notas</th>                            
                    </tr>
                </thead>";                    
                
                foreach ($data as $row) {                    
                    list($FFabricacion, $FHora_Inicio, $FHora_Final, $FReactor, $FPeso_Inicio, $FPeso_Final,
                        $FDuracion, $FParado, $FNotas) =  
                    formatear(
                        $row['NumeroFabricacion'],
                        $row['Hora_Inicio'], 
                        $row['Hora_Finalizacion'],                        
                        $row['Reactor'],
                        $row['Peso_Inicial'],
                        $row['Peso_Final'],
                        $row['Duracion'],
                        $row['Tiempo_Parado'],
                        $row['Notas']                        
                    );
                                        
                    echo "<tbody>
                            <tr>
                                <td>$FFabricacion</td>                                        
                                $FReactor
                                <td>$FHora_Inicio</td>                                                                
                                <td>$FPeso_Inicio</td>
                                <td>$FHora_Final</td>
                                <td>$FPeso_Final</td>                                                                
                                <td>$FDuracion</td>
                                <td>$FParado</td>
                                <td>$FNotas</td>
                            </tr>
                        </tbody>";                        
                    }     

                    echo "</tbody>
                        </table>
                        </div>";
                    //exit;
}

function tablaSulfato($table, $data){    
    echo "<link href='css/style.css' rel='stylesheet' text='text/css'>";
    echo "<div class='styled-table'>
            <table>
            <thead class='sulfato'>
                <tr>
                    <th>Fabricacion Nº</th>                        
                    <th>Reactor</th>
                    <th>Hora Inicio</th>
                    <th>Peso Inicio</th>
                    <th>Hora Final</th>
                    <th>Peso Final</th>
                    <th>Duración</th>
                    <th>Tiempo Parado</th>
                    <th>Notas</th>                            
                </tr>
            </thead>";                    
            
            foreach ($data as $row) {                    
                list($FFabricacion, $FHora_Inicio, $FHora_Final, $FReactor, $FPeso_Inicio, $FPeso_Final,
                    $FDuracion, $FParado, $FNotas) =  
                formatear(
                    $row['NumeroFabricacion'],
                    $row['Hora_Inicio'], 
                    $row['Hora_Finalizacion'],                        
                    $row['Reactor'],
                    $row['Peso_Inicial'],
                    $row['Peso_Final'],
                    $row['Duracion'],
                    $row['Tiempo_Parado'],
                    $row['Notas']                        
                );
                                    
                echo "<tbody>
                        <tr>
                            <td>$FFabricacion</td>                                        
                            $FReactor
                            <td>$FHora_Inicio</td>                                                                
                            <td>$FPeso_Inicio</td>
                            <td>$FHora_Final</td>
                            <td>$FPeso_Final</td>                                                                
                            <td>$FDuracion</td>
                            <td>$FParado</td>
                            <td>$FNotas</td>
                        </tr>
                    </tbody>";                        
                }     

                echo "</tbody>
                    </table>
                    </div>"; 
}

function tablaFerrico($table, $data){
    echo "<link href='css/style.css' rel='stylesheet' text='text/css'>";
    echo "<div class='styled-table'>
           <table>
            <thead class='ferrico'>
                <tr>
                    <th>Fabricacion Nº1</th>
                    <th>Fecha</th>
                    <th>Semana</th>
                    <th>Volumen inicial</th>
                    <th>Volumen final</th>
                    <th>Densidad</th>
                    <th>Riqueza</th>
                    <th>Ácido libre</th>
                    <th>Notas</th>                            
                </tr>
            </thead>";

            foreach ($data as $row) {                     
                list($FFabricacion, $FFecha, $Semana, $FVolumen_Inicial, $FVolumen_Final,
                     $FDensidad, $FRiqueza, $FAcido_Libre, $FNotas) =  
                formatearFerrico(
                    $row['NumeroFabricacion'],                     
                    $row['Fecha'],
                    $row['Semana'],
                    $row['Volumen_Inicial'],
                    $row['Volumen_Final'],
                    $row['Densidad'],
                    $row['Riqueza'],
                    $row['Acido'],
                    $row['Notas']
                );                    
                echo "<tbody>
                        <tr>
                            <td>$FFabricacion</td>
                            <td>$FFecha</td>                            
                            <td>$Semana</td>                            
                            <td>$FVolumen_Inicial</td>
                            <td>$FVolumen_Final</td>
                            <td>$FDensidad</td>
                            <td>$FRiqueza</td>
                            <td>$FAcido_Libre</td>                            
                            <td>$FNotas</td>
                        </tr>
                    </tbody>                    
                ";
            }                            
            echo "</tbody>
                        </table>
                        </div>";
}

function tablaHB10($table, $data){     
    echo "<div class='styled-table'>
            <table>
            <thead class='hb10'>
                <tr>
                    <th>Fabricacion Nº</th>
                    <th>Fecha</th>
                    <th>Semana</th>
                    <th>Volumen</th>                    
                    <th>Densidad</th>
                    <th>Riqueza</th>
                    <th>Ácido libre</th>
                    <th>Notas</th>                            
                </tr>
            </thead>";

            foreach ($data as $row) {                     
                list($FFabricacion, $FFecha, $Semana, $FVolumen, $FDensidad, $FRiqueza, $FBasicidad, $FNotas) =  
                formatearHB10(
                    $row['NumeroFabricacion'],                     
                    $row['Fecha'],
                    $row['Semana'],
                    $row['Volumen'],                    
                    $row['Densidad'],
                    $row['Riqueza'],
                    $row['Basicidad'],
                    $row['Notas']
                );                    
                echo "<tbody>
                        <tr>
                            <td>$FFabricacion</td>
                            <td>$FFecha</td>                            
                            <td>$Semana</td>                            
                            <td>$FVolumen</td>                            
                            <td>$FDensidad</td>
                            <td>$FRiqueza</td>
                            <td>$FBasicidad</td>                            
                            <td>$FNotas</td>
                        </tr>
                    </tbody>                    
                ";
            }                            
            echo "</tbody>
                        </table>
                        </div>";
}

function tablaSulfacid($table, $data){     
    echo "<div class='styled-table'>
            <table>
            <thead class='sulfacid'>
                <tr>
                    <th>Fabricacion Nº</th>
                    <th>Fecha</th>
                    <th>Semana</th>
                    <th>Volumen</th>                    
                    <th>Densidad</th>
                    <th>Riqueza</th>
                    <th>ph</th>
                    <th>Notas</th>                            
                </tr>
            </thead>";

            foreach ($data as $row) {                     
                list($FFabricacion, $FFecha, $Semana, $FVolumen, $FDensidad, $FRiqueza, $Fph, $FNotas) =  
                formatearSulfacid(
                    $row['NumeroFabricacion'],
                    $row['Fecha'],
                    $row['Semana'],
                    $row['Volumen'],
                    $row['Densidad'],
                    $row['Riqueza'],
                    $row['ph'],
                    $row['Notas']
                );                    
                echo "<tbody>
                        <tr>
                            <td>$FFabricacion</td>
                            <td>$FFecha</td>
                            <td>$Semana</td>
                            <td>$FVolumen</td>                            
                            <td>$FDensidad</td>
                            <td>$FRiqueza</td>
                            <td>$Fph</td>                            
                            <td>$FNotas</td>
                        </tr>
                    </tbody>                    
                ";
            }                            
            echo "</tbody>
                        </table>
                        </div>";
}
?>