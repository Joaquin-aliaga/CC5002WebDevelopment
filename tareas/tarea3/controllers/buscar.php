<?php
//Archivo de conexión a la base de datos
require('../models/db_config.php');

//Variable de búsqueda
if($_POST){
	$consultaBusqueda = $_POST['valorBusqueda'];
	$tipo = $_POST['valorTipo'];
}else{
	$consultaBusqueda=NULL;
}

//$consultaBusqueda = "nombre";
//print_r($_POST);
//Variable vacía (para evitar los E_NOTICE)
//$mensaje = array();

//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {
    //echo "<h1>Estoy dentro de buscar.php</h1>";

    $db = DBConfig::getConnection();
	if(strcmp($tipo,"medico") == 0 ){
		$query = "SELECT id,nombre FROM medico WHERE nombre LIKE '%$consultaBusqueda%'";
	}
	if(strcmp($tipo,"solicitud") == 0){
		$query = "SELECT id,nombre_solicitante FROM solicitud_atencion WHERE nombre_solicitante LIKE '%$consultaBusqueda%'";
	}
	
    $result = $db->query($query);

	//Obtiene la cantidad de filas que hay en la consulta
	
	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($result->num_rows == 0){
		if($tipo=="medico"){
			echo "<p>No hay ningún médico con ese nombre</p>";
		}
		if($tipo="solicitud"){
			echo "<p>No hay ningún solicitante con ese nombre</p>";
		}
		
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		echo "Resultados para <strong>$consultaBusqueda</strong>\n";
		echo "<table class=table><tbody><tr><th>Nombre</th><th>Ver detalles</th></tr>\n";
		while($resultados = $result->fetch_row()) {
			echo "<tr>";
			echo "\t<td>$resultados[1]</td>\n"; //nombre
			if($tipo=="medico"){
				echo "\t<td><a href=ver_medico.php?id='$resultados[0]'>Ir</a></td>";
			}
			if($tipo="solicitud"){
				echo "\t<td><a href=ver_solicitud.php?id=",urlencode($resultados[0]),">Ir</a></td>";
			}
			echo "\t</tr>\n";
		
		};//Fin while $resultados
		echo "</tbody>";
    	echo "</table>";

	}; //Fin else $filas
	$db->close();
};//Fin isset $consultaBusqueda
//Devolvemos el mensaje que tomará jQuery
?>	

