<?php
require_once('db_config.php');

// INSERT INTO medico (nombre, experiencia, comuna_id, twitter, email, celular) VALUES (?, ?, ?, ?, ?, ?)

function limpiar($db, $str){
	return htmlspecialchars($db->real_escape_string($str));
}

function insertarSolicitud($nombre,$especialidad_id,$sintomas,$twitter,$email,$celular,$comuna_id,$nombre_archivo,$tipo_archivo){
    // crear conexion a DB
    $db = DBConfig::getConnection();
    
    // INSERTAR EN TABLA MEDICO
    // preparar sentencia SQL
    $insert = $db->prepare("
    INSERT INTO solicitud_atencion 
    (nombre_solicitante, especialidad_id, sintomas, twitter, email, celular, comuna_id) 
    VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    // limpiar datos
    $nombre = limpiar($db,$nombre);
    $sintomas = limpiar($db,$sintomas);
    $twitter = limpiar($db,$twitter);
    $email = limpiar($db,$email);
    $celular = limpiar($db,$celular);
    // preparamos los datos
    $insert->bind_param('sisssii',$nombre,$especialidad_id,$sintomas,$twitter,$email,$celular,$comuna_id);
    // ejecutamos insercion
    $result = $insert->execute();
    if($result != 1){
		echo "<p style=color:red;font-size:50px>Error en insertar en tabla medico!</p>";
    }
    
    // recuperamos el id de la solicitud insertada
    $id_solicitud = $db->insert_id;
    
    //INSERTAR EN TABLA ARCHIVO_SOLICITUD
    $insert_file = $db->prepare("
    INSERT INTO archivo_solicitud (ruta_archivo, nombre_archivo, mimetype, solicitud_atencion_id) 
    VALUES (?, ?, ?, ?)
    ");
    $nombre_archivo = limpiar($db,$nombre_archivo);
    $ruta = "/statics/media/";
    $insert_file->bind_param("sssi",$ruta,$nombre_archivo,$tipo_archivo,$id_solicitud);
    $result_file = $insert_file->execute();
    if($result_file!=1){
        echo "<p style=color:red;font-size:50px>Error en insertar archivo en tabla archivo_solicitud!</p>";
    }
    $db->close();
    return;
}
?>
