<!DOCTYPE html>
<html lang="es">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="../css/Buscador/estilobuscador.css" rel="stylesheet" type="text/css" float="left"/>  
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <title>Buscador</title>
</head>
<body>
<div class="container">
    <!--<div class="fila">-->
        <header>BUSCADOR DE PRODUCCIONES POR FECHAS </header>
    <!--</div>-->
    <fieldset><legend>Datos de búsqueda </legend>
        <form name="Buscador" method="post" action="encabezadostabla.php" target="_blank" id="formulario">                        
            <table>
                <thead>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Producto</th>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" name="desde" min="2022-01-01" id="desde" required></td>
                        <td><input type="date" name="hasta" id="hasta" required></td>
                        <td>
                        <select name="select" id="producto">
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
            <!--<b>Fecha inicial:</b><input type="date" name="desde" min="2022-01-01" id="desde" required><br><br>
            <b>Fecha final  :</b><input type="date" name="hasta" id="hasta" required><br>
            <p></p>
            <label>Producto:</label>
            <select name="select" id="producto">
                <option value="p18">P18</option>
                <option value="sulfato">Sulfato Alumina</option>         
                <option value="ferrico">Férrico</option>         
                <option value="hb10">HB10</option>         
                <option value="sulfacid">SulfaCID</option>         
            </select>
            <p></p>-->
            <input type ="button" name="Regresar" class="boton" value="Regresar" form = "Buscador" onclick="history.back()">            
            <input name="submit" class="boton" type="submit" value="Buscar" onclick="validarFechas()">            
        </form>  
    </fieldset>

    <div id="resultado">MOSTRAR DATOS...

        <input type ="text" value ="<?php echo $desde ?>">
        <input type ="text" value ="<?php echo $hasta ?>">
        <input type ="text" value ="<?php echo $producto ?>">

    </div>

    <!--Validar que desde es menor que hasta -->
    <script>
        function validarFechas(){            
           var desde = document.getElementById("desde").value;
           var hasta = document.getElementById("hasta").value;    
           var producto = document.getElementById("producto").value;           

           desde_js = new Date(desde);
           hasta_js = new Date(hasta);
           dia = desde_js.getDay();              
           
           if (hasta_js < desde_js){
            event.preventDefault();
            alert("HASTA debe ser mayor que DESDE");
            windows.location.href = winndows.location.href;
           }

           if (dia == 1){          //Si desde es lunes...        
                document.write("");
                desde_js = desde_js.setDate(desde_js.getDate()-1);            
                desde_js = new Date(desde_js);
                desde = desde_js.toISOString().split("T")[0];   
                window.location.href = "encabezadostabla.php?desde="+desde + "&producto="+producto + "&hasta="+hasta;
           }
           else{
                document.write("");                
                window.location.href = "encabezadostabla.php?desde="+desde + "&producto="+producto + "&hasta="+hasta;                
           }
        }            
    </script>
</div> 

</body>
</html>