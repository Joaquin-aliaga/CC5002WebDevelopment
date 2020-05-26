<?php
/**
 * Validación nombre, region y comuna.
 */
function checkName($post){
	// validamos el nombre
	if(isset($post['nombre-solicitante'])){
		$regexp = "/^[A-Za-záéíóú\ ]+$/";
		if(preg_match($regexp, $post['nombre-solicitante'])){
			return true;
		}
	}
	return false;
}


/**
 * Validación experiencia medico.
 */
function checkSintomas($post){
	if(isset($post['sintomas-solicitante'])){
		if(strlen($post['sintomas-solicitante'])<=500){
			return true;
		}
	}
	return false;
}


/**
 * Validación para seleccionar especialidades.
 */
function checkEspecialidad($post){
	if(isset($post['especialidad-solicitud'])){
		return true;	
	}
	return false;
}


/**
 * Validacion de formato cuenta twitter
 */
function checkTwitter($post){
	if(isset($post['twitter-solicitante'])){
		$regexp = "/(^|[^@\w])@(\w{1,15})\b/";
		if(preg_match($regexp, $post['twitter-solicitante'])){
			return true;
		}
	}
	return false;
}

/**
 * Validacion de formato mail
 */
function checkMail($post){
	if(isset($post["email-solicitante"])){
		if (filter_var($post["email-solicitante"], FILTER_VALIDATE_EMAIL)) {
			return true;
		}
	}
	return false;
}

function checkPhone($post){
	if(isset($post['celular-solicitante'])){
		$regexp = "/^(569)[9876543210]\d{8}$/";
		if(preg_match($regexp, $post['celular-solicitante'])){
			return true;
		}
	}
	return false;
}
?>