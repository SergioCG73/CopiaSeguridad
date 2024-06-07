<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../Images/favicon.png"/>
    <title>Registro de FILTRACIÓN de P18</title>
</head>
<body>
    <header>REGISTRAR FILTRACIÓN P18</header>

    <form name="Registrar" id="Registrar" method="post" action="../Actions/registrar.php">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <legend>Datos fabricación</legend>
                        <p hidden><label>Filtración id</label> <input type="text" name="id"></p>
                        <p><label>Fecha</label> <input type="date" name="fechainicio" required></p>
                        <p><label>Producciones</label> <input type="text" name="producciones" class="textolargo"></p>
                        <p><label>Volumen M216</label> <input type="text" name="volumeninicial" class="miles"></p>
                        <p><label>Volumen agua</label> <input type="text" name="agua" class="miles"></p>
                        <p><label>Densidad</label> <input type="text" name="densidad" class="decimal"></p>
                        <p><label>Riqueza</label> <input type="text" name="riqueza" class="decimal"></p>
                        <p><label>Basicidad</label> <input type="text" name="basicidad" class="decimal"></p>
                        <p><label>Volumen filtrado</label> <input type="text" name="volumenfinal" class="miles"></p>
                        <input name="producto" type="text" value="filtrado" hidden>
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
                <input class="botonFiltrado" type="button" value="Regresar" form="Registrar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonFiltrado" type="submit" value="Registrar" form="Registrar">
            </div>
        </div>
    </form>    
</body>
</html>