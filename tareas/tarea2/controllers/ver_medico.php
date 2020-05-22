<?php
require_once('../models/db_config.php');
$db = DbConfig::getConnection();

$id_medico = $_GET["id"];

$query = "SELECT M.id, M.nombre, M.experiencia, C.nombre as comuna, M.twitter, M.email, M.celular 
FROM medico as M, comuna as C 
WHERE M.id = $id_medico AND M.comuna_Id = C.Id";
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Datos medico</title>
	<link rel="stylesheet" type="text/css" href="../css/tarea1.css">
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    
</head>
<body>
<?php
$result = $db->query($query);
// comentario X
if ($result->num_rows > 0){
    echo "<table class=table><tbody><tr><th>Nombre Médico</th><th>Especialidad(es)</th>
    <th>Experiencia</th><th>Comuna</th><th>Twitter</th><th>Email</th><th>Celular</th></tr>\n";
	
	while ($row = $result->fetch_row()) {
		echo "\t<tr >\n";
        echo "\t<td>$row[1]</td>\n"; //nombre

        //Ejecutamos la consulta para obtener las especialidades
		$query_esp = "SELECT E.descripcion FROM especialidad as E , especialidad_medico as EM
		WHERE EM.medico_id = $row[0] AND E.id = EM.especialidad_id";

        // especialidades
		echo "<td>";
		if($result_esp = $db->query($query_esp)){
			while($row_esp = $result_esp->fetch_row()){
				echo "$row_esp[0]<br>";
			}
		}
		echo "</td>";
        echo "\t<td>$row[2]</td>\n"; //experiencia
		echo "<td>$row[3]</td>\n"; //id comuna
        echo "<td>$row[4]</td>"; //Twitter
        echo "<td>$row[5]</td>"; //Mail
        echo "<td>+$row[6]</td>\n"; //Celular
		echo "\t</tr>\n";
	}
	echo "</table>\n";
	echo "</tbody>";
    echo "</table>";
}
?>  
<a href="./ver_medicos.php">Volver a lista de médicos</a>
</body>
</html>