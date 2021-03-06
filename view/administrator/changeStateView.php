<?php

session_start();

?>
<!DOCTYPE HTML>
<html lang="es">

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
    <style>

    </style>

</head>

<body>

    <section id="global">
        <!-- Cabecera -->
        <header>
            <?php
            include('header.php');
            ?>
        </header>

        <?php
        foreach ($data['documentos'] as $infoDocumento) {
            $idDocumento = $infoDocumento['id'];
            $title = $infoDocumento['title'];
            $description = $infoDocumento['description'];
            $nombreSolicitante = $infoDocumento['fullName'];
            $fechaSolicitud = $infoDocumento['dateRegister'];
            $stateDocument = $infoDocumento['state'];
        }
        ?>

        <!-- Contenido -->

        <section id="content">

            <div class="card text-center">
                <div class="card-header" style="color: white; font-weight: bold; background:rgb(226, 3, 26);">
                    EDITAR ESTADO DEL DOCUMENTO
                </div>
                <div class="card-body">

                    <form method="post" action="index.php?c=documento&a=changeStateDocument">
                        <br>
                        <input type="hidden" value="<?php echo $idDocumento; ?>" name="idDocument">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Dependencia Solicitante</label>
                                <input type="text" class="form-control origen" value="<?php echo $nombreSolicitante; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha de Solicitud</label>
                                <input type="text" class="form-control destino" value="<?php echo $fechaSolicitud; ?>" readonly>
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Asunto</label>
                                <input type="text" class="form-control titulo" value="<?php echo $title; ?>" readonly>
                            </div>

                        </div>


                        <br>

                        <center>
                            <div id="state">
                                <label for="inputState">Nuevo Estado del Documento</label><br>
                                <select name="state" style="width:40%;" class='form-control'>
                                
                                    <option value="<?php echo $stateDocument; ?>"><?php echo $stateDocument; ?></option>
                                    <option value="Avalado por el Comite Curricular Central">Avalado por el Comite Curricular Central</option>
                                    <option value="Documento en Proceso">Documento en Proceso</option>
                                </select>
                            </div>
                        </center>

                        <br>
                        <br>
                        <input id="agregar" type="submit" value="Guardar Cambios" class="btn btn-primary" style="background:rgb(226, 3, 26); border:none; color:white;" />

                    </form>
                </div>
                <div class="card-footer text-muted" style="color: white; font-weight: bold; background:rgb(226, 3, 26);">

                </div>
            </div>
        </section>
    </section>

    <!-- Pie de Pagina -->
    <footer>
        <div class="part1Footer">
            Universidad Francisco de Paula Santander - Sede Cucuta
        </div>
        <div class="part2Footer">
            Vicerrectoria Academica - Comite Curricular Central - Todos los Derechos Reservados &copy;
        </div>
    </footer>
</body>

</html>