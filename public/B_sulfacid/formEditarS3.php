<?php 
    require("../Includes/miconexion.php");
    include("../Includes/comprobadordatos.php");

    $id = $_GET['id'];         
    $id=Str_replace(".","",$id);        
    $consulta ="SELECT * FROM sulfacid WHERE NumeroFabricacion = $id";        
    $resultado = mysqli_query($miconexion, $consulta) or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    extract($fila);    

    $fabricacionumero = $fila['NumeroFabricacion'];
    $fecha = $fila['Fecha'];
    $semana = $fila['Semana'];            
    $densidad = $fila['Densidad'];
    $riqueza = $fila['Riqueza'];
    $ph = $fila['ph'];    
    $volumen = $fila['Volumen'];
    $notas = $fila['Notas'];    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../Images/favicon.png"/>   
    <title>Editar SULFACID</title>      
</head>
<body>
    <header>EDITAR FABRICACIÓN SULFACID</header>

    <!--<form name="Editar" id="Editar" method="post" action="Actions/ActualizarS3.php">-->
    <form name="Editar" id="Editar" method="post" action="../Actions/actualizar.php?producto=sulfacid">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <p><label>Fabricación Número:</label for="txtFabricacionNumero">
                    <input type="text" name="txtFabricacionNumero"value="<?php echo $fila['NumeroFabricacion'];?>" readonly/></p> 
                    <p><label>Fecha:</label for="txtFecha">
                    <input type="date" name="txtFecha" min="2023-01-01" value="<?php echo $fila['Fecha']; ?>"/></p>
                    <p><label>Semana:</label for="txtSemana">
                    <input type="text" name="txtSemana" value="<?php echo $fila['Semana']; ?>" /></p>           
                    <p><label>Densidad:</label for="txtDensidad">
                    <input type="text" name="txtDensidad" value="<?php echo $fila['Densidad']; ?>"/></p>
                    <p><label>Riqueza:</label for="txtRiqueza">
                    <input type="text" name="txtRiqueza" value="<?php echo $fila['Riqueza']; ?>"/></p>
                    <p><label>Ph:</label for="txtPh">
                    <input type="text" name="txtPh" value="<?php echo $fila['ph'];?>"/></p>                                                                         
                    <p><lu><label>Volumen:</label for="txtVolumen">
                    <input type="text" name="txtVolumen" value="<?php echo $fila['Volumen']; ?>"/></p>
                </fieldset>
            </div>
            <div class="derecha">
                <fieldset>
                    <legend>Notas</legend>
                        <textarea name="txtNotas"><?php echo $fila['Notas']?></textarea>
                </fieldset>                
            </div>    
        </div>

        <div class="botonera">
            <div class="izquierda">
                <input class="botonS3" type="button" value="Regresar" form="Editar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonS3" type="submit" value="Actualizar" form="Editar">
            </div>
        </div>
    </form>    
</body>
</html>

