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
    let storedValue = localStorage.getItem("selectedRegistrosSulfacid");

    if (storedValue) {
        registros = storedValue;
        select.value = storedValue; // Establecer el valor del select al valor almacenado
    }

    btnInicio.addEventListener("click", () => {
        window.location.href = "../../portada.html";
    });

    btnNueva.addEventListener("click", () => {
        fetch("frmagregar.php", {
             method: "HEAD" })  // Use HEAD to only fetch headers
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

    /*select.addEventListener("change", () => {
        registros = select.options[select.selectedIndex].value;
        ListarProductos(registros, search_criteria);
    });*/

    select.addEventListener("change", () => {
        registros = select.options[select.selectedIndex].value;
        localStorage.setItem("selectedRegistrosSulfacid", registros); // Guardar el valor seleccionado en localStorage
        console.log("Registros: ", registros);
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
            const NumeroFabricacionFormateada = Number(elemento.NumeroFabricacion).toLocaleString('es-CL');

            // Formatear Fecha
            const zeroPad = (val) => val.toString().padStart(2, "0");
            let odate = new Date(elemento.Fecha);
            const Fecha = `${zeroPad(odate.getDate())}/${zeroPad(odate.getMonth() + 1)}/${odate.getFullYear()}`;
          // Formatear VoLÚMENES
            const Volumen = Number(elemento.Volumen).toLocaleString("es-CL") + " Kg";            

          // Formatear DENSIDAD
            let DensidadFormateada = Number(elemento.Densidad);
            DensidadFormateada = DensidadFormateada.toLocaleString('es-ES', {minimumFractionDigits: 2, maximumFractionDigits: 3});

          // Formatear RIQUEZA
          let RiquezaFormateada = Number(elemento.Riqueza);
          RiquezaFormateada = RiquezaFormateada.toLocaleString('es-ES', {minimumFractionDigits: 2, maximumFractionDigits: 2});

          // Formatear PH
          let PhFormateado = Number(elemento.ph);
          PhFormateado = PhFormateado.toLocaleString('es-ES', {minimumFractionDigits: 2, maximumFractionDigits: 2});  

          // Formatear Notas
          if (elemento.Notas != ""){
                //Notas = elemento.Notas;
                //elemento.Notas = "abc";
                Notas = "abc";
            }
          else {
                //elemento.Notas = "";
                Notas = "";
            }

            // Genera el tbody de la tabla
            tbody.innerHTML += `
                                <tr>
                                    <td>${NumeroFabricacionFormateada}</td>
                                    <td>${elemento.Semana}</td>
                                    <td>${Fecha}</td>
                                    <td>${Volumen}</td>
                                    <td>${DensidadFormateada}</td>
                                    <td>${RiquezaFormateada}</td>
                                    <td>${PhFormateado}</td>
                                    <td>${Notas}</td>
                                    <td> <a href="actions/delete.php?id=${elemento.NumeroFabricacion}" onclick="return confirm('¿Estás seguro de que deseas borrar este registro?');">
                                         <img src="../Images/basura_rojo_icon.png" alt="Borrar"></a>

                                         <a href="frmeditar.php?id=${elemento.NumeroFabricacion}&                       
                                         Fecha=${elemento.Fecha}&
                                         Volumen=${elemento.Volumen}&
                                         Densidad=${elemento.Densidad}&
                                         Riqueza=${elemento.Riqueza}&
                                         Ph=${elemento.ph}&
                                         Notas=${elemento.Notas}">
                                        <img src="../Images/editar_azul_icon.png" alt="Editar"></a>                       
                                    </td>
                                </tr>`;
        });
    }
});
