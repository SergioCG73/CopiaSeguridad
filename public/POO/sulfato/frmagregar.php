<?php
    function miErrorHandler($errno, $errstr, $errfile, $errline) {
        
        if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING
            echo "<script>alert('Error: El archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
        }
            
        return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
    }
        
    set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado
        
    require_once("miconexion.php"); // Intentar incluir el archivo   
    
    restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación

    $sql = $conexion->query("SELECT NumeroFabricacion FROM sulfato ORDER BY NumeroFabricacion DESC LIMIT 1");

    $lastProduction = $sql->fetch();
    $lastProduction = $lastProduction['NumeroFabricacion'];
    $NextProduction = $lastProduction + 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style2.css" rel="stylesheet" type="text/css">
    <title>Agregar Sulfato</title>
</head>
<body>
    <header>     
        <a href="#" class="logo">Agregar fabricación Sulfato</a>            
    </header> 
    
    <div class="main-container">
        <div class="left-container">
            <fieldset class="agregar"><legend>DATOS FABRICACIÓN</legend> 
                <p><label class="_100px">Fabricación nº: </label><input type="text" value="<?php echo $NextProduction; ?>" id="Fabricacion" readonly class="gris"></p>
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

        <div class="right-container">
            <fieldset class="agregar"><legend>NOTAS</legend>
                <textarea name="Notas" id="Notas"></textarea> 
            </fieldset>
        </div>
    </div>
    
    <div class="botonera_agregar">
        <div class="izquierda">
            <input type="button" value="Portada" id="regresar" class="btnAgregar">
        </div>
        <div class="derecha">
            <input type="button" value="Agregar" id="boton" class="btnAgregar">
        </div>
    </div>

    <script src="js/script_agregar.js"></script>
</body>
</html>