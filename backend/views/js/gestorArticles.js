/*========================================
=            AGREGAR ARTICULO            =
========================================*/
var activate = false;
$("#btnAgregarArticulo").click(function(){
	//toggle aparece o desaparece elementos
	$("#agregarArtículo").toggle(100);
	if (activate == false) {
		//console.log($("#agregarArtículo").css("display"))
		$("#btnAgregarArticulo").html("Deshacer");
		activate = true;
	}
	else{
		$("#btnAgregarArticulo").html("Agregar Artículo");
		activate = false;
	}
	
	//$("#agregarArtículo").css({"display":"block"})
});

/*=====  End of AGREGAR ARTICULO  ======*/

/*==========================================
=            SUBIR FOTO ARTICLE            =
==========================================*/
var imagen = "";
$("#subirFoto").change(function(){
	imagen = this.files[0];
	//console.log(imagen);

	//validando tamaño de imagen
	imagenSize = imagen.size;

	if (Number(imagenSize) > 2000000) {
		$("#arrastreImagenArticulo").before("<div class='alert alert-warning alerta text-center'> Tu imagen pesa más de 2MB. Por favor intenta con otra de menor tamaño.</div>")
		return false;
	}
	else {
		$(".alerta").remove();
	}

	imagenType = imagen.type;

	if (imagenType == "image/jpeg" || imagenType == "image/png") 
	{
		$(".alerta").remove();		
	}
	else
	{
		//rechazar si el archivo no es png o jpeg
		$("#arrastreImagenArticulo").before("<div class='alert alert-warning alerta text-center'> Por favor sube una imagen con extension válida: PNG o JPG.</div>");
		return false;	
	}

	//subir imagen al servidor y mostrarla con ajax
	if (Number(imagenSize) < 2000000 && (imagenType == "image/jpeg" || imagenType == "image/png")){
		
		var dataImg = new FormData();
		
		dataImg.append("imagen", imagen);

		$.ajax({
			url: "views/ajax/gestorArticles.php",
			method: "POST",
			data: dataImg,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){
				$("#arrastreImagenArticulo").before("<img src='views/images/status.gif' id='status'>")
			}
		});

		return true;
	}
});

/*=====  End of SUBIR FOTO ARTICLE  ======*/
