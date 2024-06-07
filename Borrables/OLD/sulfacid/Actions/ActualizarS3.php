<!-- Fichero que recibe los datos desde el formulario de editarferrico.php
   y los envía a la base de datos a la table ferrico -->

<?php

require ("../../Includes/miconexion.php");

$fabricacionumero = $_POST['txtFabricacionNumero'];
$fecha = $_POST['txtFecha'];	
$volumen = $_POST['txtVolumen'];
$densidad = $_POST['txtDensidad'];	
$riqueza = $_POST['txtRiqueza'];	
$ph = $_POST['txtPh'];
$observaciones = $_POST['txtNotas'];

if(empty($volumen))
{
   $volumen="NULL";
}

if (empty($densidad)){
   $densidad= "NULL";
}

if (empty($riqueza)){
   $riqueza= "NULL";
}

if (empty($ph)){
   $ph= "NULL";
}

/* -------- INICIO COMPROBADOR 
echo "Fabricacion Numero: $fabricacionumero";
echo "<br>";
echo "Fecha: $fecha";
echo "<br>";
echo "Volumen: $volumen";
echo "<br>";
echo "Densidad: $densidad";
echo "<br>";
echo "Riqueza: $riqueza";
echo "<br>";
echo "Ácido Libre: $ph";
echo "<br>";
echo "Notas: $observaciones";
exit;
/* -------------- FINAL COMPROBADOR ----------------------*/

$consulta = "UPDATE sulfacid SET        
            Fecha = '$fecha',                 
            Densidad = $densidad,
            Riqueza = $riqueza,
            ph = $ph,
            Volumen = $volumen,              
            Notas = '$observaciones'            
            WHERE NumeroFabricacion= $fabricacionumero";       

if(mysqli_query($miconexion, $consulta)) {
   echo "<script>
               alert('Registro ACTUALIZADO correctamente');
               location.href='../indexsulfacid.php?producto=sulfacid';
         </script>";		
}
else
{
   //echo "Registro NO añadido: " .mysqli_error($miconexion);				
   echo "<script>
               alert('Revisa los campos. Los datos son incorrectos.');
               location.href='../indexsulfacid.php?producto=sulfacid';
         </script>";
}
//-------------------FIN ALERT AL GUARDAR REGISTRO------------------------------------------*/
mysqli_close($miconexion);

?>

