<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Anton&family=Dancing+Script&display=swap" rel="stylesheet">
	<style>
		*{font-family: 'Dancing Script', cursive;
			font-size: 1.2em;
			
			color: white;
			background: gray;
		}

		div{
			margin-right: auto;
			margin-left: auto;
			
			display: block;
			width: 300px;
			height: 50px;
		}

		.sinopsis{
			

			display: block;
			position: relative;
			width: 200px;
			min-height: 100px;

		}
		img{
			width: 180px;
			height: 150px;
			
		}

		.fotos{
			display: block;
			position: relative;
			top: 200px;
			width: 500px;
			
			margin-right: auto;
			margin-left: auto;
		}

		.cartel{
			display: block;
			margin-right: auto;
			margin-left: auto;
		}

	</style>
	<title>Document</title>
</head>
<body>
	<?php 

	$gen=explode("/",$_REQUEST['strgen']);


	//titulo

?><div class="tit"><?php  
	echo $_REQUEST['tit'];
	

	?></div><div><?php  
	//fecha
	echo $_REQUEST['fecha'];
	

	?></div><div class="duracion"><?php  
		//duracion
		echo $_REQUEST['dur'];
		

	?></div>
	

	<div class="genero"><?php  
		//genero/s
		foreach($gen as $g){
			echo $g."/";
		}

	?></div>
	
	
	<div class="pais"><?php  
		echo $_REQUEST['pais'];
		

		?></div>
		
	
	<div class="sinopsis"><?php  
		//sinópsis
		echo $_REQUEST['sin'];
		

	?></div>
	
	
		<!-- foto principal -->	
		<div class="cartel">
			<?php echo "Cartel"; echo "<img src=".$_REQUEST["nf"]." >";	 ?>
		</div>
		
		 


	<div class="fotos"><?php  
			
		
		//fotos alternativas
		
		if(isset($_REQUEST["nfr1"])||isset($_REQUEST["nfr2"])) echo "Reparto";
		
		if(isset($_REQUEST["nfr1"])){
			echo "<img src=".$_REQUEST["nfr1"]." >";
		}

		if(isset($_REQUEST["nfr2"])){
			echo "<img src=".$_REQUEST["nfr2"]." >";
		}

	?></div>
	
	
 

</body>
</html>

