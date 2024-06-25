<?php 
include_once("../Controlador/readWorker.php");
include_once("../Modelo/CalcularAntiguedad.php");
include_once("../Modelo/CreateOption.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="images/favicon.png" rel="icon" type="image/png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>EDITAR PERSONAL</title>
</head>
<body>
    <header>EDITAR EMPLEADO</header>
    <div name="container" class="container">
        <div name="datostrabajador" id="datostrabajador" class="datostrabajador">
            <fieldset> <legend>DATOS DEL TRABAJADOR</legend>
            <form id="formulario" name="formulario" method="post" action="../Controlador/updateWorker.php"> 
                <label for="id">DNI: </label>
                <input type="text" id="dni" name="dni" value="<?php echo $DNI?>"/>
                <br>    
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $Nombre?>"/>
                <br>
                <label for="apellidos" id="apellidos">Apellidos: </label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $Apellidos?>"/>        
                <br>
                <label>Puesto: </label>
                <select name="puesto" id="puesto">
                        <option value="" selected disabled>Seleccionar puesto</option>
                        <?php include_once("../Controlador/llenarselect.php"); ?>
                </select>

                <input type="hidden" id="valor" value="<?php echo $Id_Puesto?>"/>
                <input type="hidden" name="fecha_alta_oculto" value="<?php echo $FechadeAlta_formateada?>"/>
                <input type="hidden" name="fecha_baja_oculto" value="<?php echo $FechadeBaja_formateada?>"/>
                <script src="../Controlador/js/script.js"></script>            
            <div class="center">
                <input type="submit" value="ACTUALIZAR">
            </div>
            </fieldset>
        </div>
        <div id="datosantiguedad" name="datosantiguedad" class="datosantiguedad">
            <fieldset> <legend>ANTIGÜEDAD</legend>
                <table>
                    <thead>
                        <tr>
                            <th class="encabezado">Fecha de alta</th>
                            <th class="encabezado">Fecha de baja</th>
                            <th class="encabezado">Antigüedad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="date" name="fecha_alta" value="<?php echo $FechadeAlta_formateada?>"/></td>
                            <td><input type="date" name="fecha_baja" value="<?php echo $FechadeBaja_formateada?>"/></td>
                            <td><?php echo $Antiguedad?></td>
                        </tr>
                    </tbdody>                    
                </table>
        </div>
            </fieldset>
            </form>
    </div>
    <header>DÍAS NO TRABAJADOS</header>
    <form name="formulario" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <select name="año">
            <?php      
                $year = date("Y");
                if ($year > "2024"){
                    CreateOption("año",$year);
                    CreateOption("año",$year-1);
                    CreateOption("año",$year-2);
                }
                else
                {
                    CreateOption("año",$year);
                    CreateOption("año",$year-1);
                }                
            ?>            
        </select>

        <select name="tipo" id="tipo">        
            <?php
                //include_once("../Controlador/filling_tipos.php"); 
                CreateOption("tipo",1,"Vacaciones");
                CreateOption("tipo",2,"Enfermedad común");
                CreateOption("tipo",3,"Baja laboral");
                CreateOption("tipo",4,"Permiso maternidad/paternidad");
                CreateOption("tipo",5,"Permiso fallecimiento");
                CreateOption("tipo",6,"Permiso por matrimonio");
                CreateOption("tipo",7,"Permiso NO retribuido");
                CreateOption("tipo",8,"Permiso por traslado vivienda");
                CreateOption("tipo",9,"Permiso retribuido");
                CreateOption("tipo",10,"Horas sindicales");
                CreateOption("tipo",100,"Todo");
            ?>
        </select>                    
        <input type="submit" value="BUSCAR">        
    </form>
    
    <?php include_once("../Controlador/leervacaciones.php"); ?>
    <input type="text" id="valor" value="<?php echo $tipo;?>">    

    <div>
        <a class="boton" href="../indexPersonal.php">ATRÁS</a>            
    </div>    
</body>
</html>



