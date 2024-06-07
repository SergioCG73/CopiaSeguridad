<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <title>Cargas y descargas</title>
</head>
<body>
    <div class="container">
        <header>CARGAS/DESCARGAS</header>
        <p></p>

        <div class="fila">
            <form name="Registrar" id="Registrar" method="post" action="../Actions/registrar.php" >
                <label>Fecha:</label><input name="fechainicio" type="date" class="fecha" required>

                <table style="width:100%">
                    <tr>
                        <th width="25%"></th>
                        <th class="cargas" width="25%">CARGAS</th>
                        <th class="descargas" width="25%">DESCARGAS</th>
                    </tr>
                    <tr>
                        <td>Ácido HCL</td>
                        <td><input name="cargaHCL" type="number" min="0" max="10" step="0.5" value="0">
                        <td><input name="descargaHCL" type="number" min="0" max="10" value="0">
                    </tr>    
                    <tr>
                        <td>Policloruro</td>
                        <td><input name="cargaP18" type="number" min="0" max="10" step="0.5" value="0"></td>
                        <td><input name="descargaP18" type="number" min="0" max="5" value="0"></td>                          
                    </tr>                    
                    <tr>
                        <td>Sulfato Alumina</td>
                        <td><input name="cargaSulfato" type="number" min="0" max="5" step="0.5" value="0">
                        <td><input name="descargaSulfato" type="number" min="0" max="5" value="0">
                    </tr>    
                    <tr>
                        <td>SulfaCID</td>
                        <td><input name="cargaS3" type="number" min="0" max="5" step="0.5" value="0">
                        <td><input name="descargaS3" type="number" min="0" max="5" value="0">
                    </tr>    
                    <tr>
                        <td>Férrico</td>
                        <td><input name="cargaFerrico" type="number" min="0" max="5" step="0.5" value="0">
                        <td><input name="descargaFerrico" type="number" min="0" max="3" value="0">
                    </tr>                        
                    <tr>
                        <td>HB10</td>
                        <td><input name="cargaHB10" type="number" min="0" max="5" step="0.5" value="0">
                        <td><input name="descargaHB10" type="number" min="0" max="5" value="0">
                    </tr>    
                    <tr>
                        <td>Hipoclorito</td>
                        <td><input name="cargaHipo" type="hidden" min="0" max="3" step="0.5" value="0">
                        <td><input name="descargaHipo" type="number" min="0" max="3" value="0">
                    </tr>  
                    <tr>
                        <td>Sosa</td>
                        <td><input name="cargaSosa" type="number" min="0" max="3" step="0.5" value="0">
                        <td><input name="descargaSosa" type="number" min="0" max="3" value="0">
                    </tr>    
                    <tr>
                        <td>Ácido sulfúrico</td>
                        <td><input name="cargaSulfurico" type="hidden" min="0" max="3" step="0.5" value="0">
                        <td><input name="descargaSulfurico" type="number" min="0" max="3" value="0">
                    </tr>                    
                </table>
                        <input name="producto" value="camiones" hidden>
            </form>

        <div class="flex-container">
            <input class="boton" type="button" value="Regresar" onclick="history.back()">
            <input class="boton" type="submit" value="Registrar" form="Registrar">
        </div>
    </div>    
</body>
</html>
