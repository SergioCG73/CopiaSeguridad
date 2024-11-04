document.addEventListener("DOMContentLoaded", () =>{    
    const Fabricacion = document.getElementById("Fabricacion").value;
    const Fecha = document.getElementById("Fecha");    
    const VolumenInicial = document.getElementById("VolumenInicial");
    const VolumenFinal = document.getElementById("VolumenFinal");
    const Densidad = document.getElementById("Densidad");
    const Riqueza = document.getElementById("Riqueza");
    const AcidoLibre = document.getElementById("AcidoLibre");
    const Notas = document.getElementById("Notas");
    const BtnAgregar = document.getElementById("btnAgregar");   
    const BtnRegresar = document.getElementById("btnRegresar");

    BtnRegresar.addEventListener("click", () =>{
        window.location.href = "indexFerrico.php";
    });

    BtnAgregar.addEventListener("click", () => {       
        if (!Fecha.value) {
                alert("Por favor, complete el campo fecha.");
                return;
        }

        if (!VolumenInicial.value) {
                VolumenInicial.value = "NULL";                
        }

        if (!VolumenFinal.value) {
            VolumenFinal.value = "NULL";            
        }

        if (!Densidad.value) {
            Densidad.value = null;
        }

        if (!Riqueza.value) {
            Riqueza.value = null;
        }

        if (!AcidoLibre.value) {
            AcidoLibre.value = null;
        }

        if (!Notas.value) {
                Notas.value = null;    //anterior Notas.value = "";    
        }

        campos = new FormData();
        campos.append("Fecha", Fecha.value);                
        campos.append("NumFabricacion", Fabricacion);   
        campos.append("VolumenInicial", VolumenInicial.value);
        campos.append("VolumenFinal", VolumenFinal.value);
        campos.append("Densidad", Densidad.value);
        campos.append("Riqueza", Riqueza.value);
        campos.append("AcidoLibre", AcidoLibre.value);        
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
            window.location.href = "indexFerrico.php"; // Redirigir a otra página
        })
        .catch(error => {
            console.log(error);
        })
    });    
});
