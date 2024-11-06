<!-- Fichero que sirve para comprobar los valores enviados desde los formularios a la base de datos -->

<?php 
    function comprobador(){
        print "<pre>"; 
	    print_r($_REQUEST); 
	    print "</pre>\n";
	    exit;
    }   

?>
