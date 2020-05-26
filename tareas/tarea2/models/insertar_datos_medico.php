<?php
require_once('db_config.php');

// INSERT INTO medico (nombre, experiencia, comuna_id, twitter, email, celular) VALUES (?, ?, ?, ?, ?, ?)

function limpiar($db, $str){
	return htmlspecialchars($db->real_escape_string($str));
}

function insertarMedico($nombre,$experiencia,$comuna_id,$twitter,$email,$celular,$especialidades,$nombre_archivo){
    // crear conexion a DB
    $db = DBConfig::getConnection();
    
    // INSERTAR EN TABLA MEDICO
    // preparar sentencia SQL
    $insert = $db->prepare("INSERT INTO medico (nombre, experiencia, comuna_id, twitter, email, celular) VALUES (?, ?, ?, ?, ?, ?)");
    // limpiar datos
    $nombre = limpiar($db,$nombre);
    $experiencia = limpiar($db,$experiencia);
    $twitter = limpiar($db,$twitter);
    $email = limpiar($db,$email);
    $celular = limpiar($db,$celular);
    // preparamos los datos
    $insert->bind_param('ssissi',$nombre,$experiencia,$comuna_id,$twitter,$email,$celular);
    // ejecutamos insercion
    $result = $insert->execute();


    if($result != 1){
		echo "<p style=color:red;font-size:50px>Error en insertar en tabla medico!</p>";
    }
    
    // recuperamos el id del medico insertado
    $id_medico = $db->insert_id;
    
    // INSERTAR EN TABLA ESPECIALIDAD_MEDICO
    // cada especialidad ya viene en formato id
    foreach ($especialidades as $especialidad){
        $insert_esp = $db->prepare("INSERT INTO especialidad_medico (medico_id, especialidad_id) VALUES (?, ?)");
        $insert_esp->bind_param('ii',$id_medico,$especialidad);
        $result_esp = $insert_esp->execute();
        if($result_esp!=1){
            echo "<p style=color:red;font-size:50px>Error en insertar en tabla especialidades!</p>";
        }
    }

    //INSERTAR EN TABLA FOTO_MEDICO
    $insert_foto = $db->prepare("INSERT INTO foto_medico (ruta_archivo, nombre_archivo, medico_id) VALUES (?, ?, ?)");
    $nombre_archivo = limpiar($db,$nombre_archivo);
    $ruta = "/statics/imagenes/";
    $insert_foto->bind_param("ssi",$ruta,$nombre_archivo,$id_medico);
    $result_foto = $insert_foto->execute();
    if($result_foto!=1){
        echo "<p style=color:red;font-size:50px>Error en insertar en tabla foto medico!</p>";
    }
    $db->close();
    return;
}

?>
