<?php 
	require('bGeneral.php');
	require('formulario.php');

	$errores=[];
	$location="location:valido.php?";
	$valid=false;
	if(isset($_REQUEST['send'])){
		$tit=$_REQUEST['titulo'];
		$fecha=$_REQUEST['fecha'];
		$gen;
		$strgen="";
		if(isset($_REQUEST['genero'])){
			$gen=$_REQUEST['genero'];
		}else{
			$gen="";
			$errores[]="debes seleccionar al menos un género!";
		}

		if($gen!=""){

			foreach($gen as $g){
				
				$strgen.="/$g";

				
			}
			
		}

		$dur;
		if(is_numeric($_REQUEST['duracion'])){
				$dur=$_REQUEST['duracion'];
			}else if($_REQUEST['duracion']==""){
				$dur=$_REQUEST['duracion'];
			}else{
				$dur="";
				$errores[]="la duración solo puede llevar números (	minutos)";
			}

		$pais;

		if($_REQUEST['pais']!=""){
			$pais=$_REQUEST['pais'];
		}else{
			$errores[]="Debes seleccionar un país!";
			$pais=false;
		}


		
		// echo cSin($_REQUEST['sinopsis'],50,$errores);


		//el cartel
	    $ftoC=cFot("fCartel",$_FILES['fCartel']['name'],$errores);
		$location.="nf=".preg_replace("/ +/","_",($_FILES['fCartel']['name']));
		

		//las fotos
		if(is_uploaded_file($_FILES['fR1']['tmp_name'])){
			$fto1=cFot("fR1",$_FILES['fR1']['name'],$errores);
			if($fto1)
			$location.="&nfr1=".preg_replace("/ +/","_",($_FILES['fR1']['name']));
			else
				$errores[]="Comprueba la foto1!";
		}

		if(is_uploaded_file($_FILES['fR2']['tmp_name'])){
			$fto1=cFot("fR2",$_FILES['fR2']['name'],$errores);
			if($fto1)
			$location.="&nfr2=".preg_replace("/ +/","_",($_FILES['fR2']['name']));
			else
				$errores[]="Comprueba la foto2!";
		}



		//equacion final
		if(cTitulo($tit,$errores)&&cGen($gen,$errores)&&(is_numeric($dur)||$dur=="")&&($pais!=false)&&cSin($_REQUEST['sinopsis'],"200",$errores)&&$ftoC){
			$valid=true;
			header(sinEspacios($location."&tit=$tit&fecha=$fecha&strgen=$strgen&sin=".$_REQUEST['sinopsis']."&dur=$dur&pais=$pais"));

		}else{
			
			 foreach($errores as $error){
				echo "<b class='errores'>*$error</b>";
			 }
		}


		
		

		//echo print_r($gen);

		//if(cTitulo($tit,$errores) && )

		// echo print_r($gen);
	}		

 ?>
