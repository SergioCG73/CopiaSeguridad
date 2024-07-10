<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../personal/Vista/css/style.css" rel="stylesheet" type="text/css">
    <!--Evitar lectura caché -->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!----------------------------------------------->
    <title>Buscador</title>        
</head>
<body>
    <header>BUSCADOR DE FABRICACIONES </header>
    <a class="boton" href="../portada.html">Ir a portada</a><br><br><br>    
    <form name="formulario" id="formulario" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <fieldset><legend>DATOS DE BÚSQUEDA</legend>
        <table>
            <thead>
                <tr>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Producto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="date" name="fechainicial" id="fechainicial"></td>
                    <td><input type="date" name="fechafinal" id="fechafinal"></td>
                    <td>
                        <select name="producto" id="producto">
                            <option value="p18">P18</option>
                            <option value="sulfato">Sulfato Alumina</option>
                            <option value="ferrico">Férrico</option>
                            <option value="hb10">HB10</option>
                            <option value="sulfacid">SulfaCID</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type ="submit" name="ENVIAR">            
    </fieldset>
    </form>
    
    <?php include_once("../buscador/Controladores/readDataBase.php") ?>

    <input type="text" id="valorproducto" value="<?php echo $producto ?>" >
    <input type="text" id="valorfechainicial" value="<?php echo $fechainicial ?>" >
    <input type="text" id="valorfechafinal" value="<?php echo $fechafinal ?>" >    
    <script src="../js/script.js"></script>
</body>
</html>