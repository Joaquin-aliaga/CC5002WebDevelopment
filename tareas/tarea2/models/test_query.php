<?php

include_once("db_config.php");

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

$esp = array();
$esp[] = 'Nutriologia';
$esp[] = 'Psiquiatria';

$nutriologia = "Nutriologia";

//$row = getEspecialidadId($nutriologia);
//print_r($row);

$array = getEspecialidadesIds($esp);
print_r($array);
?>