$(document).ready(function () {




  // BUSCADOR

  $("#myInput").keyup(function () {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          $("#respuesta").html("");
          tr[i].style.display = "";
        } else {
          $("#respuesta").html("No hay Resultados para la Busqueda Solicitada");
          tr[i].style.display = "none";
        }
      }
    }
  });

  // LANZAR POPUP DE REGISTRO

  // Dialog
  $("#lanzarRegistroDirector").click(function () {
    console.log("funciona");
    $("#popup").dialog();
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



  // Posts
  if (window.location.href.indexOf('index') >= 0) {
    var posts = [
      {
        title: 'Prueba de Titulo 1',
        date: 'Publicado el dia ' + moment().format("D") + ' de ' + moment().format("MMMM") + ' del año ' + moment().format("YYYY"),
        content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum neque et commodo viverra. Sed sed   rutrum turpis. Maecenas viverra felis tortor, eu tincidunt est semper sit amet. Nullam mi nunc, luctus quis      nulla et, sodales convallis dui. Vivamus cursus lectus augue, at mollis tortor consequat a. Fusce non orci      at leo luctus blandit. Sed blandit ligula at erat scelerisque, et varius augue luctus. Morbi ac augue      lectus. Nam sollicitudin odio finibus, volutpat sapien ut, fringilla quam. Proin et porttitor justo, rhoncus      mattis tortor. Integer luctus maximus leo ut lacinia.'
      },
      {
        title: 'Prueba de Titulo 2',
        date: 'Publicado el dia ' + moment().format("D") + ' de ' + moment().format("MMMM") + ' del año ' + moment().format("YYYY"),
        content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum neque et commodo viverra. Sed sed   rutrum turpis. Maecenas viverra felis tortor, eu tincidunt est semper sit amet. Nullam mi nunc, luctus quis      nulla et, sodales convallis dui. Vivamus cursus lectus augue, at mollis tortor consequat a. Fusce non orci      at leo luctus blandit. Sed blandit ligula at erat scelerisque, et varius augue luctus. Morbi ac augue      lectus. Nam sollicitudin odio finibus, volutpat sapien ut, fringilla quam. Proin et porttitor justo, rhoncus      mattis tortor. Integer luctus maximus leo ut lacinia.'
      },
      {
        title: 'Prueba de Titulo 3',
        date: 'Publicado el dia ' + moment().format("D") + ' de ' + moment().format("MMMM") + ' del año ' + moment().format("YYYY"),
        content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum neque et commodo viverra. Sed sed   rutrum turpis. Maecenas viverra felis tortor, eu tincidunt est semper sit amet. Nullam mi nunc, luctus quis      nulla et, sodales convallis dui. Vivamus cursus lectus augue, at mollis tortor consequat a. Fusce non orci      at leo luctus blandit. Sed blandit ligula at erat scelerisque, et varius augue luctus. Morbi ac augue      lectus. Nam sollicitudin odio finibus, volutpat sapien ut, fringilla quam. Proin et porttitor justo, rhoncus      mattis tortor. Integer luctus maximus leo ut lacinia.'
      },
      {
        title: 'Prueba de Titulo 4',
        date: 'Publicado el dia ' + moment().format("D") + ' de ' + moment().format("MMMM") + ' del año ' + moment().format("YYYY"),
        content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum neque et commodo viverra. Sed sed   rutrum turpis. Maecenas viverra felis tortor, eu tincidunt est semper sit amet. Nullam mi nunc, luctus quis      nulla et, sodales convallis dui. Vivamus cursus lectus augue, at mollis tortor consequat a. Fusce non orci      at leo luctus blandit. Sed blandit ligula at erat scelerisque, et varius augue luctus. Morbi ac augue      lectus. Nam sollicitudin odio finibus, volutpat sapien ut, fringilla quam. Proin et porttitor justo, rhoncus      mattis tortor. Integer luctus maximus leo ut lacinia.'
      },
      {
        title: 'Prueba de Titulo 5',
        date: 'Publicado el dia ' + moment().format("D") + ' de ' + moment().format("MMMM") + ' del año ' + moment().format("YYYY"),
        content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum neque et commodo viverra. Sed sed   rutrum turpis. Maecenas viverra felis tortor, eu tincidunt est semper sit amet. Nullam mi nunc, luctus quis      nulla et, sodales convallis dui. Vivamus cursus lectus augue, at mollis tortor consequat a. Fusce non orci      at leo luctus blandit. Sed blandit ligula at erat scelerisque, et varius augue luctus. Morbi ac augue      lectus. Nam sollicitudin odio finibus, volutpat sapien ut, fringilla quam. Proin et porttitor justo, rhoncus      mattis tortor. Integer luctus maximus leo ut lacinia.'
      },
      {
        title: 'Prueba de Titulo 6',
        date: 'Publicado el dia ' + moment().format("D") + ' de ' + moment().format("MMMM") + ' del año ' + moment().format("YYYY"),
        content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum neque et commodo viverra. Sed sed   rutrum turpis. Maecenas viverra felis tortor, eu tincidunt est semper sit amet. Nullam mi nunc, luctus quis      nulla et, sodales convallis dui. Vivamus cursus lectus augue, at mollis tortor consequat a. Fusce non orci      at leo luctus blandit. Sed blandit ligula at erat scelerisque, et varius augue luctus. Morbi ac augue      lectus. Nam sollicitudin odio finibus, volutpat sapien ut, fringilla quam. Proin et porttitor justo, rhoncus      mattis tortor. Integer luctus maximus leo ut lacinia.'
      }
    ];


    posts.forEach((element, index) => {
      var post = `
      <article class="post">
        <h2>${element.title}</h2>
        <span class="date">${element.date}</span>
        <p>
          ${element.content}
        </p>
        <a href="#" class="button-more">Leer mas</a>
      </article>
    `;
      $("#posts").append(post);
    });

  }

  // Scroll hacia arriba

  $("#boton-subir").click(function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 500);
    return false;
  });

  // Login falso
  $("#cerrar").hide();

  $("#login form").submit(function () {
    var form_name = $("#form_name").val();
    localStorage.setItem("form_name", form_name);
  });

  var form_name = localStorage.getItem("form_name");

  if ((form_name != null && form_name != "undefined") || form_name == "") {
    $("#about p").html("<br><strong>Bienvenido " + form_name + "</strong>");
    $("#login").hide();
    $("#cerrar").show();
  }

  $("#cerrar a").click(function () {
    localStorage.clear();
    $("#login").show();
    $("#cerrar").hide();
    location.reload();
  });

  // Acordeon

  if (window.location.href.indexOf('about') >= 0) {
    $("#menu ul li").css("background", red);
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

  // Validacion Formulario
  if (window.location.href.indexOf('contact') >= 0) {
    $("form input[name='date'").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $.validate({
      lang: 'es',
      errorMessagePosition: 'top',
      scrollToTopOnError: true
    });
  }

});