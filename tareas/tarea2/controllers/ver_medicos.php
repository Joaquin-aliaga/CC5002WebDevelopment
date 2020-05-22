<?php
require_once('../models/db_config.php');
$db = DbConfig::getConnection();

$query = "SELECT M.id, M.nombre, M.experiencia, C.nombre as comuna, M.twitter, M.email, M.celular 
FROM medico as M, comuna as C  
WHERE M.comuna_Id = C.Id 
ORDER BY id DESC LIMIT 5"

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ver médicos disponibles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../statics/css/tarea1.css">
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/tarea1.js"></script> -->
</head>
<body>

<?php
$result = $db->query($query);
if ($result->num_rows > 0){

	// FALTA AGREGAR <th>Especialidades</th>
	echo "<table class=table><tbody><tr><th></th><th>Nombre Médico</th><th>Especialidad(es)</th><th>Comuna</th><th>Datos Contacto</th></tr>\n";
	
	while ($row = $result->fetch_row()) {

		//Ejecutamos la consulta para obtener las especialidades
		$query_esp = "SELECT E.descripcion FROM especialidad as E , especialidad_medico as EM
		WHERE EM.medico_id = $row[0] AND E.id = EM.especialidad_id";

		echo "\t<tr >\n";
		echo "<td><a href=ver_medico.php?id=$row[0]>Ver médico</a></td>\n";
		echo "\t<td>$row[1]</td>\n"; //nombre
		// especialidades
		echo "<td>";
		if($result_esp = $db->query($query_esp)){
			while($row_esp = $result_esp->fetch_row()){
				echo "$row_esp[0]<br>";
			}
		}
		echo "</td>";
		echo "<td>$row[3]</td>\n"; //comuna"
		echo "<td>twitter: $row[4] <br> mail: $row[5] <br> celular: +$row[6]</td>\n";
		echo "\t</tr>\n";
	}
	echo "</table>\n";
	echo "</tbody>";
    echo "</table>";
}
?>  

</body>
</html>