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
  <link rel="stylesheet" type="text/css" href="view/assets/css/style-index.css" />
  <link rel="stylesheet" type="text/css" href="view/assets/css/estiloPestañasMensajeria.css" />

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

  <!-- Slider -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js" integrity="sha512-Q1f3TS3vSt1jQ8AwP2OuenztnLU6LwxgyyYOG1jgMW/cbEMHps/3wjvnl1P3WTrF3chJUWEoxDUEjMxDV8pujg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/locale/es.min.js" integrity="sha512-/HmEBBS8qan4uG3ClUfdNMUOprD0g4BNcJnOBh153mBMs16U92xULl8QS9A37/vLW17epcNp0t0fDOYWjpG73Q==" crossorigin="anonymous"></script>

  <!-- Mis Scripts-->
  <script type="text/javascript" src="view/assets/js/main.js"></script>

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
      $source = $infoDocumento['source'];
      $destiny = $infoDocumento['destiny'];
      $description = $infoDocumento['description'];
    }

    foreach ($data['documentoEvaluador'] as $docEvaluador) {
      $dateLimite = $docEvaluador['dateLimit'];
    }
    ?>
    <!-- Contenido -->
    <section id="content">

      <div class="card">
        <div class="card-header" style="color: white; font-weight: bold; background:rgb(226, 3, 26);">
          <center>DOCUMENTO PARA REVISIÓN</center>
        </div>
        <div class="card-body">
          <div class="box-body">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Origen</label>
                <input type="text" class="form-control origen" value="<?php echo $source; ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label>Destino</label>
                <input type="text" class="form-control destino" value="<?php echo $destiny; ?>" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Asunto</label>
                <input type="text" class="form-control titulo" value="<?php echo $title; ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label>Fecha Limite</label>
                <input type="text" class="form-control titulo" value="<?php echo $dateLimite; ?>" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Descripción u Observación</label>
                <textarea type="text" style="height: 150px;" class="form-control descripcion" readonly><?php echo $description; ?>
                </textarea>
              </div>
            </div>

            <div class="form-row" style="float: right;">
              <div class="form-group col-md-12">
                <label>DESCARGA : </label>
                <a href="index.php?c=documento&a=descargarDocumentosById&id=<?php echo $idDocument; ?>" target="_blank">Descargar Documentos Adjuntos &nbsp; <span><img style="widht:25px; height:25px;" src="view/assets/img/descargar.png" ></span>&nbsp;&nbsp;</a>
              </div>
            </div>
<br>
          </div>
          <br>
          <center><input id="agregar" type="submit" value="Enviar Documentos" class="btn btn-primary guardarProducto" style="background:rgb(226, 3, 26); border:none; color:white; " /></center>
          <br>
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

    <script type="text/javascript" src="view/assets/js/localStorage.js"></script>
  </footer>

</body>

</html>