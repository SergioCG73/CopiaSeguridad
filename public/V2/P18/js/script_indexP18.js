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
    globalThis.Notas = "";
    tbody.innerHTML = "";    
    let registros = select.options[select.selectedIndex].value;    

    btnInicio.addEventListener("click", () => {
        window.location.href = "../../portada.html";
    });    

    btnNueva.addEventListener("click", () => {
        fetch("frmagregar.php", {
             method: "HEAD"})  // Use HEAD to only fetch headers
            .then(response => {
                console.log("Respuesta: ", response);
                if (response.ok) {
                    // Si el fichero existe, te redirecciona al la página
                    window.location.href = "frmagregar.php";
                } else {                    
                    // Si el fichero no existe, muestra una alerta
                    alert("Error: El archivo 'frmagregar.php' no se encontró.");
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
    
        fetch("actions/listar.php", {
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
            //let Reactor = elemento.Reactor;
            globalThis.Reactor = elemento.Reactor;
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
            let horaFinalizacion = `${zeroPad(dateFinal.getDate())}/${zeroPad(dateFinal.getMonth() + 1)}/${dateFinal.getFullYear()} - ${zeroPad(dateFinal.getHours())}:${zeroPad(dateFinal.getMinutes())}`;

            if (horaFinalizacion === "31/12/2023 - 23:59" || isNaN(dateFinal.getTime()) || horaFinalizacion < horaInicio) {
                horaFinalizacion = `<span>----------</span>`;
            }
            
            // Formatear PESOS
            const pesoInicial = Number(elemento.Peso_Inicial).toLocaleString("es-CL") + " Kg";
            const pesoFinal = Number(elemento.Peso_Final).toLocaleString("es-CL") + " Kg";
            
            // Formatear DURACION V1
            /*const horas = Math.floor(elemento.Duracion / 3600);
            const minutos = Math.floor((elemento.Duracion % 3600) / 60);
            const duracion = horas >= 0 ? `${horas}h y ${minutos} min` : "Falta Fecha Final";*/

            // Formatear DURACION V2
            // Formatear DURACION V2            
            const horas = Math.floor(elemento.Duracion / 3600);
            const minutos = Math.floor((elemento.Duracion % 3600) / 60);
            const duracion = horas >= 0 
                ? `${horas}h y ${minutos} min` 
                : `<span class="error">Falta Fecha Final</span>`;
            
            // Format downtime
            const horasParado = Math.floor(elemento.Tiempo_Parado / 3600);
            const minutosParado = Math.floor((elemento.Tiempo_Parado % 3600) / 60);
            const tiempoParado = horasParado > 0 ? `${horasParado}h y ${minutosParado} min` : `${minutosParado} min`;

            // Formatear Notas. Se crea la variable Notas para no sobreescribir el elemento.Notas
            if (elemento.Notas != ""){ 
                //Notas = elemento.Notas;         
                //elemento.Notas = "abc";                
                Notas = "abc";
            }
            else {
                Notas = "";
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
                    <td>${Notas}</td>
                    <td>
                       <a href="actions/delete.php?id=${NumeroFabricacion}" onclick="return confirm('¿Estás seguro de que deseas borrar este registro?');">
                       <img src="../Images/basura_rojo_icon.png" alt="Borrar"></a>
                       
                       <a href="frmeditar.php?id=${NumeroFabricacion}&
                       reactor=${Reactor}&
                       Fecha_Inicio=${elemento.Hora_Inicio}&
                       Peso_Inicial=${elemento.Peso_Inicial}&
                       Fecha_Final=${elemento.Hora_Finalizacion}&
                       Peso_Final=${elemento.Peso_Final}&
                       Notas=${elemento.Notas}">
                       <img src="../Images/editar_azul_icon.png" alt="Editar"></a>                       
                    </td>                        
                </tr>`;
        });
    }   
});
