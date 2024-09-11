<?php 
    require("Actions/CargarDatosEditar.php");
    require("../Includes/formatodatos.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../Images/favicon.png"/>
    <title>Editar P18</title>   
</head>
<body>       
    <header>EDITAR FABRICACIÓN P18</header>    
    <!--<form name="Editar" id="Editar" method="post" action="Actions/ActualizarP18.php?producto=p18">-->
    <form name="Editar" id="Editar" method="post" action="../Actions/actualizar.php?producto=p18">
        <div class="contenedor">
            <div class="izquierda">
                <fieldset>
                    <legend>DATOS FABRICACIÓN</legend>            
                        <p><lu><label>Fabricación Número:</label> <input type="text" name="txtFabricacionNumero" class="fab" value="<?php echo $fila['NumeroFabricacion'];?>" style="width:50px" readonly/> </lu><p>                                
                        <p><lu><label>Fecha/Hora Inicio:</label> <input type="datetime-local" name="txtFechaInicio" min="2024-01-01" max="2024-12-31" value="<?php echo $fila['Hora_Inicio']; ?>" /> </lu></p>
                        <p><lu><label>Peso Inicial:</label> <input type="text" name="txtPesoInicial" class="peso" value="<?php echo $fila['Peso_Inicial']; ?>" style="width:40px"/> </lu></p>
                        <p><lu><label>Fecha/Hora Final:</label> <input type="datetime-local" name="txtFechaFinal" min="2024-01-01" max="2024-12-31" value="<?php echo $fila['Hora_Finalizacion']; ?>" /> </lu></p>   
                        <p><lu><label>Reactor:</label> <input type="text" class="Reactor" name="txtReactor" value="<?php echo $fila['Reactor'];?>" style="width:50px"/></lu></p>
                        <p><lu><label>Peso Final:</label> <input type="text" name="txtPesoFinal" class="peso"value="<?php echo $fila['Peso_Final']; ?>" style="width:60px"/> </lu></p>               
                </fieldset>        
            </div>

            <div class="derecha">
                <fieldset>
                    <legend>NOTAS</legend>
                    <textarea name="txtNotasP18"><?php echo $fila['Notas']?></textarea>
                </fieldset>                
            </div>    
        </div>

        <div class="botonera">
            <div class="izquierda">
                <input class="botonP18" type="button" value="Regresar" form="Editar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonP18" type="submit" value="Actualizar" form="Editar">
            </div>
        </div>
    </form>
</body>
</html>