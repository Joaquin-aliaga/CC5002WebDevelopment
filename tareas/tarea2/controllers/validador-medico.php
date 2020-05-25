<?php
/**
 * Validación nombre, region y comuna.
 */
function checkNRC($post){
	// validamos el nombre
	if(isset($post['nombre-medico'])){
		$regexp = "/^[A-Za-záéíóú\ ]+$/";
		if(preg_match($regexp, $post['nombre-medico'])){
			$nombre = true;
		}
		else{
			$nombre = false;
		}
	}
	if(isset($post['region-medico'])){
		$regexp = "/^[A-Za-záéíóú\ ]+$/";
		if(preg_match($regexp, $post['region.medico'])){
			$region = true;
		}
		else{
			$region = false;
		}
	}
	if(isset($post['comuna-medico'])){
		$regexp = "/^[A-Za-záéíóú\ ]+$/";
		if(preg_match($regexp, $post['comuna-medico'])){
			$comuna = true;
		}
		else{
			$comuna = false;
		}
	}
	return ($nombre and $region and $comuna);
}


/**
 * Validación experiencia medico.
 */
function checkExperiencia($post){
	if(isset($post['experiencia-medico'])){
		if(strlen($post['experiencia-medico'])<=500){
			return true;
		}
	}
	return false;
}


/**
 * Validación para seleccionar especialidades.
 */
function checkEspecialidades($post){
	if(isset($post['especialidades-medico'])){
		$cantidad = count($post['especialidades-medico']);
		if($cantidad>0 and $cantidad<=5){
			return true;
		}
	}
	return false;
}


/**
 * Validacion de formato cuenta twitter
 */
function checkTwitter($post){
	if(isset($post['twitter-medico'])){
		$regexp = "/(^|[^@\w])@(\w{1,15})\b/";
		if(preg_match($regexp, $post['twitter-medico'])){
			return true;
		}
	}
	return false;
}

/**
 * Validacion de formato mail
 */
function checkMail($post){
	$email = test_input($post["email-medico"]);
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	}
	return false;
}
function checkPhone($post){
	if(isset($post['celular-medico'])){
		$regexp = "/^(\+?569)?(\s?)[9876543]\d{7}$/";
		if(preg_match($regexp, $post['celular-medico'])){
			return true;
		}
	}
	return false;
}

/**
 * Validador foto medico
 */
function checkImage($files)
	// Validamos que el archivo sea una imagen
	if(!getimagesize($files['imagen']['tmp_name'])){
		echo "<p style=color:red;font-size:50px>Error: el archivo no es una imagen!</p>";
		return false;
	}
	return true;
?>