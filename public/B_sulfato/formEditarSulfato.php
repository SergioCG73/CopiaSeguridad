<!--Fichero que SELECT la producción tecleada en el BUSCADOR para
    modificarla -->    

<?php 
    require("../Includes/miconexion.php");
    $id = $_GET['id'];  
    $id=Str_replace(".","",$id);       
    $consulta ="SELECT * FROM sulfato WHERE NumeroFabricacion = $id";        
    $resultado = mysqli_query($miconexion, $consulta);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);    

    $fabricacionumero = $fila['NumeroFabricacion'];
    $Hora_Inicio = $fila['Hora_Inicio'];
    $Peso_Inicial = $fila['Peso_Inicial'];
    $Hora_Finalizacion = $fila['Hora_Finalizacion'];
    $Peso_Final = $fila['Peso_Final'];
    $Duracion = $fila['Duracion'];
    $Parado = $fila['Tiempo_Parado'];
    $Reactor = $fila['Reactor'];
    $Notas = $fila['Notas'];

/*INICIO COMPROBADOR DATOS QUE LLEGAN DESDE FORMULARIO 
    echo "Fabricacion Número: $fabricacionumero <br>";
    echo "Reactor $Reactor <br>";
    echo "Fecha/Hora Inicio: $Hora_Inicio <br>";
    echo "Peso Incial: $Peso_Inicial <br>";
    echo "Fecha/Hora Final: $Hora_Finalizacion <br>";
    echo "Peso Final: $Peso_Final <br>";
    echo "Duración: $Duracion <br>";
    echo "Parado: $Parado <br>";
    echo "Notas: $Notas <br>";

    exit;
//fIN COMPROBADOR DATOS QUE LLEGAN DESDE FORMULARIO */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../Images/favicon.png"/>
    <title>ACTUALIZAR PRODUCCIÓN SULFATO</title>
</head>
<body>
    <header>EDITAR FABRICACIÓN SULFATO</header>

    <!--<form name="Editar" id="Editar" method="post" action="Actions/ActualizarSulfato.php">-->
    <form name="Editar" id="Editar" method="post" action="../Actions/actualizar.php?producto=sulfato">
        <div class="contenedor">         
            <div class="izquierda">
                <fieldset>
                    <legend>Datos fabricación</legend>        		
		                <label>Fabricación Número:</label for="txtFabricacionNumero"> <input type="text" name="txtFabricacionNumero" value="<?php echo $fila['NumeroFabricacion'];?>" style="width:50px" readonly/>
                        <p><label>Fecha/Hora Inicio:</label for="txtFechaInicio"> <input type="datetime-local" name="txtFechaInicio" min="2024-01-01" max="2024-12-31" value="<?php echo $fila['Hora_Inicio']; ?>" /></p>              
                        <p><label>Peso Inicial:</label for="txtPesoInicial"> <input type="text" name="txtPesoInicial" value="<?php echo $fila['Peso_Inicial']; ?>" style="width:40px"/></p>     	            
                        <p><label>Fecha/Hora Final:</label for="txtFechaFinal"> <input type="datetime-local" name="txtFechaFinal" min="2023-01-01" max="2023-12-31" value="<?php echo $fila['Hora_Finalizacion']; ?>" /></p>              
                        <p><label>Peso Final:</label for="txtPesoFinal"> <input type="text" name="txtPesoFinal" value="<?php echo $fila['Peso_Final']; ?>" style="width:60px"/></p>
                        <input type="hidden" id="txtReactor" name="txtReactor" value="<?php echo $fila['Reactor'];?>" style="width:50px"/></lu></p>
                        <p><label>Reactor:</label for="txtReactor">
                        <select id="reactores" name="Reactor">
                            <option value="R201">R201</option>
                            <option value="R202">R202</option>
                        </select>
                        <script src="../js/script.js"></script>
                </fieldset>
            </div>    
            <div class="derecha">
                <fieldset>
                    <legend>Notas</legend>                    
                    <textarea name="txtNotasSulfato"><?php echo $fila['Notas']?></textarea>
                </fieldset>                
            </div>    
        </div>

        <div class="botonera">
            <div class="izquierda">
                <input class="botonSulfato" type="button" value="Regresar" form="Editar" onclick="history.back()">
            </div>

            <div class="derecha">
                <input class="botonSulfato" type="submit" value="Actualizar" form="Editar" action="Actions/ActualizarSulfato.php">
            </div>
        </div>
    </form>  
</body>
</html>

