$(document).ready(function () {


  var seleccion = 0;
  var valueSelect;

  // BUSCADOR

  // SELECT



  // RADIO BUTTON DE PERSONAL

  $("#codigo").click(function () {
    seleccion = 0;
    filtro()
  });

  $("#dependencia").click(function () {
    seleccion = 1;
    filtro()
  });

  $("#nombre").click(function () {
    seleccion = 2;
    filtro()
  });

  $("#myInput").keyup(function () {
    filtro();
  });

  $('#mySelect').on('change', function () {
    valueSelect = $(this).val();
    filtroEstado();
  });

  function filtroEstado() {
    valueSelect = valueSelect.toUpperCase();
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[5];
      
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(valueSelect) > -1) {
          $("#respuesta").html("");
          tr[i].style.display = "";
        } else {
          $("#respuesta").html("No hay Resultados para la Busqueda Solicitada");
          tr[i].style.display = "none";
        }
      }
    }
  }


  function filtro() {
    
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[seleccion];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          $("#respuesta").html("");
          tr[i].style.display = "";
          filtroEstado();
        } else {
          $("#respuesta").html("No hay Resultados para la Busqueda Solicitada");
          tr[i].style.display = "none";
        }
      }
    }
  }








  // LANZAR POPUP DE REGISTRO

  // Dialog
  $("#lanzarRegistroCorreo").click(function () {
    console.log("funciona");
    $("#popupCorreo").dialog();
  })



  $(".controlMenu").hide();
  $(".button").click(function () {

    if ($(".controlMenu").is(":visible")) {
      $(".controlMenu").hide();
    } else {
      $(".controlMenu").show();
    }
  });

  $('ul.tabs li a:first').addClass('active');
  $('.secciones article').hide();
  $('.secciones article:first').show();

  $('ul.tabs li a').click(function () {
    $('ul.tabs li a').removeClass('active');
    $(this).addClass('active');
    $('.secciones article').hide();

    var activeTab = $(this).attr('href');
    $(activeTab).show();
    return false;
  });

  if (window.location.href.indexOf('index') >= 0) {
    $("#inicio").addClass("activeMenu");
  }

  if (window.location.href.indexOf('documentos') >= 0) {
    $("#documentos").addClass("activeMenu");
  }

  if (window.location.href.indexOf('estados') >= 0) {
    $("#estados").addClass("activeMenu");
  }

  if (window.location.href.indexOf('consultas') >= 0) {
    $("#consultas").addClass("activeMenu");
  }

  if (window.location.href.indexOf('personal') >= 0) {
    $("#personal").addClass("activeMenu");
  }

  // Reloj
  if (window.location.href.indexOf('reloj') >= 0) {
    setInterval(function () {
      var reloj = moment().format("hh:mm:ss");
      $("#reloj").html(reloj);
    }, 1000);
  }

  setInterval(function () {
    var reloj = moment().format("LLLL:ss");
    $("#fecha").html(reloj);
  }, 1000);


});