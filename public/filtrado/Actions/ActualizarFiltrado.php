<?php

require ("../../Includes/miconexion.php");

$id = $_POST['id'];    
$Fecha = $_POST['fechainicio'];        
$Semana = $_POST['semana'];
$Producciones = $_POST['producciones'];
$Volumen_M216 = $_POST['volumeninicial'];        
$Volumen_Agua = $_POST['agua'];
$Densidad = $_POST['densidad'];    
$Riqueza = $_POST['riqueza'];
$Basicidad = $_POST['basicidad'];
$Volumen_Filtrado = $_POST['volumenfinal'];    
$Notas = $_POST['notas'];

if(empty($Volumen_M216))
{
    $Volumen_M216 = "NULL";
}

if(empty($Volumen_Agua))
{
    $Volumen_Agua = "NULL";
}

if (empty($Densidad)){
    $Densidad = "NULL";
}

if (empty($Riqueza)){
    $Riqueza =  "NULL";
}

if (empty($Basicidad)){
    $Basicidad = "NULL";
}

if (empty($Volumen_Filtrado)){
    $Volumen_Filtrado = "NULL";
}

$consulta = "UPDATE filtrado SET        
        Fecha = '$Fecha',        
        Semana = '$Semana', 
        Producciones = '$Producciones',
        Volumen_M216 = $Volumen_M216,     
        Volumen_Agua = $Volumen_Agua,
        Densidad = $Densidad,
        Riqueza = $Riqueza,
        Basicidad = $Basicidad,
        Volumen_Filtrado = $Volumen_Filtrado,
        Notas = '$Notas'            
        WHERE id = $id";       

if(mysqli_query($miconexion, $consulta)) {
   echo  "<script>
                  alert('Registro ACTUALIZADO correctamente');
                  location.href='../indexfiltrado.php?producto=filtrado';
         </script>";		
}
else
{   
   echo 
         "<script>
                  alert('Revisa los campos. Los datos son incorrectos.');
                  location.href='../indexfiltrado.php?producto=filtrado';
         </script>";
}
//-------------------FIN ALERT AL GUARDAR REGISTRO------------------------------------------*/
mysqli_close($miconexion);

?>