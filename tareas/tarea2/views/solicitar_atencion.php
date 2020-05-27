<!DOCTYPE html>
<html>
<head>
	<title>Solicitud Atención</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
	<!--<link rel="stylesheet" type="text/css" href="../statics/css/tarea1.css">-->
	<link rel="stylesheet" type="text/css" href="../statics/css/aux3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.js"></script>
	<script src="../statics/js/tarea1.js"></script>
	<script src="../statics/js/validacionv2.js"></script>
</head>

<body>
<?php
    if(isset($_GET['errores'])){
      print_r($_GET['errores']); 
    }
?>
	<div id="container"> 
	<form id="formulario_solicitud" action="../controllers/procesar_solicitud.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<p>Publicar Solicitud de Atención</p>
		<label for="regiones" class="text-field">Región</label>
		<br>
		<select id="regiones" name="region-solicitante"></select>
		<br>
		<label for="comunas" class="text-field">Comuna</label>
		<br>
		<select id="comunas" name="comuna-solicitante"></select>
		<br>
		<label for="nombre" class="text-field">Nombre Solicitante</label>
		<br>
		<input type="text" name="nombre-solicitante" id="nombre" placeholder="Ingrese nombre solicitante" maxlength="30" size="200">
		<br>
		<label for="descripcion" class="text-field">Descripción de síntomas</label>
		<br>
		<textarea name="sintomas-solicitante" id="descripcion" cols="40" rows="8" placeholder="Ingrese síntomas" maxlength="500"></textarea>
		<br>
		<p>Marque una especialidad</p>
		<br>
		<label for="cardiologia">Cardiología</label>
		<input type="radio" name="especialidad-solicitud" id="cardiologia" value="Cardiología">
		<br>
		<label for="gastroenterología">Gastroenterología</label>
		<input type="radio" name="especialidad-solicitud" id="gastroenterología" value="Gastroenterología">
		<br>
		<label for="endocrinologia">Endocrinología</label>
		<input type="radio" name="especialidad-solicitud" id="endocrinologia" value="Endocrinología">
		<br>
		<label for="epidemiologia">Epidemiología</label>
		<input type="radio" name="especialidad-solicitud" id="epidemiologia" value="Epidemiología">
		<br>
		<label for="geriatria">Geriatría</label>
		<input type="radio" name="especialidad-solicitud" id="geriatria" value="Geriatría">
		<br>
		<label for="hematologia">Hematología</label>
		<input type="radio" name="especialidad-solicitud" id="hematologia" value="Hematología">
		<br>
		<label for="infectologia">Infectología</label>
		<input type="radio" name="especialidad-solicitud" id="infectologia" value="Infectología">
		<br>
		<label for="medicina_deporte">Medicina del deporte</label>
		<input type="radio" name="especialidad-solicitud" id="medicina_deporte" value="Medicina del deporte">
		<br>
		<label for="medicina_urgencias">Medicina de urgencias</label>
		<input type="radio" name="especialidad-solicitud" id="medicina_urgencias" value="Medicina de urgencias">
		<br>
		<label for="medicina_interna">Medicina interna</label>
		<input type="radio" name="especialidad-solicitud" id="medicina_interna" value="Medicina interna">
		<br>
		<label for="nefrologia">Nefrología</label>
		<input type="radio" name="especialidad-solicitud" id="nefrologia" value="Nefrología">
		<br>
		<label for="neumologia">Neumología</label>
		<input type="radio" name="especialidad-solicitud" id="neumologia" value="Neumología">
		<br>	
		<label for="neurologia">Neurología</label>
		<input type="radio" name="especialidad-solicitud" id="neurologia" value="Neurología">
		<br>
		<label for="nutriologia">Nutriología</label>
		<input type="radio" name="especialidad-solicitud" id="nutriologia" value="Nutriología">
		<br>
		<label for="oncologia">Oncología</label>
		<input type="radio" name="especialidad-solicitud" id="oncologia" value="Oncología">
		<br>
		<label for="pediatria">Pediatría</label>
		<input type="radio" name="especialidad-solicitud" id="pediatria" value="Pediatría">
		<br>
		<label for="psiquiatria">Psiquiatría</label>
		<input type="radio" name="especialidad-solicitud" id="psiquiatria" value="Psiquiatría">
		<br>
		<label for="reumatologia">Reumatología</label>
		<input type="radio" name="especialidad-solicitud" id="reumatologia" value="Reumatología">
		<br>
		<label for="toxicologia">Toxicología</label>
		<input type="radio" name="especialidad-solicitud" id="toxicologia" value="Toxicología">
		<br>
		<label for="dermatologia">Dermatología</label>
		<input type="radio" name="especialidad-solicitud" id="dermatologia" value="Dermatología">
		<br>
		<label for="ginecologia">Ginecología</label>
		<input type="radio" name="especialidad-solicitud" id="ginecologia" value="Ginecología">
		<br>
		<label for="oftalmologia">Oftalmología</label>
		<input type="radio" name="especialidad-solicitud" id="oftalmologia" value="Oftalmología">
		<br>
		<label for="otorrinolaringologia">Otorrinolaringología</label>
		<input type="radio" name="especialidad-solicitud" id="otorrinolaringologia" value="Otorrinolaringología">
		<br>
		<label for="urologia">Urología</label>
		<input type="radio" name="especialidad-solicitud" id="urologia" value="Urología">
		<br>
		<label for="traumatologia">Traumatología</label>
		<input type="radio" name="especialidad-solicitud" id="traumatologia value="Traumatología">
		<br>
		<label for="archivo_complementario" class="text-field">Archivos Complementarios</label>
		<br>
		<input type="file" name="archivos-solicitante" id="archivo_complementario">
		<br>
		<br>
		<label for="twitter" class="text-field">Twitter</label>
		<input type="text" name="twitter-solicitante" id="twitter" placeholder="@usuario" maxlength="80" minlength="3">
		<br>
		<br>
		<label for="mail" class="text-field">Mail</label>
		<input type="email" name="email-solicitante" id="mail" placeholder="ejemplo@dominio.cl" size=30>
		<br>
		<br>
		<label for="numero" class="text-field">Télefono Celular</label>
		<input type="number" name="celular-solicitante" id="numero" placeholder="+56912345678" size=15>
		<br>
		<input type="submit" name="enviar" value="Agregar médico">
	
	</form>
	</div>

	<a href="../index.php">Volver a menú principal</a>
</body>
</html>