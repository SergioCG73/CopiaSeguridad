document.addEventListener("DOMContentLoaded", () => {
    const btnIniciarFabricacion = document.getElementById("btnIniciarFabricacion");
    const btnSiguiente = document.getElementById("btnSiguiente");
    const btnAnterior = document.getElementById("btnAnterior");
    const slctProductos = document.getElementById("slctProductos");
    const slctEquipos = document.getElementById("slctEquipos");

    // Evento para mostrar el select de productos y ocultar el botón de inicio
    btnIniciarFabricacion.addEventListener("click", () => {
        slctProductos.hidden = false;
        btnIniciarFabricacion.hidden = true;
    });

    // Evento para mostrar equipos cuando se selecciona un producto
    slctProductos.addEventListener("change", () => {
        if (slctProductos.value !== "") {
            slctEquipos.hidden = false;
            btnSiguiente.hidden = false;
            btnAnterior.hidden = false;            
            obtenerEquipos(slctProductos.value); // Cargar equipos según el producto seleccionado
            
        } else {
            slctEquipos.hidden = true;
            btnSiguiente.hidden = true;
            btnAnterior.hidden = false;
        }
    });

    // Función para obtener productos desde PHP
    const obtenerProductos = async () => {
        try {
            const response = await fetch("../models/productos.php");
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const productos = await response.json();
            if (!Array.isArray(productos)) {
                throw new Error("La respuesta del servidor no es un array válido.");
            }

            // Limpiar opciones previas y agregar nueva opción
            slctProductos.innerHTML = "<option value=''>Seleccione un producto</option>";

            // Agregar productos al select
            productos.forEach(producto => {
                const option = document.createElement("option");
                option.value = producto.Producto_id;
                option.textContent = producto.NombreProducto;
                slctProductos.appendChild(option);
            });
        } catch (error) {
            console.error("Error al cargar productos:", error);
            slctProductos.innerHTML = "<option value=''>Error al cargar productos</option>";
        }
    };

    // Función para obtener equipos filtrados por producto
    const obtenerEquipos = async (Producto_id) => {
        console.log("Producto seleccionado:", Producto_id);
        try {
            const response = await fetch(`equipos.php?producto_id=${Producto_id}`);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const equipos = await response.json();
            if (!Array.isArray(equipos)) {
                throw new Error("La respuesta del servidor no es un array válido.");
            }

            // Limpiar opciones previas y agregar nueva opción
            slctEquipos.innerHTML = "<option value=''>Seleccione un equipo</option>";

            // Agregar equipos al select
            equipos.forEach(equipo => {
                const option = document.createElement("option");
                option.value = equipo.Equipo_id;
                option.textContent = equipo.NombreEquipo;
                slctEquipos.appendChild(option);
            });
        } catch (error) {
            console.error("Error al cargar equipos:", error);
            slctEquipos.innerHTML = "<option value=''>Error al cargar equipos</option>";
        }
    };

    // Cargar productos al inicio
    obtenerProductos();
});
