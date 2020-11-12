var arrayFiles = [];

$(".multimediaFisica").dropzone({

	url: "/",
	addRemoveLinks: true,
	maxFilesize: 15, //Mb
	maxFiles: 1, 	//maximo de archivos
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

	if (arrayFiles != "") {

		if (arrayFiles.length > 0) {

			var listaMultimedia = [];
			var finalFor = 0;

			for (var i = 0; i < arrayFiles.length; i++) {

				var datosDocumento = new FormData();
				datosDocumento.append("file", arrayFiles[i]);
				

				$.ajax({
					url: "config/documentosConfig.ajax.php",
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
	var today = new Date();
	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
	
	datosDocumento.append("documentos", imagen);
	datosDocumento.append("dateActual", date);
	


	$.ajax({
		// url:"productos.ajaxSubida.php",
		url: "index.php?c=sesion&a=updateDocumentConfig",
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
					title: "El Documento de Sesiones ha Sido Actualizado Correctamente !",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {
						$('.guardarProducto').html("Guardar producto");
						window.location = "index.php?c=sesion&a=administrador";

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
