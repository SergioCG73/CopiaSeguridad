<?php 
    require("../Includes/miconexion.php");
    $id = $_GET['id'];         
    $id=Str_replace(".","",$id);    

    $consulta ="SELECT * FROM filtrado WHERE id = $id";        
    $resultado = mysqli_query($miconexion, $consulta) 
            or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    extract($fila);    

    $id = $fila['id'];
    $Producto = "filtrado";
    $Fecha = $fila['Fecha'];        
    $Producciones = $fila['Producciones'];        
    $Volumen_M216 = $fila['Volumen_M216'];        
    $Volumen_Agua = $fila['Volumen_Agua'];    
    $Densidad = $fila['Densidad'];    
    $Riqueza = $fila['Riqueza'];
    $Basicidad = $fila['Basicidad'];    
    $Volumen_Filtrado = $fila['Volumen_Filtrado'];    
    $Notas = $fila['Notas'];        
?>