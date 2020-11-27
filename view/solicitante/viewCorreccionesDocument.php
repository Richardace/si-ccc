<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Cargar Documentos</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

    <!-- DROP -->
    <?php
    include("headerDrop.php");
    ?>
</head>

<body>
    <section id="global">
        <!-- Cabecera -->
        <header>
            <?php
            include('header.php');
            ?>
        </header>
        <section id="content">

            <div class="card">
                <center>
                    <div class="card-header" style="color: white; font-weight: bold; background: #dc3545;">
                        VER CORRECCIONES DEL DOCUMENTO
                    </div>
                </center>
                <div class="card-body">
                    <div class="box-body">

                    <table id="myTable" class="table table-hover">
                      <thead>
                        <tr class="header">
                          <th>Fecha Corrección</th>
                          <th>Comentarios</th>
                          <th>Documentos Adjuntos</th>
                          <th>Estado</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tr>
                        <h1 id="respuesta">
                        </h1>
                      </tr>
                      <tbody>
                        <?php
                        if ($data["correccionesDocumento"] != NULL) {
                          foreach ($data["correccionesDocumento"] as $correcciones) {
                            $idDocumentoCorregido = $correcciones['id'];
                            echo "<tr>";
                            echo "<td>" . $correcciones["date_correccion"] . "</td>";
                            echo "<td>" . $correcciones["observaciones"] . "</td>";
                            echo "<td>
                            <a href='index.php?c=documento&a=descargarDocumentosCorregidosById&id=$idDocumentoCorregido' target='_blank'>
                              <span>
                                <img style='widht:25px; height:25px;' src='view/assets/img/descargar.png'>
                              </span>
                            </a>
                            </td>";
                            echo "<td>" . $correcciones["state"] . "</td>";

                            if($correcciones["state"] == "Pendiente"){
                                echo "<td><a href='index.php?c=documento&a=corregirDocumentoView&id=$idDocumentoCorregido'><span class='badge badge-warning'>Corregir</span></a></td>";
                            }
                            echo "</tr>";
                          }
                        } else {
                          echo "<td>No hay Correcciones Registradas para este documento.</td>";
                        }

                        ?>
                      </tbody>
                    </table>


                    </div>
                </div>
                <div class="card-footer text-muted" style="color: white; font-weight: bold; background:rgb(226, 3, 26);"></div>
            </div>
        </section>
</body>
<script src="view/assets/js/dropzone.js"></script>

</html>