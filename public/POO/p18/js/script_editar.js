document.addEventListener("DOMContentLoaded", () => {
const NumeroFabricacion = document.getElementById('NumeroFabricacion').value;    
const ReactorTag = document.getElementById("Reactor");
const ReactorInput = ReactorTag.getAttribute("data-initial-value");     // Va del formulario hacia la BD         
const FechaInicialTag = document.getElementById("FechaInicial");
const FechaInicialInput = FechaInicialTag.getAttribute("data-initial-value");    
const InputString = FechaInicialInput;
const FechaFinalTag = document.getElementById("FechaFinal");
const FechaFinalInput = FechaFinalTag.getAttribute("data-initial-value");
const InputString2 = FechaFinalInput;
const btnAtras = document.getElementById("Atras");
const btnActualizar = document.getElementById("Actualizar");

// --------------- TRANSFORMAR STRINGS EN FECHAS/HORAS ---------------------------------------------------------
// Paso 1: Pasa el string a un objeto tipo Date
// Adjusting the input string to a standard format for parsing
const [datePart, timePart] = InputString.split(' '); // Para Fecha inicial
const [datePart2, timePart2] = InputString2.split(' '); // Para Fecha final
const [hours, minutes, seconds] = timePart.split(':');
const [hours2, minutes2, seconds2] = timePart2.split(':');
// Crea un nuevo objeto de fecha usando la fecha y el tiempo ajustados
const dateObject = new Date(`${datePart}T${hours.padStart(2, '0')}:${minutes}`);
const dateObject2 = new Date(`${datePart2}T${hours2.padStart(2, '0')}:${minutes2}`);
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
// Construye el string con la fecha
const formattedDate = `${year}-${month}-${day}T${formattedHours}:${formattedMinutes}`; //string Fecha inicial en formato PHP
const formattedDate2 = `${year2}-${month2}-${day2}T${formattedHours2}:${formattedMinutes2}`; // stRING fecha final en formato PHP
// --------------- FIN TRANSFORMAR STRINGS EN FECHAS/HORAS ---------------------------------------------------------
    
const PesoInicialTag = document.getElementById("PesoInicial");
const PesoInicialInput = PesoInicialTag.getAttribute("value");
const PesoFinalTag = document.getElementById("PesoFinal");
const PesoFinalInput = PesoFinalTag.getAttribute("value");
const TextoInicial = document.getElementById("Notas").value;
let ReactorModificado = "";
let FechaInicialModificada = "";
let FechaFinalModificada = "";
let PesoInicialModificado = "";
let PesoFinalModificado = "";
let NotasModificadas = "";
let NotasOutput = TextoInicial;

document.getElementById("Notas").addEventListener("input", function() {
    NotasOutput = this.value;  // Obtiene el valor actual del textarea
});

btnAtras.addEventListener("click", (event) =>{
    window.location.href = "indexp18.php";
});
    
btnActualizar.addEventListener("click", (event) =>{
    const ReactorOutput = ReactorTag.value;
    if (ReactorOutput == ReactorInput) {
        //console.log ("ReactorTag: ", ReactorTag);
        //console.log ("ReactorInput: ", ReactorInput);
        //console.log ("ReactorOutput: ", ReactorOutput);
        ReactorModificado = "NO";
        console.log ("Reactor NO modificado");            
    }
    else {
        //console.log ("ReactorTag: ", ReactorTag);
        //console.log ("ReactorInput: ", ReactorInput);
        //console.log ("ReactorOutput: ", ReactorOutput);
        ReactorModificado = "SI";
        console.log( "Reactor SÍ modificado");
    }

    const FechaInicialOutput = FechaInicialTag.value;
    if (FechaInicialOutput == formattedDate) {
        //console.log ("Fecha Inicial Tag: ", FechaInicialTag);
        //console.log ("Fecha Inicial Input: ", FechaInicialInput);
        //console.log ("Fecha Inicial Output: ", FechaInicialOutput);
        //console.log ("Fecha formateada: ", formattedDate);
        FechaInicialModificada = "NO";
        console.log ("Fecha Inicial MO modificada");
    }
    else {
        //console.log ("Fecha Inicial Tag: ", FechaInicialTag);
        //console.log ("Fecha Inicial Input: ", FechaInicialInput);
        //console.log ("Fecha Inicial Output: ", FechaInicialOutput);
        //console.log ("Fecha formateada: ", formattedDate);
        FechaInicialModificada = "SI";
        console.log ("Fecha Inicial modificada");
    }    

    const FechaFinalOutput = FechaFinalTag.value;
    if (FechaFinalOutput == formattedDate2) {
        //console.log ("Fecha Final Tag: ", FechaFinalTag);
        //console.log ("Fecha Final Input: ", FechaFinalInput);
        //console.log ("Fecha Final Output: ", FechaFinalOutput);
        //console.log ("Fecha formateada: ", formattedDate2);
        FechaFinalModificada = "NO";
        console.log("Fecha Final NO modificada");
    }
    else {
        //console.log ("Fecha Final Tag: ", FechaFinalTag);
        //console.log ("Fecha Final Input: ", FechaFinalInput);
        //console.log ("Fecha Final Output: ", FechaFinalOutput);
        //console.log ("Fecha formateada: ", formattedDate2);
        FechaFinalModificada = "SI";
        console.log("Fecha Final modificada");
    }

    const PesoInicialOutput = PesoInicialTag.value;
    if (PesoInicialOutput == PesoInicialInput) {
        //console.log ("Peso Inicial Tag: ", PesoInicialTag);
        //console.log ("Peso Inicial Input:" , PesoInicialInput);
        //console.log ("Peso Inicial Output:" , PesoInicialOutput);     
        PesoInicialModificado = "NO";
        console.log ("Peso Inicial NO modificado");
    }
    else {
        //console.log ("Peso Inicial Tag: ", PesoInicialTag);
        //console.log ("Peso Inicial Input:" , PesoInicialInput);
        //console.log ("Peso Inicial Output:" , PesoInicialOutput);            
        PesoInicialModificado = "SI";
        console.log ("Peso Inicial modificado");
    }

    const PesoFinalOutput = PesoFinalTag.value;
    if (PesoFinalOutput == PesoFinalInput) {
        //console.log ("Peso Final Tag: ", PesoFinalTag);
        //console.log ("Peso Final Input:" , PesoFinalInput);
        //console.log ("Peso Final Output:" , PesoFinalOutput);
        PesoFinalModificado = "NO";
        console.log ("Peso Final NO modificado");
    }
    else {
        //console.log ("Peso Final Tag: ", PesoFinalTag);
        //console.log ("Peso Final Input:" , PesoFinalInput);
        //console.log ("Peso Final Output:" , PesoFinalOutput);
        PesoFinalModificado = "SI";
        console.log ("Peso Final modificado");
    }

    if (NotasOutput === TextoInicial) {
        //console.log ("Texto Inicial: ", TextoInicial);
        //console.log ("Texto Final: ", NotasOutput)
        NotasModificadas = "NO";
        console.log("Notas NO modificadas");        
    } else {
        //console.log ("Texto Inicial: ", TextoInicial);
        //console.log ("Texto Final: ", NotasOutput)
        NotasModificadas = "SI";
        console.log("Notas modificadas");        
    } 

    if ((ReactorModificado == "NO" && FechaInicialModificada == "NO" && FechaFinalModificada == "NO") && 
        PesoInicialModificado == "NO" && PesoFinalModificado == "NO" &&  NotasModificadas == "NO") {
            alert ("No se efectuado ningún cambio"); 
            window.location.href = "indexp18.php";         
    }            

    if ((ReactorModificado == "NO" && FechaInicialModificada == "NO" && FechaFinalModificada == "NO") && 
        (PesoInicialModificado == "SI" || PesoFinalModificado == "SI" ||  NotasModificadas == "SI")) {         
            const campos = new FormData();
            campos.append("TipoUpdate", "1");
            campos.append("NumeroFabricacion", NumeroFabricacion);
            campos.append("PesoInicialOutput", PesoInicialOutput);            
            campos.append("PesoFinalOutput", PesoFinalOutput);            
            campos.append("NotasOutput", NotasOutput);            

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
                console.log ("Actualizar base de datos sin calcular nada");
                alert("Actualizados PESOS y NOTAS");
                window.location.href = "indexp18.php";
            })
            .catch((error) => {
                console.error("Fetch error: ", error);
            }) //Final fetch         
    }        
    
    if (ReactorModificado == "SI") {
        console.log ("Condición reactor modificado");
        const campos = new FormData();
        campos.append("TipoUpdate", "2");
        campos.append("NumeroFabricacion", NumeroFabricacion);        
        campos.append("Reactor", ReactorOutput);
        campos.append("FechaInicialOutput", FechaInicialOutput);

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
            console.log ("Actualizar reactor");
            alert("Actualizado REACTOR");
            window.location.href = "indexp18.php";
        })
        .catch((error) => {
            console.error("Fetch error: ", error);
        }) //Final fetch
    } 

    if (FechaInicialModificada == "SI") { 
        //console.log ("Condición FECHA INICIAL modificado");
        const campos = new FormData();
        campos.append("TipoUpdate", "3");
        campos.append("NumeroFabricacion", NumeroFabricacion);
        campos.append("Reactor", ReactorOutput);
        campos.append("FechaInicialOutput", FechaInicialOutput);
        campos.append("FechaFinalOutput", FechaFinalOutput);
    
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
            console.log ("Actualizar FECHA INICIAL");
            alert("Actualizada FECHA INICIAL");
            window.location.href = "indexp18.php";
        })
        .catch((error) => {
            console.error("Fetch error: ", error);
        }) //Final fetch
    }
    
    if (FechaFinalModificada == "SI"){
        console.log ("Condición FECHA FINAL modificado");
        const campos = new FormData();
        campos.append("TipoUpdate", "4");
        campos.append("NumeroFabricacion", NumeroFabricacion);
        campos.append("Reactor", ReactorOutput);
        campos.append("FechaInicialOutput", FechaInicialOutput);
        campos.append("FechaFinalOutput", FechaFinalOutput);

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
            console.log ("Actualizar FECHA FINAL");
            alert("Actualizada FECHA FINAL");
            window.location.href = "indexp18.php";
        })
        .catch((error) => {
            console.error("Fetch error: ", error);
        }) //Final fetch

    }
}); 

});

