<?php
require_once('./models/db_config.php');
$db = DbConfig::getConnection();

$query = "SELECT id, nombre, experiencia, comuna_id, twitter, email, celular FROM medico ORDER BY id DESC LIMIT 5";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ver médicos disponibles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/tarea1.css">
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/tarea1.js"></script>
</head>
<body>

<?php
$result = $dbconn->query($query);
if ($result->num_rows > 0){
	// FALTA AGREGAR <th>Especialidades</th>
	echo "<table class=table><tbody><tr><th>Nombre Médico</th><th>Comuna</th><th>Datos Contacto</th></tr>\n"
	
	while ($row = $result->fetch_row()) {
		echo "\t<tr>\n";
		echo "\t<td>$row[1]</td>\n" //nombre
		echo "<td>$row[3]</td>\n"; //id comuna
		echo "<td>twitter: $row[4] <br> mail: $row[5] <br> celular: $row[6]</td>\n";
		echo "\t</tr>\n";
	}
	echo "</table>\n";
	echo "</tbody>";
    echo "</table>";
}
?>  

</body>
</html>