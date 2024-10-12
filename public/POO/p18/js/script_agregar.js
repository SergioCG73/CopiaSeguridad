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

    Regresar.addEventListener("click", () =>{
        window.location.href = "_indexP18.html";
    });

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
            PesoFinal.value = "";
        }

        if (!Notas.value) {
                Notas.value = "";    //anterior Notas.value = "NULL";    
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
            fetch("actions/registrar.php", {
                method: "POST",
                body: campos                               
        })
        .then(response => response.json())
        .then(response => console.log(response))
        .then(data => {
            console.log(data); // Mostrar la respuesta en la consola
            alert("Fabricación añadida correctamente"); // Mostrar un mensaje de éxito
            window.location.href = "_indexP18.html"; // Redirigir a otra página
        })
        
        } catch (error) {
            console.log(error);
        }
    });
});