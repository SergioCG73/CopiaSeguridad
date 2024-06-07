<?php

require("../Includes/miconexion.php");

$producto = $_GET['producto'];

if ($producto == "camiones"){
    $id = $_GET['Fecha'];
    $Fecha = $id;
    $link = "../muelles/indexmuelles.php?producto=camiones";    
}
else{
    $id = str_replace(".","",$_GET['id']);
    $link = "../$producto/index".$producto.".php?producto=$producto";
}

if ($producto == "filtrado"){
    $consulta = "DELETE FROM $producto WHERE id=$id";
}
elseif ($producto == "p18" or $producto == "sulfato" or $producto == "sulfacid" or $producto == "ferrico"){
    $consulta = "DELETE FROM $producto WHERE NumeroFabricacion=$id";
}
else {
    $consulta = "DELETE FROM $producto WHERE Fecha = '$Fecha'";
}

if(mysqli_query($miconexion, $consulta)) {  
     

    echo "<script>
                alert('Registro borrado correctamente');                
                location.href='$link';
            </script>";		
}
else
{
    echo "<script>
                alert('Revisa los campos. Los datos son incorrectos.');                
                location.href='$link';
            </script>";
}

//-------------------FIN ALERT AL GUARDAR REGISTRO------------------------------------------*/

$resultado = mysqli_query($miconexion, $consulta) 
            or die("No se puede realizar la consulta");     

?>
