<!-- Fichero que recibe los datos desde el formulario de editarferrico.php
   y los envía a la base de datos a la table ferrico -->

<?php

require ("../../Includes/miconexion.php");

$fabricacionumero = $_POST['txtFabricacionNumero'];
$fecha = $_POST['txtFecha'];
$densidad = $_POST['txtDensidad'];	
$riqueza = $_POST['txtRiqueza'];	
$basicidad = $_POST['txtBasicidad'];
$volumen = $_POST['txtVolumen'];
$observaciones = $_POST['txtNotas'];

if (empty($densidad)){
   $densidad= "NULL";
}

if (empty($riqueza)){
   $riqueza= "NULL";
}

if (empty($basicidad)){
   $basicidad= "NULL";
}

if(empty($volumen))
{
   $volumen="NULL";
}


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

$consulta = "UPDATE hb10 SET        
            Fecha = '$fecha',     
            Volumen = $volumen,              
            Densidad = $densidad,
            Riqueza = $riqueza,
            Basicidad = $basicidad,
            Notas = '$observaciones'            
            WHERE NumeroFabricacion= $fabricacionumero";       

if(mysqli_query($miconexion, $consulta)) {
   echo "<script>
               alert('Registro ACTUALIZADO correctamente');
               location.href='../indexhb10.php?producto=hb10';
         </script>";		
}
else
{
   //echo "Registro NO añadido: " .mysqli_error($miconexion);				
   echo "<script>
               alert('Revisa los campos. Los datos son incorrectos.');
               location.href='../indexhb10.php?producto=hb10';
               </script>";
}
//-------------------FIN ALERT AL GUARDAR REGISTRO------------------------------------------*/
mysqli_close($miconexion);

?>

