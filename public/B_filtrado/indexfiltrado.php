<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="css/style_index.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <title>Filtrado P18</title>
</head>
<body>
    <div class="container">        
        <header> FILTRACIÓN P18 </header>

        <div class="item">
            <a class="boton" href="../portada.html">INICIO</a>            
        </div>

        <div class="item">
            <a class="boton" href="formulario.php">NUEVA FILTRACIÓN</a>            
        </div>

        <div class="formulario">
            <form name="Buscar" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <label>Filtracion #: </label>
                <input type="text" id="campo" name="campo">
                <input type="submit" class="boton" name="submit" value="BUSCAR">
            </form>            
        </div>

        <table class="tabla">            
            <thead>
                <tr>
                    <th scope="col">Filtración id</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Semana</th>
                    <th scope="col">Producciones</th>
                    <th scope="col">Volumen M216</th>
                    <th scope="col">Volumen agua</th>
                    <th scope="col">Densidad</th>
                    <th scope="col">Riqueza</th>
                    <th scope="col">Basicidad</th>
                    <th scope="col">Volumen filtrado</th>
                    <th scope="col">Notas</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    </tr>
            </thead>

            <tbody>
                <?php            
                    $producto = "filtrado";
                    include("../Actions/lectura.php");
                ?>
            </tbody>            
        </table>
    </div>    
</body>
</html>