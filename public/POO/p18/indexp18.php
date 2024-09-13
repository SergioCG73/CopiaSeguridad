<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Buscador para fabricaciones de P18 con PHP, MYSQL y AJAX">
    <meta name="author" content="Sergio Cano González">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <title>Policloruro (P18)</title>
</head>
<body>    
    <header>Policloruro (P18)</header>
        <div class="botonera">
            <div class ="selector">
                <label class="etiqueta1">Mostrar</label>
                <select id ="mostrar" class="selector">
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="campo">
                <label class="etiqueta2">Buscar</label>
                <input type="search" id="busqueda" name="busqueda">
            </div>
            <div class="centro"></div>
            <div class="boton1">
                <input id="btnInicio" type="button" value="Inicio" class="boton">
            </div>
            <div class="boton2">
                <input id="btnNueva" type="button" value="Nueva Fabricación" class="boton">
            </div>
        </div>
    
    <section id="tabla_de_resultados">
        <table id="tabla">
            <thead>
                <th>Fab Nº</th>
                <th>Semana</th>
                <th>Reactor</th>
                <th>Fecha/Hora Inicio</th>
                <th>Peso Inicial</th>
                <th>Fecha/Hora Final</th>
                <th>Peso Final</th>
                <th>Duración</th>
                <th>Tiempo parado</th>
                <th>Notas</th>
                <th>Acciones</th>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
    </section>

    <section id="errorsContainer" class="errorsContainer"></section>
    <section id="Paginacion"></section>
</body>

<!--<script src="script.js"></script>-->
<script src="js/script_indexp18.js"></script>

</html>
