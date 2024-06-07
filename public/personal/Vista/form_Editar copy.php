<?php 
echo "EDITAR EMPLEADO";
ECHO "<br>";
ECHO "-----------------------------";
echo "<br><br>";
//$id = $_GET['id']; // Funciona mejor en leerasalariado.php
include_once("../Controlador/leerasalariado.php");
include_once("../Modelo/antiguedad.php");

/*print_r($resultado);
echo "<br>";*/

/*$DNI = $resultado->DNI;
$Nombre = $resultado->Nombre;
$Apellidos = $resultado->Apellidos;
$Id_Puesto = $resultado->Id_Puesto;
$FechadeAlta = $resultado->Fecha_Alta;*/

//print_r($resultado); exit;

//CALCULO DE LA ANTIGÜEDAD EN LA EMPRESA //
/*
$FechadeAlta_ = $FechadeAlta;
$FechaActual = date("Y-m-d");
$FechaActual = strtotime($FechaActual);
$FechadeAlta = strtotime($FechadeAlta);
$Antiguedad = ($FechaActual - $FechadeAlta)/86400;

switch ($Antiguedad){
    case ($Antiguedad<=365):
        $Antiguedad = "$Antiguedad días";
        //echo "La antigüedad es de: $Antiguedad días";
    break;

    case ($Antiguedad>365):       
        $años = intdiv($Antiguedad,365);    
        $dias = number_format(fmod($Antiguedad,365),0);        
        //echo "Antigüedad: $años años y $dias días";    
        $Antiguedad = "$años años y $dias días";
    break;
}
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PERSONAL</title>
</head>
<body>
    <label>ID: </label>
    <input type="text" name="id" value="<?php echo $DNI?>"/>
    <br><br>
    <label>Nombre: </label>
    <input type="text" name="nombre" value="<?php echo $Nombre?>"/>
    <br><br>
    <label>Apellidos: </label>
    <input type="text" name="apellidos" value="<?php echo $Apellidos?>"/>
    <br><br>
    <label>Fecha de Alta: </label>    
    <input type="date" value="<?php echo $FechadeAlta_?>"/>
    <br><br>
    <label>Antigüedad: <?php echo $Antiguedad?></label>
    <br><br>
    <h2>VACACIONES</h2>
    
    <form name="formulario" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <select name="año">
            <option value="2024">2024</option>
            <option value="2023">2023</option>
        </select>

        <select name="tipo">
            <option value="1">Vacaciones</option>
            <option value="2">Enfermedad común</option>
            <option value="3">Baja laboral</option>
            <option value="4">Permiso maternidad/paternidad</option>
            <option value="5">Permiso nacimiento/fallecimiento/enfermedad grave familiar</option>
            <option value="6">Permiso por matrimonio</option>
            <option value="7">Permiso NO retribuido</option>
            <option value="8">Permiso por traslado vivienda</option>
            <option value="10">Horas sindicales</option>        
        </select>        
        <!--<input type="text" name="id" value="<-?php echo $DNI?>">-->
        <input type="submit" value="BUSCAR">
    </form>

    <?php         
        include_once("../Controlador/leervacaciones.php");
    ?>    

</body>
</html>
