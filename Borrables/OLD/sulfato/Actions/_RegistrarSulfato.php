<?php 

require ("../../Includes/miconexion.php");

	$fabricacion_numero = $_POST['txtFabricacionNumero'];
	$reactor_numero = $_POST['slctReactor'];
	$horainicio = $_POST['txtFechaInicio'];	
	$horafinal = $_POST['txtFechaFinal'];		
	$calculosemana = substr($horainicio, 0,10);
	$peso_inicial = $_POST['txtPesoInicial'];
	$peso_final = $_POST['txtPesoFinal'];		
	$observaciones = $_POST['txtNotas']; 			
	
//----------------------------------- INICIO CÁLCULO DE LA SEMANA ----------------------------------//
	$dia = date('N', strtotime($calculosemana));

	if ($dia==7){
		$semana = ltrim(date('W', strtotime($calculosemana))+1,"0");
	}
	else{
		$semana = ltrim(date('W', strtotime($calculosemana)),"0");
	}	
//----------------------------------- FIN CÁLCULO DE LA SEMANA ----------------------------------//
		
//------------------------- INICIO CÁLCULO DEL ID DE LA FABRICACIÓN -----------------------------//
	$sulfato_id = "SUL/" .$fabricacion_numero; 
//------------------------- INICIO CÁLCULO DEL ID DE LA FABRICACIÓN -----------------------------//

//------------------------- INICIO CALCULO DURACION DE LA PRODUCCIÓN ----------------------------//

	if (($horafinal)==""){
		//$duracion = 99999;	
		//$horafinal = "0000-00-00T00:00";
		//$duracion = NULL;					
		$horafinal = "2023-12-31T23:59";				
		$duracion = strtotime($horafinal) - strtotime($horainicio);			
	}
	else{
		$horafinal = $horafinal;
		//$duracion = strtotime($horafinal) - strtotime($horainicio);		
	}		

		$duracion = strtotime($horafinal) - strtotime($horainicio);		
	
	
//	echo "Hora final: $horafinal <br>";
//	echo "Duración: $duracion";
	//exit;	

//------------------------- INICIO CALCULO DURACION DE LA PRODUCCIÓN ----------------------------//

/*/-------------------INICIO CALCULO "TIEMPO PARADO" REACTOR ------- //

$consulta ="SELECT MAX(Hora_Finalizacion) FROM sulfato WHERE Reactor='$reactor_numero'";
$resultado = mysqli_query ($miconexion, $consulta) 
		or die("No se puede realizar la consulta");    
$fila = mysqli_fetch_array($resultado);
$horaconsultada = $fila[0];
$parado = (strtotime($horainicio) - strtotime($horaconsultada)); 

if ($parado>100000000){
	$parado = 0;
}

//-------------------FIN CALCULO TIEMPO PARADO REACTOR -------------------------------------------------*/

//---------------------- INICIO CÁLCULO TIEMPO PARADO REACTOR ------------------------------------------//
$consulta ="SELECT MAX(Hora_Finalizacion) FROM sulfato WHERE Reactor='$reactor_numero'";
$resultado = mysqli_query ($miconexion, $consulta) 
		or die("No se puede realizar la consulta");    
$fila = mysqli_fetch_array($resultado);
$horaconsultadaSulfato = $fila[0];

$consulta ="SELECT MAX(Hora_Finalizacion) FROM p18 WHERE Reactor='$reactor_numero'";
$resultado = mysqli_query ($miconexion, $consulta) 
		or die("No se puede realizar la consulta");    
$fila = mysqli_fetch_array($resultado);
$horaconsultadaP18 = $fila[0];

if ($horaconsultadaP18 > $horaconsultadaSulfato){

	$parado = (strtotime($horainicio) - strtotime($horaconsultadaP18)); 	
}
else{
	$parado = (strtotime($horainicio) - strtotime($horaconsultadaSulfato)); 
	$horaconsultadaP18 = "No hay producción para ese reactor en P18";
}
	
//---------------------- INICIO CÁLCULO TIEMPO PARADO REACTOR ------------------------------------------//

//----------------------------INICIO VALIDACIÓN DATOS --------------------------------------------------//

	if (empty($peso_inicial)){
		$peso_inicial = 0;
	}

	if (empty($peso_final)){
		$peso_final = 0;
	}

	if (empty($observaciones)){
		$observaciones = NULL;
	}

	
/* --------------------------- FIN  VALIDACIÓN DATOS ---------------------------------------------------*/

//--------INICIO CÁLCULO TIEMPOS DE TRANSFERENCIA O PARADO ------------------- 

	//$horafinal = $horainicio;
	$consulta ="SELECT MAX(Hora_Finalizacion) FROM sulfato WHERE Reactor='$reactor_numero'";
	$resultado = mysqli_query ($miconexion, $consulta) 
			or die("No se puede realizar la consulta");    
	$fila = mysqli_fetch_array($resultado);
	$horaconsultada = $fila[0];
	$parado = (strtotime($horainicio) - strtotime($horaconsultada)); 
//-------------------- FIN CÁLCLULO TIEMPOS DE TRANSFERENCIA O PARADO  -------------------------------//

/*------------------- INICIO MÓDULO COMPROBACIÓN DATOS ENVIADOS A BASE DE DATOS -----------------------	
	
	echo "Sulfato_Id: $sulfato_id <br>";
	echo "Fabricacion #: $fabricacion_numero <br>";
	echo "Reactor: $reactor_numero <br>";
	echo "Fecha/Hora Inicio: $horainicio <br>";
	echo "Peso INICIO: $peso_inicial <br>";
	echo "Fecha/Hora Final: $horafinal <br>";
	echo "Peso FINAL: $peso_final <br>";	
	echo "Dia de la semana: $dia <br>";
	echo "Semana: $semana <br>";	
	echo "Notas: $observaciones <br>";	
	echo "Duración: $duracion <br>";			
	echo "Hora consultada: $horaconsultada <br>";
	echo "Parado: $parado <br>";	
	exit;
	$query = "INSERT INTO sulfato(Sulfato_ID, Hora_Inicio, 
			Hora_Finalizacion, Semana, NumeroFabricacion, Peso_Inicial,
			Peso_Final, Duracion, Reactor, Tiempo_Parado, Notas)
			VALUES ('$sulfato_id','$horainicio','$horafinal', '$semana', 
			'$fabricacion_numero', '$peso_inicial', '$peso_final',
			'$duracion', '$reactor_numero', '$parado', '$observaciones')";  

	if(mysqli_query($miconexion, $query)) {
		echo " Nuevo registro añadido correctamente";
	}
	else
	{
		echo "Registro NO añadido: " .mysqli_error($miconexion);				
	}
	mysqli_close($miconexion);
	exit;
	
/*-------- FIN MÓDULO COMPROBACIÓN DATOS ENVIADOS A BASE DE DATOS-----------------     */

	//echo "Hora Final: $horafinal";
	//exit;


//-----------------------INICIO STRING SQL PARA INSERTAR DATOS EN LA BASE DE DATOS
	$query = "INSERT INTO sulfato(Sulfato_ID, Hora_Inicio, Hora_Finalizacion, Semana, NumeroFabricacion,
			Peso_Inicial, Peso_Final, Duracion, Reactor, Tiempo_Parado, Notas) 
			VALUES ('$sulfato_id','$horainicio','$horafinal', '$semana', '$fabricacion_numero', 
			'$peso_inicial', '$peso_final', '$duracion', '$reactor_numero', '$parado', '$observaciones')";  
//-------------- FIN STRING SQL PARA INSERTAR DATOS EN LA BASE DE DATOS --------------------------*/


//*--------------Inicio ALERT JAVASCRIPT al insertar datos en la BD -----

if(mysqli_query($miconexion, $query)) {
		echo "<script>
					alert('Registro AÑADIDO correctamente');
					location.href='../indexsulfato.php?producto=sulfato';
			</script>";		
	}
	else
	{
		echo "<script>
					alert('Revisa los campos. Los datos son incorrectos.');
					window.location.href='../indexsulfato.php?producto=sulfato';
			</script>";
	}

// ---------------Fin ALERT JAVASCRIPT al insertar datos en la BD ------*/

// Cerramos la conexión con la BD.
mysqli_close($miconexion);
	
?>
