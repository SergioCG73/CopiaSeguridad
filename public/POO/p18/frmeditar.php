<?php

function miErrorHandler($errno, $errstr, $errfile, $errline) { // Definir una función para manejar errores     
    if ($errno === E_WARNING && strpos($errstr, 'require_once') !== false) { // Verifica si el error es del tipo E_WARNING
        echo "<script>alert('Error: El archivo requerido no se ha encontrado.');</script>"; // Mostrar una alerta o mensaje personalizado
    }
    
    return false; // Retornar false para permitir que el manejador de errores predeterminado siga funcionando
}

set_error_handler("miErrorHandler"); // Establecer el manejador de errores personalizado
require_once("miconexion.php"); // Intentar incluir el archivo
restore_error_handler(); // Restaurar el manejador de errores predeterminado después de la operación

$NumeroFabricacion = $_GET['id'];
$reactor = $_GET['reactor'];
$horaInicio = $_GET['Fecha_Inicio'];
$pesoInicial = $_GET['Peso_Inicial'];
$horaFinal = $_GET['Fecha_Final'];
$pesoFinal = $_GET['Peso_Final'];
$notas = $_GET['Notas'];
//print_r($_GET);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulario para editar fabricaciones de P18 con PHP y HTML">    
    <meta name="author" content="Sergio Cano González">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/png" href="images/favicon.png"/>  
      
    <title>Document</title>
</head>
<body>
    <header>EDITAR FABRICACIÓN P18</header>
    <div class="main-container">
        <div class="container-left">
            <fieldset class="datosp18"><legend>DATOS FABRICACIÓN <span><?php echo $NumeroFabricacion?></span></legend>
            
            <!-- Se oculta porque el nº fabricación ya aparece en el legend, pero hace falta para pasárselo al js-->
            <input type="text" name="NumeroFabricacion" id="NumeroFabricacion" class="fab" value="<?php echo $NumeroFabricacion; ?>" hidden> 
            
            <p>
                <lu>
                    <label class="editar">Reactor: </label>                    
                    <select name="Reactor" id="Reactor" data-initial-value="<?php echo $reactor; ?>">
                        <option value="R200" <?php if ($reactor == 'R200') echo 'selected'; ?>>R200</option>
                        <option value="R201" <?php if ($reactor == 'R201') echo 'selected'; ?>>R201</option>
                    </select>                   
                </lu>
            </p>

            <P>
                <lu>
                    <label class="editar">Fecha/Hora Inicio: </label>
                    <!--<input type="datetime-local" name="FechaInicio" min="2024-01-01" id="FechaInicial" value="<_?php echo $horaInicio?>">-->
                    <input type="datetime-local" name="FechaInicio" min="2024-01-01" id="FechaInicial" value ="<?php echo $horaInicio?>" data-initial-value="<?php echo $horaInicio?>">
                </lu>
            </P>
            <p>
                <lu>
                    <label class="editar">Peso Inicial: </label>
                    <input type="text" name="PesoInicial" class="peso" id="PesoInicial" value="<?php echo $pesoInicial?>">
                </lu>
            </p>
            <P>
                <lu>
                    <label class="editar">Fecha/Hora Final: </label>
                    <input type="datetime-local" name="FechaFinal" min="2024-01-01" id="FechaFinal" value="<?php echo $horaFinal?>" data-initial-value="<?php echo $horaFinal?>">
                </lu>
            </P>
            <p>
                <lu>
                    <label class="editar">Peso Final: </label>
                    <input type="text" name="PesoFinal" class="peso" id="PesoFinal" value="<?php echo $pesoFinal ?>">
                </lu>
            </p>
            </fieldset>
        </div>
        <div class="container-right">
            <fieldset class="notasp18"><legend>NOTAS</legend>
                <textarea name= "notas" id="Notas"><?php echo $notas ?></textarea>
            </fieldset>
        </div>
    </div>    
    <div class="botonera" id="botonera">
        <div class="botonera_left" id="botonera_left">
            <input type="button" class="boton" id="Atras" value="Atrás">
        </div>
        <div class="botonera_right" id="botonera_right">
            <input type="button" class="boton" id="Actualizar" value="Actualizar">
        </div>
    </div>
    <script src="js/script_editar.js"></script>
</body>
</html>