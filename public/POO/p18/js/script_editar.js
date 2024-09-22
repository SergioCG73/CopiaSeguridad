document.addEventListener("DOMContentLoaded", () => {
    const Fab = document.getElementById('NumeroFabricacion').value;
    const Select = document.getElementById("Reactor");
    const SelectBD = Select.getAttribute("data-initial-value");
    const FechaInicial = document.getElementById("FechaInicial");       
    const InitialValueFechaInicial = FechaInicial.getAttribute("value");     
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

// Step 1: Parse the input string into a Date object
// Adjusting the input string to a standard format for parsing
const [datePart, timePart] = inputString.split(' ');
const [datePart2, timePart2] = inputString2.split(' ');
const [hours, minutes, seconds] = timePart.split(':');
const [hours2, minutes2, seconds2] = timePart2.split(':');

// Create a new date object using the adjusted date and time
const dateObject = new Date(`${datePart}T${hours.padStart(2, '0')}:${minutes}`);
const dateObject2 = new Date(`${datePart2}T${hours.padStart(2, '0')}:${minutes2}`);

// Step 2: Format the date object to the desired output format
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

// Construct the final formatted date string
const formattedDate = `${year}-${month}-${day}T${formattedHours}:${formattedMinutes}`;
const formattedDate2 = `${year2}-${month2}-${day2}T${formattedHours2}:${formattedMinutes2}`;

    btnAtras.addEventListener("click", (event) =>{
        window.location.href = "indexp18.php";
    });

    btnActualizar.addEventListener("click", (event) =>{   
        let selectFormulario = Select.value; // Asigna a selectFormulario el valor del select del select.     
        let reactorModificado = false;
        console.log("Valor de entrada BD: ", SelectBD);
        console.log("Valor de formulario: ", selectFormulario);        

        if (selectFormulario == SelectBD) { // Compara el select del formulario con el valor del select que viene de la BD.
            reactorModificado = "0";
            console.log("Reactor NO modificado ", reactorModificado);                   
        } else {            
            reactorModificado = "1";
            console.log("Reactor modificado ", reactorModificado);            
        }        

        const campos = new FormData();        
        campos.append("ReactorModificado", reactorModificado);
        campos.append("Reactor", selectFormulario);
        campos.append("NumeroFabricacion", NumeroFabricacion.value);
        campos.append("FechaInicio", FechaInicial.getAttribute("value"));                

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
        })
        .catch((error) => {
            console.error("Fetch error: ", error);
        }) //Final fetch
    });       


/*    Select.addEventListener("change", (event) => {        
        //console.log("Valor recibido BD: ", InitialValueSelect);        
    });
*/
/*    FechaInicial.addEventListener("blur", (event) => {
        let FechaInicialChanged = FechaInicial.value;
        console.log("Initial value: ", inputString);
        console.log("Changed value: ", formattedDate);

        if (FechaInicialChanged != formattedDate) {
            console.log("Diferente");
        } else {
            console.log("Igual");
        }
    });
*/   

/*    PesoInicial.addEventListener("blur", (event) => {
        let PesoInitialChanged = PesoInicial.value;

        if (PesoInitialChanged != InitialPesoInicial) {
            console.log("Diferente");
        } else {
            console.log("Igual");
        }
    });
*/
/*    FechaFinal.addEventListener("blur", (event) => {
        let FechaFinalChanged = FechaFinal.value;
        //console.log("Initial value: ", inputString2);
        //console.log("Changed value: ", formattedDate2);

        if (FechaFinalChanged != formattedDate2) {
            console.log("Diferente");
        } else {
            console.log("Igual");
        }
    });
*/
/*    PesoFinal.addEventListener("blur", (event) => {
        let PesoFinalChanged = PesoFinal.value;

        if (PesoFinalChanged != InitialPesoFinal) {
            console.log("Diferente");
        } else {
            console.log("Igual");
        }
    });
*/

   
});
