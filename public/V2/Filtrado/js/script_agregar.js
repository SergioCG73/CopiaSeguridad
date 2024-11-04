document.addEventListener("DOMContentLoaded", () =>{    
    const IdFiltrado = document.getElementById("Filtrado").value;    
    const Fecha = document.getElementById("Fecha");    
    const Producciones = document.getElementById("Producciones");
    const VolumenM216 = document.getElementById("VolumenM216");
    const VolumenAgua = document.getElementById("VolumenAgua");
    const Densidad = document.getElementById("Densidad");
    const Riqueza = document.getElementById("Riqueza");
    const Basicidad = document.getElementById("Basicidad");
    const VolumenFiltrado = document.getElementById("VolumenFiltrado");
    const Notas = document.getElementById("Notas");
    const BtnAgregar = document.getElementById("btnAgregar");   
    const BtnRegresar = document.getElementById("btnRegresar");    

    BtnRegresar.addEventListener("click", () =>{
        window.location.href = "indexFiltrado.php";
    });

    BtnAgregar.addEventListener("click", () => {              

        
        if (!Fecha.value) {
                alert("Por favor, complete el campo fecha.");
                return;
        }

        if (!Producciones.value) {
            alert("Por favor, complete el campo producciones.");
            return;
        }

        if (!VolumenM216.value) {
                VolumenM216.value = "NULL";                
        }

        if (!VolumenAgua.value) {
            VolumenAgua.value = "NULL";            
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
        
        if (!VolumenFiltrado.value) {
            VolumenFiltrado.value = null;
        }

        if (!Notas.value) {
                Notas.value = null;    //anterior Notas.value = "";    
        }        

        campos = new FormData();
        campos.append("IDFiltrado", IdFiltrado);        
        campos.append("Fecha", Fecha.value);
        campos.append("Producciones", Producciones.value);
        campos.append("VolumenM216", VolumenM216.value);
        campos.append("VolumenAgua", VolumenAgua.value);
        campos.append("Densidad", Densidad.value);
        campos.append("Riqueza", Riqueza.value);
        campos.append("Basicidad", Basicidad.value);
        campos.append("VolumenFiltrado", VolumenFiltrado.value);
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
            window.location.href = "indexFiltrado.php"; // Redirigir a otra página
        })
        .catch(error => {
            console.log(error);
        })
    });    
});
