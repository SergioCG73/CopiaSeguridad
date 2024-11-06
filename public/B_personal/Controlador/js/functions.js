function alertaBorrar()
    {    
    var opcion = confirm("¿Seguro que desea borrar?");
    if (opcion == true) {
        return true;
        
	} else {
	    return false;
	}	
}