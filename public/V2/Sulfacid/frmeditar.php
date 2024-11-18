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

$NumeroFabricacion = $_GET['id'];
$Fecha = $_GET['Fecha'];
$volumen = $_GET['Volumen'];
$densidad = $_GET['Densidad'];
$riqueza = $_GET['Riqueza'];
$ph = $_GET['Ph'];
$notas = $_GET['Notas'];

if ($densidad == "null") {
    $densidad = "";
}

if ($riqueza == "null") {
    $riqueza = "";
}

if ($ph == "null") {
    $ph = "";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulario para editar fabricaciones de Sulfacid con PHP y HTML">    
    <meta name="author" content="Sergio Cano González">
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <link href="css/style3.css" rel="stylesheet" type="text/css">    
    <title>Editar fabricación</title>
</head>
<body>
    <header>
        <a href="#" class="logo">Editar fabricación férrico</a>
    </header>

    <div class="main-container">
        <div class="left-container">
            <fieldset class="datosp18"><legend>DATOS FABRICACIÓN <span><?php echo $NumeroFabricacion?></span></legend>            
                <!-- Se oculta porque el nº fabricación ya aparece en el legend, pero hace falta para pasárselo al js-->
                <input type="text" name="NumeroFabricacion" id="NumeroFabricacion" class="fab" value="<?php echo $NumeroFabricacion; ?>" hidden>                            
                </p>
                <P>
                    <lu>
                        <label class="editar">Fecha: </label>
                        <input type="date" name="Fecha" min="2024-01-01" id="Fecha" value ="<?php echo $Fecha?>" data-initial-value="<?php echo $Fecha?>">
                    </lu>
                </P>
                <p>
                    <lu>
                        <label class="editar">Volumen: </label>
                        <input type="text" name="Volumen" class="peso" id="Volumen" value="<?php echo $volumen?>">
                    </lu>
                </p>
                <P>
                </P>
                <p>
                    <lu>
                        <label class="editar">Densidad: </label>
                        <input type="text" name="Densidad" class="peso" id="Densidad" value="<?php echo $densidad ?>">
                    </lu>
                </p>
                <p>
                    <lu>
                        <label class="editar">Riqueza: </label>
                        <input type="text" name="Riqueza" class="peso" id="Riqueza" value="<?php echo $riqueza ?>">
                    </lu>
                </p>
                <p>
                    <lu>
                        <label class="editar">Ácido libre: </label>
                        <input type="text" name="Ph" class="peso" id="Ph" value="<?php echo $ph ?>">
                    </lu>
                </p>
            </fieldset>
        </div>

        <div class="right-container">
            <fieldset class="notasp18"><legend>NOTAS</legend>
                <textarea name= "notas" id="Notas"><?php echo $notas ?></textarea>
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
