<script language="javascript" src="../js/funciones.js"></script>

<?php 
$hostname_miconexion = "localhost"; //ERROR: 2002
//$database_miconexion = "registro"; //ERROR: 1049
$database_miconexion = "aquaweb"; //ERROR: 1049
//$username_miconexion = "root"; //ERROR: 1045 //Usuario para acceder a la base de datos desde raspberry pi
$username_miconexion = "sergiocg"; //ERROR: 1045
//$password_miconexion = ""; //ERROR: 1045 //clave para acceder a base de datos en raspberry pi
$password_miconexion = "1011"; //ERROR: 1045

$miconexion = @mysqli_connect($hostname_miconexion, $username_miconexion, 
							  $password_miconexion, $database_miconexion); 

//------------------INCIO MANEJO DE ERROR CONEXÍON-------------------- 
if (!$miconexion){	
	$error = mysqli_connect_errno();	
		
	switch($error){	
		case (1045):
			//echo "Conexión fallida. Error($error). UserName o password erróneos";
			echo "<script>alertaErrorUserName()</script>";
			exit;
			break;
		case (1049):
			//echo "Conexión fallida. Error($error). Base de datos no existente";
			echo "<script>alertaErrorDataBase()</script>";
			exit;
			break;		
		case (2002): 						
			//echo "Conexión fallida. Error ($error). Hostname erróneo.";
			echo "<script>alertaErrorHostName()</script>";
			exit;
			break;	
	}			
}	
	
/*------------------------ FIN MANEJO DE ERROR CONEXIÓN -----------------*/
?>
