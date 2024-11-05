<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../Images/favicon.png"/>
    <title>REGISTRO PRODUCCIONES SULFACID</title>
</head>
<body>
    <header>REGISTRAR FABRICACIÓN SULFACID</header>

    <form name="Registrar" id="Registrar" method="post" action="../Actions/registrar.php">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <legend>Datos fabricación</legend>                        
                        <p><lu><label>Fecha:</label> <input type="date" name="fechainicio" min="2023-01-01" required/></lu></p>
                        <p><lu><label>Densidad:</label> <input type="text" name="densidad"/></lu></p>
                        <p><lu><label>Riqueza:</label> <input type="text" name="riqueza"/></lu></p>        
                        <p><lu><label>ph:</label> <input type="text" name="ph"/></lu></p>
                        <p><lu><label>Volumen Final:</label> <input type="text" name="volumenfinal"/></lu></p>
                        <input name="producto" type="text" value="sulfacid" hidden/>
                </fieldset>                                
            </div>
            <div class="derecha">
                <fieldset>
                    <legend>Notas</legend>
                    <textarea name="notas"></textarea>
                </fieldset>                
            </div>    
        </div>

        <div class="botonera">
            <div class="izquierda">
                <input class="botonS3" type="button" value="Regresar" form="Registrar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonS3" type="submit" value="Registrar" form="Registrar">
            </div>
        </div>
    </form>    
</body>
</html>