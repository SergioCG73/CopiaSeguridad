<?php
require("../Includes/miconexion.php");

$id = str_replace(".","",$_GET['id']);
$producto = $_GET['producto'];
$link = "../$producto/index".$producto.".php?producto=$producto";

$consulta = "DELETE FROM $producto WHERE NumeroFabricacion=$id";

// --- INICIO ALERT AL GUARDAR REGISTRO -------------------

if(mysqli_query($miconexion, $consulta)) {   

    echo "<script>
                alert('Registro borrado correctamente');
                /*location.href='../P18/indexP18.php?producto=p18';*/
                location.href='$link';
            </script>";		
}
else
{    
    echo "<script>
                alert('Revisa los campos. Los datos son incorrectos.');
                /*location.href='../P18/indexP18.php?producto=p18';*/
                location.href='$link';
            </script>";
}
//-------------------FIN ALERT AL GUARDAR REGISTRO------------------------------------------*/
$resultado = mysqli_query($miconexion, $consulta) or die("No se puede realizar la consulta");
?>
