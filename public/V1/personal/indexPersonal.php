<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="Vista/images/favicon.png" rel="icon" type="image/png">
    <link href="Vista/css/style.css" rel="stylesheet" type="text/css">
    <title>Index Personal</title>
</head>
<body>
    <header>GESTIÓN DE PERSONAL</header>
    <div class="item">
        <a class="boton" href="../../portada.html">Ir a portada</a>            
    </div>
    <br>
    <div class="item">
        <a class="boton" href="Vista/addPersonal.php">Agregar nuevo empleado</a>            
    </div>    
    <br>   
        <?php include("Controlador/readWorker.php"); ?>
</body>
</html>
