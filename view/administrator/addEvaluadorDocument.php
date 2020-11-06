<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Proyecto con JavaScript</title>

    <!-- Estilos CSS -->
    <link rel="stylesheet" type="text/css" href="view/assets/css/style.css" />
    <link id="theme" rel="stylesheet" type="text/css" href="view/assets/css/estiloPestañasRegistro.css" />
    <link id="theme" rel="stylesheet" type="text/css" href="view/assets/css/style-registro.css" />

    <!-- Estilo css Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>


    <!-- JQuery-->
    <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.structure.min.css" />
    <link rel="stylesheet" href="view/assets/js/jquery-ui/jquery-ui.theme.min.css" />
    <script type="text/javascript" src="view/assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="view/assets/js/jquery-2-2-1.min.js"></script>
    <script type="text/javascript" src="view/assets/js/jquery-ui/jquery-ui.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js" integrity="sha512-Q1f3TS3vSt1jQ8AwP2OuenztnLU6LwxgyyYOG1jgMW/cbEMHps/3wjvnl1P3WTrF3chJUWEoxDUEjMxDV8pujg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/locale/es.min.js" integrity="sha512-/HmEBBS8qan4uG3ClUfdNMUOprD0g4BNcJnOBh153mBMs16U92xULl8QS9A37/vLW17epcNp0t0fDOYWjpG73Q==" crossorigin="anonymous"></script>

    <!-- Mis Scripts-->
    <script type="text/javascript" src="view/assets/js/personal.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <script type="text/javascript" src="moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="https://apis.google.com/js/api.js"></script>
    <script>
        function authenticate() {
            return gapi.auth2.getAuthInstance()
                .signIn({
                    scope: "https://www.googleapis.com/auth/calendar https://www.googleapis.com/auth/calendar.events"
                })
                .then(function() {
                        console.log("Sign-in successful");
                    },
                    function(err) {
                        console.error("Error signing in", err);
                    });
        }

        function loadClient() {
            gapi.client.setApiKey("AIzaSyAZvvx1JvVrxZ5KOP9Io1IlDVNM4wpP4kc");
            return gapi.client.load("https://content.googleapis.com/discovery/v1/apis/calendar/v3/rest")
                .then(function() {
                        console.log("GAPI client loaded for API");
                    },
                    function(err) {
                        console.error("Error loading GAPI client for API", err);
                    });;
        }


        function execute() {
            var fechaLimite = document.getElementsByName("dateLimit")[0].value;
            var dateStart = fechaLimite + "" + "T17:00:00-07:00";
            var dateEnd = fechaLimite + "" + "T17:00:00-07:10";
            var correo = document.getElementsByName("email")[0].value;
            

            return gapi.client.calendar.events.insert({
                    "calendarId": "eq2tt4qt2e3k2id62449e4i8oc@group.calendar.google.com",
                    "maxAttendees": 4,
                    "sendNotifications": true,
                    "resource": {
                        "end": {
                            "dateTime": dateEnd
                        },
                        "start": {
                            "dateTime": dateStart
                        },
                        "summary": "Solicitud de Revisión de Documento Academico - COMITE CURRICULAR CENTRAL",
                        "attendees": [{
                            "email": correo
                        }]
                    }
                })
                .then(function(response) {

                        console.log("Response", response);
                    },
                    function(err) {
                        console.error("Execute error", err);
                    });
        }
        gapi.load("client:auth2", function() {
            gapi.auth2.init({
                client_id: "466390034500-biv2ngcm1f3unftvco3l20kkf7koceg6.apps.googleusercontent.com"
            });
        });
    </script>

</head>

<?php
function generateCode($length)
{
    $chars = "vwxyzABCDMnOpqH02789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}

foreach ($data["documentos"] as $documento) {
    $idDocument = $documento['id'];
    $nameUser = $documento['fullName'];
    // $nameUser = "Richard Acevedo";
    $origen = $documento['source'];
    $destino = $documento['destiny'];
    $dateRegister = $documento['dateRegister'];
    $title = $documento['title'];
    $description = $documento['description'];
    $files = $documento['files'];
    $state = $documento['state'];
    $nameFolder = $documento['nameFolder'];
}
?>

<body>
    <section id="global">
        <!-- Cabecera -->
        <header>
            <?php
            include('header.php');
            ?>
        </header>
        <section id="content">

            <div class="card text-center">
                <center>
                    <div class="card-header" style="color: white; font-weight: bold; background:rgb(226, 3, 26);">
                        AGREGAR EVALUADOR AL DOCUMENTO
                    </div>
                </center>

                <div class="card-body">
                    <div class="box-body">

                        <form method="post" action="index.php?c=documento&a=addDocumentToEvaluate">
                            <!-- <center>
                                <div class="form-row">
                                    <div class="col" style>
                                        <label>Fecha Limite de Revisión</label><br>
                                        <input type="date" class="form-control" name="fechaLimite" style="width: 190px;" required>
                                    </div>
                                </div>
                            </center> -->

                            <center>
                                <div class="form-row">
                                    <div class="col" style>
                                        <label>Fecha Limite de Revisión</label><br>
                                        <div class="input-group date" id="datetimepicker1" style="width:25%;" data-target-input="nearest">
                                        
                                            <input type="text" style="width:30px; text-align:center;" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="dateLimit" />
                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar">Calendario</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>



                            <br>
                            <center>
                                <div class="form-row">

                                    <div class="col">
                                        <label>Token de Acceso</label><br>
                                        <input type="text" class="form-control" style="width:30%; text-align:center;" name="token" value="<?php echo generateCode(15); ?>" readonly>
                                    </div>
                                </div>

                            </center>
                            <br>
                            <center>
                                <div class="form-row">
                                    <div class="col">
                                        <div>
                                            <label for="inputState">Elija el Evaluador</label><br>
                                            <select id="selectPrograma" class="form-control" name="email" style="width:50%;" required>
                                                <?php
                                                $none = true;
                                                if ($data["usuarios"] == NULL) {
                                                    $none = false;
                                                    echo "<option>No hay Evaluadores Disponibles para esta dependencia</option>";
                                                }
                                                foreach ($data["usuarios"] as $usuario) {
                                                    echo "<option value='" . $usuario['email'] . "'>" . $usuario['email'] . " - " . $usuario['fullName'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </center>

                            <input type="hidden" value="<?php echo $idDocument; ?>" name="idDocument">

                            <br>
                            <center><input id="add" type="submit" onclick="authenticate().then(loadClient).then(execute)" value="Asignar Evaluador" class="btn btn-primary guardarProducto" style="background:rgb(226, 3, 26); border:none; color:white; <?php if (!$none) {
                                                                                                                                                                                                                                                                echo "display:none;";
                                                                                                                                                                                                                                                            } ?>" /></center>
                            <br>
                        </form>
                    </div>
                </div>

            </div>

            <div class="card">
                <center>
                    <div class="card-header" style="color: white; font-weight: bold; background:rgb(226, 3, 26);">
                        INFORMACIÓN DEL DOCUMENTO
                    </div>
                </center>
                <div class="card-body">
                    <div class="box-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Numero de Radicado</label>
                                <input type="text" class="form-control" value="<?php echo $idDocument; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre del Solicitante</label>
                                <input type="text" class="form-control" value="<?php echo $nameUser; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Dependencia a la que pertenece</label>
                                <input type="text" class="form-control" value="<?php echo $origen; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Destino de la Documentación</label>
                                <input type="text" class="form-control" value="<?php echo $destino; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre de Carpeta</label>
                                <input type="text" class="form-control" value="<?php echo $nameFolder; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha de Recibido</label>
                                <input type="text" class="form-control" value="<?php echo $dateRegister; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Tiulo del Documento</label>
                                <textarea type="text" style="height: 70px;" class="form-control descripcion" readonly><?php echo $title; ?></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Descripción u Observación</label>
                                <textarea type="text" style="height: 150px;" class="form-control descripcion" readonly><?php echo $description; ?></textarea>
                            </div>
                        </div>

                        <div class="form-row" style="float: right;">
                            <div class="form-group col-md-12">
                                <label>DESCARGA : </label>
                                <a href="index.php?c=documento&a=descargarDocumentosById&id=<?php echo $idDocument; ?>" target="_blank">Descargar Documentos Adjuntos</a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card-footer text-muted" style="color: white; font-weight: bold; background:rgb(226, 3, 26);"></div>
            </div>
        </section>

        <script type="text/javascript">
            $(function() {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
            });
        </script>
</body>

</html>