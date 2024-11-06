<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_form.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/png" href="../Images/favicon.png"/>
    <title>Muelles</title>
</head>
<body>
    <div class="container">
        <header>CARGAS Y DESCARGAS</header>
    </div>

    <div class="item">
        <a class="boton" href="../../portada.html">INICIO</a>            
    </div>

    <div class="item">
        <a class="boton" href="formulario.php">NUEVO REGISTRO</a>            
    </div>
    
    <div class="formulario">
        <form name="Buscar" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">                        
            <label>Fecha: </label>
            <input type="date" id="campo" name="campo">
            <input name="submit" class="boton" type="submit" value="Buscar">            
        </form>
    </div>
        <tbody>                
            <?php                     
                $producto = "camiones";
                include("../Actions/lectura.php"); 
            ?>       
        </tbody>
    <table>
</body>
</html>