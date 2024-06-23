<?php include_once("../Modelo/CreateOption.php"); ?>
<script src="../Controlador/js/script_tipos.js"></script>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Editar Fechas</title>
</head>
<body>            
    <?php
        $Id = $_GET['id'];        
        $Fecha_Inicio = $_GET['fechainicio'];        
        $Fecha_Fin = $_GET['fechafin'];
        $Fecha_Inicio_Mostrar = date("d-m-Y", strtotime($Fecha_Fin));
        $Fecha_Fin_Mostrar = date("d-m-Y", strtotime($Fecha_Fin));        
        $Notas = $_GET['notas'];
        $Tipo = $_GET['tipo'];
        $DNI = $_GET['dni'];
    ?>
    <script>
        function update(){		
                document.formulario.action="../Controlador/updateDates.php";
                document.formulario.submit();
        }

        function deleteDate(){		
            document.formulario.action="../Controlador/deleteDate.php";
                document.formulario.submit();
        }
    </script>

    <header>EDITAR FECHAS NO TRABAJADAS</header>
    <form id="formulario" name="formulario" method="post" action="../Controlador/updateDates.php?dni=$DNI">
        <table>
            <thead>
                <tr>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Tipo</th>
                    <th>Notas</th>
                    <th>Actualizar</th>
                    <th>Borrar</th>
                </tr>                            
            </thead>
            <tbody>
                <tr>
                    <td><input name="fechainicio" type="date"  value="<?php echo $Fecha_Inicio ?>"></td>
                    <td><input name="fechafin" type="date"  value="<?php echo $Fecha_Fin ?>"></td>
                    <td>
                        <select name="tipo" id="tipo">
                            <?php include_once("../Controlador/filling_tipos.php"); ?>                           
                        </select>
                        <input name="valor" id="valor" type="hidden" value="<?php echo $Tipo ?>">                        
                    </td>
                    <td>
                        <textarea name="notas" rows="5" cols="30"><?php echo $Notas ?></textarea>
                    </td>                    
                    <td>
                        <input type="image" name="update" src="images/update_grande.png" onclick="update($Id)"/>
                    </td>
                    <td>                        
                        <input type="image" name="delete" src="images/basura_grande.png"onclick="deleteDate()"/>                        
                    </td>
                </tr>
            </tbody>
        </table>            
            <input name="id" type="hidden" value="<?php echo $Id ?>">
            <input name="dni" type="hidden" value="<?php echo $DNI ?>">
            <input name="valor" id="valor" type="hidden" value="<?php echo $Tipo ?>">       
    </form>        
</body>
</html>