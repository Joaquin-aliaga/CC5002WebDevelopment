<!DOCTYPE html>
<html>
<head>
	<title>Agregar Médico</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../statics/css/aux3.css">
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
	<form id="formulario_medico" action="../controllers/procesar_medico.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<p>Agregar Médico</p>
		<label for="regiones" class="text-field">Región</label>
		<br>
		<select id="regiones" name="region-medico"></select>
		<br>
		<label for="comunas" class="text-field">Comuna</label>
		<br>
		<select id="comunas" name="comuna-medico"></select>
		<br>
		<label for="nombre" class="text-field">Nombre</label>
		<br>
		<input type="text" name="nombre-medico" id="nombre" placeholder="Ingrese nombre medico" size="30">
		<br>
		<label for="experiencia" class="text-field">Experiencia</label>
		<br>
		<textarea name="experiencia-medico" id="experiencia" cols="40" rows="8" placeholder="Ingrese la experiencia del médico" maxlength="500"></textarea>
		<br>
		<p>Marque la(s) especialidad(es) del médico</p>

		<label for="cardiologia">Cardiología</label>
		<input type="checkbox" name="especialidades-medico[]" id="cardiologia" value="Cardiología">
		
		<label for="gastroenterología">Gastroenterología</label>
		<input type="checkbox" name="especialidades-medico[]" id="gastroenterología" value="Gastroenterología">
		
		<label for="endocrinologia">Endocrinología</label>
		<input type="checkbox" name="especialidades-medico[]" id="endocrinologia" value="Endocrinología">
		
		<label for="epidemiologia">Epidemiología</label>
		<input type="checkbox" name="especialidades-medico[]" id="epidemiologia" value="Epidemiología">
	
		<label for="geriatria">Geriatría</label>
		<input type="checkbox" name="especialidades-medico[]" id="geriatria" value="Geriatría">
		
		<label for="hematologia">Hematología</label>
		<input type="checkbox" name="especialidades-medico[]" id="hematologia" value="Hematología">

		<label for="infectologia">Infectología</label>
		<input type="checkbox" name="especialidades-medico[]" id="infectologia" value="Infectología">

		<label for="medicina_deporte">Medicina del deporte</label>
		<input type="checkbox" name="especialidades-medico[]" id="medicina_deporte" value="Medicina del deporte">

		<label for="medicina_urgencias">Medicina de urgencias</label>
		<input type="checkbox" name="especialidades-medico[]" id="medicina_urgencias" value="Medicina de urgencias">

		<label for="medicina_interna">Medicina interna</label>
		<input type="checkbox" name="especialidades-medico[]" id="medicina_interna" value="Medicina interna">

		<label for="nefrologia">Nefrología</label>
		<input type="checkbox" name="especialidades-medico[]" id="nefrologia" value="Nefrología">

		<label for="neumologia">Neumología</label>
		<input type="checkbox" name="especialidades-medico[]" id="neumologia" value="Neumología">
		
		<label for="neurologia">Neurología</label>
		<input type="checkbox" name="especialidades-medico[]" id="neurologia" value="Neurología">

		<label for="nutriologia">Nutriología</label>
		<input type="checkbox" name="especialidades-medico[]" id="nutriologia" value="Nutriología">

		<label for="oncologia">Oncología</label>
		<input type="checkbox" name="especialidades-medico[]" id="oncologia" value="Oncología">

		<label for="pediatria">Pediatría</label>
		<input type="checkbox" name="especialidades-medico[]" id="pediatria" value="Pediatría">

		<label for="psiquiatria">Psiquiatría</label>
		<input type="checkbox" name="especialidades-medico[]" id="psiquiatria" value="Psiquiatría">

		<label for="reumatologia">Reumatología</label>
		<input type="checkbox" name="especialidades-medico[]" id="reumatologia" value="Reumatología">

		<label for="toxicologia">Toxicología</label>
		<input type="checkbox" name="especialidades-medico[]" id="toxicologia" value="Toxicología">

		<label for="dermatologia">Dermatología</label>
		<input type="checkbox" name="especialidades-medico[]" id="dermatologia" value="Dermatología">

		<label for="ginecologia">Ginecología</label>
		<input type="checkbox" name="especialidades-medico[]" id="ginecologia" value="Ginecología">

		<label for="oftalmologia">Oftalmología</label>
		<input type="checkbox" name="especialidades-medico[]" id="oftalmologia" value="Oftalmología">

		<label for="otorrinolaringologia">Otorrinolaringología</label>
		<input type="checkbox" name="especialidades-medico[]" id="otorrinolaringologia" value="Otorrinolaringología">

		<label for="urologia">Urología</label>
		<input type="checkbox" name="especialidades-medico[]" id="urologia" value="Urología">
		
		<label for="traumatologia">Traumatología</label>
		<input type="checkbox" name="especialidades-medico[]" id="traumatologia value="Traumatología">
	
		<br>
		<label for="foto" class="text-field">Agregar foto(s) médico</label>
		<br>
		<input type="file" name="foto-medico[]" id="foto">
		<br>
		<label for="twitter" class="text-field">Twitter médico</label>
		<br>
		<input type="text" name="twitter-medico" id="twitter" placeholder="@usuario" maxlength="80">
		<br>
		<label for="mail" class="text-field">Mail</label>
		<br>
		<input type="email" name="email-medico" id="mail" placeholder="ejemplo@dominio.cl" size=30>
		<br>
		<label for="numero" class="text-field">Télefono Celular</label>
		<br>
		<input type="number" name="celular-medico" id="numero" placeholder="56912345678">
		<br>
		<input type="submit" name="enviar" value="Agregar médico">
	</form>
</div>
	<a href="../index.php">Volver a menú principal</a>
</body>
</html>