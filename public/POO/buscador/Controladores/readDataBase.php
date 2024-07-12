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

    //---------------------------------------------------------       
    $readData = new Busqueda();    
    $resultado = $readData->getManufacturingData($producto, $fechainicial, $fechafinal);    

if ($producto == "p18" or $producto == "sulfato"){    

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
    $FormatteddParado) = formatear($valor->Hora_Inicio, $valor->Hora_Finalizacion, $valor->Peso_Inicial, 
    $valor->Peso_Final, $valor->Duracion, $valor->Tiempo_Parado);         

    echo" <tbody>    
      <tr> 
          <td>$valor->NumeroFabricacion</td>
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
                        Riquza
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

    if (empty($valor->Notas)){
        $valor->Notas = "";        
    }
    else{
        $valor->Notas = "<img src='../Images/signo_admiracion_icon.png'>";
    }

    echo" <tbody>
        <tr> 
            <td>$valor->NumeroFabricacion</td>
            <td>$valor->Semana</td>
            <td>$valor->Fecha</td>
            <td>$valor->Volumen_Inicial</td>
            <td>$valor->Volumen_Final</td>
            <td>$valor->Densidad</td>
            <td>$valor->Riqueza</td>
            <td>$valor->Acido</td>
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

//Formateamos el valor de Notas.
    if (empty($valor->Notas)){
        $valor->Notas = "";        
    }
    else{
        $valor->Notas = "<img src='../Images/signo_admiracion_icon.png'>";
    }
//--------------------------
    echo" <tbody>
        <tr> 
            <td>$valor->NumeroFabricacion</td>
            <td>$valor->Semana</td>
            <td>$valor->Fecha</td>            
            <td>$valor->Densidad</td>
            <td>$valor->Riqueza</td>
            <td>$valor->Basicidad</td>
            <td>$valor->Volumen lts</td>                                
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

    //formateamos el campo notas. Se no hay nota "---" si hay nota "abc"
    if (empty($valor->Notas)){
        $valor->Notas = "";        
    }
    else{
        $valor->Notas = "<img src='../Images/signo_admiracion_icon.png'>";
    }
//---------------------------------------------------

    echo" <tbody>
        <tr> 
            <td>$valor->NumeroFabricacion</td>
            <td>$valor->Semana</td>
            <td>$valor->Fecha</td>            
            <td>$valor->Densidad</td>
            <td>$valor->Riqueza</td>
            <td>$valor->ph</td>
            <td>$valor->Volumen lts</td>                                
            <td>$valor->Notas</td>
        </tr>
        </tbody>";        
    }
}        
}

$PRODUCTO = strtoupper($producto);
$FECHAINICIAL = new DateTime($fechainicial);
$FECHAINICIAL->format('d-m-Y');
$FECHAFINAL = new DateTime($fechafinal);
$FECHAFINAL->format('d-m-Y');

echo "<br>Total fabricaciones de <span>$PRODUCTO</span> desde el <span>$FECHAINICIAL</span> hasta el <span>$FECHAFINAL</span>: <span>$total_fabricaciones</span> fabricaciones <br>"; 
echo "Toneladas fabricadas: <span>$toneladas</span> Tm";

?>