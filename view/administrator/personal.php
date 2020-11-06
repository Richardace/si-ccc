<?php

session_start();

?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Proyecto con JavaScript</title>

    <!-- Estilos CSS Manual -->
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

</head>

<body>

    <section id="global">
        <!-- Cabecera -->
        <header>
            <?php
            include('header.php');
            ?>
        </header>

        <!-- Contenido -->

        <section id="content">
            <div class="wrap">

                <ul class="tabs">
                    <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Solicitantes</span></a>
                    </li>
                    <li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Evaluadores</span></a>
                    </li>
                    <li><a href="#tab3"><span class="fa fa-group"></span><span class="tab-text">Administradores</span></a></li>
                    <li><a href="#tab4"><span class="fa fa-group"></span><span class="tab-text">Correos
                                Institucionales</span></a></li>
                </ul>

                <div class="secciones">

                    <article id="tab1">

                        <div>
                            <div class="btn-agregarUsuario">
                                <a data-toggle="modal" data-target="#registroSolicitante" style="cursor: pointer;">
                                    <img src="view/assets/img/agregar-usuario.png" alt="Agregar Nuevo solicitante" title="Asignar nuevo solicitante">
                                </a>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="registroSolicitante" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Correos Electronicos
                                            Registrados</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Contenido -->
                                        <input type="text" class="form-control" id="myInput" style="width:100%;" placeholder="Buscar Correo ...">


                                        <table id="myTable" class="table table-hover">
                                            <thead>
                                                <tr class="header">
                                                    <th>Correo Institucional</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <h1 id="respuesta">
                                                </h1>
                                            </tr>
                                            <tbody>
                                                <?php
                                                if ($data["correos"] != NULL) {
                                                    foreach ($data["correos"] as $correo) {
                                                        echo "<tr>";
                                                        echo "<td>" . $correo["email"] . "</td>";

                                                        echo "<td><a href='index.php?c=personal&a=addSolicitanteView&id=" . $correo["id"] . "'><span id='iconoEliminar'><img src='view/assets/img/añadirUsuario.png' title='Eliminar'></span></a></td>";

                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<td>No hay Correos Registrados</td>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>

                                        <br>

                                        <nav id="paginacion">
                                            <ul class="pagination pagination-lg pager" id="myPager">

                                            </ul>
                                        </nav>



                                        <!-- FIN Contenido -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="wrapper">
                            <br>
                            <label class="textoRadioButton">FILTRAR POR: &nbsp;</label>
                            <input type="radio" name="filtro" id="dependencia" value="1"> <span class="textoRadioButton">DEPENDENCIA
                            </span> &nbsp; &nbsp;
                            <input type="radio" name="filtro" id="nombre" value="2"> <span class="textoRadioButton">NOMBRE </span>
                            &nbsp; &nbsp; &nbsp;

                            <input type="text" id="myInput" placeholder="Buscar ...">

                            <select class="textoSelectActivo" style="float: right;" type="text" id="mySelect" placeholder="Buscar ...">
                                <option class="textoSelectActivo" value="Activo">Activo </option>
                                <option class="textoSelectActivo" value="Inactivo">Inactivo</option>
                            </select>

                            <!-- INICIO TABLA -->

                            <div class="table-responsive">

                                <table class="table" id="myTable">
                                    <thead>
                                        <tr class="header">
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>correo</th>
                                            <th>Fecha de registro</th>
                                            <th>Fecha de Finalizacion</th>
                                            <th>ESTADO</th>

                                        </tr>

                                    </thead>
                                    <tr>
                                        <h1 id="respuesta">
                                        </h1>
                                    </tr>

                                    <tbody>
                                        <?php

                                        if ($data["solicitante"] != NULL) {
                                            foreach ($data["solicitante"] as $correo) {
                                                echo "<tr>";
                                                echo "<td>" . $correo["id"] . "</td>";
                                                echo "<td>" . $correo["firstName"] . " " . $correo['lastName'] . "</td>";
                                                echo "<td>" . $correo["email"] . "</td>";
                                                echo "<td>28-02-2020</td>";
                                                echo "<td>28-06-2020</td>";
                                                echo "<td>" . $correo["state"] . "</td>";

                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<td>No hay Directores o Decanos Registrados</td>";
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>

                            <!-- PAGINACION -->

                            <br>
                            <nav id="paginacion">
                                <ul class="pagination pagination-lg pager" id="myPager"></ul>
                            </nav>

                            <!-- FIN TABLA -->

                        </div>
                    </article>

                    <article id="tab2">

                        <div>
                            <div class="btn-agregarUsuario">
                                <a data-toggle="modal" data-target="#registroEvaluador" style="cursor: pointer;">
                                    <img src="view/assets/img/agregar-usuario.png" alt="Agregar Evaluador" title="Crear Nuevo Evaluador">
                                </a>
                            </div>
                        </div>

                        <!-- INICIO POPUP -->

                        <!-- Modal -->
                        <div class="modal fade" id="registroEvaluador" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Correos Electronicos Registrados</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Contenido -->
                                        <input type="text" class="form-control" id="myInput" style="width:100%;" placeholder="Buscar Correo ...">


                                        <table id="myTable" class="table table-hover">
                                            <thead>
                                                <tr class="header">
                                                    <th>Correo Institucional</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <h1 id="respuesta">
                                                </h1>
                                            </tr>
                                            <tbody>
                                                <?php
                                                if ($data["correos"] != NULL) {
                                                    foreach ($data["correos"] as $correo) {
                                                        echo "<tr>";
                                                        echo "<td>" . $correo["email"] . "</td>";

                                                        echo "<td><a href='index.php?c=personal&a=addEvaluadorView&id=" . $correo["id"] . "'><span id='iconoEliminar'><img src='view/assets/img/añadirUsuario.png' title='Eliminar'></span></a></td>";

                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<td>No hay Correos Registrados</td>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>

                                        <br>

                                        <nav id="paginacion">
                                            <ul class="pagination pagination-lg pager" id="myPager">

                                            </ul>
                                        </nav>



                                        <!-- FIN Contenido -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- FIN POPUP -->




                        <div class="wrapper">
                            <br>
                            <label class="textoRadioButton">FILTRAR POR: &nbsp;</label>
                            <input type="radio" name="filtro" id="dependencia" value="1"> <span class="textoRadioButton">DEPENDENCIA
                            </span> &nbsp; &nbsp;
                            <input type="radio" name="filtro" id="nombre" value="2"> <span class="textoRadioButton">NOMBRE </span>
                            &nbsp; &nbsp; &nbsp;

                            <input type="text" id="myInput" placeholder="Buscar ...">

                            <select class="textoSelectActivo" style="float: right;" type="text" id="mySelect" placeholder="Buscar ...">
                                <option class="textoSelectActivo" value="Activo">Activo </option>
                                <option class="textoSelectActivo" value="Inactivo">Inactivo</option>
                            </select>


                            <!-- INICIO TABLA -->

                            <div class="table-responsive-lg">

                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr class="header">
                                            <th>id</th>
                                            <th>DEPENDENCIA</th>
                                            <th>Nombre y Apellido</th>
                                            <th>correo</th>
                                            <th>Fecha de registro</th>
                                            <th>Fecha de Finalizacion</th>
                                            <th>ESTADO</th>
                                            <th>
                                                <center>OPCIONES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <h1 id="respuesta">
                                        </h1>
                                    </tr>
                                    <tbody>
                                        <?php

                                        if ($data["evaluador"] != NULL) {
                                            foreach ($data["evaluador"] as $evaluador) {
                                                echo "<tr>";
                                                echo "<td>" . $evaluador["id"] . "</td>";
                                                echo "<td>" . $evaluador["dependencyUser"] . "</td>";
                                                echo "<td>" . $evaluador["firstName"] . " " . $evaluador['lastName'] . "</td>";
                                                echo "<td>" . $evaluador["email"] . "</td>";
                                                echo "<td>28-02-2020</td>";
                                                echo "<td>28-06-2020</td>";
                                                echo "<td>" . $evaluador["state"] . "</td>";

                                                echo "<td><center>
                                                  <a href='index.php?c=personal&a=verUsuario&id=" . $evaluador["id"] . "'><span id='iconoVer'><img src='view/assets/img/ver.png' title='Eliminar'></span></a>&nbsp&nbsp&nbsp&nbsp
                                                  <a href='index.php?c=correo&a=eliminarCorreo&id=" . $evaluador["id"] . "'><span id='iconoEditar'><img src='view/assets/img/editar.png' title='Eliminar'></span></a>
                                                </td>";

                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<td>No hay Evaluadores Registrados</td>";
                                        }

                                        ?>

                                    </tbody>

                                </table>
                                <br>

                                <nav id="paginacion">
                                    <ul class="pagination pagination-lg pager" id="myPager">



                                    </ul>
                                </nav>
                            </div>

                            <!-- FIN TABLA -->

                        </div>
                    </article>
                    <article id="tab3">
                        <div>
                            <div class="btn-agregarUsuario">
                                <a data-toggle="modal" data-target="#registroAdministrador" style="cursor: pointer;">
                                    <img src="view/assets/img/agregar-usuario.png" alt="Agregar Administrador" title="Crear Nuevo Administrador">
                                </a>
                            </div>
                        </div>

                        <!-- INICIO POPUP -->

                        <!-- Modal -->
                        <div class="modal fade" id="registroAdministrador" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Correos Electronicos
                                            Registrados</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Contenido -->
                                        <input type="text" class="form-control" id="myInput" style="width:100%;" placeholder="Buscar Correo ...">


                                        <table id="myTable" class="table table-hover">
                                            <thead>
                                                <tr class="header">
                                                    <th>Correo Institucional</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <h1 id="respuesta">
                                                </h1>
                                            </tr>
                                            <tbody>
                                                <?php
                                                if ($data["correos"] != NULL) {
                                                    foreach ($data["correos"] as $correo) {
                                                        echo "<tr>";
                                                        echo "<td>" . $correo["email"] . "</td>";

                                                        echo "<td><a href='index.php?c=personal&a=addAdministradorView&id=" . $correo["id"] . "'><span id='iconoEliminar'><img src='view/assets/img/añadirUsuario.png' title='Eliminar'></span></a></td>";

                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<td>No hay Correos Registrados</td>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>

                                        <br>

                                        <nav id="paginacion">
                                            <ul class="pagination pagination-lg pager" id="myPager">

                                            </ul>
                                        </nav>



                                        <!-- FIN Contenido -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- FIN POPUP -->


                        <div class="wrapper">
                            <br>
                            <label class="textoRadioButton">FILTRAR POR: &nbsp;</label>
                            <input type="radio" name="filtro" id="nombre" value="2"> <span class="textoRadioButton">NOMBRE </span>
                            &nbsp; &nbsp; &nbsp;

                            <input type="text" id="myInput" placeholder="Buscar ...">

                            <select class="textoSelectActivo" style="float: right;" type="text" id="mySelect" placeholder="Buscar ...">
                                <option class="textoSelectActivo" value="Activo">Activo </option>
                                <option class="textoSelectActivo" value="Inactivo">Inactivo</option>
                            </select>

                            <!-- INICIO TABLA -->

                            <div class="table-responsive-lg">

                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr class="header">
                                            <th>id</th>
                                            <th>Nombre y Apellido</th>
                                            <th>correo</th>
                                            <th>ESTADO</th>
                                            <th>OPCIONES</th>
                                        </tr>

                                    </thead>

                                    <tr>
                                        <h1 id="respuesta">
                                        </h1>
                                    </tr>

                                    <tbody>
                                        <?php

                                        if ($data["administrador"] != NULL) {
                                            foreach ($data["administrador"] as $correo) {
                                                echo "<tr>";
                                                echo "<td>" . $correo["id"] . "</td>";
                                                echo "<td>" . $correo["firstName"] . " " . $correo['lastName'] . "</td>";
                                                echo "<td>" . $correo["email"] . "</td>";
                                                echo "<td>" . $correo["state"] . "</td>";

                                                echo "<td><center>
                                                  <a href='index.php?c=correo&a=eliminarCorreo&id=" . $correo["id"] . "'><span id='iconoVer'><img src='view/assets/img/ver.png' title='Eliminar'></span></a>&nbsp&nbsp&nbsp&nbsp
                                                  <a href='index.php?c=correo&a=eliminarCorreo&id=" . $correo["id"] . "'><span id='iconoEditar'><img src='view/assets/img/editar.png' title='Eliminar'></span></a>
                                                </td>";

                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<td>No hay Administradores Registrados</td>";
                                        }

                                        ?>
                                    </tbody>

                                </table>

                                <br>

                                <nav id="paginacion">
                                    <ul class="pagination pagination-lg pager" id="myPager">

                                    </ul>
                                </nav>

                            </div>
                            <!-- FIN TABLA -->

                        </div>
                    </article>
                    <article id="tab4">
                        <div>
                            <div class="btn-agregarUsuario" style="cursor: pointer;">
                                <a id="lanzarRegistroCorreo" style="cursor: pointer;">
                                    <img src="view/assets/img/agregar-usuario.png" alt="Agregar Correo" title="Añadir nuevo Correo" style="cursor: pointer;">
                                </a>
                            </div>
                            <div class="btn-agregarExcel">
                                <a data-toggle="modal" data-target="#añadirCorreoExcel" style="cursor: pointer;">
                                    <img src="view/assets/img/añadir-excel.png" alt="Carga masiva de Correos" title="Carga masiva de Correos">
                                </a>
                            </div>
                        </div>

                        <div id="popupCorreo" class="simple" title="Registro de Correos" style="display:none">
                            <form id="formNewCorreo" action="index.php?c=correo&a=addCorreo" method="post">
                                <center><input type="email" name="email" placeholder="Nuevo Correo" />
                                    <center><input type="submit" value="Agregar" />
                            </form>
                        </div>

                        <!-- INICIO POPUP -->

                        <!-- Modal -->
                        <div class="modal fade" id="añadirCorreoExcel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Añadir Listado Masivo de Correos</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Contenido -->
                                        <h6 class="modal-title" id="staticBackdropLabel">Cargar archivo desde su ordenador</h6>
                                        <br>

                                        <form action="index.php?c=correo&a=addCorreoExcel" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <center><input type="file" name="excel" id="file" accept=".xls,.xlsx" /><br>
                                                </div>
                                            </div>
                                            <br>
                                            <center><input id="agregar" type="submit" value="Cargar" class="btn btn-primary" style="background:rgb(226, 3, 26); border:none; color:white; " />
                                        </form>

                                        <!-- FIN Contenido -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- FIN POPUP -->


                        <div class="wrapper">
                            <br>

                            <input style="float: right;" type="text" id="myInput" placeholder="Buscar Correo...">



                            <!-- INICIO TABLA -->
                            <div class="table-responsive-lg">

                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr class="header">
                                            <th>id</th>
                                            <th>Correo Institucional</th>
                                            <th>OPCIONES</th>
                                        </tr>

                                    </thead>

                                    <tr>
                                        <h1 id="respuesta">
                                        </h1>
                                    </tr>


                                    <tbody>
                                        <?php

                                        if ($data["correos"] != NULL) {
                                            foreach ($data["correos"] as $correo) {
                                                echo "<tr>";
                                                echo "<td>" . $correo["id"] . "</td>";
                                                echo "<td>" . $correo["email"] . "</td>";
                                                echo "<td><a href='index.php?c=correo&a=eliminarCorreo&id=" . $correo["id"] . "'><span class='badge badge-danger'>Eliminar</span></a></td>";

                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<td>No hay Correos Registrados</td>";
                                        }

                                        ?>
                                    </tbody>

                                </table>

                                <br>

                                <nav id="paginacion">
                                    <ul class="pagination pagination-lg pager" id="myPager">

                                    </ul>
                                </nav>

                            </div>


                            <!-- FIN TABLA -->

                        </div>
                    </article>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </section>

    <script type="text/javascript" src="view/assets/js/paginacion.js"></script>


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