<?php
include_once("db_config.php");

// Funcion que retorna el id comuna (result[0]) y id region (result[1])
function getComunaRegionId($comuna){
    $db = DBConfig::getConnection();
    $query = "SELECT id, region_id FROM comuna WHERE nombre LIKE '%$comuna%'";
    $result = $db->query($query);
    if($result->num_rows>0){
        $row = $result->fetch_row();
        $db->close();
        return $row; 
    }
    else{
        $db->close();
        return false;
    }
    
}

function getEspecialidadId($especialidad){
    $db = DBConfig::getConnection();
    $query = "SELECT id FROM especialidad WHERE descripcion LIKE '%$especialidad%'";
    $result = $db->query($query);
    if($result->num_rows > 0){
        $id = $result->fetch_row()[0];
        return $id;
    }
    return false;
}

function getEspecialidadesIds($especialidades){
    $ids = array();
    foreach ($especialidades as $value) {
        $especialidad_id = getEspecialidadId($value);
        if($especialidad_id!=NULL){
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