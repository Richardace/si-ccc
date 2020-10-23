<?php

class PersonalController
{

    public function __construct(){

        require_once "model/DAO/UserDAO.php";
        require_once "model/DAO/CorreoDAO.php";

        require_once "model/DAO/ProgramDAO.php";
        require_once "model/DAO/DepartmentDAO.php";
        require_once "model/DAO/FacultadDAO.php";

        require_once "model/DAO/ProgramUserDAO.php";
        require_once "model/DAO/DepartmentUserDAO.php";
        require_once "model/DAO/FacultadUserDAO.php";
    }


    public function administrador(){

        $user = new UserDAO();
        $correo = new CorreoDAO();
        $data["correos"] = $correo->getCorreos();
        $data["solicitante"] = $user->getSolicitantes();
        $data["evaluador"] = $user->getEvaluadores();
        $data["administrador"] = $user->getAdministradores();

        require_once "view/administrator/personal.php";
    }

    public function solicitante(){
        require_once "view/solicitante/personal.php";
    }

    public function addSolicitanteView($id){
        $programas = new ProgramDAO;
        $departamentos = new DepartmentDAO;
        $facultades = new FacultadDAO;
        $correo = new CorreoDAO();
        $data["correo"] = $correo->getCorreo($_GET["id"]);
        $data["programas"] = $programas->getPrograms();
        $data["departamentos"] = $departamentos->getDepartamentos();
        $data["facultades"] = $facultades->getFacultades();
        require_once "view/administrator/addSolicitante.php";
    }

    public function addEvaluadorView($id){
        $programas = new ProgramDAO;
        $departamentos = new DepartmentDAO;
        $facultades = new FacultadDAO;
        $correo = new CorreoDAO();
        $data["correo"] = $correo->getCorreo($_GET["id"]);
        $data["programas"] = $programas->getPrograms();
        $data["departamentos"] = $departamentos->getDepartamentos();
        $data["facultades"] = $facultades->getFacultades();
        require_once "view/administrator/addEvaluador.php";
    }

    public function addAdministradorView($id){
        $correo = new CorreoDAO();
        $data["correo"] = $correo->getCorreo($_GET["id"]);
        require_once "view/administrator/addAdministrador.php";
    }

    public function addSolicitante(){
        $programUser = new ProgramUserDAO;
        $DepartmentUserDAO = new DepartmentUserDAO;
        $FacultadUserDAO = new FacultadUserDAO;
        $user = new UserDAO();

        $dependency = $_POST['dependency'];

        if ($dependency == "program") {
            $state = $_POST['state'];
            $idProgram = $_POST['idProgram'];
            $correo = $_POST['correo'];

            $insertNewUser = $user->insert($correo, $state, 2);
            $cuentaRegistrada = $user->getUserByEmail($correo);
            foreach ($cuentaRegistrada as $cuenta) {
                $idUser = $cuenta['id'];
            }
            $inserNewProgramUser = $programUser->insert($idUser, $idProgram);
            $this->administrador();
        } else if ($dependency == "department") {
            $state = $_POST['state'];
            $idProgram = $_POST['idDepartamento'];
            $correo = $_POST['correo'];

            $insertNewUser = $user->insert($correo, $state, 2);
            $cuentaRegistrada = $user->getUserByEmail($correo);
            foreach ($cuentaRegistrada as $cuenta) {
                $idUser = $cuenta['id'];
            }
            $inserNewDepartmentUser = $DepartmentUserDAO->insert($idUser, $idProgram);
            $this->administrador();
        } else if ($dependency == "facultad") {
            $state = $_POST['state'];
            $idProgram = $_POST['idFacultad'];
            $correo = $_POST['correo'];

            $insertNewUser = $user->insert($correo, $state, 2);
            $cuentaRegistrada = $user->getUserByEmail($correo);
            foreach ($cuentaRegistrada as $cuenta) {
                $idUser = $cuenta['id'];
            }
            $inserNewFacultadUser = $FacultadUserDAO->insert($idUser, $idProgram);
            $this->administrador();
        }
    }

    public function addEvaluador(){
        $programUser = new ProgramUserDAO;
        $DepartmentUserDAO = new DepartmentUserDAO;
        $FacultadUserDAO = new FacultadUserDAO;
        $user = new UserDAO();

        $dependency = $_POST['dependency'];

        if ($dependency == "program") {
            $state = $_POST['state'];
            $idProgram = $_POST['idProgram'];
            $correo = $_POST['correo'];

            $insertNewUser = $user->insert($correo, $state, 3);
            $cuentaRegistrada = $user->getUserByEmail($correo);
            foreach ($cuentaRegistrada as $cuenta) {
                $idUser = $cuenta['id'];
            }
            $inserNewProgramUser = $programUser->insert($idUser, $idProgram);
            $this->administrador();
        } else if ($dependency == "department") {
            $state = $_POST['state'];
            $idProgram = $_POST['idDepartamento'];
            $correo = $_POST['correo'];

            $insertNewUser = $user->insert($correo, $state, 3);
            $cuentaRegistrada = $user->getUserByEmail($correo);
            foreach ($cuentaRegistrada as $cuenta) {
                $idUser = $cuenta['id'];
            }
            $inserNewDepartmentUser = $DepartmentUserDAO->insert($idUser, $idProgram);
            $this->administrador();
        } else if ($dependency == "facultad") {
            $state = $_POST['state'];
            $idProgram = $_POST['idFacultad'];
            $correo = $_POST['correo'];

            $insertNewUser = $user->insert($correo, $state, 3);
            $cuentaRegistrada = $user->getUserByEmail($correo);
            foreach ($cuentaRegistrada as $cuenta) {
                $idUser = $cuenta['id'];
            }
            $inserNewFacultadUser = $FacultadUserDAO->insert($idUser, $idProgram);
            $this->administrador();
        }
    }

    public function addAdministrador(){
        $user = new UserDAO();
        $state = $_POST['state'];
        $correo = $_POST['correo'];

        $insertNewUser = $user->insert($correo, $state, 1);
        $cuentaRegistrada = $user->getUserByEmail($correo);
        foreach ($cuentaRegistrada as $cuenta) {
            $idUser = $cuenta['id'];
        }
        $this->administrador();
    }
}
