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
    $sql = $conexion->query("SELECT id FROM filtrado ORDER BY id DESC LIMIT 1");
    $lastFiltrado = $sql->fetch();
    $lastFiltrado = $lastFiltrado['id'];
    $NextFiltrado = $lastFiltrado + 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style2.css" rel="stylesheet" type="text/css">
    <title>Agregar Filtrado</title>
</head>
<body>
    <header>     
        <a href="#" class="logo">Agregar Filtración</a>            
    </header>
    
    <div class="main-container">
        <div class="left-container">
            <fieldset class="agregar"><legend>DATOS FILTRACIÓN <span class="gris"><?php echo $NextFiltrado ?><span></legend> 
                <input type="text" id="Filtrado" value="<?php echo $NextFiltrado ?>" hidden>
                <p><label class="_100px">Fecha: </label><input type="date" name="Fecha" id="Fecha" required></p>
                <p><label class="_100px">Producciones: </label><input type="text" id="Producciones"></p>                
                <p><label class="_100px">Volumen M216: </label><input type="text" name="VolumenM216" id="VolumenM216" required></p>
                <p><label class="_100px">Volumen Agua: </label><input type="text" name="VolumenAgua" id="VolumenAgua"></p>
                <p><label class="_100px">Densidad: </label><input type="text" name="Densidad" id="Densidad"></p>
                <p><label class="_100px">Riqueza: </label><input type="text" name="Riqueza" id="Riqueza"></p>
                <p><label class="_100px">Basicidad: </label><input type="text" name="Basicidad" id="Basicidad"></p>
                <p><label class="_100px">Volumen Filtrado: </label><input type="text" name="VolumenFiltrado" id="VolumenFiltrado"></p>
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
