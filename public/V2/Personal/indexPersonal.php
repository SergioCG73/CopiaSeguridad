<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta name="description" content="Personal con PHP, MYSQL y AJAX">
    <meta name="author" content="Sergio Cano González"> 
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Index Personal</title>
</head>
<body>
    <header>GESTIÓN DE PERSONAL</header>
    <div class="item">
        <a id="btnInicio" class="boton" href="../../portada.html">Ir a portada</a>
    </div>
    <br>
    <div class="item">
        <a id="btnNuevo" class="boton" href="Vista/addPersonal.php">Agregar nuevo empleado</a>            
    </div>    

    <div class="selector">
            <label>Mostrar: </label>
            <select id ="selector">
                    <option value="Empleados">Empleados</option>
                    <option value="Exempleados">Ex-Empleados</option>
                    <option value="Todos">Todos</option>                    
            </select>
    </div>    

    <div class="buscador">
            <label for="busqueda">Buscar: </label>
            <input type="search" id="busqueda" name="busqueda">
    </div>
    <br>   
    <section id="tabla_de_resultados">
        <table id="tabla">
            <thead>
                <th>DNI</th>
                <th>Nombre</th>                
                <th>Apellidos</th>
                <th>Puesto</th>                
                <th>Fecha Contratación</th>
                <th>Acciones</th>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
    </section>
    
    <section id="errorsContainer" class="errorsContainer"></section>
    <section id="Paginacion"></section>
</body>

    <script src="js/script_indexPersonal.js"></script>
</html>
