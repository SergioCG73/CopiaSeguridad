<?php
    require_once("miconexion.php");
    $sql = $conexion->query("SELECT NumeroFabricacion FROM p18 ORDER BY NumeroFabricacion DESC LIMIT 1");

    $lastProduction = $sql->fetch();
    $lastProduction = $lastProduction['NumeroFabricacion'];
    $NextProduction = $lastProduction + 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <title>Agregar P18</title>
</head>
<body>
<header>Agregar fabricación P18</header>  
    <div class="contenedor">
        <div class="izquierda">
            <fieldset class="agregar"><legend>DATOS FABRICACIÓN</legend> 
            <p><label class="_100px">Fabricación nº: </label><input type="text" value="<?php echo $NextProduction; ?>" id="fabricacion" readonly class="gris"></p>
            <label class="_100px">Reactor: </label>
            <select id="Reactor">
                    <option value="R200">R200</option>
                    <option value="R201">R201</option>
            </select>
            <p><label class="_100px">Fecha/Hora Inicio: </label><input type="datetime-local" name="FechaInicio" id="FechaInicio" required></p>
            <p><label class="_100px">Peso Inicial: </label><input type="text" name="PesoInicial" id="PesoInicial" required></p>
            <p><label class="_100px">Fecha/Hora Final: </label><input type="datetime-local" name="FechaFinal" id="FechaFinal"></p>
            <p><label class="_100px">Peso Final: </label><input type="text" name="PesoFinal" id="PesoFinal"></p>
            </fieldset>
        </div>
        <div class="derecha">
            <fieldset class="agregar"><legend>NOTAS</legend>
                <textarea name="Notas" id="Notas"></textarea>
            </fieldset>
        </div>
    </div>
    
    <div class="botonera_agregar">
        <div class="izquierda">
            <input type="button" value="Atrás" id="regresar" class="boton_agregar">
        </div>
        <div class="derecha">
            <input type="button" value="Agregar" id="boton" class="boton_agregar">
        </div>
    </div>

    <script src="js/script_agregar.js"></script>    
</body>
</html>
