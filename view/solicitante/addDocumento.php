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
          <div class="card-header" style="color: white; font-weight: bold; background:rgb(226, 3, 26);">
            AÑADIR DOCUMENTO
          </div>
        </center>
        <div class="card-body">
          <div class="box-body">

            <input type="hidden" class="usuario" value="<?php echo $_SESSION['id']; ?>" readonly>

            <?php
              function generateCode($length){
                $chars = "vwxyzABCDMnOpqH02789";
                $code = ""; 
                $clen = strlen($chars) - 1;
                while (strlen($code) < $length){ 
                    $code .= $chars[mt_rand(0,$clen)];
                }
                return $code;
              }
            ?>

            <input type="hidden" class="folder" value="<?php echo generateCode(11); ?>" readonly>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Origen</label>
                <input type="text" class="form-control origen" value="Plan de Estudios de Ingenieria de Sistemas" readonly>
              </div>
              <div class="form-group col-md-6">
                <label>Destino</label>
                <input type="text" class="form-control destino" value="Consejo Academico">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Asunto</label>
                <input type="text" class="form-control titulo" value="Documentos para aprobacion por parte del consejo academico" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Descripción u Observación</label>
                <textarea type="text" style="height: 150px;" class="form-control descripcion">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu tempor ante. Morbi eget risus dolor. Praesent ut sapien nulla. Sed pulvinar mi non nibh hendrerit mollis. Praesent eros est, tincidunt ut odio ac, malesuada imperdiet eros. Nunc finibus nulla vitae augue tincidunt, eget ultrices nulla viverra. Donec scelerisque dui nec orci mollis scelerisque eget eget magna. Aliquam erat volutpat. Vestibulum leo ligula, fermentum a justo vitae, varius auctor nunc. In eget dui enim. Ut vulputate vel metus a convallis. Pellentesque blandit diam eu erat semper, id laoreet dolor posuere. Quisque eros turpis, blandit quis vulputate efficitur, sagittis a neque. Mauris ut libero vel neque lobortis molestie eget non sem. Nullam ultricies felis vel orci placerat, vel mollis arcu porta. Nunc in cursus felis.
                </textarea>
              </div>
            </div>

            <br>

            <!-- <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control input-lg tituloProducto" >
              </div>
            </div> -->

            <div class="form-group agregarMultimedia">
              <div class="multimediaFisica needsclick dz-clickable">
                <div class="dz-message needsclick">
                  Arrastrar o dar click para subir documentos - Maximo 10 Archivos
                </div>
              </div>
            </div>


          </div>
          <br>
          <center><input id="agregar" type="submit" value="Enviar Documentos" class="btn btn-primary guardarProducto" style="background:rgb(226, 3, 26); border:none; color:white; " /></center>
          <br>
        </div>
        <div class="card-footer text-muted" style="color: white; font-weight: bold; background:rgb(226, 3, 26);"></div>
      </div>
    </section>
</body>
<script src="view/assets/js/dropzone.js"></script>

</html>