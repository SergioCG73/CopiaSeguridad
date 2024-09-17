document.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementById("busqueda");  
    const select = document.querySelector("select");
    const resultados = document.getElementById("tabla_de_resultados");        
    const tbody = document.getElementById("tbody");
    const errorsContainer = document.getElementById("errorsContainer");    
    const paginacion = document.getElementById("Paginacion");
    const btnInicio = document.getElementById("btnInicio");
    const btnNueva = document.getElementById("btnNueva");
    let search_criteria = "";    
    tbody.innerHTML = "";    
    let registros = select.options[select.selectedIndex].value;    

    btnInicio.addEventListener("click", () => {
        window.location.href = "../../portada.html";
    });

    /*btnNueva.addEventListener("click", () => {
        window.location.href = "actions/agregar.php";        
    });*/

    btnNueva.addEventListener("click", () => {
        fetch("actions/agregar.php", {
             method: "HEAD" })  // Use HEAD to only fetch headers
            .then(response => {
                if (response.ok) {
                    // If the file exists, redirect to the page
                    window.location.href = "actions/agregar.php";
                } else {
                    // If the file doesn't exist, show an alert
                    alert("Error: El archivo 'agregar.php' no se encontró.");
                }
            })
            .catch(error => {
                console.error("Fetch error: ", error);
                alert("Error: No se pudo verificar la existencia del archivo.");
            });
    });
    

    select.addEventListener("change", () => {
        registros = select.options[select.selectedIndex].value;        
        ListarProductos(registros, search_criteria);
    });

    // LLamamos a ListarProductos al cargar la página
    ListarProductos(registros, search_criteria);

    // Añade el evento escuchador para el campo de búsqueda, si este aparece
    if (search) {
        search.addEventListener("input", (event) => {
            search_criteria = event.target.value;
            console.log(search_criteria);
            ListarProductos(registros, search_criteria);
        });
    }

    function ListarProductos(registros, search_criteria) {
        const campos = new FormData();
        campos.append("registros", registros);
        campos.append("search_criteria", search_criteria || ""); 
    
        tbody.innerHTML = "";
        errorsContainer.innerHTML = "";
    
        console.log("search_criteria: ", search_criteria);
        console.log("Registros: ", registros);
    
        fetch("listar.php", {
            method: "POST",
            body: campos
        })
        .then(response => response.json())
        .then(data => {
            console.log("Response: ", data);
            if (data.length > 0) {
                FormatearDatos(data);
            } else {
                errorsContainer.innerHTML = "<p class='bold'>No se encontraron resultados.</p>";
            }
        })
        .catch(error => {
            console.error("Fetch error: ", error);
            errorsContainer.innerHTML = "<p class='bold'>Error al traer los datos.</p>";
        });
    }

    function FormatearDatos(response) {
        response.forEach(elemento => {
            // Formatear el número de fabricación
            const NumeroFabricacion = Number(elemento.NumeroFabricacion).toLocaleString('es-CL');

            // Formatear Reactor
            let Reactor = elemento.Reactor;
            if (Reactor === "R200") {
                elemento.Reactor = `<span class="R200">${Reactor}</span>`;
            } else if (Reactor === "R201") {
                elemento.Reactor = `<span class="R201">${Reactor}</span>`;
            } else if (Reactor === "R202") {
                elemento.Reactor = `<span class="R202">${Reactor}</span>`;
            }

            // Formatear hora inicio
            const zeroPad = (val) => val.toString().padStart(2, "0");
            let odate = new Date(elemento.Hora_Inicio);
            const horaInicio = `${zeroPad(odate.getDate())}/${zeroPad(odate.getMonth() + 1)}/${odate.getFullYear()} - ${zeroPad(odate.getHours())}:${zeroPad(odate.getMinutes())}`;

            // Formatear hora final
            let dateFinal = new Date(elemento.Hora_Finalizacion);
            const horaFinalizacion = `${zeroPad(dateFinal.getDate())}/${zeroPad(dateFinal.getMonth() + 1)}/${dateFinal.getFullYear()} - ${zeroPad(dateFinal.getHours())}:${zeroPad(dateFinal.getMinutes())}`;
            
            // Formatear PESOS
            const pesoInicial = Number(elemento.Peso_Inicial).toLocaleString("es-CL") + " Kg";
            const pesoFinal = Number(elemento.Peso_Final).toLocaleString("es-CL") + " Kg";
            
            // Formatear DURACION
            const horas = Math.floor(elemento.Duracion / 3600);
            const minutos = Math.floor((elemento.Duracion % 3600) / 60);
            const duracion = horas >= 0 ? `${horas}h y ${minutos} min` : "Falta Fecha Final";
            
            // Format downtime
            const horasParado = Math.floor(elemento.Tiempo_Parado / 3600);
            const minutosParado = Math.floor((elemento.Tiempo_Parado % 3600) / 60);
            const tiempoParado = horasParado > 0 ? `${horasParado}h y ${minutosParado} min` : `${minutosParado} min`;

            // Formatear Notas
            if (elemento.Notas != ""){
                elemento.Notas = "abc";
            }
            else {
                elemento.Notas = "";
            }     
            
            // Genera el tbody de la tabla
            tbody.innerHTML += `
                <tr>
                    <td>${NumeroFabricacion}</td>
                    <td>${elemento.Semana}</td>
                    <td>${elemento.Reactor}</td>
                    <td>${horaInicio}</td>
                    <td>${pesoInicial}</td>
                    <td>${horaFinalizacion}</td>
                    <td>${pesoFinal}</td>
                    <td>${duracion}</td>
                    <td>${tiempoParado}</td>
                    <td>${elemento.Notas}</td>
                    <td>
                        <a href="delete.php?id=${NumeroFabricacion}" onclick="return confirm('¿Estás seguro de que deseas borrar este registro?');">
                        <img src="images/basura_rojo_icon.png" alt="Borrar"></a>
                       
                       <a href="editar.php?id=${NumeroFabricacion}"><img src="images/editar_azul_icon.png" alt="Editar"></a>
                    </td>                        
                </tr>`;
        });
    }
});