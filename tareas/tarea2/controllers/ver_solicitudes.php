<?php
require_once('../models/db_config.php');
$db = DbConfig::getConnection();

$query = "SELECT S.id, S.nombre_solicitante, E.descripcion as especialidad, C.nombre as comuna, S.twitter, S.email, S.celular 
FROM solicitud_atencion as S, comuna as C, especialidad as E 
WHERE S.comuna_Id = C.Id and S.especialidad_id = E.Id
ORDER BY id DESC LIMIT 5";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ver solicitudes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/tarea1.css">
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/tarea1.js"></script> -->
</head>
<body>

<?php
$result = $db->query($query);
if ($result->num_rows > 0){
	// FALTA AGREGAR <th>Especialidades</th>
	echo "<table class=table><tbody><tr><th></th><th>Nombre Solicitante</th><th>Especialidad solicitada</th><th>Comuna</th><th>Datos Contacto</th></tr>\n";
	
	while ($row = $result->fetch_row()) {
		echo "\t<tr >\n";
		echo "<td><a href=ver_solicitud.php?id=$row[0]>Ver solicitud</a></td>\n";
		echo "\t<td>$row[1]</td>\n"; //nombre
		echo "\t<td>$row[2]</td>\n"; //especialidad
		echo "<td>$row[3]</td>\n"; //comuna
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