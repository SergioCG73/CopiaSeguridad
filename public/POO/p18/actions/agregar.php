<?php
    require_once("../miconexion.php");
    $sql = $conexion->query("SELECT NumeroFabricacion FROM p18 ORDER BY NumeroFabricacion DESC LIMIT 1");

    $lastProduction = $sql->fetch();
    $lastProduction = $lastProduction['NumeroFabricacion'];
    $NextProduction = $lastProduction + 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <title>Agregar P18</title>
</head>
<body>

    <header>Agregar fabricación P18</header>
   
    <div class="datos">
        <fieldset><legend>DATOS FABRICACIÓN <?php echo $NextProduction ?></legend>
            <label>Fabricación nº: </label>            
            <input type="text" value="<?php echo $NextProduction; ?>" id="fabricacion" readonly>
            <br>
            <label>Fecha/Hora Inicio: </label>
            <input type="datetime-local" name="FechaInicio" id="FechaInicio" required>   
            <br>
            <label>Fecha/Hora Final: </label>
            <input type="datetime-local" name="FechaFinal" id="FechaFinal">
            <br>
            <label>Reactor: </label>    
            <select id="Reactor">
                    <option value="R200">R200</option>
                    <option value="R201">R201</option>
            </select>
            <br>
            <label>Peso Inicial: </label>
            <input type="text" name="PesoInicial" id="PesoInicial" required>
            <br> 
            <label>Peso Final: </label>
            <input type="text" name="PesoFinal" id="PesoFinal">
            <br> 
            <label>Nº Fab: </label>    
        </fieldset>
    </div>

    <div class="notas">
        <fieldset><legend>NOTAS</legend>
            <textarea name="Notas" id="Notas"></textarea>        
        </fieldset>
    </div>

    
    <div class="botonera">    
        <input type="button" value="Regresar" id="regresar">
        <input type="button" value="Enviar" id="boton">
    </div>    
    
</body>
<script>
    document.addEventListener("DOMContentLoaded", () =>{
        const Reactor = document.getElementById("Reactor");
        const Fabricacion = document.getElementById("fabricacion").value;
        const FechaInicio = document.getElementById("FechaInicio");
        const FechaFinal = document.getElementById("FechaFinal"); 
        const PesoInicial = document.getElementById("PesoInicial");
        const PesoFinal = document.getElementById("PesoFinal");
        const Notas = document.getElementById("Notas");
        const Boton = document.getElementById("boton");        
        const Regresar = document.getElementById("regresar");

        Regresar.addEventListener("click", () => {
            window.location.href = "../indexp18.php";
        })

        Boton.addEventListener("click", () => {
            if (!FechaInicio.value) {
                    alert("Por favor, complete una fecha inicial.");
                    return;
            }

            if (!FechaFinal.value) {
                    FechaFinal.value = "2024-12-31T23:59"        
                    globalThis.fecha2 = FechaFinal.value;
            }

            if (!PesoInicial.value) {
                    alert("Por favor, complete un peso inicial.");
                    return;
            }

            if (!PesoFinal.value) {
                PesoFinal.value = null;
            }

            if (!Notas.value) {
                    Notas.value = null;                    
            }

            campos = new FormData();
            campos.append("FechaInicio", FechaInicio.value);
            campos.append("Reactor", Reactor.value);
            campos.append("NumFabricacion", Fabricacion);
            campos.append("FechaFinal", FechaFinal.value);
            campos.append("PesoInicial", PesoInicial.value);
            campos.append("PesoFinal", PesoFinal.value);
            campos.append("Notas", Notas.value);

            try{
                fetch("registrar.php", {
                    method: "POST",
                    body: campos                               
            })
            .then(response => response.json())
            .then(response => console.log(response))
            .then(data => {
                console.log(data); // Mostrar la respuesta en la consola
                alert("Fabricación añadida correctamente"); // Mostrar un mensaje de éxito
                window.location.href = "indexp18.php"; // Redirigir a otra página
            })
            
            } catch (error) {
                console.log(error);
            }
        });
    });

</script>
</html>