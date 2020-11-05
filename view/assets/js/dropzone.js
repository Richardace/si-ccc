var arrayFiles = [];

$(".multimediaFisica").dropzone({

	url: "/",
	addRemoveLinks: true,
	maxFilesize: 15, //Mb
	maxFiles: 10, 	//maximo de archivos
	init: function () {
		this.on("addedfile", function (file) {
			arrayFiles.push(file);
			console.log("arrayFiles", arrayFiles);
		})
		this.on("removedfile", function (file) {
			var index = arrayFiles.indexOf(file);
			arrayFiles.splice(index, 1);
		})
	}
})

$(function () {
	$('#datetimepicker1').datetimepicker({
	   format: 'YYYY-MM-DD HH:mm'
	});
});

var multimediaFisica = null;

$(".guardarProducto").click(function () {



	if ($(".usuario").val() != "" && $(".origen").val() != "" && $(".destino").val() != "" && $(".titulo").val() != "" && $(".descripcion").val() != "" && arrayFiles != "") {

		if (arrayFiles.length > 0) {

			var listaMultimedia = [];
			var finalFor = 0;

			for (var i = 0; i < arrayFiles.length; i++) {

				var datosDocumento = new FormData();
				datosDocumento.append("file", arrayFiles[i]);
				datosDocumento.append("usuario", $(".usuario").val());
				datosDocumento.append("origen", $(".origen").val());
				datosDocumento.append("destino", $(".destino").val());
				datosDocumento.append("titulo", $(".titulo").val());
				datosDocumento.append("descripcion", $(".descripcion").val());
				datosDocumento.append("nameFolder", $(".folder").val());

				$.ajax({
					url: "config/documentos.ajax.php",
					method: "POST",
					data: datosDocumento,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						$('.guardarProducto').html("Enviando ...");
					},
					success: function (respuesta) {

						listaMultimedia.push({ "elemento": respuesta })
						multimediaFisica = JSON.stringify(listaMultimedia);


						if ((finalFor + 1) == arrayFiles.length) {

							agregarMiProducto(multimediaFisica);
							finalFor = 0;

						}

						finalFor++;

						$('.guardarProducto').html("Guardar producto");
					}
				})
			}
		}

	} else {
		swal({
			title: "Llenar todos los campos obligatorios",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

		return;
	}

})


function agregarMiProducto(imagen) {

	var datosDocumento = new FormData();
	
	datosDocumento.append("usuario", $(".usuario").val());
	datosDocumento.append("origen", $(".origen").val());
	datosDocumento.append("destino", $(".destino").val());
	datosDocumento.append("titulo", $(".titulo").val());
	datosDocumento.append("descripcion", $(".descripcion").val());
	datosDocumento.append("nameFolder", $(".folder").val());
	datosDocumento.append("documentos", imagen);
	var idSolicitante = $(".usuario").val();


	$.ajax({
		// url:"productos.ajaxSubida.php",
		url: "index.php?c=documento&a=addDocument",
		method: "POST",
		data: datosDocumento,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function () {
			$('.guardarProducto').html("Enviando ...");
		},
		success: function (respuesta) {

			if (respuesta == "ok") {

				swal({
					type: "success",
					title: "El Documento ha sido enviado correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {
						$('.guardarProducto').html("Guardar producto");
						window.location = "index.php?c=documento&a=solicitante&id=" + idSolicitante;

					}
				})
			} else if (respuesta == "error") {
				swal({
					type: "error",
					title: "¡Ocurrio un error!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					$('.guardarProducto').html("Guardar producto");
				})
			}
		}
	})
}
