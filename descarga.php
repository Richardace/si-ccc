<?php
// Creamos un instancia de la clase ZipArchive
$zip = new ZipArchive();
// Creamos y abrimos un archivo zip temporal
$zip->open("miarchivo.zip", ZipArchive::CREATE);
// Añadimos un directorio
$dir = 'miDirectorio';
$zip->addEmptyDir($dir);
// Añadimos un archivo en la raid del zip.
$zip->addFile("imagen1.jpg", "mi_imagen1.jpg");
//Añadimos un archivo dentro del directorio que hemos creado
$zip->addFile("imagen2.jpg", $dir . "/mi_imagen2.jpg");
// Una vez añadido los archivos deseados cerramos el zip.
$zip->close();
// Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
header("Content-type: application/octet-stream");
header("Content-disposition: attachment; filename=miarchivo.zip");
// leemos el archivo creado
readfile('miarchivo.zip');
// Por último eliminamos el archivo temporal creado
unlink('miarchivo.zip');//Destruye el archivo temporal

?>
