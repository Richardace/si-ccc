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

        foreach ($data['sesion'] as $sesion) {
            $idSesion = $sesion['id'];
            $fechaSesion = $sesion['fechaSesion'];
            $fechaLimite = $sesion['fechaLimite'];
            $semestre = $sesion['semestre'];
            $anio = $sesion['anio'];
        }
        ?>

        <!-- Contenido -->

        <section id="content">

            <div class="card text-center">
                <div class="card-header" style="color: white; font-weight: bold; background: #dc3545;">
                    EDITAR SESIÓN
                </div>
                <div class="card-body">

                    <form method="post" action="index.php?c=sesion&a=updateSesion">

                        <input type="hidden" value="<?php echo $idSesion; ?>" name="idSesion">
                        <br>

                        <center>
                            <div>
                                <label for="inputState">Fecha de la Sesión</label><br>
                                <input class="form-control" name="dateSesion" style="width:20%;" type="date" value="<?php echo $fechaSesion; ?>">
                            </div>
                        </center>
                        <br>

                        <center>
                            <div>
                                <label for="inputState">Fecha Limite para Recibir Documentos</label><br>
                                <input class="form-control" name="dateLimite" style="width:20%;" type="date" value="<?php echo $fechaLimite; ?>">
                            </div>
                        </center>
                        <br>



                        <center>
                            <div>
                                <label for="inputState">Elija el Semestre</label><br>
                                <select class="form-control" name="semestre" style="width:20%;">

                                    <?php

                                    if ($semestre == "1") {
                                        echo "
                                            <option value='1'>Primer Semestre</option>
                                            <option value='2'>Segundo Semestre</option>
                                        ";
                                    } else {
                                        echo "
                                            <option value='2'>Segundo Semestre</option>
                                            <option value='1'>Primer Semestre</option>
                                        ";
                                    }

                                    ?>
                                </select>
                            </div>
                        </center>
                        <br>

                        <center>
                            <div>
                                <label for="inputState">Elija el Año</label><br>
                                <select class="form-control" name="anio" style="width:20%;">
                                    <option value="<?php echo $anio; ?>"><?php echo $anio; ?></option>    
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2022</option>
                                    <option value="2024">2023</option>
                                    <option value="2025">2024</option>
                                    <option value="2026">2025</option>
                                    <option value="2027">2026</option>
                                    <option value="2028">2027</option>
                                    <option value="2029">2028</option>
                                    <option value="2030">2029</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                    <option value="2037">2037</option>

                                </select>
                            </div>
                        </center>

                        <br>

                        <input type="submit" value="Guardar Cambios" class="btn btn-primary" style="background:rgb(226, 3, 26); border:none; color:white" />

                    </form>
                </div>
                <div class="card-footer text-muted" style="color: white; font-weight: bold; background: #dc3545;">

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