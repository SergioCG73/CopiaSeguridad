<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Buscador para fabricaciones de P18 con PHP, MYSQL y AJAX">
    <meta name="author" content="Sergio Cano González">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Policloruro</title>
</head>
<body>    
    <fieldset>                        
        <div class="contenedor">
            <div><label>Mostrar: </label></div>
            <div>
            <select id ="mostrar">
                <option value="2">2</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="8">8</option>
                <option value="10">10</option>               
                <option value="12">12</option>               
        </select>
        </div>
        <div><label>Buscar: </label></div>    
        <div><input type="search" id="busqueda" name="busqueda"></div>   
        </div>

        <div class="botonera">
            <input id="btnInicio" type="button" value="Inicio" class="boton">
            <input id="btnNueva" type="button" value="Nueva Fabricación" class="boton">
        </div>
    </fieldset>
    
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

<script src="script.js"></script>

</html>