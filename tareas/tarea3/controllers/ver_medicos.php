<?php
require_once('../models/db_config.php');
$db = DbConfig::getConnection();

// seteamos el limite de resultados
$Limite_resultados = 5;

//vemos en qué pagina estamos (si no hay valor, se setea en 1)
$paginaActual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1; 

$offset = ($paginaActual-1)*$Limite_resultados;

$total_pages_sql = "SELECT COUNT(*) FROM medico";
$resultado = $db->query($total_pages_sql);
$total_rows = $resultado->fetch_row()[0];
$total_pages = ceil($total_rows / $Limite_resultados);


$query = "SELECT M.id, M.nombre, M.experiencia, C.nombre as comuna, M.twitter, M.email, M.celular 
FROM medico as M, comuna as C  
WHERE M.comuna_Id = C.Id 
ORDER BY id ASC LIMIT $offset, $Limite_resultados";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ver médicos disponibles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../statics/css/tarea1.css">
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
	<script src="../statics/js/linkedrows.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/tarea1.js"></script> -->
</head>
<body>

<?php
$result = $db->query($query);
if ($result->num_rows > 0){
	//print_r($result->num_rows);
	// FALTA AGREGAR <th>Especialidades</th>
	echo "<table class=table><tbody><tr><th>Nombre Médico</th><th>Especialidad(es)</th><th>Comuna</th><th>Datos Contacto</th></tr>\n";
	
	while ($row = $result->fetch_row()) {

		//Ejecutamos la consulta para obtener las especialidades
		$query_esp = "SELECT E.descripcion FROM especialidad as E , especialidad_medico as EM
		WHERE EM.medico_id = $row[0] AND E.id = EM.especialidad_id";

		echo "\t<tr data-href=ver_medico.php?id='$row[0]'>\n";
		//echo "<td><a data-href=ver_medico.php?id=$row[0]>Ver médico</a></td>\n";
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
	echo "</tbody>";
    echo "</table>";
}
$db->close();
?>  
<ul class="pagination">
    <li><a href="ver_medicos.php?pagina=1">First</a></li>
    <li class="<?php if($paginaActual <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($paginaActual <= 1){ echo '#'; } else { echo "ver_medicos.php?pagina=".($paginaActual - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($paginaActual >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($paginaActual >= $total_pages){ echo '#'; } else { echo "ver_medicos.php?pagina=".($paginaActual + 1); } ?>">Next</a>
    </li>
    <li><a href="ver_medicos.php?pagina=<?php echo $total_pages; ?>">Last</a></li>
</ul>
<a href="../index.php">Volver a menú inicial</a>
</body>
</html>