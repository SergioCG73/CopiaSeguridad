<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">    
    <link href="images/favicon.png" rel="icon" type="image/png" />
    <title>INSERTAR TRABAJADOR</title>
</head>
<body>
    <header>INSERTAR NUEVO TRABAJADOR</header>
    <form id="formulario" action="../Controlador/insertarasalariado.php" method="post">
        <label for="dni">DNI: </label>
        <input type="text" id="dni" name="dni" required>        
        <br>
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellidos" >Apellidos: </label>
        <input type="text" id="apellidos" name="apellidos" required>
        <br>
        <label>Fecha de Alta: </label>
        <input type="date" name="fecha_alta">
        <br>
        <label>Puesto de trabajo: </label>        
        <select name="puesto" id="puesto" required>
            <option value="" selected disabled>Seleccionar puesto</option>
            <?php include_once("../Controlador/llenarselect.php"); ?>
        </select>        
        <br>        
        
    </form>
        
    <br>    
    <div class="item">
        <input form="formulario" type="submit" value="Enviar" class="botones">
        <a class="boton" href="../index.php">REGRESAR</a>            
    </div> 
    
        
</body>
</html>