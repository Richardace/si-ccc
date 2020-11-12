<?php

class SesionDAO
{

    public function changeState($id)
    {
        $db = new Connect;

        $validarCorreo = $db->prepare("SELECT * FROM sesiones WHERE id=:idSesion");
        $validarCorreo->execute([
            ':idSesion'   => $id
        ]);

        $estadoActual = "";

        while ($row = $validarCorreo->fetch(PDO::FETCH_ASSOC)) {

            $estadoActual = $row['state'];
        }

        if ($estadoActual == "Activo") {
            $validarCorreo = $db->prepare("UPDATE sesiones SET state=:newState WHERE id=:idSesion");
            $validarCorreo->execute([
                'newState' => "Inactivo",
                ':idSesion'   => $id
            ]);
        } else {
            $validarCorreo = $db->prepare("UPDATE sesiones SET state=:newState WHERE id=:idSesion");
            $validarCorreo->execute([
                'newState' => "Activo",
                ':idSesion'   => $id
            ]);
        }
    }

    public function changeStateView($id)
    {
        $db = new Connect;

        $validarCorreo = $db->prepare("SELECT * FROM sesiones WHERE id=:idSesion");
        $validarCorreo->execute([
            ':idSesion'   => $id
        ]);

        $estadoActual = "";

        while ($row = $validarCorreo->fetch(PDO::FETCH_ASSOC)) {

            $estadoActual = $row['stateView'];
        }

        if ($estadoActual == "Visible") {
            $validarCorreo = $db->prepare("UPDATE sesiones SET stateView=:newState WHERE id=:idSesion");
            $validarCorreo->execute([
                ':newState' => "No Visible",
                ':idSesion'   => $id
            ]);
        } else {
            $validarCorreo = $db->prepare("UPDATE sesiones SET stateView=:newState WHERE id=:idSesion");
            $validarCorreo->execute([
                ':newState' => "Visible",
                ':idSesion'   => $id
            ]);
        }
    }

    public function addSesion($fechaSesion, $fechaLimite, $semestre, $anio){
        $db = new Connect;

        $insertNewSesion = $db->prepare("INSERT INTO sesiones (fechaSesion, fechaLimite, semestre, anio, state, stateView) VALUES (:fechaSesion, :fechaLimite, :semestre, :anio, :state, :stateView)");
        $insertNewSesion->execute([
            ':fechaSesion'   => $fechaSesion,
            ':fechaLimite' => $fechaLimite,
            ':semestre'   => $semestre,
            ':anio' => $anio,
            ':state' => "Activo",
            ':stateView' => "Visible"
        ]);

        return $insertNewSesion;
    }

    public function getSesiones()
    {
        $db = new Connect;
        $consulta = $db->prepare('SELECT * FROM sesiones ORDER BY id DESC');
        $consulta->execute();
        $sesiones = NULL;
        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $sesiones[] = $row;
        }
        return $sesiones;
    }

    public function updateSesion($idSesion, $fechaSesion, $fechaLimite, $semestre, $anio)
    {
        $db = new Connect;
        $validarCorreo = $db->prepare("UPDATE sesiones SET fechaSesion=:fechaSesion, fechaLimite=:fechaLimite, semestre=:semestre, anio=:anio WHERE id=:idSesion");
        $validarCorreo->execute([
            ':idSesion' => $idSesion,
            ':fechaSesion'   => $fechaSesion,
            ':fechaLimite' => $fechaLimite,
            ':semestre'   => $semestre,
            ':anio' => $anio
        ]);
    }

    public function getSesionById($id)
    {
        $db = new Connect;
        $consulta = $db->prepare('SELECT * FROM sesiones WHERE id=:id');
        $consulta->execute([
            ':id'   => $id
        ]);
        $sesiones = NULL;
        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $sesiones[] = $row;
        }
        return $sesiones;
    }

    public function saveDocumentSesion($nameDocument, $dateConfig){
        $db = new Connect;
        $validarCorreo = $db->prepare("UPDATE config SET valor=:nameDocument, dateCambio=:dateCambio WHERE id=:idClave");
        $validarCorreo->execute([
            ':idClave' => 1,
            ':dateCambio' => $dateConfig,
            ':nameDocument' => $nameDocument
        ]);

        return true;
    }

    public function getDocumentSesion(){
        $db = new Connect;
        $consulta = $db->prepare('SELECT * FROM config WHERE id=:idClave');
        $consulta->execute([
            ':idClave'   => 1
        ]);
        $documento = NULL;
        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $documento[] = $row;
        }
        return $documento;
    }

    
}
