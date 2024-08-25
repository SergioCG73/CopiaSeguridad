document.addEventListener("DOMContentLoaded", function() {        
    const contenedor = document.getElementById('resultados');
    const ErrorsContainer = document.getElementById("error");
    const buscador = document.getElementById('buscador');
    const tableContainer = document.getElementById("cuerpo");
    let empleados = [];

    // Cargar datos al inicio
    fetch('cargar_datos.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            empleados = data;
            //console.log(empleados);
            mostrarResultados(empleados);
        })
        .catch(error => console.error('Error fetching data:', error));

    // Filtrar resultados en tiempo real
    buscador.addEventListener('input', function() {
        const consulta = buscador.value.toLowerCase();        
        const resultadosFiltrados = empleados.filter(empleado =>
            empleado.Nombre.toLowerCase().includes(consulta) ||
            empleado.Apellidos.toLowerCase().includes(consulta)
        );        
        mostrarResultados(resultadosFiltrados);
    });

    function mostrarResultados(resultados) {                
        //contenedor.innerHTML = "";  // Clear the message container
        tableContainer.innerHTML = "";
        ErrorsContainer.innerHTML="";        
        console.log(resultados);

        if (resultados.length > 0) {            
            resultados.forEach(empleado => {  ;
                const row = document.createElement("tr");                
                row.innerHTML = `
                    <td>${empleado.DNI}</td>                                                
                    <td>${empleado.Nombre}</td>
                    <td>${empleado.Apellidos}</td>
                    <td>${empleado.Puesto}</td>
                    <td>${empleado.Fecha_Alta}</td>
                    <td>Ver</td>
                    <td>Borrar </td>
                    <td>Absentismo</td>                    
                `;                                                                                        
                tableContainer.appendChild(row);
            });
        } else {            
            //ErrorsContainer.innerHTML = "No hay resultados en la búsqueda: <span class='bold'>" + consulta + "</span>";
            ErrorsContainer.innerHTML = '<p class="bold">No se encontraron resultados para ese criterio de búsqueda</p>';
        }
    }
});
