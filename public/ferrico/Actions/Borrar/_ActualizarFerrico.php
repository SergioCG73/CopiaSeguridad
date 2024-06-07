<!-- Fichero que recibe los datos desde el formulario de formEditarFerrico.php
   y los envía a la base de datos a la table ferrico -->

<?php

require ("../../Includes/miconexion.php");

$fabricacionumero = $_POST['txtFabricacionNumero'];
$fecha = $_POST['txtFecha'];	
$volumen_inicial = $_POST['txtVolumenInicial'];
$volumen_final = $_POST['txtVolumenFinal'];	
//$fabricacion = $_POST['txtFabricacionNumero']; 
$densidad = $_POST['txtDensidad'];	
$riqueza = $_POST['txtRiqueza'];	
$acido_libre = $_POST['txtAcidoLibre'];
$observaciones = $_POST['txtNotas'];


/* -------- INICIO COMPROBADOR 
echo "Fabricacion Numero: $fabricacionumero";
echo "<br>";
echo "Fecha: $fecha";
echo "<br>";
echo "Volumen Inicial: $volumen_inicial";
echo "<br>";
echo "Volumen Final: $volumen_final";
echo "<br>";
echo "Densidad: $densidad";
echo "<br>";
echo "Riqueza: $riqueza";
echo "<br>";
echo "Ácido Libre: $acido_libre";
echo "<br>";
echo "Notas: $observaciones";
exit;
/* -------------- FINAL COMPROBADOR ----------------------*/


if(empty($volumen_inicial))
{
   $volumen_inicial="NULL";
}

if(empty($volumen_final))
{
   $volumen_final="NULL";
}

if (empty($densidad)){
   $densidad= "NULL";
}

if (empty($riqueza)){
   $riqueza= "NULL";
}

if (empty($acido_libre)){
   $acido_libre= "NULL";
}


$consulta = "UPDATE ferrico SET        
            Fecha = '$fecha',     
            Volumen_Inicial = $volumen_inicial,  
            Volumen_Final = $volumen_final,
            Densidad = $densidad,
            Riqueza = $riqueza,
            Acido = $acido_libre,
            Notas = '$observaciones'            
            WHERE NumeroFabricacion= $fabricacionumero";       

if(mysqli_query($miconexion, $consulta)) {
   echo  "<script>
                  alert('Registro ACTUALIZADO correctamente');
                  location.href='../indexferrico.php?producto=ferrico';
         </script>";		
}
else
{   
   //echo "Registro NO añadido: " .mysqli_error($miconexion);				
   echo 
         "<script>
                  alert('Revisa los campos. Los datos son incorrectos.');
                  location.href='../indexferrico.php?producto=ferrico';
         </script>";
}
//-------------------FIN ALERT AL GUARDAR REGISTRO------------------------------------------*/
mysqli_close($miconexion);

?>

