document.addEventListener("DOMContentLoaded", () => {
const IdFiltracionTag = document.getElementById("IdFiltracion");
const IdFiltracionInput = document.getElementById("IdFiltracion").value;
console.log("IdTag: ", IdFiltracionTag);
console.log ("Id Value:", IdFiltracionInput);
const FechaTag = document.getElementById("Fecha");
const FechaInput = FechaTag.getAttribute("data-initial-value");
const inputString = FechaInput;
const ProduccionesTag = document.getElementById("Producciones");
const ProduccionesInput = ProduccionesTag.getAttribute("data-initial-value");
const VolumenM216Tag = document.getElementById("VolumenM216");
const VolumenM216Input = VolumenM216Tag.getAttribute("value");
const VolumenAguaTag = document.getElementById("VolumenAgua");
const VolumenAguaInput = VolumenAguaTag.getAttribute("value");
const VolumenFiltradoTag = document.getElementById("VolumenFiltrado");
const VolumenFiltradoInput = VolumenFiltradoTag.getAttribute("value");
const DensidadTag = document.getElementById("Densidad");
const DensidadInput = DensidadTag.getAttribute("value");
const RiquezaTag = document.getElementById("Riqueza");
const RiquezaInput = RiquezaTag.getAttribute("value");
const BasicidadTag = document.getElementById("Basicidad");
const BasicidadInput = BasicidadTag.getAttribute("value");
const NotasInput = document.getElementById("Notas").value;
const btnAtras = document.getElementById("Atras");
const btnActualizar = document.getElementById("Actualizar");

let FechaModificada = "";
let ProduccionesModificadas = "";
let VolumenM216Modificado = "";
let VolumenAguaModificado = "";
let VolumenFiltradoModificado = "";
let DensidadModificada = "";
let RiquezaModificada = "";
let BasicidadModificado = "";
let NotasModificadas = "";

// --------------- TRANSFORMAR STRINGS EN FECHAS/HORAS ---------------------------------------------------------
// Paso 1: Pasa el string a un objeto tipo Date
// Adjusting the input string to a standard format for parsing
const [datePart, timePart] = inputString.split(' '); // Para Fecha inicial
//const [hours, minutes, seconds] = timePart.split(':');
// Crea un nuevo objeto de fecha usando la fecha y el tiempo ajustados
const dateObject = new Date(`${datePart}`);
// Paso 2: Formatea el objeto fecha a el formato de salida deseado
const year = dateObject.getFullYear();
const month = String(dateObject.getMonth() + 1).padStart(2, '0'); // Month is zero-based
const day = String(dateObject.getDate()).padStart(2, '0');
const formattedHours = String(dateObject.getHours()).padStart(2, '0');
//const formattedMinutes = String(dateObject.getMinutes()).padStart(2, '0');
// Construye el string con la fecha
const formattedDate = `${year}-${month}-${day}`; //string Fecha inicial en formato PHP
// --------------- FIN TRANSFORMAR STRINGS EN FECHAS/HORAS ---------------------------------------------------------

document.getElementById("Notas").addEventListener("input", function() {
    NotasOutput = this.value;  // Obtiene el valor actual del textarea
});

btnAtras.addEventListener("click", (event) =>{
    window.location.href = "indexFiltrado.php";
});
    
btnActualizar.addEventListener("click", (event) =>{
    const FechaOutput = FechaTag.value;        
    if (FechaOutput == FechaInput) {        
        FechaModificada = "NO";
        console.log ("Fecha NO modificada");
    }
    else {        
        console.log ("Fecha modificada");
        FechaModificada = "SI";
    }

    const ProduccionesOutput = ProduccionesTag.value;        
    if (ProduccionesOutput == ProduccionesInput) {        
        ProduccionesModificadas = "NO";
        console.log ("Producciones NO modificadas");
    }
    else {        
        console.log ("Producciones modificada");
        ProduccionesModificadas = "SI";
    }

    //const VolumenM216Output = VolumenM216Tag.value;
    let VolumenM216Output = VolumenM216Tag.value;
    if (VolumenM216Output == VolumenM216Input) {        
        VolumenM216Modificado = "NO";
        console.log ("Volumen M216 NO modificado");
    }
    else {        
        VolumenM216Modificado = "SI";
        console.log ("Volumen M216 modificado");
    }

    if (!VolumenM216Output) {
        VolumenM216Output = 0;
        console.log ("Volumen M216 modificado a 0");
    }

    //const VolumenAguaOutput = VolumenAguaTag.value;
    let VolumenAguaOutput = VolumenAguaTag.value;
    if (VolumenAguaOutput == VolumenAguaInput) {        
        VolumenAguaModificado = "NO";
        console.log ("Volumen Agua NO modificado");
    }
    else {        
        VolumenAguaModificado = "SI";
        console.log ("Volumen Agua modificado");
    }

    if (!VolumenAguaOutput) {
        VolumenAguaOutput = 0;
        console.log ("Volumen Agua modificado a 0");
    }

    const VolumenFiltradoOutput = VolumenFiltradoTag.value;
    if (VolumenFiltradoOutput == VolumenFiltradoInput) {        
        VolumenFiltradoModificado = "NO";
        console.log ("Volumen Filtrado NO modificado");
    }
    else {        
        VolumenAguaModificado = "SI";
        console.log ("Volumen Filtrado modificado");
    }

    //const DensidadOutput = DensidadTag.value;
    let DensidadOutput = DensidadTag.value;
    if (DensidadOutput == DensidadInput) {
        DensidadModificada = "NO";
    }
    else {
        DensidadModificada = "SI";
    }

    if (!DensidadOutput) {
        DensidadOutput = 0;
        console.log("Densidad modificada a 0");
    }

    //const RiquezaOutput = RiquezaTag.value;
    let RiquezaOutput = RiquezaTag.value;
    if (RiquezaOutput == RiquezaInput) {
        RiquezaModificada = "NO";
    }
    else {
        RiquezaModificada = "SI";
    }

    if (!RiquezaOutput) {
        RiquezaOutput = 0;
        console.log("Riqueza modificada a 0");
    }

    //const BasicidadOutput = BasicidadTag.value;
    let BasicidadOutput = BasicidadTag.value;
    if (BasicidadOutput == BasicidadInput) {
        BasicidadModificado = "NO";
    }
    else {
        BasicidadModificado = "SI";
    }

    if (!BasicidadOutput) {
        BasicidadOutput = 0;
        console.log("Basicidad modificada a 0");
    }

    const NotasOutput = document.getElementById("Notas").value;
    if (NotasOutput === NotasInput) {        
        NotasModificadas = "NO";        
        
    } else {        
        NotasModificadas = "SI";                
    }        

    if ((FechaModificada == "NO" && ProduccionesModificadas == "NO" && VolumenM216Modificado == "NO" && VolumenAguaModificado == "NO" && 
         VolumenFiltradoModificado == "NO" && DensidadModificada == "NO" && RiquezaModificada == "NO" && BasicidadModificado == "NO" &&
         NotasModificadas == "NO")) {
            alert ("No se efectuado ningún cambio"); 
            window.location.href = "indexFiltrado.php";
    } 
    else {        
        const campos = new FormData();
        campos.append("IdFiltracion", IdFiltracionInput);
        campos.append("Fecha", FechaOutput);
        campos.append("Producciones", ProduccionesOutput);        
        campos.append("VolumenM216", VolumenM216Output);
        campos.append("VolumenAgua", VolumenAguaOutput);
        campos.append("VolumenFiltrado", VolumenFiltradoOutput);
        campos.append("Densidad", DensidadOutput);
        campos.append("Riqueza", RiquezaOutput);
        campos.append("Basicidad", BasicidadOutput);        
        campos.append("Notas", NotasOutput);

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
            alert("Actualizada base de datos");
            window.location.href = "indexFiltrado.php";
        })
        .catch((error) => {
            console.error("Fetch error: ", error);
        }) //Final fetch         
    }  
}); 
});
