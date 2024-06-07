<?php 
echo "EDITAR EMPLEADO";
echo "<br>";
echo "-----------------------------";
echo "<br><br>";
include_once("../Controlador/leerasalariado.php");
include_once("../Modelo/CalcularAntiguedad.php");
include_once("../Modelo/CreateOption.php");
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
            <?php 
                CreateOption("año",2024);
                CreateOption("año",2023);
            ?>            
        </select>

        <select name="tipo">
            <?php
                CreateOption("tipo",1,"Vacaciones");
                CreateOption("tipo",2,"Enfermedad común");
                CreateOption("tipo",3,"Baja laboral");
                CreateOption("tipo",4,"Permiso maternidad/paternidad");
                CreateOption("tipo",5,"Permiso nacimiento/fallecimiento");
                CreateOption("tipo",6,"Permiso por matrimonio");
                CreateOption("tipo",7,"Permiso NO retribuido");
                CreateOption("tipo",8,"Permiso por traslado vivienda");
                CreateOption("tipo",10,"Horas sindicales");
            ?>
        </select>            
        <input type="submit" value="BUSCAR">
    </form>

    <?php         
        include_once("../Controlador/leervacaciones.php");
    ?>    

    <div class="item">
        <a class="boton" href="../indexPersonal.php">ATRÁS</a>            
    </div>    
    
    
</body>
</html>
