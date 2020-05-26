<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
require_once("./validador_medico.php");
require_once("../models/get_ids.php");
require_once+("../models/insertar_datos_medico.php");

//Crear folder media si no existe
if(!is_dir("../media")){
	echo "Creando carpeta media<br>";
	mkdir("../media");
}

// verificamos si hay datos en POST
if($_POST){
    // validamos los datos
    $errores = array();
    //valida que nombre, comuna y region sean letras
    if(!checkNRC($_POST)){
        $errores[] = "Error en nombre, comuna o region.";
    }
    if(!checkExperiencia($_POST)){
        $errores[] = "Error en experiencia.";
    }
    if(!checkEspecialidades($_POST)){
        $errores[] = "Error en especialidades. Debe escoger entre 1 y 5.";
    }
    if(!checkTwitter($_POST)){
        $errores[] = "Error en formato twitter";
    }
    if(!checkMail($_POST)){
        $errores[] = "Error en formato mail";
    }
    if(!checkPhone($_POST)){
        $errores[] = "Error en formato celular";
    }
}
else{
    echo "<p style=color:red;font-size:50px>Error: no hay nada en POST!</p>";
    return;
}

//validamos que hayan archivos para subir
if($_FILES){
    // esto debiese ser un ciclo si hay mas de un archivo..
    $tipoimagen = checkImage($_FILES);
    // si checkImage falla, retorna falso
    if(!$tipoimagen){
        $errores[] = "Error en formato imagen";
    }
    else{
        $extension = image_type_to_extension($tipoimagen);
    }
}
else{
    echo "<p style=color:red;font-size:50px>Error: no hay nada en FILES!</p>";
    return; 
}

// validamos que hayan pasado todos los check
if(count($errores)>0){//Si el arreglo $errores tiene elementos, debemos mostrar el error.
    //header("Location: index.php?errores=".implode($errores, "<br>"));//Redirigimos al formulario inicio con los errores encontrados
    echo "<p style=color:red;font-size:50px>Hay errores en las entradas del formulario!</p>";
    echo "$errores";
    return; //No dejamos que continue la ejecución
}

// Se intenta subir las fotos al servidor
$uploaddir = '../media/';
// La imagen quedara guardada como nombre-medico_foto
$filename = $_POST['nombre-medico'] . "_foto" . $extension;
$uploadfile = $uploaddir.basename($filename);


if (!move_uploaded_file($_FILES['foto-medico[]']['tmp_name'], $uploadfile)) {
    echo "<p style=color:red;font-size:50px>Error: no es posible subir foto al servidor!</p>";
    return;
}

// Si llegamos hasta aca es porque pasaron las validaciones y el archivo es correcto.

// HACER LOS GET DE COMUNA, REGION Y ESPECIALIDAD
$array_cr = getComunaRegionId($_POST['comuna-medico']);
$array_especialidades = getEspecialidadesIds($_POST['especialidades-medico[]']);


// llamar a funciones para insertar datos


?>

</body>
</html>