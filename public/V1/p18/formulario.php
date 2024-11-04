<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../../Images/favicon.png"/>
    <title>Registro de PRODUCCIONES de P18</title>
</head>
<body>
    <header>REGISTRAR FABRICACIÓN POLICLURO (P18)</header>
    
    <form name="Registrar" id="Registrar" method="post" action="../Actions/registrar.php">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <legend>DATOS FABRICACIÓN</legend>                                                
                        <p><label>Fecha/Hora Inicio: </label> <input type="datetime-local" name="fechainicio" min="2023-01-01" required/></p>
                        <label>Reactor:</label>                            
                            <select name="reactor">
                                <option value="R200">R200</option>
                                <option value="R201">R201</option>    
                            </select>                                                    
                        <p><label>Peso Inicial:</label> <input type="text" name="pesoinicial" class="peso"/></p>                        
                        <p><lu><label>Fecha/Hora Final:</label> <input type="datetime-local" name="fechafinal" min="2023-01-01"/></lu></p>                        
                        <p><lu><label>Peso Final:</label> <input type="text" name="pesofinal" class="peso"/></lu></p>
                        <input name="producto" type="text" value="p18" hidden>
                </fieldset>                                
            </div>
            <div class="derecha">
                <fieldset>
                    <legend>NOTAS</legend>
                    <textarea name="notas"></textarea>
                </fieldset>                
            </div>    
        </div>

        <div class="botonera">
            <div class="izquierda">
                <input class="botonP18" type="button" value="Regresar" form="Registrar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonP18" type="submit" value="Registrar" form="Registrar">
            </div>
        </div>
    </form>    
</body>
</html>
