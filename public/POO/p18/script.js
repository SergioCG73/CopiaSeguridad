document.addEventListener("DOMContentLoaded", ()=> {
    const search = document.getElementById("busqueda");        
    const select = document.querySelector("select");
    const resultados = document.getElementById("tabla_de_resultados");        
    const tbody = document.getElementById("tbody");
    const errorsContainer = document.getElementById("errorsContainer");    
    const paginacion = document.getElementById("Paginacion");
    const btnInicio = document.getElementById("btnInicio");
    const btnNueva = document.getElementById("btnNueva");
    let search_criteria ="";
    tbody.innerHTML = "";    
    var registros = select.options[select.selectedIndex].value;

    btnInicio.addEventListener("click", () => {
        window.location.href = "../../portada.html";        
    });

    btnNueva.addEventListener("click", () => {
        window.location.href = "frmAddFab.php";
    });

    select.addEventListener("change", (event) => {
        registros = select.options[select.selectedIndex].value;
        //console.log(value);
        ListarProductos(registros, search_criteria);
    });

    ListarProductos(registros, search_criteria);

    function ListarProductos(registros, search_criteria) {
        const campos = new FormData();
        campos.append("registros", registros);
        campos.append("search_criteria", search_criteria);
        tbody.innerHTML = "";
        errorsContainer.innerHTML = "";

        try {
            fetch("listar.php", {
                method: "POST",
                body: campos
            })
            .then(response => response.json())
            .then(response => { 
                FormatearDatos(response);           
            });

        } catch (error) {
            console.error(error);
        }
}

    if (search) {
        search.addEventListener("input", (event) => {
            search_criteria = event.target.value;
            console.log(search_criteria);
            const campos = new FormData();
            campos.append("registros", registros);
            campos.append("search_criteria", search_criteria);
            tbody.innerHTML = "";
            errorsContainer.innerHTML = "";

            try{
                fetch("listar.php", {
                    method: "POST",
                    body: campos
                })
                .then(response => response.json())
                .then(response => {               
                        //console.table(response);
                        if (response.length > 0) {                            
                            FormatearDatos(response);                            
                        }
                        else {
                            errorsContainer.innerHTML = "<p class='bold'>No se encontraron datos para ese criterio de búsqueda</p>";
                        }                                               
                });
            }
            catch (error) {
                console.log(error);                
            }
        });
    }   

    function FormatearDatos(response){
        response.forEach (elemento => {
                // Formatear Numero Fabricacion
                const NumeroFabricacion = Number(elemento.NumeroFabricacion).toLocaleString('es-CL');

                //Formatear Reactor
                let Reactor = elemento.Reactor;
                if (Reactor === "R200") {
                    elemento.Reactor = `<span class="R200">${Reactor}</span>`;                    
                } else if (Reactor === "R201") {
                    elemento.Reactor = `<span class="R201">${Reactor}</span>`;
                } else if (Reactor === "R202") {
                    elemento.Reactor = `<span class="R202">${Reactor}</span>`;
                }

                // Formatear fecha y hora de inicio
                const zeroPad = (val) => val.toString().padStart(2, "0"); 
                let odate = new Date(elemento.Hora_Inicio);            
                let year = odate.getFullYear();
                let month = zeroPad(odate.getMonth()+1);
                let day = zeroPad(odate.getDate());
                let hour = zeroPad(odate.getHours());
                let mins = zeroPad(odate.getMinutes());                
                const horaInicio = day+'/'+month+'/'+year+' - '+hour+':'+mins;                

                // Formatear fecha y hora de finalizacion
                const zeroPadFinal = (val) => val.toString().padStart(2, "0"); 
                let dateFinal = new Date(elemento.Hora_Finalizacion);
                let yearFinal = dateFinal.getFullYear();
                let monthFinal = zeroPadFinal(dateFinal.getMonth()+1);
                let dayFinal = zeroPadFinal(dateFinal.getDate());
                let hourFinal = zeroPadFinal(dateFinal.getHours());
                let minsFinal = zeroPadFinal(dateFinal.getMinutes());                
                const horaFinalizacion = dayFinal+'/'+monthFinal+'/'+yearFinal+' - '+hourFinal+':'+minsFinal;                
                
                // Formatear pesos                
                const pesoInicial = Number(elemento.Peso_Inicial).toLocaleString("es-CL") + " Kg";
                const pesoFinal = Number(elemento.Peso_Final).toLocaleString("es-CL") + " Kg";
                
                // Formatear la duración en horas y minutos                
                    var horas = Math.floor(elemento.Duracion / 3600);1
                    var minutos = ((elemento.Duracion - (horas * 3600)))/60;                
                    let duracion = "";

                    if (horas < 0 ) {
                        duracion = "Falta Fecha Final";
                    }
                    else {
                        duracion = `${horas}h y ${minutos} min`;
                    }                    
                
                // Formatear el tiempo parado en minutos                
                
                var horas = Math.floor(elemento.Tiempo_Parado / 3600);
                var minutos = ((elemento.Tiempo_Parado - (horas * 3600)))/60;                

                if (horas < 1) {
                    tiempoParado = `${minutos} min`;
                }

                if (horas > 1 && minutos > 1) {
                    tiempoParado = `${horas}h y ${minutos} min`;
                }                

                //Formatear Notas

                if (elemento.Notas != ""){
                    elemento.Notas = "abc";
                }
                else {
                    elemento.Notas = "";
                }                
                
                tbody.innerHTML += `
                    <tr>
                        <!--<td>${elemento.NumeroFabricacion}</td>-->
                        <td>${NumeroFabricacion}</td>
                        <td>${elemento.Semana}</td>
                        <td>${elemento.Reactor}</td>
                        <!--<td>${Reactor}</td>-->
                        <td>${horaInicio}</td>
                        <td>${pesoInicial}</td>
                        <td>${horaFinalizacion}</td>
                        <td>${pesoFinal}</td>
                        <td>${duracion}</td>
                        <td>${tiempoParado}</td>
                        <td>${elemento.Notas}</td>
                        <td>
                            <a href="alerta.php?id=${NumeroFabricacion}&estado=borrar"><image src="images/basura.png"></a>
                            <a href="editar.php?id=${NumeroFabricacion}&estado=editar"><image src="images/editar.png"></a>
                        </td>                        
                    </tr>`;
        })
    }
});