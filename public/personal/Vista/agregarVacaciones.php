<?php       
    include_once("../Controlador/readWorker.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="images/favicon.png" rel="icon" type="image/png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Absentismo</title>
</head>
<body>
<form id="formulario" name="formulario" method="post" action="../Controlador/insertarvacaciones.php">
    <h1><label class="nombreapellidos"> <?php echo $Apellidos .', ' .$Nombre ?> </label></h1>
    <br>
    <input type="hidden" name="dni" value="<?php echo $DNI ?>">        
    <label>Fechas</label>        
    <input type="date" name="fecha_inicio" required>
    <input type="date" name="fecha_final">    
    <br><br>
    <label>Tipo </label>
    <select name="tipo" id="tipo">
    <?php
                include_once("../Controlador/filling_tipos.php");     
    ?>
    </select>
    <br><br>
    <label>Notas</label>
    <input type="textarea" name="notas">
    <br>    
    <input type="submit" value="Agregar" class="boton">

   
</form>
<div class="item">
    <a class="boton" href="../indexPersonal.php">INICIO</a>            
</div>
    
</body>
</html>