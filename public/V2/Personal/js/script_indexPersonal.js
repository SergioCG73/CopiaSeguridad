document.addEventListener("DOMContentLoaded", () => {        
    const search = document.getElementById("busqueda");
    const resultados = document.getElementById("tabla_de_resultados");
    const selector = document.getElementById("selector");
    const tbody = document.getElementById("tbody");
    const table = document.getElementById("tabla_de_resultados");
    const errorsContainer = document.getElementById("errorsContainer");
    const paginacion = document.getElementById("Paginacion");
    const btnInicio = document.getElementById("btnInicio");
    const btnNueva = document.getElementById("btnNuevo");
    let search_criteria = "";
    globalThis.Notas = "";
    tbody.innerHTML = "";
    let tipo = selector.options[selector.selectedIndex].value;

    console.log(table);

    btnInicio.addEventListener("click", () => {
        window.location.href = "../../portada.html";
    });

    btnNuevo.addEventListener("click", () => {
        fetch("frmagregar.php", {
             method: "HEAD" })  // Usar HEAD sólo para headers fetch
            .then(response => {
                if (response.ok) {
                    // Si el fichero existe, redirecciona a la página                    
                    window.location.href = "frmagregar.php";
                } else {
                    // Si el fichero no existe, muestra una alerta
                    alert("Error: El archivo 'frmagregar.php' no se encontró.");
                }
            })
            .catch(error => {
                console.error("Fetch error: ", error);
                alert("Error: No se pudo verificar la existencia del archivo.");
            });    });     

// LLamamos a ListarEmpleados al cargar la página
    ListarEmpleados(tipo, search_criteria);

//  Añade el evento escuchador para el campo de búsqueda, si este aparece
   
    if (search) {
        search.addEventListener("input", (event) => {
            search_criteria = event.target.value;
            console.log(search_criteria);
            ListarEmpleados(tipo, search_criteria);
        });
    }

    // Añade evento escuchador para el campo de tipo a listar
    if (selector) { 
        selector.addEventListener("change", (event) => {
            const tipo = event.target.value; // Get the selected value
            console.log("TIPO:", tipo);
            ListarEmpleados(tipo, search_criteria);
        });
    }

    function ListarEmpleados(tipo) {
        const campos = new FormData();
        campos.append("tipo", tipo);
        campos.append("search_criteria", search_criteria || ""); 
    
        tbody.innerHTML = "";
        errorsContainer.innerHTML = "";
    
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
            const DNI = elemento.DNI;
            const Nombre = elemento.Nombre;
            const Apellidos = elemento.Apellidos;    
            const Puesto = elemento.Id_Puesto; 

            // Formatear Fecha alta y baja
            const zeroPad = (val) => val.toString().padStart(2, "0");
            let Fecha_Alta = new Date(elemento.Fecha_Alta);
            const FechaAlta = `${zeroPad(Fecha_Alta.getDate())}/${zeroPad(Fecha_Alta.getMonth() + 1)}/${Fecha_Alta.getFullYear()}`;

            let Fecha_Baja = new Date(elemento.Fecha_Baja);
            const FechaBaja = `${zeroPad(Fecha_Baja.getDate())}/${zeroPad(Fecha_Baja.getMonth() + 1)}/${Fecha_Baja.getFullYear()}`;

            //Formatear Puesto
            switch (Puesto) {
                case "1": 
                    //PuestoFormateado = "Operario";
                    PuestoFormateado = "<td class = 'operario'>Operario</td>";
                    break;
                case "2": 
                    //PuestoFormateado = "Logística";
                    PuestoFormateado = "<td class = 'red'>Logística</td>";
                    break;
                case "3": 
                    //PuestoFormateado = "Laboratorio";
                    PuestoFormateado = "<td class = 'laboratorio'>Laboratorio</td>";
                    break;
                case "4": 
                    //PuestoFormateado = "Jefe de Producción";
                    PuestoFormateado = "<td class = 'jproduccion'>Jefe de Producción</td>";
                    break;
                case "5": 
                    //PuestoFormateado = "Jefe de planta";
                    PuestoFormateado = "<td class = 'jfabrica'>Jefe de fábrica</td>";
                    break;
                case "6": 
                    //PuestoFormateado = "Calidad";
                    PuestoFormateado = "<td class = 'calidad'>Calidad</td>";
                    break;
                case "7":                     
                    //PuestoFormateado = "Operario";
                    PuestoFormateado = "<td class = 'operario'>Operario</td>";
                    break;
                case "9":
                    //PuestoFormateado = "Mecánico";
                    PuestoFormateado = "<td class = 'mecanico'>Mecánico</td>";
                    break;
                default:
                    PuestoFormateado ="Desconocido";
                    break;
            } 

            // Genera el tbody de la tabla
            tbody.innerHTML += `
                                <tr>
                                    <td>${DNI}</td>      
                                    <td>${Nombre}</td>
                                    <td>${Apellidos}</td>
                                    ${PuestoFormateado}
                                    <td>${FechaAlta}</td>
                                    <td> <a href="actions/delete.php?id=${elemento.DNI}" onclick="return confirm('¿Estás seguro de que deseas borrar este registro?');">
                                         <img src="../Images/basura_rojo_icon.png" alt="Borrar"></a>

                                         <a href="frmeditar.php?id=${elemento.DNI}&                       
                                         FechaAlta=${elemento.Fecha_Alta}&
                                         Nombre=${elemento.Nombre}&
                                         Apellidos=${elemento.Apellidos}">
                                        <img src="../Images/editar_azul_icon.png" alt="Editar"></a>                       
                                    </td> 
                                </tr>`;  
        });
    }          
});
