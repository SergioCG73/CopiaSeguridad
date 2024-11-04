
<?php 
     require("Actions/CargarDatosEditar.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../../Images/favicon.png"/>
    <title>EDITAR FILTRACIÓN P18</title>
</head>
<body>
    <header>EDITAR FILTRACIÓN P18 </header>
    
    <!--<form name="Editar" id="Editar" method="post" action="Actions/ActualizarFiltrado.php?producto=filtrado">-->
    <form name="Editar" id="Editar" method="post" action="../Actions/actualizar.php?producto=filtrado">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <legend>Datos fabricación</legend>
                        <p><label>Filtración id</label> 
                        <input type="text" name="id" value="<?php echo $id ?>"></p>
                        <p><label>Fecha</label>
                        <input type="date" name="fechainicio" value="<?php echo $Fecha?>" required></p>
                        <p><label>Semana</label>
                        <input type="text" name="semana" value="<?php echo $Semana?>"></p>
                        <p><label>Producciones</label>
                        <input type="text" name="producciones" value="<?php echo $Producciones?>"></p>
                        <p><label>Volumen M216</label>
                        <input type="text" name="volumeninicial" value="<?php echo $Volumen_M216?>"></p>
                        <p><label>Volumen agua</label>
                        <input type="text" name="agua" value="<?php echo $Volumen_Agua?>"></p>
                        <p><label>Densidad</label>
                        <input type="text" name="densidad" value="<?php echo $Densidad?>"></p>
                        <p><label>Riqueza</label>
                        <input type="text" name="riqueza" value="<?php echo $Riqueza?>"></p>
                        <p><label>Basicidad</label>
                        <input type="text" name="basicidad" value="<?php echo $Basicidad?>"></p>
                        <p><label>Volumen filtrado</label>
                        <input type="text" name="volumenfinal" value="<?php echo $Volumen_Filtrado?>"></p>                        
                        <input name="producto" type="text" value="filtrado" hidden>
                </fieldset>                                
            </div>
            <div class="derecha">
                <fieldset>
                    <legend>Notas</legend>                    
                    <textarea name="notas"><?php echo $fila['Notas']?></textarea>
                </fieldset>                
            </div>    
        </div>

        <div class="botonera">
            <div class="izquierda">
                <input class="botonFiltrado" type="button" value="Regresar" form="Editar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonFiltrado" type="submit" value="Actualizar" form="Editar">
            </div>
        </div>
    </form>
</body>
</html>
