<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="images/favicon.png" rel="icon" type="image/png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Editar Fechas</title>
</head>
<body>        
    <?php
        $Id = $_GET['id'];
        $Fecha_Inicio = $_GET['fechainicio'];
        $Fecha_Inicio_formateada = $Fecha_Inicio;
        $Fecha_Inicio_formateada = date("m-d-Y");
        $Fecha_Fin = $_GET['fechafin'];
        $Fecha_Fin_formateada = $Fecha_Fin;
        $Fecha_Fin_formateada = date("m-d-Y");
        $Notas = $_GET['notas'];
        $Tipo = $_GET['tipo'];

        switch ($Tipo){
            case 1:
                $Textotipo = "Vacaciones";
            break;
            case 2:
                $Textotipo = "Enfermedad común";
            break;
            case 3:
                $Textotipo = "Baja laboral";
            break;
            case 4:
                $Textotipo = "Permiso maternidad/paternidad";
            break;
            case 5:
                $Textotipo = "Permiso nacimiento/fallecimiento/enfermedad grave familiar";
            break;
            case 6:
                $Textotipo = "Permiso por matrimonio";
            break;
            case 7:
                $Textotipo = "Permiso NO retribuido";
            break;
            case 8:
                $Textotipo = "Permiso por traslado vivienda";
            break;
            case 10:
                $Textotipo = "Horas sindicales";
            break;    
        }

        $DNI = $_GET['dni'];       
    ?>
    <header>EDITAR FECHAS NO TRABAJADAS</header>
    <form id="formulario" name="formulario" method="post"  action="../Controlador/updateDates.php?dni=$DNI">
        <label>Id Dia</label>
        <input name="id" type="text" value="<?php echo $Id ?>">
        <br>
        <label>Fecha Inicio: </label>
        <input name="fechainicio" type="text"  value="<?php echo $Fecha_Inicio_formateada ?>">
        <br>
        <label>Fecha Fin: </label>
        <input name="fechafin" type="text"  value="<?php echo $Fecha_Fin_formateada ?>">
        <br>
        <label>Notas: </label>
        <input name="notas" type="text" value="<?php echo $Notas ?>">
        <br><br>
        <label>Tipo: </label>
        <select name="tipo">
            <option value="#"><?php echo $Textotipo ?></option>
        </select>
        <input name="dni" type="hidden" value="<?php echo $DNI ?>">
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>