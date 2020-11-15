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

    <?php
     foreach ($data["documentos"] as $documentos) {
        $radicado = $documentos["id"];
        $idUser = $documentos["id_user"];
        $dateRegister = $documentos["dateRegister"];
        $numeroRadicado = $documentos["radicado"];
        $title = $documentos["title"];
        $description = $documentos["description"];
        $nameFolder = $documentos["nameFolder"];
     }

?>

      <div class="card">
        <center>
          <div class="card-header" style="color: white; font-weight: bold; background:rgb(226, 3, 26);">
            ENVIAR CORRECCIONES
          </div>
        </center>
        <div class="card-body">
          <div class="box-body">

            <input type="hidden" class="radicado" value="<?php echo $radicado; ?>" readonly>

            <input type="hidden" class="folder" value="<?php echo $nameFolder; ?>" readonly>

            <input type="hidden" class="idCorreccion" value="<?php echo $data['idCorreccion']; ?>" readonly>

            <input type="hidden" class="idSolicitante" value="<?php echo $_SESSION['id']; ?>" readonly>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Numero de Radicado</label>
                <input type="text" class="form-control origen" value="<?php echo $numeroRadicado; ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label>Fecha de Registro</label>
                <input type="text" class="form-control destino" value="<?php echo $dateRegister; ?>" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Asunto</label>
                <input type="text" class="form-control titulo" value="<?php echo $title; ?>" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Descripción u Observación</label>
                <textarea type="text" style="height: 150px;" class="form-control descripcion" ><?php echo $description; ?></textarea>
              </div>
            </div>

            <br>

            <div class="form-group agregarMultimedia">
              <div class="multimediaFisica needsclick dz-clickable">
                <div class="dz-message needsclick">
                  Arrastrar o dar click para subir documentos - Maximo 10 Archivos
                </div>
              </div>
            </div>


          </div>
          <br>
          <center><input id="agregar" type="submit" value="Enviar Correcciones" class="btn btn-primary guardarProducto" style="background:rgb(226, 3, 26); border:none; color:white; " /></center>
          <br>
        </div>
        <div class="card-footer text-muted" style="color: white; font-weight: bold; background:rgb(226, 3, 26);"></div>
      </div>
    </section>
</body>
<script src="view/assets/js/dropzoneCorrecciones.js"></script>

</html>