<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Férrico</title>    
    <link href="css/style_index.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/png" href="../../Images/favicon.png"/>
</head>
<body> 

<div class="container">           
    <header>CLORURO FÉRRICO</header>     
    
    <div class="item">
        <a class="boton" href="../../portada.html">INICIO</a>            
    </div>
        
    <div class="item">
        <a class="boton" href="formulario.php">NUEVA FABRICACIÓN</a>            
    </div>
    
    <div class="formulario">    
        <form name="Buscar" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">                        
            <label>Fabricación #: </label>
            <input type="text" id="campo" name="campo">
            <input name="submit" class="boton" type="submit" value="Buscar">            
        </form>                 
    </div> 
        
    <table class="tabla">
        <thead>     
            <tr>
                <th scope="col">Fab #</th>
                <th scope="col">Fecha</th>
                <th scope="col">Semana</th>                    
                <th scope="col">Volumen inicial</th>
                <th scope="col">Volumen final</th>
                <th scope="col">Densidad</th>
                <th scope="col">Riqueza</th>
                <th scope="col">Ácido Libre</th>                    
                <th scope="col">Notas</th>
                <th scope="col">Modificar</th>
                <th scope="col">Borrar</th>
            </tr>    
        </thead>
       
        <tbody>                
            <?php                     
                $producto = "ferrico";
                include("../Actions/lectura.php"); 
            ?>       
        </tbody>
    <table>    
</div>
</body>
</html>
