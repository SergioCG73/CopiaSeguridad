<?php 
include_once("../Controlador/leerasalariado.php");
include_once("../Modelo/CalcularAntiguedad.php");
include_once("../Modelo/CreateOption.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>EDITAR PERSONAL</title>
</head>
<body>
    <header>EDITAR EMPLEADO</header>
    <div name="container">
        <div name="datostrabajador" id="datostrabajador">
            <fieldset> <legend>DATOS DEL TRABAJADOR </legend>
            <form id="formulario" name="formulario" method="post" action="../Controlador/updateWorker.php"> 
                <label for="id">DNI: </label>
                <input type="text" id="dni" name="dni" value="<?php echo $DNI?>"/>
                <br>    
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $Nombre?>"/>
                <br>
                <label id="apellidos">Apellidos: </label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $Apellidos?>"/>        
                <br>
                <label>Puesto: </label>
                <select name="puesto" id="puesto">
                        <option value="" selected disabled>Seleccionar puesto</option>
                        <?php include_once("../Controlador/llenarselect.php"); ?>
                </select>

                <input type="hidden" id="valor" value="<?php echo $Id_Puesto?>"/>
                <script src="../Controlador/js/script.js"></script>            

                <br>
                <label class="encabezado">Fecha de alta</label>   
                <label class="encabezado">Fecha de baja</label> 
                <input type="submit" value="ACTUALIZAR">    
                <br><br>       
            </form>
            </fieldset>
        </div>
        <div id="datosantiguedad" name="datosantiguedad">
            <fieldset> <legend>ANTIGÜEDAD</legend>
                <br>
                <input type="date" name="fecha_alta" value="<?php echo $FechadeAlta_?>"/>  
                <input type="date" name="fecha_baja"value="<?php echo $FechadeBaja?>"/>                        
                <label>Antigüedad: <?php echo $Antiguedad?></label>
        </div>
            </fieldset>
    </div>
    <header>DÍAS NO TRABAJADOS</header>
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
                CreateOption("tipo",5,"Permiso fallecimiento");
                CreateOption("tipo",6,"Permiso por matrimonio");
                CreateOption("tipo",7,"Permiso NO retribuido");
                CreateOption("tipo",8,"Permiso por traslado vivienda");
                CreateOption("tipo",10,"Horas sindicales");
                CreateOption("tipo",100,"Todo");
            ?>
        </select>            
        <input type="submit" value="BUSCAR">
    </form>

    <?php include_once("../Controlador/leervacaciones.php"); ?>

    <div class="item">
        <a class="boton" href="../index.php">ATRÁS</a>            
    </div>

<!-- PARTE A BORRAR -->


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
