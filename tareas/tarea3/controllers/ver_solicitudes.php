<?php
require_once('../models/db_config.php');
$db = DbConfig::getConnection();

// seteamos el limite de resultados
$Limite_resultados = 5;

//vemos en qué pagina estamos (si no hay valor, se setea en 1)
$paginaActual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1; 

$offset = ($paginaActual-1)*$Limite_resultados;

$total_pages_sql = "SELECT COUNT(*) FROM solicitud_atencion";
$resultado = $db->query($total_pages_sql);
$total_rows = $resultado->fetch_row()[0];
$total_pages = ceil($total_rows / $Limite_resultados);


$query = "SELECT S.id, S.nombre_solicitante, E.descripcion as especialidad, C.nombre as comuna, S.twitter, S.email, S.celular 
FROM solicitud_atencion as S, comuna as C, especialidad as E 
WHERE S.comuna_Id = C.Id and S.especialidad_id = E.Id
ORDER BY id ASC LIMIT $offset, $Limite_resultados";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ver solicitudes</title>
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
	// FALTA AGREGAR <th>Especialidades</th>
	echo "<table class=table><tbody><tr><th>Nombre Solicitante</th><th>Especialidad solicitada</th><th>Comuna</th><th>Datos Contacto</th></tr>\n";
	
	while ($row = $result->fetch_row()) {
		echo "\t<tr data-href='./ver_solicitud.php?id=",urlencode($row[0]),"'>\n";
		//echo "<td><a href=ver_solicitud.php?id=$row[0]>Ver solicitud</a></td>\n";
		echo "\t<td>$row[1]</td>\n"; //nombre
		echo "\t<td>$row[2]</td>\n"; //especialidad
		echo "<td>$row[3]</td>\n"; //comuna
		echo "<td>twitter: $row[4] <br> mail: $row[5] <br> celular: +$row[6]</td>\n";
		echo "\t</tr>\n";
	}
	echo "</tbody>";
    echo "</table>";
}
$db->close();
?>
<ul class="pagination">
    <li><a href="ver_solicitudes.php?pagina=1">First</a></li>
    <li class="<?php if($paginaActual <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($paginaActual <= 1){ echo '#'; } else { echo "ver_solicitudes.php?pagina=".($paginaActual - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($paginaActual >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($paginaActual >= $total_pages){ echo '#'; } else { echo "ver_solicitudes.php?pagina=".($paginaActual + 1); } ?>">Next</a>
    </li>
    <li><a href="ver_solicitudes.php?pagina=<?php echo $total_pages; ?>">Last</a></li>
</ul>
<a href="../index.php">Volver a menú principal</a>
</body>
</html>