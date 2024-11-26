<?php
    function miErrorHandler($errno, $errstr, $errfile, $errline) {
        
        if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING
            echo "<script>alert('Error: Sergio el archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
        }
            
        return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
    }
        
    set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado       
    require_once("../../miconexion.php"); // Intentar incluir el archivo
    restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación
    $sql = $conexion->query("SELECT NumeroFabricacion FROM sulfacid ORDER BY NumeroFabricacion DESC LIMIT 1");
    $lastProduction = $sql->fetch();
    $lastProduction = $lastProduction['NumeroFabricacion'];
    $NextProduction = $lastProduction + 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sulfacid con PHP, MYSQL y AJAX">
    <meta name="author" content="Sergio Cano González">
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <link href="css/style2.css" rel="stylesheet" type="text/css">
    <title>Agregar Sulfacid</title>
</head>
<body>
    <header>     
        <a href="#" class="logo">Agregar fabricación Sulfacid</a>            
    </header>
    
    <div class="main-container">
        <div class="left-container">
            <fieldset class="agregar"><legend>DATOS FABRICACIÓN</legend> 
                <p><label class="_100px">Fabricación nº: </label><input type="text" value="<?php echo $NextProduction; ?>" id="Fabricacion" readonly class="gris"></p>
                <!--<p><label class="_100px">Fecha: </label><input type="datetime-local" name="Fecha" id="Fecha" required></p>-->
                <p><label class="_100px">Fecha: </label><input type="date" name="Fecha" id="Fecha" required></p>
                <p><label class="_100px">Volumen: </label><input type="text" name="Volumen" id="Volumen" required></p>                
                <p><label class="_100px">Densidad: </label><input type="text" name="Densidad" id="Densidad"></p>
                <p><label class="_100px">Riqueza: </label><input type="text" name="Riqueza" id="Riqueza"></p>
                <p><label class="_100px">Ph: </label><input type="text" name="Ph" id="Ph"></p>
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
            <input type="button" value="Atrás" id="btnRegresar" class="btnAgregar">
        </div>
        <div class="derecha">
            <input type="button" value="Agregar" id="btnAgregar" class="btnAgregar">
        </div>
    </div>

    <script src="js/script_agregar.js"></script>
</body>
</html>
