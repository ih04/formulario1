<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estil.css">

	<style>
		
	</style>
	<title>Document</title>
</head>
<body>

	<video muted autoplay poster="poster.png" loop>
		<source src="video.mp4" type="video/mp4" >

	</video>
	<div class="container">
			<form class="form" action="" method="post" enctype="multipart/form-data">
				<p class="recordatorio">las casillas <?php echo "<b style='color:red;'>*</b>" ?> son obligatorias! </p>
				<input class="form__item"  type="text" name="titulo" placeholder="*Título">
				<input class="form__item"  type="date" name="fecha">
		
				<p>*Género	</p>
				<div class="form_item gen">
				<?php 
					require("config.php");

					foreach($genero as $gen){
						echo $gen; ?>
						<input class="gen__item" type="checkbox" name="genero[]" value='<?php echo $gen; ?>'>
					<?php }

				?>
				</div>
				<input class="form__item" type="text" name="duracion" placeholder="duracion (min)">
		
				<p>*País(obligatorio)</p>
				<?php 
			
					if(count($pais)>0){
						echo '<select class="form__item" name="pais" id="">';
						
						echo '<option selected></option>';

						foreach ($pais as $pos => $valor) {
							$country=mb_strtolower($valor);
							?>
							<option value='<?php echo $country ?>'><?php echo $pos; ?></option>
						

					<?php 	}

						echo "</select>";
					}
					


				 ?>



				<textarea class="form__item" placeholder="*sinopsis de la película" name="sinopsis"></textarea>
				<p>*foto de cartel*</p>
				<input class="form__item" type="file" name="fCartel">
				<p>fotos de reparto</p>
				<input class="form__item" type="file" name="fR1">
				<input class="form__item" type="file" name="fR2">

				<input class="form__item" type="submit" name="send" value="enviar">

			</form>

		</div>
</body>
</html>