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
	
	$row = $result->fetch_row();
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
	echo "</tbody>";
    echo "</table>";

    $query_files = "SELECT ruta_archivo, nombre_archivo, mimetype 
    FROM archivo_solicitud WHERE solicitud_atencion_id=$row[0]";

    $result_files = $db->query($query_files);
    if($result_files->num_rows>0){
        echo "<table class=table><tbody><tr><th>Archivo</th><th>Tipo de archivo</th>\n";

        while ($row_file = $result_files->fetch_row()) {
            echo "\t<tr >\n";
            $ruta_completa = "..".$row_file[0].$row_file[1];
            echo "\t<td><a href='$ruta_completa'>$row_file[1]</a></td>\n"; //nombre archivo
            echo "\t<td>$row_file[2]</td>\n"; //tipo de archivo
        }
        echo "</tbody>";
        echo "</table>";
    }
}

$db->close();
?>  
<a href="./ver_solicitudes.php">Volver a lista de solicitudes</a>
</body>
</html>