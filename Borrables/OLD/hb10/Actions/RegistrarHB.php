<?php 

require ("../../Includes/miconexion.php");

	$fabricacion_numero = $_POST['txtFabricacionNumero'];	
	$fecha = $_POST['txtfecha'];	
	$densidad =$_POST['txtDensidad'];
	$riqueza =$_POST['txtRiqueza'];
	$basicidad =$_POST['txtBasicidad'];
	$notas = $_POST['txtNotas']; 		
	$volumen = $_POST['txtVolumen'];	

//-------------------------------- INICIO CÁLCULO NÚMERO SEMANA ----------------------//
	$calculosemana = substr($fecha, 0,10);
	$dia = date('N', strtotime($calculosemana));

	if ($dia==7){
		$semana = ltrim(date('W', strtotime($calculosemana))+1,"0");
	}
	else{
		$semana = ltrim(date('W', strtotime($calculosemana)),"0");
	}
//-------------------------------- FIN cálculo semana de la fabricación ----------------------//
	
//----------------------------INICIO VALIDACIÓN DATOS ----------------------------------------//
	if (empty($densidad)){
		$densidad = "NULL";
	}

	if (empty($riqueza)){
		$riqueza = "NULL";
	}

	if (empty($basicidad)){
		$basicidad = "NULL";
	}

	if (empty($volumen)){
		$volumen = "NULL";
	}	

	if (empty($notas)){
		$notas = NULL;
	}

//---------------------------------- FIN  VALIDACIÓN DATOS -----------------------------------------

/*------------------- INICIO MÓDULO COMPROBACIÓN DATOS ENVIADOS A BASE DE DATOS ----------------------		
	require("../../Includes/comprobadordatos.php");	
	comprobador();
	exit;
/*------------------- FIN MÓDULO COMPROBACIÓN DATOS ENVIADOS A BASE DE DATOS ----------------------*/	


//-----------------------INICIO STRING SQL PARA INSERTAR DATOS EN LA BASE DE DATOS ----------------/
		
	$consulta = "INSERT INTO hb10(NumeroFabricacion, Fecha, Semana, Notas, Densidad, Riqueza, Basicidad,
			    Volumen) VALUES ($fabricacion_numero, '$fecha', $semana, '$notas', $densidad, $riqueza,
				$basicidad, $volumen)";
//-------------- FIN STRING SQL PARA INSERTAR DATOS EN LA BASE DE DATOS -----------------------------/
	
/* ----- INICIO COMPROBAR ERRORES EN EL INSERT A LA BASE DE DATOS ----------------------------------//
	if(mysqli_query($miconexion, $consulta)) {
		echo " Nuevo registro añadido correctamente";
	}
	else
	{
		echo "Registro NO añadido: " .mysqli_error($miconexion);				
	}
	exit;

// ----- FIN COMPROBAR ERRORES EN EL INSERT A LA BASE DE DATOS ----------------------------------*/
	

//-------------- INICIO ALERT JAVASCRIPT AL INSERTAR REGISTRO EN  BD ----------------------------------//

if(mysqli_query($miconexion, $consulta)) {
		echo "<script>
					alert('Registro AÑADIDO correctamente');
					location.href='../indexhb10.php?producto=hb10';
			 </script>";		
	}
	else
	{
		echo "<script>
					alert('Revisa los campos. Los datos son incorrectos.');
					window.location.href='../indexhb10.php?producto=hb10';
			 </script>";
	}

// ---------------Fin ALERT JAVASCRIPT al insertar datos en la BD ------*/

// Cerramos la conexión con la BD.
mysqli_close($miconexion);
	
?>
