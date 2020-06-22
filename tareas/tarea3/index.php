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
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    
</head>
<body>
<div class="avisos">
  <?php
    if(isset($_GET['errores'])){
      print_r($_GET['errores']); 
	}
	if(isset($_GET['exito_medico'])){
		echo "<p style=color:blue;font-size:50px>Nuevo médico insertado exitosamente!</p>";
	}
	if(isset($_GET['exito_solicitud'])){
		echo "<p style=color:blue;font-size:50px>Nueva solicitud insertada exitosamente!</p>";
	}
  ?>
</div>

	<h1>Médicina en línea para todos y todas</h1>

	<a href="./views/agregar_medico.php">Agregar datos de médico</a>
	<br>
	<a href="./controllers/ver_medicos.php">Ver médicos disponibles</a>
	<br>
	<a href="./views/solicitar_atencion.php">Publicar solicitud de atención</a>
	<br>
	<a href="./controllers/ver_solicitudes.php">Ver solicitudes de atención</a>
	<form accept-charset="utf-8" method="POST">
	<br>
	
</body>
</html>