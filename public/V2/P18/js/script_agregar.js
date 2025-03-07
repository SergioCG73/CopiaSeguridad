document.addEventListener("DOMContentLoaded", () =>{
    const Reactor = document.getElementById("Reactor");
    const Fabricacion = document.getElementById("Fabricacion").value;
    const FechaInicio = document.getElementById("FechaInicio");
    const FechaFinal = document.getElementById("FechaFinal"); 
    const PesoInicial = document.getElementById("PesoInicial");
    const PesoFinal = document.getElementById("PesoFinal");
    const Notas = document.getElementById("Notas");
    const Boton = document.getElementById("boton");   
    const Regresar = document.getElementById("regresar");

    Regresar.addEventListener("click", () =>{
        window.location.href = "indexP18.php";
    });

    Boton.addEventListener("click", () => {
        if (!FechaInicio.value) {
                alert("Por favor, complete una fecha inicial.");
                return;
        }

        if (!FechaFinal.value) {
                FechaFinal.value = "2023-12-31T23:59"        
                globalThis.fecha2 = FechaFinal.value;
        }

        if (!PesoInicial.value) {
                alert("Por favor, complete un peso inicial.");
                return;
        }       

        if (!PesoFinal.value) {
            //PesoFinal.value = "";
            PesoFinal.value = 0;
        }

        if (!Notas.value) {
                Notas.value = null;    //anterior Notas.value = "";    
        }

        campos = new FormData();
        campos.append("FechaInicio", FechaInicio.value);        
        campos.append("Reactor", Reactor.value);
        campos.append("NumFabricacion", Fabricacion);        
        campos.append("FechaFinal", FechaFinal.value);        
        campos.append("PesoInicial", PesoInicial.value);
        campos.append("PesoFinal", PesoFinal.value);
        campos.append("Notas", Notas.value);          
        
        fetch("actions/registrar.php", { 
            method: "POST",
            body: campos
        })
        .then(response => response.json())
        .then(response => console.log("Response: ", response))
        .then(data => {
            //console.log("Data: ", data); // Mostrar la respuesta en la consola
            alert("Fabricación añadida correctamente"); // Mostrar un mensaje de éxito
            window.location.href = "indexP18.php"; // Redirigir a otra página
        })
        .catch(error => {
            console.log(error);
        })
    });    
});
