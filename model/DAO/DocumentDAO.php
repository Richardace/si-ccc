<?php

class DocumentDAO
{

        public function addDocument($usuario, $origen, $destino, $titulo, $descripcion, $documentos, $nameFolder)
        {
                $db = new Connect;
                $sql = $db->query("INSERT INTO documento(id_user, id_source, destiny, title, description, files, state, nameFolder) VALUES('" . $usuario . "','" . $origen . "', '" . $destino . "', '" . $titulo . "', '" . $descripcion . "', '" . $documentos . "', 'Activo', '" . $nameFolder . "') ");

                return $sql;
        }







}

?>