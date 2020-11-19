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
    <?php
        echo "<a style='float:right' href='index.php?c=message&a=administrador&id=$_SESSION[id]'>Regresar</a><br>"
        ?>
      <div class="card text-center">
       



        <div class="card-header" style="color: white; font-weight: bold; background: #dc3545;">
          DETALLE DEL MENSAJE
        </div>

        <div class="card-body" id="mensajesID">

          <?php

          if ($data['mensajesID'] != NULL) {

            foreach ($data['mensajesID'] as $infoDocumento) {
              $idDocumento = $infoDocumento['user_id_destiny'];
              $title = $infoDocumento['title'];
              $description = $infoDocumento['description'];
              $nombre = $infoDocumento['fullName'];
              $estado = $infoDocumento['state'];
            }
          }
          ?>

          <div class="form-row">
            <div class="form-group col-md-8">
              <label style="float: left; ">Destino</label>
              <input type="text" class="form-control origen" value="<?php echo  $nombre; ?>" readonly>
            </div>
            <div class="form-group col-md-4">
              <label style="float: left; ">Estado</label>
              <input type="text" class="form-control origen" value="<?php echo  $estado; ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label style="float: left; ">Asunto</label>
              <input type="text" class="form-control origen" value="<?php echo  $title; ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label style="float: left; ">Mensaje</label>
              <textarea style="height: 200px; " type="text" class="form-control destino" readonly> <?php echo $description; ?> </textarea>
            </div>
          </div>



        </div>
        <div class="card-footer text-muted" style="color: white; font-weight: bold; background:#dc3545;">

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