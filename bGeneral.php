<?php

//FORMULARIO PELÍCULA!
//título

function cTitulo($tit,&$err){
    $val=true;
    if(mb_strlen($tit)<=0){
        $err[]="el título es obligatorio!<br>";
        $val=false;
    }
    return $val;
}

function cGen($gen,&$err){
    $valid=true;
    if($gen="" || empty($gen)){
        $valid=false;
    }
    return $valid;


}



//sinopsis
function cSin($sin,$min,&$err){
    $val=true;
    if(mb_strlen($sin)<$min || $sin==""){
        $err[]="La sinopsis debe tener por lo menos $min caracteres";
        $val=false;
    }

    return $val;
}

//las fotos

function cFot($value,$foto,&$err,$formatos=array('png','jpeg','jpg','gif')){
  
    $formato;
    $valid=false;
    if(empty($foto)){
        $err[]="La foto de cartel NO puede quedar vacía!";
        return false;
    }else{
        $foto=explode(".",$foto);
        
        
    }

    foreach($formatos as $form){
        if(strcasecmp($foto[1],$form)){
            $valid= true;
        }
    }

    if($valid==true&&is_uploaded_file($_FILES[$value]['tmp_name'])){
        if(move_uploaded_file($_FILES[$value]['tmp_name'], "".preg_replace("/ +/","_",($foto[0].".".$foto[1])))){return true;}else{
            $err[]="el archivo no se pudo mover!";
            return false;
        }
    }else{
        $err[]="El archivo no se puedo subir";
        return false;
    }
   

    

    $err[]="el formato de la foto NO es valido!";
    return $valid;
}


//----------FIN-----------



function cabecera($titulo = "Ejemplo") // el archivo actual

{
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>
    				<?php
        echo $titulo;
        ?>
    			
    			</title>
    <meta charset="utf-8" />
    </head>
    <body>
    <?php
}

function pie()
{
    echo "</body>
	</html>";
}

function sinTildes($frase)
{
    $no_permitidas = array(
        "á",
        "é",
        "í",
        "ó",
        "ú",
        "Á",
        "É",
        "Í",
        "Ó",
        "Ú",
        "à",
        "è",
        "ì",
        "ò",
        "ù",
        "À",
        "È",
        "Ì",
        "Ò",
        "Ù"
    );
    $permitidas = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U",
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    $texto = str_replace($no_permitidas, $permitidas, $frase);
    return $texto;
}

function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp = strip_tags(sinEspacios($_REQUEST[$var]));
    else
        $tmp = "";

    return $tmp;
}

function cTexto($text, &$errores, $max = 200, $min = 1)
{
    $valido = true;
    if ((mb_strlen($text) > $max) || (mb_strlen($text) < $min)) {
        $errores["name_1"] = "El nombre debe tener entre $min y $max letras";
        $valido = false;
    }
    if (! preg_match("/^[A-Za-zÑñ ]+$/", sinTildes($text))) {
        $errores["name_2"] = "El nombre sólo debe tener letras";
        $valido = false;
    }
    
    return $valido;
}

/*
 * function cTexto($text, &$errores, $max = 30, $min = 1)
 * {
 * if (! (preg_match("/^[A-Za-zÑñ]{" . $min, $max . "}$/", sinTildes($text)))) {
 * $errores["name"] = "Error en el nombre";
 * return false;
 * } else {
 * return true;
 * }
 * }
 */
function cNum($num, &$errores, $tam = PHP_INT_MAX)
{
    $valido = true;
    if ($num > $tam) {
        $valido = false;
        $errores["edad_1"] = "El número es demasiado grande";
    }
    if (! preg_match("/^[0-9]+$/", $num)) {
        $valido = false;
        $errores["edad_2"] = "La edad sólo puede contener números";
    }
    return $valido;
}
?>