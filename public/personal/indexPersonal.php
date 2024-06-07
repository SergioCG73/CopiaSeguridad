<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>PERSONAL AQUACENIC IBÉRICA, SLU</header>
    <br>
    <div class="item">
        <a class="boton" href="../portada.html">INICIO</a>            
    </div>
    <br>
    <div class="item">
        <a class="boton" href="Vista/addPersonal.php">NUEVO</a>            
    </div>
    <br>
    <div class="formulario">    
        <form name="Buscar" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">                        
            <label>Nombre Empleado: </label>
            <input type="text" id="campo" name="campo">
            <input name="submit" class="boton" type="submit" value="Buscar">            
        </form>                 
    </div>
    <br>   
        <?php include("Controlador/leerasalariados.php"); ?>
</body>
</html>