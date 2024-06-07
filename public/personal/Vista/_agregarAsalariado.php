<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR ASALARIADO</title>
</head>
<body>
    <header>REGISTRO DE ASALARIADOS </header>
    
    <form action="insertarasalariado.php" method="post">
        <label>DNI: </label>
        <input type="text" name="dni" required>
        <br>        
        <label>Nombre: </label>
        <input type="text" name="nombre" required>
        <br>
        <label>Apellidos: </label>
        <input type="text" name="apellidos" required>
        <br>
        <label>Fecha de Alta: </label>
        <input type="date" name="fecha_alta">
        <br>
        <label>Puesto de trabajo: </label>
        <select name="puesto" id="puesto">
            <?php include_once("llenarselect.php"); ?>
        </select>
        <br><br>        
        <label>Periodo vacacional</label>
        <input type="date" name="fecha_inicio">        
        <input type="date" name="fecha_final">
        <br>
        <input type="submit" value="Enviar">
    </form>    
</body>
</html>