<?php

echo "<link href='../css/Buscador/estiloencabezado.css' rel='stylesheet' type='text/css' float='left'/>";

$producto = $_GET['producto'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

switch($producto){
    case "p18": //Encabezado tabla P18
        echo"<table class='encabezadoP18'>";
            echo"<caption>POLICLORURO</caption>";                
                    echo"<tr>";    
                        echo"<th>Fab #</th>";    
                        echo"<th>Semana</th>";
                        echo"<th>Reactor</th>";
                        echo"<th>Fecha/Hora Inicio</th>";
                        echo"<th>Peso inicial</th>"; 
                        echo"<th>Fecha/Hora finalización</th>";
                        echo"<th>Peso final</th>";
                        echo"<th>Duración</th>";
                        echo"<th>Tiempo parado</th>";                        
                    echo"</tr>";            
        echo"</table>";
    break;    
    
    case "sulfato":
        echo "<table class='encabezadoSul'>";
            echo "<caption>SULFATO DE ALUMINA</caption>";
                echo"<tr>";    
                            echo"<th>Fab #</th>";    
                            echo"<th>Semana</th>";
                            echo"<th>Reactor</th>";
                            echo"<th>Fecha/Hora Inicio</th>";
                            echo"<th>Peso inicial</th>"; 
                            echo"<th>Fecha/Hora finalización</th>";
                            echo"<th>Peso final</th>";
                            echo"<th>Duración</th>";
                            echo"<th>Tiempo parado</th>";                        
                echo"</tr>"; 
    break;

    case "ferrico":  /* Encabezado tabla ferrico */
        echo"<table class='encabezadoFe'>";
            echo"<caption>FÉRRICO</caption>";
            echo"<tr>";    
                echo"<th>Fab #</th>";    
                echo"<th>Semana</th>";                
                echo"<th>Fecha</th>";
                echo"<th>Volumen inicial</th>"; 
                echo"<th>Volumen final</th>";                
                echo"<th>Densidad</th>";
                echo"<th>Riqueza</th>";
                echo"<th>Ácido libre</th>";                
            echo"</tr>";
        echo"</table>";           
    break;    

    case "hb10":   //Encabezado tabla HB10
        echo "<table class='encabezadoHB'>";
            echo "<caption>ALTA BASICIDAD (HB10)</caption>";
                echo"<tr>";
                    echo"<th>Fab #</th>";    
                    echo"<th>Semana</th>";
                    echo"<th>Fecha</th>";
                    echo"<th>Densidad</th>";
                    echo"<th>Riqueza</th>";
                    echo"<th>Basicidad</th>";
                    echo"<th>Volumen</th>";                    
                echo"</tr>";
    break;

    case "s3":
        echo "<table class='encabezadoS3'>";
            echo "<caption>SULFATO ÁCIDO</caption>";
                echo "<tr>";
                    echo"<th>Fab #</th>";    
                    echo"<th>Semana</th>";
                    echo"<th>Fecha</th>";
                    echo"<th>Densidad</th>";
                    echo"<th>Riqueza</th>";
                    echo"<th>ph</th>";
                    echo"<th>Volumen</th>";    
                echo "</tr>";
    break;
}   
    include("busqueda.php");    
?>
