document.addEventListener("DOMContentLoaded", () => {
const NumeroFabricacion = document.getElementById('NumeroFabricacion').value;    
const FechaTag = document.getElementById("Fecha");
const FechaInput = FechaTag.getAttribute("data-initial-value");
const inputString = FechaInput;
const btnAtras = document.getElementById("Atras");
const btnActualizar = document.getElementById("Actualizar");
const VolumenTag = document.getElementById("Volumen");
const VolumenInput = VolumenTag.getAttribute("value");
const DensidadTag = document.getElementById("Densidad");
const DensidadInput = DensidadTag.getAttribute("value");
const RiquezaTag = document.getElementById("Riqueza");
const RiquezaInput = RiquezaTag.getAttribute("value");
const PhTag = document.getElementById("Ph");
const PhInput = PhTag.getAttribute("value");
const NotasInput = document.getElementById("Notas").value;
let FechaModificada = "";
let VolumenModificado = "";
let DensidadModificada = "";
let RiquezaModificada = "";
let PhModificado = "";
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
    window.location.href = "indexSulfacid.php";
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

    const VolumenOutput = VolumenTag.value;
    if (VolumenOutput == VolumenInput) {
        VolumenModificado = "NO";
        console.log ("Volumen NO modificado");
    }
    else {
        VolumenModificado = "SI";
        console.log ("Volumen modificado");
    }

    const DensidadOutput = DensidadTag.value;
    if (DensidadOutput == DensidadInput) {
        DensidadModificada = "NO";
    }
    else {
        DensidadModificada = "SI";
    }

    const RiquezaOutput = RiquezaTag.value;
    if (RiquezaOutput == RiquezaInput) {
        RiquezaModificada = "NO";
    }
    else {
        RiquezaModificada = "SI";
    }

    const PhOutput = PhTag.value;
    if (PhOutput == PhInput) {
        PhModificado = "NO";
    }
    else {
        PhModificado = "SI";
    }

    const NotasOutput = document.getElementById("Notas").value;
    if (NotasOutput === NotasInput) {
        NotasModificadas = "NO";
    } else {
        NotasModificadas = "SI";
    }

    if ((FechaModificada == "NO" && VolumenModificado == "NO" && DensidadModificada == "NO"               
         && RiquezaModificada == "NO" && PhModificado == "NO" && NotasModificadas == "NO")) {
            alert ("No se efectuado ningún cambio");
            window.location.href = "indexFerrico.php";
    }
    else {
        const campos = new FormData();
        campos.append("NumeroFabricacion", NumeroFabricacion);
        campos.append("Fecha", FechaOutput);
        campos.append("Volumen", VolumenOutput);
        campos.append("Densidad", DensidadOutput);
        campos.append("Riqueza", RiquezaOutput);
        campos.append("Ph", PhOutput);
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
            alert("Actualizados PESOS y NOTAS");
            window.location.href = "indexSulfacid.php";
        })
        .catch((error) => {
            console.error("Fetch error: ", error);
        }) //Final fetch

    }

});
});
