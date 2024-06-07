    function validarFechas(){            
        const desde = document.getElementById("desde").value;
        const hasta = document.getElementById("hasta").value;   
        desde_js = new Date(desde);
        hasta_js = new Date(hasta);
                
        if (hasta_js < desde_js){
        event.preventDefault();
        alert("La fecha hasta debe ser mayor a la fecha desde");
        }
 }     
    
    function alertaMinimo()
    {
        alert("Valor MÍNIMO producción 883");        
        window.location.href='indexP18.php';
    }

    function alertaMaximo()
    {
        alert("Valor MÁXIMO producción 1091");        
        window.location.href='indexP18.php';
    }

    function alertaBorrar()
    {    
    var opcion = confirm("¿Seguro que desea borrar?");
    if (opcion == true) {
        return true;
        
	} else {
	    return false;
	}	
    }

    function alertaActualizado()
    {
        alert("Registro ACTUALIZADO correctamente");
        window.location.href='../indexP18.php?producto=p18';
    }

    function alertaNoActualizado()
    {
        alert("Revisa los campos, no son correctos");
        window.location.href='../indexP18?producto=p18.php';
    }

    function alertaErrorUserName(){
        alert("ERROR(1045). UserName o password erróneos");
    }

    function alertaErrorDataBase(){
        alert("ERROR(1049). Base de datos no existente");
    }

    function alertaErrorHostName(){
        alert("ERROR(2002). HostName incorrecto");
    }

    function alertaFab(){
        alert("ERROR DETECTADO");
    }
    

    


