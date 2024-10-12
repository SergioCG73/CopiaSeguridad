document.addEventListener("DOMContentLoaded", () => {
    const NumeroFabricacion = document.getElementById('NumeroFabricacion').value;    //Necesario
    const Select = document.getElementById("Reactor");                               //Necesario
    const SelectBD = Select.getAttribute("data-initial-value");                      //Necesario    
    const FechaInicial = document.getElementById("FechaInicial");
    const InitialValueFechaInicial = FechaInicial.getAttribute("data-initial-value");
    const FechaFinal = document.getElementById("FechaFinal");
    const InitialValueFechaFinal = FechaFinal.getAttribute("value");
    const PesoInicial = document.getElementById("PesoInicial");
    const InitialPesoInicial = PesoInicial.getAttribute("value");
    const PesoFinal = document.getElementById("PesoFinal");      
    const InitialPesoFinal = PesoFinal.getAttribute("value");
    const Notas =document.getElementById("Notas");
    const btnAtras = document.getElementById("Atras");
    const btnActualizar = document.getElementById("Actualizar");
    const inputString = InitialValueFechaInicial;
    const inputString2 = InitialValueFechaFinal;

// Paso 1: Pasa el string a un objeto tipo Date
// Adjusting the input string to a standard format for parsing
const [datePart, timePart] = inputString.split(' '); // Para Fecha inicial
const [datePart2, timePart2] = inputString2.split(' '); // Para Fecha final
const [hours, minutes, seconds] = timePart.split(':');
const [hours2, minutes2, seconds2] = timePart2.split(':');

// Crea un nuevo objeto de fecha usando la fecha y el tiempo ajustados
const dateObject = new Date(`${datePart}T${hours.padStart(2, '0')}:${minutes}`);
const dateObject2 = new Date(`${datePart2}T${hours.padStart(2, '0')}:${minutes2}`);

// Paso 2: Formatea el objeto fecha a el formato de salida deseado
const year = dateObject.getFullYear();
const year2 = dateObject2.getFullYear();
const month = String(dateObject.getMonth() + 1).padStart(2, '0'); // Month is zero-based
const month2 = String(dateObject2.getMonth() + 1).padStart(2, '0'); // Month is zero-based
const day = String(dateObject.getDate()).padStart(2, '0');
const day2 = String(dateObject2.getDate()).padStart(2, '0');
const formattedHours = String(dateObject.getHours()).padStart(2, '0');
const formattedHours2 = String(dateObject2.getHours()).padStart(2, '0');
const formattedMinutes = String(dateObject.getMinutes()).padStart(2, '0');
const formattedMinutes2 = String(dateObject2.getMinutes()).padStart(2, '0');
let reactorModificado = false;        

// Construye el string con la fecha
const formattedDate = `${year}-${month}-${day}T${formattedHours}:${formattedMinutes}`; //string Fecha inicial en formato PHP
const formattedDate2 = `${year2}-${month2}-${day2}T${formattedHours2}:${formattedMinutes2}`; // stRING fecha final en formato PHP

    btnAtras.addEventListener("click", (event) =>{
        window.location.href = "indexp18.html";
    });
    
// ACTUALIZAR CAMBIO REACTOR ----------------------------------------------------------------------------------------------
    btnActualizar.addEventListener("click", (event) =>{   
        let selectFormulario = Select.value; // Asigna a selectFormulario el valor del select del select.

        // Si se modifica el reactor
        if (selectFormulario == SelectBD) { // Compara el select del formulario con el valor del select que viene de la BD.
            reactorModificado = "0";
            console.log("Reactor NO modificado ", reactorModificado);                   
        } 
        else {            
            reactorModificado = "1";
            console.log("Reactor modificado ", reactorModificado);            
            const campos = new FormData();        
            campos.append("ReactorModificado", reactorModificado);
            campos.append("Reactor", selectFormulario);            
            campos.append("NumeroFabricacion", NumeroFabricacion);                        
            campos.append("FechaInicio", FechaInicial.getAttribute("value"));       
            campos.append("FechaFinal", FechaFinal.getAttribute("value"));            

            fetch("actions/update.php", {
                method: "POST",
                body: campos
            }) 
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`Server error: ${response.status}`); // Lanza un error si el estatus de respuesta es no OK
                }
                return response.json();
            })
            .then((data) => {
                console.log("Response: ", data);
                alert("Reactor actualizado");
                window.location.href = "_indexp18.html";
            })
            .catch((error) => {
                console.error("Fetch error: ", error);
            }) //Final fetch
        } //Final update al modificar reactor       
    });   
//-----------------FIN ACTUALIZAR CAMBIO REACTOR ---------------

// INICIO ACTUALIZAR FECHA INICIO ---------------------------------------------------------------------
    btnActualizar.addEventListener("click", (event) =>{                
        let FechaBD = formattedDate; // Fecha que recibo de la BD formateada a timestamp
        let selectFormulario = Select.value; // Asigna a selectFormulario el valor del select.             
        console.log ("Fecha Inicio BD:", FechaBD);
        console.log ("Fecha Inicio Formulario: ", FechaInicial.value);      // Fecha modificada y que debo guardar en la BD        
        //console.log ("Fecha Final Formulario: ", FechaFinal.value); // Fecha necesaria para calcular la duración
        //console.log ("Reactor: ", selectFormulario);
        //console.log("Nº Fabricacion: ", NumeroFabricacion);        

        if (FechaBD != FechaInicial.value) {            
            console.log ("Fecha inicial modificada");
            const campos = new FormData();        
            campos.append("ReactorModificado", "0");  
            campos.append("Reactor", selectFormulario);               
            campos.append("NumeroFabricacion", NumeroFabricacion);            
            campos.append("FechaInicialModificada", "1");                   
            campos.append("FechaInicio", FechaInicial.value);               
            campos.append("FechaFinal", FechaFinal.value);            
            
            fetch("actions/update.php", {
                method: "POST",
                body: campos
            }) 
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`Server error: ${response.status}`); // Throw an error if response status is not OK
                }
                return response.json();
            })
            .then((data) => {
                console.log("Response: ", data);
                alert("Fecha de Inicio actualizado");
                window.location.href = "_indexp18.html";

            })
            .catch((error) => {
                console.error("Fetch error: ", error);
            }) //Final fetch
        }
        else {
            console.log("No modificado");
        }
                
    });

//  FIN ACTUALIZAR FECHA INICIO -----------------------------------------------------------------------

   
    

});