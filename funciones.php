<?php 




//comprobar nombre
function cNom($var="",$max=200,$min=1,&$err){
	 $comprob=true;
	if(mb_strlen($var)>$max || mb_strlen($var)<$min){
		$comprob=false;
		$err[]="El nombre no puede ser superior a $max o inferior a $min caracteres!<br>";
	}
	if(!ctype_alpha($var) && mb_strlen($var)>0){
		$comprob=false;
		$err[]="el nombre solo puede llevar letras!<br>";
	}
	if(!isset($var) || $var==""){
		$comprob=false;
		$err[]="El campo nombre no puede quedar vacío!<br>";
	}

	return $comprob;




}


//comprobar edad


function cEdad($var="",$min=1,$max=190,&$err){
	if($var>=$min && $var<=$max)return true;

	$err[]="edad fuera de rango!";
	return false;


}

function cArchivo($size,$max=1,$type="",$ext="",&$err){
	$val=true;
	if($size>$max){
		$err[]="El archivo subido es demasiado grande! no debe exceder de $max b";
		$val=false;
	}
	if(!in_array($type,$ext)){
		$err[]="error! formato de archivo incorrecto!";
		$val=false;
	}
	return $val;

}

//recoger dato

function recoge($var){
	if(isset($var)){
		$tmp=strip_tags(preg_replace("/ +/"," ",trim($var)));
	}else{
		$tmp="";
	}

	return $tmp;
}


//comprobar radiobutton

function cRad(){

	if($_POST["radio"]=="on")return true;
	return false;
}


 ?>