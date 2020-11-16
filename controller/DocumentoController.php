<?php

class DocumentoController
{

    public function __construct()
    {
        require_once "model/DAO/DocumentDAO.php";

        require_once "model/DAO/UserDAO.php";
        require_once "model/DAO/ProgramDAO.php";
        require_once "model/DAO/FacultadDAO.php";

        require_once "model/DAO/ProgramUserDAO.php";
        require_once "model/DAO/FacultadUserDAO.php";
    }

    public function administrador()
    {
        $document = new DocumentDAO;
        $data['documentos'] = $document->getDocumentsPending();
        require_once "view/administrator/documentos.php";
    }  

    public function viewDocumentAdministrador($id){
        $document = new DocumentDAO;
        $data['documentos'] = $document->getDocumentById($id);
        //Get DocumentEvaluador
        $data['documentoEvaluador'] = $document->getDocumentEvaluador($id);
        
        $data['estados'] = $document->getEstadosDocumento($id);

        $data['correccionesDocumento'] = $document->getCorreccionesDocumentEvaluador($id);

        require_once "view/administrator/viewDocument.php";
    }

    public function solicitante($id)
    {
        $document = new DocumentDAO;
        $userDAO = new UserDAO;        
        $data['documentos'] = $document->getDocumentsByIdUser($id);

        require_once "view/solicitante/documentos.php";
    }

    public function addDocumentView($id)
    {
        $userDAO = new UserDAO;
        $data['dependency'] = $dependency = $userDAO->getDependencyByIdUser($id);
        require_once "view/solicitante/addDocumento.php";
    }

    public function addDocument()
    {
        $usuario = $_POST["usuario"];
        $descripcion = $_POST["descripcion"];
        $titulo = $_POST["titulo"];
        $documentos = $_POST["documentos"];
        $nameFolder = $_POST["nameFolder"];

        $document = new DocumentDAO;

        $sql = $document->addDocument($usuario, $titulo, $descripcion, $documentos, $nameFolder);

        if ($sql) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    public function addCorreccionDocumento(){
        $idDocumento = $_POST["idDocumento"];
        $descripcion = $_POST["descripcion"];
        $documentos = $_POST["documentos"];
        $nameFolder = $_POST["nameFolder"];

        $document = new DocumentDAO;

        $sql = $document->addCorreccionDocument($idDocumento, $descripcion, $documentos, $nameFolder);

        $idDependency = $document->getCorreoByDocument($idDocumento);

        $this->enviarNotificacionDeCorreccion($idDependency);

        if ($sql) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    public function addRevisionDocumento(){
        $idDocumentoEvaluador = $_POST["idDocumentEvaluador"];
        $descripcion = $_POST["descripcion"];
        $documentos = $_POST["documentos"];
        

        $document = new DocumentDAO;
        $idDocumento = $document->getDocumentByIdEvaluadorDocumento($idDocumentoEvaluador);

        $evaluadores = $document->getEvaluadoresDocument($idDocumento);

        $boolean = true;
        foreach ($evaluadores as $evaluador){

            if($evaluador['id'] == $idDocumentoEvaluador){
                continue;
            }

            if($evaluador['observaciones'] != ""){
                continue;
            }else{
                $boolean = false;
            }
        }
        if($boolean){
            $sql = $document->addRevisionDocument($idDocumentoEvaluador, $descripcion, $documentos, $idDocumento, 'Revisado por Evaluadores');
        }else{
            $sql = $document->addRevisionDocument($idDocumentoEvaluador, $descripcion, $documentos, $idDocumento, '');
        }
        //HACER ALGORITMO PARA SABER SI YA LOS 2 EVALUADORES EVALUARON

        

        if ($sql) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    public function devolverDocumentoAdministratorView($idDocument){
        $DocumentDAO = new DocumentDAO;
        $data['idDocument'] = $idDocument;
        $data['documento'] = $DocumentDAO->getDocumentById($idDocument);

        require_once "view/administrator/devolverDocumento.php";
    }

    // Entrada del Evaluador al documento
    public function viewEvaluadorInit()
    {
        require_once "view/evaluador/validarDocumento.php";
    }

    // EVALUADOR
    public function validarIdentidad()
    {
        $idUser = $_POST["idUser"];
        $codigoAcceso = $_POST["codigoAcceso"];

        $document = new DocumentDAO;
        $identidad = $document->validadIdentidad($idUser, $codigoAcceso);
        $idDocumentoEvaluador = "";
        $idDocumento = 0;

        if ($identidad == NULL) {
            echo "<script>
                    alert('No existe Documento vinculado a este codigo de Acceso, Por favor Intentalo Nuevamente');
                    window.location= 'index.php?c=documento&a=viewEvaluadorInit';
                </script>";
        } else {
            foreach ($identidad as $documentoUser) {
                $idDocumento = $documentoUser['id_document'];
                $idDocumentoEvaluador = $documentoUser['id'];
            }

            $documento = $document->getDocumentById($idDocumento);

            foreach ($documento as $documentoEvaluador) {
                $estado = $documentoEvaluador['state'];
            }

            if ($estado != "Finalizado" && $estado != "Aprobado" && $estado != "Devuelto con correcciones") {            
                header("Location: index.php?c=documento&a=evaluador&id=$idDocumentoEvaluador");
            } else {
                echo "<script>
                    alert('El documento no se encuentra Disponible en estos momentos');
                    window.location= 'index.php?c=documento&a=viewEvaluadorInit'
                </script>";
            }
        }
    }

    public function devolverDocumentoView($idDocumentEvaluador){
        $DocumentDAO = new DocumentDAO;
        $data['idDocumentEvaluador'] = $idDocumentEvaluador;

        $idDocument = $DocumentDAO->getDocumentByIdEvaluadorDocumento($idDocumentEvaluador);
        $data['idDocument'] = $idDocument;
        $documento = $DocumentDAO->getFolderDocument($idDocument);
        $data['nameFolder'] = $documento;
        require_once "view/evaluador/devolverDocumento.php";
    }

    public function evaluador($id)
    {
        $document = new DocumentDAO;
        $data['idDocumentoEvaluador'] = $id;
        $idDocumento = $document->getDocumentByIdEvaluadorDocumento($id);
        

        $data['documentos'] = $document->getDocumentById($idDocumento);
        $data['documentoEvaluador'] = $document->getDocumentEvaluadorEspecifico($id);

        require_once "view/evaluador/evaluador.php";
    }

    // SOLICITANTE
    public function verCorrecionesDocumentoSolicitante($id){
        $document = new DocumentDAO;
        $data['documentos'] = $document->getDocumentById($id);
        $data['documentoEvaluador'] = $document->getDocumentEvaluador($id);
        $data['correccionesDocumento'] = $document->getCorreccionesDocumentEvaluador($id);

        require_once "view/solicitante/viewCorreccionesDocument.php";
        
    }

    public function corregirDocumentoView($idCorreccion){
        $documentDAO = new DocumentDAO;
        $idDocument = $documentDAO->getDocumentByIdCorreccion($idCorreccion);
        $data['idCorreccion'] = $idCorreccion;
        $data['documentos'] = $documentDAO->getDocumentById($idDocument);

        require_once "view/solicitante/updateDocumentByCorrecciones.php";

    }

    public function udpdateCorreccionDocumento(){        
        
        $radicado = $_POST['radicado'];
        $descripcion = $_POST['descripcion'];
        $documentos = $_POST['documentos'];
        $idCorreccion = $_POST['idCorreccion'];

        $document = new DocumentDAO;
        $userDAO = new UserDAO;
        
        $sql = $document->updateCorreccionDocument($radicado, $descripcion, $documentos, $idCorreccion);

        $documento = $document->getRadicadoByIdDocument($radicado);

        $administradores = $userDAO->getAdministradores();

        // CORREO PARA EL ADMINISTRADOR
        foreach ($administradores as $administrador){
            $this->documentosCorregidosPorDependencia($administrador['id'], $documento['radicado'], $documento['id_user']);
        }

        if ($sql) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    public function descargarDocumentosById($id)
    {

        $document = new DocumentDAO;
        $documento = $document->getDocumentById($id);

        foreach ($documento as $documentoEvaluador) {
            $files = $documentoEvaluador['files'];
            $title = $documentoEvaluador['title'];
        }

        $zip = new ZipArchive();
        // Creamos y abrimos un archivo zip temporal
        $zip->open("documentos.zip", ZipArchive::CREATE);
        // Añadimos un directorio
        $dir = $title;
        $zip->addEmptyDir($dir);
        // Añadimos un archivo en la raid del zip.
        //$zip->addFile("index.php", "index.php");
        //Añadimos un archivo dentro del directorio que hemos creado

        $obj = json_decode($files);

        for ($i = 0; $i <= count($obj); $i++) {

            $obj2 = $obj[$i]->elemento;

            $zip->addFile(str_replace("../", "", $obj2), $dir . "/" . basename($obj2));
        }

        // Una vez añadido los archivos deseados cerramos el zip.
        $zip->close();
        // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment; filename=documentos.zip");
        // leemos el archivo creado
        readfile('documentos.zip');
        // Por último eliminamos el archivo temporal creado
        unlink('documentos.zip'); //Destruye el archivo temporal

    }

    public function descargarDocumentosCorregidosById($id)
    {

        $document = new DocumentDAO;
        $documento = $document->getCorreccionById($id);

        foreach ($documento as $documentoEvaluador) {
            $files = $documentoEvaluador['documentos'];
            $title = $documentoEvaluador['date_correccion'];
        }

        $zip = new ZipArchive();
        // Creamos y abrimos un archivo zip temporal
        $zip->open("documentos.zip", ZipArchive::CREATE);
        // Añadimos un directorio
        $dir = "Correcciones ".$title;
        $zip->addEmptyDir($dir);
        // Añadimos un archivo en la raid del zip.
        //$zip->addFile("index.php", "index.php");
        //Añadimos un archivo dentro del directorio que hemos creado

        $obj = json_decode($files);

        for ($i = 0; $i <= count($obj); $i++) {

            $obj2 = $obj[$i]->elemento;

            $zip->addFile(str_replace("../", "", $obj2), $dir . "/" . basename($obj2));
        }

        // Una vez añadido los archivos deseados cerramos el zip.
        $zip->close();
        // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment; filename=documentos.zip");
        // leemos el archivo creado
        readfile('documentos.zip');
        // Por último eliminamos el archivo temporal creado
        unlink('documentos.zip'); //Destruye el archivo temporal

    }

    public function viewDocumentSolicitante($id){
        $document = new DocumentDAO;
        $data['documentos'] = $document->getDocumentById($id);
        $data['documentoEvaluador'] = $document->getDocumentEvaluador($id);
        $data['estados'] = $document->getEstadosDocumento($id);
        $data['correccionesDocumento'] = $document->getCorreccionesDocumentEvaluador($id);

        require_once "view/solicitante/viewDocument.php";
    }


    public function addEvaluadorDocumentoViewInit($id)
    {
        $document = new DocumentDAO;
        $user = new UserDAO;

        $data['documentos'] = $document->getDocumentById($id);
        $data["evaluadores"] = $user->getEvaluadores(3);
        $programas = new ProgramDAO;
        $facultades = new FacultadDAO;
        
        $data["programas"] = $programas->getPrograms();
        $data["facultades"] = $facultades->getFacultades();
        $data['sesionesActivas'] = $document->getSesionesActivas();
        
        require_once "view/administrator/addEvaluadorDocument.php";
    }

    public function addEvaluadorDocumentoView()
    {
        $document = new DocumentDAO;
        $userDAO = new UserDAO;

        $dependency = $_POST['dependency'];

        if ($dependency == "program") {

            $data['documentos'] = $document->getDocumentById($_POST['idDocument']);
            $data['usuarios'] = $userDAO->getUsersProgramById($_POST['idProgram']);

            require_once "view/administrator/addEvaluadorDocument.php";
        } else if ($dependency == "department") {

            $data['documentos'] = $document->getDocumentById($_POST['idDocument']);
            $data['usuarios'] = $userDAO->getUsersDepartmentsById($_POST['idDepartment']);

            require_once "view/administrator/addEvaluadorDocument.php";
        } else if ($dependency == "facultad") {

            $data['documentos'] = $document->getDocumentById($_POST['idDocument']);
            $data['usuarios'] = $userDAO->getUsersFacultadById($_POST['idFacultad']);

            require_once "view/administrator/addEvaluadorDocument.php";
        }
    }

    public function addDocumentToEvaluate()
    {   
        $document = new DocumentDAO;
        $UserDAO = new UserDAO;

        $email1 = $_POST['email1'];
        $email2 = $_POST['email2'];

        $idUser = $UserDAO->getUserByEmail($email1);
        
        $idDocument = $_POST['idDocument'];
        $dateLimit = $_POST['dateLimit'];
        $radicado = $_POST['radicado'];
        $sesion = $_POST['sesion'];

        $token = $_POST['token'];

        $document->insertDocumentToEvaluate($idUser, $idDocument, $dateLimit, $token, 'Se Asignaron Evaluadores al Documento');

        $document->guardarInfoDocumento($idDocument, $sesion, $radicado);

        if($email2 != "nn"){
            $idUser2 = $UserDAO->getUserByEmail($email2);
            $document->insertDocumentToEvaluate($idUser2, $idDocument, $dateLimit, $token, '');
            $this->enviarCorreoEvaluador($idUser2, $token, $dateLimit);
        }

        $this->enviarCorreoEvaluador($idUser, $token, $dateLimit);

        $data['documentos'] = $document->getDocumentsPending();

        require_once "view/administrator/documentos.php";
    }

    public function changeStateView($id){
        $document = new DocumentDAO;
        $data['documentos'] = $document->getDocumentById($id);
        require_once "view/administrator/changeStateView.php";
    }

    public function changeStateDocument(){
        $idDocument= $_POST['idDocument'];
        $newState = $_POST['state'];
        $document = new DocumentDAO;
        $document->changeStateDocument($idDocument, $newState);

        echo "<script>alert('Estado Actualizado con Exito!')</script>";

        $this->viewDocumentAdministrador($idDocument);

    }

    public function aprobarDocumentoSolicitante($idDocument){
        $document = new DocumentDAO;
        $document->aprobarDocumento($idDocument);
        echo "
				<script>
						alert('Documento Aprobado con EXITO !');
						window.location= 'config/logoutEvaluador.php';
				</script>
				";
    }


    // Correos Electronicos
    public function recuperarToken($id){

        $document = new DocumentDAO;
        $UserDAO = new UserDAO;

        $tokens = $document->getTokenEnableById($id);
        $tokensRecuperados = "";
        $i = 0;
        if($tokens == NULL){
            $tokensActivos = 0;
        }else{
            foreach ($tokens as $token) {
                $i = $i + 1;
                $tokensRecuperados = $tokensRecuperados . "Token N° ".$i.": <span style='font-weight: bold;' >".$token['key_access']."</span> -> Fecha Limite: ".$token['dateLimit']."<br>";
                
            }
            $tokensActivos = count($tokens);
        }
        
        
        $fullName = $UserDAO->getNameAndLastNameById($id);
        $email = $UserDAO->getEmailByIdUser($id);

        // $para = 'richardacevedo98@gmail.com';
        $para = $email;

        $titulo = 'Recuperacion de TOKENS de Seguridad';

        $mensaje = '<html>' .
            '<head><center><title>Solicitud para Evaluar Documentos - Comite Curricular Central UFPS</title></center></head>' .
            "<body style='background: #DCDCDC;>
            <center>
                <h1 style='font-weight: bold;' ></h1>
            </center>" .
            "<center><div style='width:694px; background: white; border-radius:5px;'>
      
            <img src='https://i.ibb.co/S621yLn/banner4.png' style='width:694px; height:100px'><br><br>

            Cordial Saludo $fullName <br><br>
            En base a su solicitud de recuperación de TOKENS, encontramos que tiene $tokensActivos activos <br><br>
            $tokensRecuperados <br><br>
            Para acceder al Nuevo Sistema del COMITE CURRICULAR, lo podra hacer mediante el siguiente enlace: <a href='http://localhost/si-ccc/index.php?l=login&a=indexEvaluador' style='font-weight: bold;'> INGRESAR </a><br><br>
            Una vez ingrese, debera ingresar el TOKEN de seguridad que le permitira acceder a los documentos: <br><br>

            Att: COMITE CURRICULAR CENTRAL UFPS <br><br>

            <div style='background-color:#c31222;  height:20px; width: 694px;'></div>


            </div></center>" .

            '</body>' .
            '</html>';

        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: COMITE CURRICULAR CENTRAL UFPS';

        $enviado = mail($para, $titulo, $mensaje, $cabeceras);

        echo "<script>
                        alert('Se han enviado nuevamente a su correo electronico los Tokens de Seguridad');
                        window.location= 'index.php?c=documento&a=viewEvaluadorInit'
            </script>";
    }

    public function enviarNotificacionDeCorreccion($id){

        $document = new DocumentDAO;
        $UserDAO = new UserDAO;

        $fullName = $UserDAO->getNameAndLastNameById($id);
        $email = $UserDAO->getEmailByIdUser($id);

        $para = $email;

        $titulo = 'Solicitud de Corrección';

        $mensaje = '<html>' .
            '<head><center><title>Solicitud para Evaluar Documentos - Comite Curricular Central UFPS</title></center></head>' .
            "<body style='background: #DCDCDC;>
            <center>
                <h1 style='font-weight: bold;' ></h1>
            </center>" .
            "<center><div style='width:694px; background: white; border-radius:5px;'>
      
            <img src='https://i.ibb.co/S621yLn/banner4.png' style='width:694px; height:100px'><br><br>

            Cordial Saludo $fullName <br><br>
            En base a su solicitud para revisión de documentos a nombre de la dependencia, se notifica que estos han sido devueltos a su cuenta SICCC con correcciones.<br><br>
            Una vez estos esten corregidos, se solicita mediante la opción CORREGIR, cargar TODOS los documentos nuevamente.<br><br>
            
            Att: COMITE CURRICULAR CENTRAL UFPS <br><br>

            <div style='background-color:#c31222;  height:20px; width: 694px;'></div>


            </div></center>" .

            '</body>' .
            '</html>';

        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: COMITE CURRICULAR CENTRAL UFPS';

        $enviado = mail($para, $titulo, $mensaje, $cabeceras);

    }

    public function documentosCorregidosPorDependencia($id, $radicado, $idDependency){

        $document = new DocumentDAO;
        $UserDAO = new UserDAO;

        $numRadicado = $radicado;
        $fullNameDependencia = $UserDAO->getNameAndLastNameById($idDependency);

        $fullName = $UserDAO->getNameAndLastNameById($id);
        $email = $UserDAO->getEmailByIdUser($id);

        $para = $email;

        $titulo = 'Solicitud de Corrección';

        $mensaje = '<html>' .
            '<head><center><title>Solicitud para Evaluar Documentos - Comite Curricular Central UFPS</title></center></head>' .
            "<body style='background: #DCDCDC;>
            <center>
                <h1 style='font-weight: bold;' ></h1>
            </center>" .
            "<center><div style='width:694px; background: white; border-radius:5px;'>
      
            <img src='https://i.ibb.co/S621yLn/banner4.png' style='width:694px; height:100px'><br><br>

            Cordial Saludo $fullName <br><br>
            Las correcciones establecidas a los documentos con el radicado N° $numRadicado y nombre de Solicitante: $fullNameDependencia<br><br>
            Han sido devueltas exitosamente<br><br>
            
            Att: COMITE CURRICULAR CENTRAL UFPS <br><br>

            <div style='background-color:#c31222;  height:20px; width: 694px;'></div>


            </div></center>" .

            '</body>' .
            '</html>';

        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: COMITE CURRICULAR CENTRAL UFPS';

        $enviado = mail($para, $titulo, $mensaje, $cabeceras);

    }
    
    public function enviarCorreoEvaluador($idUser, $token, $dateLimit)
    {

        $UserDAO = new UserDAO;

        $fullName = $UserDAO->getNameAndLastNameById($idUser);
        $email = $UserDAO->getEmailByIdUser($idUser);

        // $para = 'richardacevedo98@gmail.com';
        $para = $email;

        $titulo = 'Solicitud para Evaluar Documentos - Comite Curricular Central UFPS';

        $mensaje = '<html>' .
            '<head><center><title>Solicitud para Evaluar Documentos - Comite Curricular Central UFPS</title></center></head>' .
            "<body style='background: #DCDCDC;>
            <center>
                <h1 style='font-weight: bold;' ></h1>
            </center>" .
            "<center><div style='width:694px; background: white; border-radius:5px;'>
      
            <img src='https://i.ibb.co/S621yLn/banner4.png' style='width:694px; height:100px'><br><br>

            Cordial Saludo $fullName <br><br>
            La presente es para solicitarle su valiosa colaboración en la revision de documentos enviados al COMITE CURRICULAR CENTRAL. <br><br>
            Para acceder al Nuevo Sistema del COMITE CURRICULAR, lo podra hacer mediante el siguiente enlace: <a href='http://localhost/si-ccc/index.php?l=login&a=indexEvaluador' style='font-weight: bold;'> INGRESAR </a><br><br>
            Una vez ingrese, debera ingresar el CODIGO de seguridad que le permitira acceder a los documentos: <br><br>
            CODIGO DE SEGURIDAD: <span style='font-weight: bold; background: white;'>$token</span> <br><br>
            FECHA MAXIMA DE REVISIÓN: <span style='font-weight: bold;'>$dateLimit</span> <br><br>
            En la misma plataforma podras asignar correcciones si asi lo ameriten, o en caso contrario si el documento esta apto y cumple con la normativa, podra regresarlo con la Aprobación. <br>
            Se le agradece su valiosa colaboración.<br><br>
            Att: COMITE CURRICULAR CENTRAL UFPS <br><br>

            <div style='background-color:#c31222;  height:20px; width: 694px;'></div>


            </div></center>" .

            '</body>' .
            '</html>';

        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: COMITE CURRICULAR CENTRAL UFPS';

        $enviado = mail($para, $titulo, $mensaje, $cabeceras);

        return true;
    }
}
