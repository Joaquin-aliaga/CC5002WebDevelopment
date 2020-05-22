<?php
require_once('../models/db_config.php');
$db = DbConfig::getConnection();

$id_solicitud = $_GET["id"];

$query = "SELECT S.id, S.nombre_solicitante, E.descripcion as especialidad, S.sintomas,
C.nombre as comuna, R.nombre as region, S.twitter, S.email, S.celular 
FROM solicitud_atencion as S, comuna as C , especialidad as E , region as R
WHERE S.id = $id_solicitud AND S.comuna_Id = C.Id AND S.especialidad_id = E.Id AND C.region_id = R.id"
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Datos solicitante</title>
	<link rel="stylesheet" type="text/css" href="../statics/css/tarea1.css">
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    
</head>
<body>
<?php
$result = $db->query($query);
// comentario X
if ($result->num_rows > 0){
    echo "<table class=table><tbody><tr><th>Nombre Solicitante</th><th>Especialidad solicitada</th><th>Síntomas</th>
    <th>Comuna</th><th>Región</th><th>Twitter</th><th>Email</th><th>Celular</th></tr>\n";
	
	while ($row = $result->fetch_row()) {
		echo "\t<tr >\n";
        echo "\t<td>$row[1]</td>\n"; //nombre
        echo "\t<td>$row[2]</td>\n"; //especialidad
        echo "\t<td>$row[3]</td>\n"; //sintomas
        echo "<td>$row[4]</td>\n"; //comuna
        echo "<td>$row[5]</td>\n"; //region
        echo "<td>$row[6]</td>"; //Twitter
        echo "<td>$row[7]</td>"; //Mail
        echo "<td>+$row[8]</td>\n"; //Celular
		echo "\t</tr>\n";
	}
	echo "</table>\n";
	echo "</tbody>";
    echo "</table>";
}
?>  
<a href="./ver_solicitudes.php">Volver a lista de solicitudes</a>
</body>
</html>