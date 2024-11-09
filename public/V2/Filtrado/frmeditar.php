<?php

function miErrorHandler($errno, $errstr, $errfile, $errline) { // Definir una función para manejar errores     
    if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING
        echo "<script>alert('Error: El archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
    }
    
    return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
}

set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado
require_once("../../miconexion.php"); // Intentar incluir el archivo
restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación

$Id = $_GET['id'];
$Fecha = $_GET['Fecha'];
$Producciones = $_GET['Producciones'];
$VolumenM216 = $_GET['VolumenM216'];
$VolumenAgua = $_GET['VolumenAgua'];
$VolumenFiltrado = $_GET['VolumenFiltrado'];
$Densidad = $_GET['Densidad'];
$Riqueza = $_GET['Riqueza'];
$Basicidad = $_GET['Basicidad'];
$Notas = $_GET['Notas'];

if (empty($VolumenM216)) {
    $VolumenM216 = "";
}

if (empty($VolumenAgua)) {
    $VolumenAgua = "NULL";
}

if ($Densidad == "null") {
    $Densidad = "";
}

if ($Riqueza == "null") {
    $Riqueza = "";
}

if ($Basicidad == "null") {
    $Basicidad = "";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulario para editar fabricaciones de P18 con PHP y HTML">
    <meta name="author" content="Sergio Cano González">
    <link href="css/style3.css" rel="stylesheet" type="text/css">
    <title>Editar fabricación</title>
</head>
<body>
    <header>
        <a href="#" class="logo">Editar filtración</a>  
    </header>

    <div class="main-container">
        <div class="left-container">
            <fieldset class="datosp18"><legend>DATOS FABRICACIÓN <span><?php echo $Id?></span> </legend>
                <!-- Se oculta porque el nº fabricación ya aparece en el legend, pero hace falta para pasárselo al js-->
                <input type="text" name="IdFiltracion" id="IdFiltracion" class="fab" value="<?php echo $Id; ?>" hidden>                           
                </p>
                <P>
                    <lu>
                        <label class="editar">Fecha: </label>
                        <input type="date" name="Fecha" min="2024-01-01" id="Fecha" value ="<?php echo $Fecha?>" data-initial-value="<?php echo $Fecha?>">
                    </lu>
                </P>
                <P>
                    <lu>
                        <label class="editar">Producciones: </label>                        
                        <input type="text" name="Producciones" id="Producciones" value ="<?php echo $Producciones?>" data-initial-value="<?php echo $Producciones?>">
                    </lu>
                </P>
                <p>
                    <lu>
                        <label class="editar">Volumen M216: </label>
                        <input type="text" name="VolumenM216" class="peso" id="VolumenM216" value="<?php echo $VolumenM216?>">
                    </lu>
                </p>
                <P>                    
                </P>
                <p>
                    <lu>
                        <label class="editar">Volumen Agua: </label>
                        <input type="text" name="VolumenAgua" class="peso" id="VolumenAgua" value="<?php echo $VolumenAgua?>">
                    </lu>
                </p>
                <p>
                    <lu>
                        <label class="editar">Densidad: </label>
                        <input type="text" name="Densidad" class="peso" id="Densidad" value="<?php echo $Densidad ?>">
                    </lu>
                </p>
                <p>
                    <lu>
                        <label class="editar">Riqueza: </label>
                        <input type="text" name="Riqueza" class="peso" id="Riqueza" value="<?php echo $Riqueza ?>">
                    </lu>
                </p>
                <p>
                    <lu>
                        <label class="editar">Basicidad: </label>
                        <input type="text" name="Basicidad" class="peso" id="Basicidad" value="<?php echo $Basicidad?>">
                    </lu>
                </p>
                <p>
                    <lu>
                        <label class="editar">Volumen Filtrado: </label>
                        <input type="text" name="VolumenFiltrado" class="peso" id="VolumenFiltrado" value="<?php echo $VolumenFiltrado?>">
                    </lu>
                </p>
            </fieldset>
        </div>

        <div class="right-container">
            <fieldset class="notasp18"><legend>NOTAS</legend>
                <textarea name= "Notas" id="Notas"><?php echo $Notas ?></textarea>
            </fieldset>
        </div>
    </div>    

    <div class="botonera" id="botonera">
        <div class="izquierda" id="botonera_left">
            <input type="button" class="boton" id="Atras" value="Atrás">
        </div>
        <div class="derecha" id="botonera_right">
            <input type="button" class="boton" id="Actualizar" value="Actualizar">
        </div>
    </div>

    <script src="js/script_editar.js"></script>
</body>
</html>
