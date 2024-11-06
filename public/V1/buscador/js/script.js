// script.js
document.addEventListener('DOMContentLoaded', (event) => {
    // Supongamos que tienes una variable con el valor que quieres seleccionar    
    //var valorSeleccionado = "7"; // Este valor puede venir de cualquier lógica de tu aplicación    
    var valorSeleccionado1 = document.getElementById('dato1').value;    
    var valorSeleccionado2 = document.getElementById('dato2').value;
    var valorSeleccionado3 = document.getElementById('dato3').value;   
    var valorSeleccionado4 = document.getElementById('dato4').value;      
    
    //document.write(valorSeleccionado);
    //var valorSeleccionado = "<?php echo $valorSeleccionado; ?>"; // PHP incrusta el valor aquí
    
    // Obtener el elemento select
    var selectElement1 = document.getElementById('table');    
    var selectElement2 = document.getElementById('limit');

    //Obtener valores input
    var inputElement1 = document.getElementById('start_date');    
    var inputElement2 = document.getElementById('end_date');

    /*var dateElement_1 = document.getElementById('fechainicial');    
    var dateElement_2 = document.getElementById('fechafinal');   
    var SelectElementPerPage = document.getElementById('perpage');*/

    // Establecer el valor del select

    selectElement1.value = valorSeleccionado3;
    selectElement2.value = valorSeleccionado4;
    inputElement1.value = valorSeleccionado1;
    inputElement2.value = valorSeleccionado2;

})