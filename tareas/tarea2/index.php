<?php
require_once('./models/db_config.php');
$db = DbConfig::getConnection();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de telemedicina</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./statics/css/tarea1.css">
</head>
<body>
	<h1>Médicina en línea para todos y todas</h1>

	<a href="./views/agregar_medico.html">Agregar datos de médico</a>
	<br>
	<a href="./controllers/ver_medicos.php">Ver médicos disponibles</a>
	<br>
	<a href="./views/solicitar_atencion.php">Publicar solicitud de atención</a>
	<br>
	<a href="./controllers/ver_solicitudes.php">Ver solicitudes de atención</a>
</body>
</html>