<?php 
    require("../Includes/miconexion.php");    

    $id = $_GET['id'];         
    $id = str_replace(".","",$id);    
    $consulta ="SELECT * FROM hb10 WHERE NumeroFabricacion = $id";
    $resultado = mysqli_query($miconexion, $consulta) or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    extract($fila);

    $fabricacionumero = $fila['NumeroFabricacion'];
    $fecha = $fila['Fecha'];
    $semana = $fila['Semana'];                
    $densidad = $fila['Densidad'];
    $riqueza = $fila['Riqueza'];
    $basicidad = $fila['Basicidad'];    
    $volumen = $fila['Volumen'];
    $notas = $fila['Notas'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../../Images/favicon.png"/>
    <title>EDITAR PRODUCCIÓN HB10</title>
</head>
<body>
    <header>EDITAR FABRICACIÓN HB10</header>

    <!--<form name="Editar" id="Editar" method="post" action="Actions/ActualizarHB.php">-->
    <form name="Editar" id="Editar" method="post" action="../Actions/actualizar.php?producto=hb10">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <legend>Datos fabricación</legend>
                        <p><label>Fabricación Número:</label for="txtFabricacionNumero">
                        <input type="text" name="txtFabricacionNumero" value="<?php echo $fila['NumeroFabricacion'];?>" readonly/></p>
                        <p><label>Fecha:</label for="txtFecha">
                        <input type="date" name="txtFecha" min="2023-01-01" value="<?php echo $fila['Fecha']; ?>" /></p>              
                        <p><label>Semana:</label for="txtSemana">
                        <input type="text" name="txtSemana" value="<?php echo $fila['Semana']; ?>" readonly /></p>                            
                        <p><label>Densidad:</label for="txtDensidad">
                        <input type="text" name="txtDensidad" value="<?php echo $fila['Densidad']; ?>"/></p>
                        <p><label>Riqueza:</label for="txtRiqueza">
                        <input type="text" name="txtRiqueza" value="<?php echo $fila['Riqueza']; ?>"/></p>     	                                               
                        <p><label>Basicidad:</label for="txtBasicidad">
                        <input type="text" name="txtBasicidad" value="<?php echo $fila['Basicidad']; ?>"/></p>
                        <p><label>Volumen:</label for="txtVolumen">
                        <input type="text" name="txtVolumen" value="<?php echo $fila['Volumen']; ?>"/> </lu></p>
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
                <input class="botonHB10" type="button" value="Regresar" form="Editar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonHB10" type="submit" value="Actualizar" form="Editar">
            </div>        
        </div>
</body>
</html>
