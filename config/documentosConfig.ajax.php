<?php
error_reporting(E_ERROR | E_PARSE);

if (isset($_FILES["file"])) {

	if (isset($_FILES["file"]["tmp_name"]) && !empty($_FILES["file"]["tmp_name"])) {

		$directorio = "../documentConfig/";

		if (!file_exists($directorio)) {

			mkdir($directorio, 0755);
		}

		if (basename($_FILES["file"]["name"]) == NULL || basename($_FILES["file"]["name"]) == "") {
			return "";
		}

		$archivo =  $directorio . "/" . basename($_FILES["file"]["name"]);

		$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

		if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)) {
		} else {
			echo "Hubo un error en la subida del archivo";
		}

		echo $archivo;
	}
}
