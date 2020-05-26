<?php
include_once("./db_config.php");

// Funcion que retorna el id comuna (result[0]) y id region (result[1])
function getComunaRegionId($comuna){
    $db = DBConfig::getConnection();
    $query = "SELECT id, region_id FROM `comuna` WHERE nombre LIKE %$comuna%";
    if($result = $db->query($query);){
        return $result->fetch_row(); 
    }
    else{
        return false;
    }
    
}

// Funcion que retorna el id de una especialidad
function getEspecialidadId($especialidad){
    $db = DBConfig::getConnection();
    $query = "SELECT id FROM `especialidad` WHERE descripcion LIKE %$especialidad%";
    if($result = $db->query($query)){
        return $result->fetch_row()[0];
    }
    else{
        return false;
    }
}

// Funcion que retorna los ids de las especialidades
// especialidades es un array
function getEspecialidadesIds($especialidades){
    $ids = array();
    foreach ($especialidades as $value) {
        if(getEspecialidadId($value)){
            $ids[] = getEspecialidadId($value);
        }
        else{
            echo "Error al obtener id de especialidad $value";
            return;
        }
    }
    return $ids;
}


?>