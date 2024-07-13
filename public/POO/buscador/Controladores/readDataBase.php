<?php     
    require_once("../personal/Modelo/autoload.php");     
    require_once("../funciones/functions.php");        
    
if (empty($_POST['fechainicial'] or $_POST['fechafinal'])){
    echo "No hay valores que mostrar";    
    exit;
}
else{     
    $fechainicial = $_POST['fechainicial'];    
    $fechafinal = $_POST['fechafinal'];
    $producto = $_POST['producto'];    
    
    //Validación de fechas ---------------------------------

    $fechainicial_date = strtotime($fechainicial);
    $fechafinal_date = strtotime($fechafinal);

    if ($fechafinal_date < $fechainicial_date) {
        echo "Fecha FINAL menor a la fecha INICIAL"; exit;
    }

    if ($fechainicial < "2022-02-20"){
        echo "La primera fecha registrada es 20-02-2022"; exit;

    }

    //---------------------------------------------------------       
    $readData = new Busqueda();    
    $resultado = $readData->getManufacturingData($producto, $fechainicial, $fechafinal);

if ($producto == "p18" or $producto == "sulfato"){
    $toneladasfabricacion = 16000;

    echo 
    "<table>
        <thead>                        
            <tr>
                <th>
                    Fab nº
                </th>
                <th>
                    Semana
                </th>                
                <th>
                    Reactor
                </th>                
                <th>
                    Fecha/Hora Inicio
                </th>
                <th>
                    Peso Inicial
                </th>
                <th>
                    Fecha/Hora Final
                </th>
                <th>
                    Peso Final
                </th>
                <th>
                    Duracion
                </th>
                <th>
                    Tiempo parado
                </th>
            </tr>
        </thead>
";

foreach($resultado as $valor){
    list($FormattedInicio, $FormattedFinal, $FormattedPesoInicial, $FormatteddPesoFinal, $FormatteddDuracion, 
    $FormatteddParado, $FormattedFabricacion) = formatear($valor->Hora_Inicio, $valor->Hora_Finalizacion, $valor->Peso_Inicial, 
    $valor->Peso_Final, $valor->Duracion, $valor->Tiempo_Parado, $valor->NumeroFabricacion);         

    echo" <tbody>    
      <tr> 
          <td>$FormattedFabricacion</td>
          <td>$valor->Semana</td>
          <td>$valor->Reactor</td>
          <td>$FormattedInicio</td>
          <td>$FormattedPesoInicial Kg.</td>
          <td>$FormattedFinal</td>
          <td>$FormatteddPesoFinal Kg.</td>
          <td>$FormatteddDuracion</td>
          <td>$FormatteddParado</td>          
      </tr>
    </tbody>";
    }    
}

elseif ($producto == "ferrico"){     
    
    echo "<table>
            <thead>                        
                <tr>
                    <th>
                        Fab nº
                    </th>
                    <th>
                        Semana
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Volumen Inicial
                    </th>
                    <th>
                        Volumen Final
                    </th>
                    <th>
                        Densidad
                    </th>
                    <th>
                        Riqueza
                    </th>
                    <th>
                        Ácido libre
                    </th>
                    <th>
                        Notas
                    </th>                                
                </tr>
            </thead>";

foreach($resultado as $valor){    
    list($FormattedFecha,
         $FormattedVolumen_Inicial,
         $FormattedVolumen_Final,
         $FormattedDensidad,
         $FormattedRiqueza,
         $FormattedAcido
         ) = 
    formatearFerrico($valor->Fecha,
        $valor->Volumen_Inicial,
        $valor->Volumen_Final,
        $valor->Densidad,
        $valor->Riqueza,
        $valor->Acido        
    );
   
    if (empty($valor->Notas)){
        $valor->Notas = "";        
    }
    else{
        $valor->Notas = "<img src='../personal/Vista/images/signo_admiracion_icon.png'>";
    }

    echo" <tbody>
        <tr> 
            <td>$valor->NumeroFabricacion</td>
            <td>$valor->Semana</td>            
            <td>$FormattedFecha</td>
            <td>$FormattedVolumen_Inicial</td>
            <td>$FormattedVolumen_Final</td>
            <td>$FormattedDensidad</td>
            <td>$FormattedRiqueza</td>
            <td>$FormattedAcido</td>
            <td>$valor->Notas</td>
        </tr>
        </tbody>";        
    }
}
elseif($producto =="hb10"){    
    echo 
    "<table>
        <thead>                        
            <tr>
                <th>
                    Fab nº
                </th>
                <th>
                    Semana
                </th>                
                <th>
                    Fecha
                </th>
                <th>
                    Densidad
                </th>
                <th>
                    Riqueza
                </th>
                <th>
                    Basicidad
                </th>
                <th>
                    Volumen
                </th>
                <th>
                    Notas
                </th>
            </tr>
        </thead>
";
foreach($resultado as $valor){   
    list($FormattedFecha,
    $FormattedVolumen,
    $FormattedDensidad,
    $FormattedRiqueza,
    $FormattedBasicidad
    ) = 
formatearHB10($valor->Fecha,
   $valor->Volumen,
   $valor->Densidad,
   $valor->Riqueza,
   $valor->Basicidad  
);
//Formateamos el valor de Notas.
    if (empty($valor->Notas)){
        $valor->Notas = "";        
    }
    else{
        $valor->Notas = "<img src='../personal/Vista/images/signo_admiracion_icon.png'>";
    }
//--------------------------
    echo" <tbody>
        <tr> 
            <td>$valor->NumeroFabricacion</td>
            <td>$valor->Semana</td>
            <td>$FormattedFecha</td>            
            <td>$FormattedDensidad</td>
            <td>$FormattedRiqueza</td>
            <td>$FormattedBasicidad</td>
            <td>$FormattedVolumen lts</td>                                
            <td>$valor->Notas</td>
        </tr>
        </tbody>";        
    }
}   

else{
    echo 
    "<table>
        <thead>                        
            <tr>
                <th>
                    Fab nº
                </th>
                <th>
                    Semana
                </th>                
                <th>
                    Fecha
                </th>
                <th>
                    Densidad
                </th>
                <th>
                    Riqueza
                </th>
                <th>
                    Ph
                </th>
                <th>
                    Volumen
                </th>
                <th>
                    Notas
                </th>
            </tr>
        </thead>
";

foreach($resultado as $valor){   
    list($FormattedFecha,
    $FormattedVolumen,
    $FormattedDensidad,
    $FormattedRiqueza
    ) = 
formatearS3($valor->Fecha,
   $valor->Volumen,
   $valor->Densidad,
   $valor->Riqueza,
);

    //formateamos el campo notas. Se no hay nota "---" si hay nota "abc"
    if (empty($valor->Notas)){
        $valor->Notas = "";        
    }
    else{
        $valor->Notas = "<img src='../personal/Vista/images/signo_admiracion_icon.png'>";
    }
//---------------------------------------------------

    echo" <tbody>
        <tr> 
            <td>$valor->NumeroFabricacion</td>
            <td>$valor->Semana</td>
            <td>$FormattedFecha</td>            
            <td>$FormattedDensidad</td>
            <td>$FormattedRiqueza</td>
            <td>$valor->ph</td>
            <td>$FormattedVolumen lts</td>                                
            <td>$valor->Notas</td>
        </tr>
        </tbody>";        
    }
}        
}

$primera = $resultado[0]->NumeroFabricacion;    
$ultima = $valor->NumeroFabricacion;
$totalfabricaciones = ($ultima-$primera) + 1;
$totalfabricaciones = number_format($totalfabricaciones, 0, '', '.');
$toneladastotales = $totalfabricaciones * $toneladasfabricacion;
$toneladastotales = number_format($toneladastotales, 0, "", ".");

echo "<link href='Vista/css/estilo.css' rel='stylesheet' type='text/css'>";
echo "Total fabricaciones de ". "<span>" . strtoupper($producto) . "</span>" . " listadas: <span> $totalfabricaciones </span>";
echo "<br>";
echo "Total toneladas fabricadas: <span>$toneladastotales</span> Tm";

?>