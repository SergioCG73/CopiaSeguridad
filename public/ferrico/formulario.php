<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../Images/favicon.png"/>
    <title>REGISTRO PRODUCCIONES FÉRRICO</title>
</head>
<body>
    <header>REGISTRAR FABRICACIÓN FÉRRICO</header>

    <form name="Registrar" id="Registrar" method="post" action="../Actions/registrar.php">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <legend>Datos fabricación</legend>                        
                        <p><lu><label>Fecha:</label> <input type="date" name="fechainicio" min="2023-01-01" required/></lu></p>
                        <p><lu><label>Volumen inicial:</label> <input type="text" name="volumeninicial" /></lu></p>     	            
                        <p><lu><label>Volumen final:</label> <input type="text" name="volumenfinal" /></lu></p>                                  
                        <p><lu><label>Densidad:</label> <input type="text" name="densidad" /></lu></p>     	                    
                        <p><lu><label>Riqueza:</label> <input type="text" name="riqueza" /></lu></p>     	                    
                        <p><lu><label>Ácido libre:</label> <input type="text" name="acidolibre" /></lu></p>                                
                        <input name="producto" type="text" value="ferrico" hidden>
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
                <input class="botonFerrico" type="button" value="Regresar" form="Registrar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonFerrico" type="submit" value="Registrar" form="Registrar">
            </div>
        </div>
    </form>    
</body>
</html>
