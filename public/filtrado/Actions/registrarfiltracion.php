<?php
require ("../../Includes/miconexion.php");

$consulta = "SELECT id FROM filtrado ORDER BY id DESC LIMIT 1 ";

$resultado = mysqli_query ($miconexion, $consulta) 
                            or die("No se puede realizar la consulta");
$fila = mysqli_fetch_array($resultado);
mysqli_data_seek($resultado, 0); 

//print_r($fila);

$ultimoid = $fila['id'];

$ultimoid = $ultimoid+1;

//echo $ultimoid;
//echo gettype($ultimoid);
//exit;

$id = $ultimoid;
$fecha = $_POST['txtfecha'];
$fechaparasemana = strtotime($fecha);
$semana = ltrim(date('W', $fechaparasemana),"0");
$producciones = $_POST['txtproducciones'];
$volumen = $_POST['txtvolumen'];
$agua = $_POST['txtagua'];
$densidad = $_POST['txtdensidad'];
$riqueza = $_POST['txtriqueza'];
$basicidad = $_POST['txtbasicidad'];
$filtrado = $_POST['txtfiltrado'];
$notas = $_POST['txtnotas'];


if (empty($agua)){
    $agua = "0";
}

if(empty($densidad)){
    $densidad = "NULL";
}

if (empty($riqueza)){
    $riqueza = "NULL";
}

if (empty($basicidad)){
    $basicidad = "NULL";
}


/* --------- Comprobador de datos recibidos desde el formulario --------------------------- /
echo "ID: $id <br>";
echo "Fecha: $fecha <br>";
echo "Semana: $semana <br>";
echo "Producciones $producciones <br>";
echo "Volumen M216: $volumen <br>";
echo "Volumen agua: $agua <br>";
echo "Densidad: $densidad <br>";
echo "Riqueza: $riqueza <br>";
echo "Basicidad: $basicidad <br>";
echo "Filtrado: $filtrado <br>";
echo "Notas: $notas <br>";
exit;
//------------------------------------------------------------------------------------------------*/


$consulta = "INSERT INTO filtrado(id, Fecha, Producciones, Volumen_M216, Volumen_Agua, Densidad,
            Riqueza, Basicidad, Volumen_Filtrado, Notas) VALUES ('$id', '$fecha', '$producciones', '$volumen',
            '$agua', $densidad, $riqueza, $basicidad, '$filtrado', '$notas')";

//echo $consulta;


if(mysqli_query($miconexion, $consulta)) {    
    echo 	"<script>
                    alert('Registro añadido correctamente');
                    location.href='../indexfiltrado.php?producto=filtrado';
            </script>";		
}
else
{    
    echo 	"<script>
                    alert('Revisa los campos. Los datos son incorrectos.');
                    location.href='../indexfiltrado.php?producto=filtrado';
            </script>";
}
//-------------------FIN ALERT AL GUARDAR REGISTRO-----------------*/
mysqli_close($miconexion);
?>


