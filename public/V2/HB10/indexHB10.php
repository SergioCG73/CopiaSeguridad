<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Férrico con PHP, MYSQL y AJAX">
    <meta name="author" content="Sergio Cano González">
    <link href="css/style.css" rel="stylesheet" type="text/css">    
    <title>Alta Basicidad</title>
</head>
<body>    
    <header>
        <div class="main-container">
            <div class="container">
                <a href="#" class="logo">Alta Basicidad</a>
            </div>
        </div>
    </header>
    <div class="left-container">
        <div class="selector">
            <label>Mostrar: </label>
            <select id ="mostrar">
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
            </select>
        </div>

        <div class="buscador">
            <label for="busqueda">Buscar: </label>
            <input type="search" id="busqueda" name="busqueda">
        </div>
    </div>

    <div class="right-container">                    
        <input id="btnInicio" type="button" value="Inicio" class="btnInicio">
        <input id="btnNueva" type="button" value="Nueva Fabricación" class="btnNueva">
    </div>

    <section id="tabla_de_resultados">
        <table id="tabla">
            <thead>
                <th>Fab Nº</th>
                <th>Fecha</th>
                <th>Semana</th>                
                <th>Volumen</th>                
                <th>Densidad</th>
                <th>Riqueza</th>
                <th>Basicidad</th>
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

<script src="js/script_indexHB10.js"></script>

</html>
