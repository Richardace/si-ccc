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

var multimediaFisica = null;

$(".guardarProducto").click(function () {

	if ($(".descripcion").val() ) {

		if (arrayFiles.length > 0) {
			

			var listaMultimedia = [];
			var finalFor = 0;

			for (var i = 0; i < arrayFiles.length; i++) {

				var datosDocumento = new FormData();
				datosDocumento.append("file", arrayFiles[i]);
				datosDocumento.append("idDocumentEvaluador", $(".idDocumentEvaluador").val());
				datosDocumento.append("descripcion", $(".descripcion").val());
				datosDocumento.append("nameFolder", $(".nameFolder").val());

				$.ajax({
					url: "config/documentosCorrecciones.ajax.php",
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
		}else{
			agregarSinProducto();
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
	console.log(imagen);
	datosDocumento.append("idDocumentEvaluador", $(".idDocumentEvaluador").val());
	datosDocumento.append("descripcion", $(".descripcion").val());
	datosDocumento.append("nameFolder", $(".nameFolder").val());
	datosDocumento.append("documentos", imagen);

	

	$.ajax({
		// url:"productos.ajaxSubida.php",
		url: "index.php?c=documento&a=addRevisionDocumento",
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
					title: "Las Correcciones han sido guardadas Exitosamente !",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {
						$('.guardarProducto').html("Guardar producto");
						window.location = "index.php?c=documento&a=viewEvaluadorInit";

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

function agregarSinProducto() {

	var datosDocumento = new FormData();

	datosDocumento.append("idDocumentEvaluador", $(".idDocumentEvaluador").val());
	datosDocumento.append("descripcion", $(".descripcion").val());
	datosDocumento.append("nameFolder", $(".nameFolder").val());
	datosDocumento.append("documentos", '');


	$.ajax({
		// url:"productos.ajaxSubida.php",
		url: "index.php?c=documento&a=addRevisionDocumento",
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
					title: "Las Correcciones han sido guardadas Exitosamente !",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {
						$('.guardarProducto').html("Guardar producto");
						window.location = "index.php?c=documento&a=viewEvaluadorInit";

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
