document.addEventListener('DOMContentLoaded', (event) => {        
    // Supongamos que tienes una variable con el valor que quieres seleccionar    
    //var valorSeleccionado = "7"; // Este valor puede venir de cualquier lógica de tu aplicación    
    
    var valorSeleccionado = document.getElementById('valorproducto').value;    
    var valorSeleccionado2 = document.getElementById('valorfechainicial').value;
    var valorSeleccionado3 = document.getElementById('valorfechafinal').value;   
    //var valorPerPage = document.getElementById('valorperpage').value;       

    //document.write(valorSeleccionado);
    //var valorSeleccionado = "<?php echo $valorSeleccionado; ?>"; // PHP incrusta el valor aquí

    // Obtener el elemento select
    var selectElement = document.getElementById('producto');
    var dateElement_1 = document.getElementById('fechainicial');    
    var dateElement_2 = document.getElementById('fechafinal');   
    //var SelectElementPerPage = document.getElementById('perpage');    

    // Establecer el valor del select
    selectElement.value = valorSeleccionado;
    dateElement_1.value = valorSeleccionado2;
    dateElement_2.value = valorSeleccionado3;
    //SelectElementPerPage.value = valorPerPage;
})