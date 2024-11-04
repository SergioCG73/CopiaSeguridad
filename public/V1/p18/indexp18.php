<!DOCTYPE html>
<html lang="es">
<head>    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>P18</title>    
    <link href="css/style_index.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/png" href="../../Images/favicon.png"/>
    
</head>
<body>    

<div class="container">           
    <header>POLICLURO (P18)</header>     
    
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
                <th scope="col">Semana</th>
                <th scope="col">Reactor</th>
                <th scope="col">Fecha/Hora inicio</th>
                <th scope="col">Peso inicial</th>
                <th scope="col">Fecha/Hora final</th>                
                <th scope="col">Peso final</th>
                <th scope="col">Duración</th>
                <th scope="col">Tiempo parado</th>                    
                <th scope="col">Notas</th>
                <th scope="col">Modificar</th>
                <th scope="col">Borrar</th>
            </tr>    
        </thead>
       
        <tbody>                
            <?php                     
                $producto = "p18";
                include("../Actions/lectura.php"); 
            ?>       
        </tbody>
    <table>    
</div>
</body>
