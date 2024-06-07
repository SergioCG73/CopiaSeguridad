<?php

include("../Includes/densidades.php");
require("../Includes/miconexion.php");

if (($producto == "hb10") or ($producto == "s3") or ($producto == "sulfacid") or ($producto == "ferrico")){
    $Hasta = date("Y-m-d",strtotime($hasta."- 1 days"));
    $parametro = "Fecha";
    $Hora_Inicio ="NULL";
}
else{      
    $parametro = "Hora_Inicio";
    $hasta = date("Y-m-d",strtotime($hasta."+1 days"));
}

$consulta = "SELECT * FROM $producto WHERE $parametro BETWEEN '$desde' and '$hasta' 
            ORDER BY NumeroFabricacion";
                       
$resultado = mysqli_query ($miconexion, $consulta)
    or die("No se puede realizar la consulta");
$fila = mysqli_fetch_array($resultado);
mysqli_data_seek($resultado, 0); 
extract($fila);   
$primera = intval($NumeroFabricacion);    
while ($fila = mysqli_fetch_array($resultado)){        
    extract($fila);           
    $ultima = $NumeroFabricacion;             
    require("../Includes/formatodatos.php");
    require("tablas.php");       
} 

$total_fabricaciones = ($ultima - $primera)+1; 
$toneladas = $total_fabricaciones * $litrosP18 * $densidadP18;
$toneladas = number_format($toneladas,0,",",".");        
$Hora_Inicio = date("d-m-Y H:i", strtotime($Hora_Inicio));

switch($producto){        
        case "p18":            
            $toneladas = $total_fabricaciones * $litrosP18 * $densidadP18;        
            $toneladas = number_format($toneladas,0,",","."); 
            $texto = "POLICLORURO (P18)";                        
            $total_fabricaciones = number_format($total_fabricaciones,0,",",".");
            break;
        case "sulfato":            
            $toneladas = $total_fabricaciones * $litrosSulfato * $densidadSulfato;
            $toneladas = number_format($toneladas,0,",","."); 
            $texto = "SULFATO ALUMINA";                                    
            $total_fabricaciones = number_format($total_fabricaciones,0,",",".");
            break;
        case "ferrico":              
            $texto = "FÉRRICO";            
            $total_fabricaciones = number_format($total_fabricaciones,0,",",".");
            break;
        case "hb10":            
            $texto ="ALTA BASICIDAD (HB10)";
            $total_fabricaciones = number_format($total_fabricaciones,0,",",".");
            break;
        case "sulfacid":            
            $texto ="SULFATO ÁCIDO (S3)";
            $total_fabricaciones = number_format($total_fabricaciones,0,",",".");
        break;
} 

    $desde = date("d-m-Y", strtotime($desde));                
    $hasta = date("d-m-Y",strtotime($hasta ."- 1 days"));    


echo "<link href='../css/Buscador/estilobuscador.css' rel='stylesheet' type='text/css' float='left'/>";
echo "<br>Total fabricaciones de <span>$texto</span> desde el <span>$desde</span> hasta el <span>$hasta</span>: <span>$total_fabricaciones</span> fabricaciones <br>"; 
echo "Toneladas fabricadas: <span>$toneladas</span> Tm";
echo "<br>";
echo "<p>";
echo"------------------------------------------------------------------------";
echo"------------------------------------------------------------------------";
echo"------------------------------------------------------------------------";

?>
