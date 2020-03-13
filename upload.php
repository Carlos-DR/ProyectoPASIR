<?php

include "class.upload.php";

$image = new Upload($_FILES["image"]);
if($image->uploaded){
	$image->Process("imagenes/");
	if($image->processed){
		//echo "Upload Success";
            echo "El fichero ". $_FILES["image"]["name"]. " Se ha subido satisfactoriamente";
	}else{
		echo "Error: ".$image->error;
	}
}

?>