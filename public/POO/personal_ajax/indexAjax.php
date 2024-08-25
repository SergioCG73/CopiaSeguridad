<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Buscador en Tiempo Real</title>
</head>
<body>
    <h1>Buscador</h1>
    <div id="botonera">
        <input type ="button" value= "Portada">
        <input type ="button" value= "Agregar nuevo empleado">
    </div>
    
    <div id="cuadro busqueda">
        <input type="search" id="buscador" placeholder="Buscar productos...">
    </div>
    

    <div class="resultados" id="resultados">
    <div id="error"></div>
        <table id="tabla">
            <thead>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Departamento</th>
                <th>Fecha_Alta</th>
                <th>Ver/Actualizar</th>
                <th>Borrar</th>
                <th>Editar</th>
            </thead>
            <tbody id="cuerpo">
                
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>   
</body>
</html>
