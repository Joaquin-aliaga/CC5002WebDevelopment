<?php

$wd = getcwd();
echo "$wd \n";
chdir("../");
$wdn = getcwd();
echo "\t $wdn \n";
$ruta_index = $wdn . "/index.php?exito_medico=1";
echo "$ruta_index";

//header("Location: http://localhost/CC5002WebDevelopment/tareas/tarea2/index.php?exito_medico=1");
header("Location: $ruta_index");

?>
