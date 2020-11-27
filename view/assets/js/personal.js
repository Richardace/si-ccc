$(document).ready(function () {


  var seleccion = 0;
  var valueSelect;
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

  $("#myInputTableAddSolicitante").keyup(function () {
    filtro();
  });
  function filtro() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputTableAddSolicitante");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTableAddSolicitante");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[seleccion];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          //$("#respuesta").html("No hay Resultados para la Busqueda Solicitada");
          tr[i].style.display = "none";
        }
      }
    }
  }

  $("#myInputTableAddEvaluador").keyup(function () {
    filtro();
  });
  function filtro() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputTableAddEvaluador");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTableAddEvaluador");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[seleccion];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          //$("#respuesta").html("No hay Resultados para la Busqueda Solicitada");
          tr[i].style.display = "none";
        }
      }
    }
  }

  $("#myInputTableAddAdministrador").keyup(function () {
    filtro();
  });
  function filtro() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputTableAddAdministrador");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTableAddAdministrador");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[seleccion];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          //$("#respuesta").html("No hay Resultados para la Busqueda Solicitada");
          tr[i].style.display = "none";
        }
      }
    }
  }

  $("#myInput").keyup(function () {
    filtro();
  });
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
          tr[i].style.display = "";
        } else {
          //$("#respuesta").html("No hay Resultados para la Busqueda Solicitada");
          tr[i].style.display = "none";
        }
      }
    }
  }

  // LANZAR POPUP DE REGISTRO

  // Dialog Registro Correo
  $("#lanzarRegistroCorreo").click(function () {
    console.log("funciona");
    $("#popupCorreo").dialog();
  });

    // Dialog Registro Correo
    $("#lanzarRegistroSolicitante").click(function () {
      console.log("funciona");
      $("#popupRegistroSolicitante").dialog();
    });



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

  $("#message").addClass("activeMenu");
  if (window.location.href.indexOf('message') >= 0) {
    $("#message").addClass("activeMenu");
  }

  if (window.location.href.indexOf('documento') >= 0) {
    $("#message").removeClass("activeMenu");
    $("#documentos").addClass("activeMenu");
  }

  if (window.location.href.indexOf('estado') >= 0) {
    $("#message").removeClass("activeMenu");
    $("#estados").addClass("activeMenu");
  }

  if (window.location.href.indexOf('consulta') >= 0) {
    $("#message").removeClass("activeMenu");
    $("#consultas").addClass("activeMenu");
  }

  if (window.location.href.indexOf('personal') >= 0) {
    $("#message").removeClass("activeMenu");
    $("#personal").addClass("activeMenu");
  }

  if (window.location.href.indexOf('login') >= 0) {
    $("#message").removeClass("activeMenu");
    
  }

  $("#programa").click(function () {
    $("#selectPrograma").show();
    $("#selectFacultad").hide();
    $("#state").show();
    $("#agregar").show();
  });

  $("#sd").click(function () {
    $("#selectPrograma").hide();
    $("#selectFacultad").hide();
    $("#state").show();
    $("#agregar").show();
  });

  $("#facultad").click(function () {
    $("#selectPrograma").hide();
    $("#selectFacultad").show();
    $("#state").show();
    $("#agregar").show();
  });

  $("#evaluador1").click(function () {
    $("#autGoogle").show();
    $("#eva1").show();
    $("#eva2").hide();
    $("#add").show();
  });

  $("#evaluador2").click(function () {
    $("#autGoogle").show();
    $("#eva1").show();
    $("#eva2").show();
    $("#add").show();
  });

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