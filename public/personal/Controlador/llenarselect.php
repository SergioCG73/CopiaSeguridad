<?php    
    require_once("../Modelo/autoload.php");    
    
    /* FORMA 1:
    $conexion = new mysqli("localhost","sergiocg", "1011", "crud");    
    $conexion = new Conexion();
    $consulta ="SELECT * FROM puestos ORDER BY Puesto";
    $resultado = $conexion->query($consulta);    
    */    
    
    /*FORMA 2: 
    $conectar = new Conexion();    
    $consulta = "SELECT * FROM puestos ORDER BY Puesto";
    $resultado = $conectar->rellenarselect($consulta);
    */

    $fillselect = new Modelo();
    $consulta = "SELECT * FROM puestos ORDER BY Puesto";
    $resultado = $fillselect->RellenarSelect($consulta);

    foreach ($resultado as $valores) {
        echo '<option value="' . $valores["Id_Puesto"] . '">' . $valores["Puesto"] . '</option>';
    }    
?>