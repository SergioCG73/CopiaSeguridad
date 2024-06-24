// script.js
document.addEventListener('DOMContentLoaded', (event) => {    
    // Supongamos que tienes una variable con el valor que quieres seleccionar    
    //var valorSeleccionado = "7"; // Este valor puede venir de cualquier lógica de tu aplicación    
    var valorSeleccionado = document.getElementById('valor').value;           
    
    //document.write(valorSeleccionado);
    //var valorSeleccionado = "<?php echo $valorSeleccionado; ?>"; // PHP incrusta el valor aquí

    // Obtener el elemento select
    var selectElement = document.getElementById('tipo');

    // Establecer el valor del select
    selectElement.value = valorSeleccionado;
});