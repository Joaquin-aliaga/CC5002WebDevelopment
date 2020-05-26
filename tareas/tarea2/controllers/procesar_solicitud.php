<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../statics/css/tarea1.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
</head>
<body>

<?php
require_once("validador_solicitud.php");
require_once("../models/get_ids.php");
require_once("../models/insertar_datos_solicitud.php");

//Crear folder media si no existe
if(!is_dir("../statics/media")){
	echo "Creando carpeta ../statics/media<br>";
    mkdir("../statics/media",0777,true);
    chmod('../statics',0777);
    chmod('../statics/media',0777);
}

// si hay informacion en POST
if($_POST){

    //validamos la informacion
    // validamos los datos
    $errores = array();
    //valida que nombre, comuna y region sean letras
    if(!checkName($_POST)){
        $errores[] = "Error en nombre.";
    }
    if(!checkSintomas($_POST)){
        $errores[] = "Error en sintomas.";
    }
    if(!checkEspecialidad($_POST)){
        $errores[] = "Error en especialidad. Debe escoger máximo 1.";
    }
    if(!checkTwitter($_POST)){
        $errores[] = "Error en formato twitter";
    }
    if(!checkMail($_POST)){
        $errores[] = "Error en formato mail";
    }
    // Arreglar esto
    /*
    if(!checkPhone($_POST)){
        $errores[] = "Error en formato celular";
    }
    */

}
else{
    echo "<p style=color:red;font-size:50px>Error: no hay nada en POST!</p>";
    return;
}

// validamos que hayan pasado todos los check
if(count($errores)>0){//Si el arreglo $errores tiene elementos, debemos mostrar el error.
    echo "<p style=color:red;font-size:50px>Hay errores en las entradas del formulario!</p>";
    print_r($errores);
    return; //No dejamos que continue la ejecución
}

//verificamos si hay contenido multimedia
if($_FILES){
        // Se intentan subir los archivos al servidor
    $uploaddir = '../statics/media/';
    // La imagen quedara guardada como nombre-medico_foto
    $nombre_solicitante = str_replace(' ','',$_POST['nombre-solicitante']);
    $filename = $nombre_solicitante . "_" . $_FILES['archivos-solicitante']['name'];
    $filetype = $_FILES['archivos-solicitante']['type'];
    $uploadfile = $uploaddir.basename($filename);
    if (!move_uploaded_file($_FILES['archivos-solicitante']['tmp_name'], $uploadfile)) {
        echo "<p style=color:red;font-size:50px>Error: no es posible subir archivo al servidor!</p>";
        return;
    }
}
else{
    echo "<p style=color:red;font-size:50px>Error: no hay nada en FILES!</p>";
    return;
}

// GET DE COMUNA, REGION Y ESPECIALIDAD
$array_cr = getComunaRegionId($_POST['comuna-solicitante']);
$id_especialidad = getEspecialidadId($_POST['especialidad-solicitud']);

// llamar a funcion para insertar solicitud
insertarSolicitud($_POST['nombre-solicitante'],$id_especialidad,$_POST['sintomas-solicitante'],$_POST['twitter-solicitante']
,$_POST['email-solicitante'],$_POST['celular-solicitante'],$array_cr[0],$filename,$filetype);

header("Location: http://localhost/CC5002WebDevelopment/tareas/tarea2/index.php?exito_solicitud=1");
?>