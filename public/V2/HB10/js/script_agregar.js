document.addEventListener("DOMContentLoaded", () =>{    
    const Fabricacion = document.getElementById("Fabricacion").value;
    const Fecha = document.getElementById("Fecha");    
    const Volumen = document.getElementById("Volumen");    
    const Densidad = document.getElementById("Densidad");
    const Riqueza = document.getElementById("Riqueza");
    const Basicidad = document.getElementById("Basicidad");
    const Notas = document.getElementById("Notas");
    const BtnAgregar = document.getElementById("btnAgregar");   
    const BtnRegresar = document.getElementById("btnRegresar");   

    BtnRegresar.addEventListener("click", () =>{
        window.location.href = "indexHB10.php";
    });

    BtnAgregar.addEventListener("click", () => {       
        if (!Fecha.value) {
                alert("Por favor, complete el campo fecha.");
                return;
        }

        if (!Volumen.value) {
                Volumen.value = null;                
        }        

        if (!Densidad.value) {
            Densidad.value = null;
        }

        if (!Riqueza.value) {
            Riqueza.value = null;
        }

        if (!Basicidad.value) {
            Basicidad.value = null;
        }

        if (!Notas.value) {
            Notas.value = null;    //anterior Notas.value = "";    
        }

        console.log ("Volumen:", Volumen.value);

        campos = new FormData();
        campos.append("Fecha", Fecha.value);                
        campos.append("NumFabricacion", Fabricacion);   
        campos.append("Volumen", Volumen.value);        
        campos.append("Densidad", Densidad.value);
        campos.append("Riqueza", Riqueza.value);
        campos.append("Basicidad", Basicidad.value);        
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
            window.location.href = "indexHB10.php"; // Redirigir a otra página
        })
        .catch(error => {
            console.log(error);
        })
    });    
});
