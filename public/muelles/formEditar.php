<?php
require ("../Includes/miconexion.php");

$Fecha = $_GET['Fecha'];

$Fecha = date("Y-m-d", strtotime($Fecha));

//$Fecha = $_REQUEST['Fecha'];    // Otra forma de captura el valor enviado desde el formulario.

$consulta = "SELECT * FROM camiones WHERE Fecha = '$Fecha'";

$resultado = mysqli_query ($miconexion, $consulta) 
                    or die("No se puede realizar la consulta:");

$fila = mysqli_fetch_array($resultado);
mysqli_data_seek($resultado, 0);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../Images/favicon.png"/>
    <title>EDITAR Cargas/Descargas</title>
</head>
<body>
    <header>EDITAR CARGAS/DESCARGAS</header>

    <!--<form name="Editar" id="Editar" method="post" action="../Actions/actualizar.php">-->
    <form name="Editar" id="Editar" method="post" action="../Actions/actualizar.php?producto=camiones">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <legend>Datos</legend>                        
                        <!--<p><label>Fecha:</label for="txtFecha">-->
                        <p><label>Fecha:</label for="Fecha">
                        <!--<input type="date" name="txtFecha" min="2023-01-01" value="<_?php echo $fila['Fecha']; ?>" /></p>-->
                        <input type="date" name="Fecha" min="2023-01-01" value="<?php echo $fila['Fecha']; ?>" readonly /></p>
                        <p><label>Semana:</label for="Semana">
                        <input type="text" name="Semana" value="<?php echo $fila['Semana']; ?>" readonly /></p>                            
                        <p><label>Cargas P18:</label for="CargaP18">
                        <input type="text" name="CargaP18" value="<?php echo $fila['CargasP18']; ?>"/></p>
                        <p><label>Descargas P18:</label for="DescargaP18">
                        <input type="text" name="DescargaP18" value="<?php echo $fila['DescargasP18']; ?>"/></p>     	                                               
                        <p><label>Cargas Sulfato:</label for="CargaSulfato">
                        <input type="text" name="CargaSulfato" value="<?php echo $fila['CargasSulfato']; ?>"/></p>
                        <p><label>Descargas Sulfato:</label for="DescargasSulfato">
                        <input type="text" name="DescargasSulfato" value="<?php echo $fila['DescargasSulfato']; ?>"/> </lu></p>
                        <p><label>Cargas HCL:</label for="CargaHCL">
                        <input type="text" name="CargaHCL" value="<?php echo $fila['CargasHCL']; ?>"/></p>
                        <p><label>Descargas HCL:</label for="DescargaHCL">
                        <input type="text" name="DescargasHCL" value="<?php echo $fila['DescargasHCL']; ?>"/> </lu></p>
                        <p><label>Cargas HB10:</label for="CargaHB10">
                        <input type="text" name="CargaHB10" value="<?php echo $fila['CargasHB10']; ?>"/></p>
                        <p><label>Descargas HB10:</label for="DescargaHB10">
                        <input type="text" name="DescargasHB10" value="<?php echo $fila['DescargasHB10']; ?>"/> </lu></p>
                        <p><label>Cargas SulfaCid:</label for="CargaS3">
                        <input type="text" name="CargaS3" value="<?php echo $fila['CargasS3']; ?>"/></p>
                        <p><label>Descargas SulfaCid:</label for="DescargaS3">
                        <input type="text" name="DescargaS3" value="<?php echo $fila['DescargasS3']; ?>"/> </lu></p>
                        <p><label>Cargas Férrico:</label for="CargaFerrico">
                        <input type="text" name="CargaFerrico" value="<?php echo $fila['CargasFerrico']; ?>"/></p>
                        <p><label>Descargas Férrico:</label for="DescargaFerrico">
                        <input type="text" name="DescargaFerrico" value="<?php echo $fila['DescargasFerrico']; ?>"/> </lu></p>
                        <p><label>Cargas Sosa:</label for="CargaSosa">
                        <input type="text" name="CargaSosa" value="<?php echo $fila['CargasSosa']; ?>"/></p>
                        <p><label>Descargas Sosa:</label for="DescargaSosa">
                        <input type="text" name="DescargaSosa" value="<?php echo $fila['DescargasSosa']; ?>"/> </lu></p>
                        <p><label>Descargas Sulfúrico:</label for="DescargaSulfurico">
                        <input type="text" name="DescargaSulfurico" value="<?php echo $fila['DescargasSulfurico']; ?>"/> </lu></p>
                        <p><label>Descargas Hipoclorito:</label for="DescargaHipo">
                        <input type="text" name="DescargaHipo" value="<?php echo $fila['DescargaHipo']; ?>"/> </lu></p>                        
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