<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="views/img/favicon.png"/>    
    <title>Document</title>
</head>
<body>
    <h1>INTRODUCIR DATOS</h1>
    <input type="button" value="INICIAR FABRICACIÓN" id="btnIniciarFabricacion">
    <select id="slctProductos" hidden>
        <option value="">Cargando productos...</option>
    </select>    

    <div>
        <select id="slctEquipos" hidden>
            <option value="">Cargando equipos...</option>
        </select>
    </div>

    <div>
        <input type="button" value="NEXT" id="btnSiguiente" hidden>
        <input type="button" value="PREVIOUS" id="btnAnterior" hidden>

    </div>
</body>

<script src="views/js/script.js"></script>

</html>