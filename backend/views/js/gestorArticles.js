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
		
		dataImg.append("imagenArticle", imagen);
		dataImg.append("imagenArticleType", imagenType);

		$.ajax({
			url: "views/ajax/gestorArticles.php",
			method: "POST",
			data: dataImg,
			cache: false,
			contentType: false,
			processData: false,
			//dataType: "json",
			beforeSend: function(){
				$("#arrastreImagenArticulo").before("<img src='views/images/status.gif' id='status'>")
			},
			success: function(respuesta){
				$("#status").remove();
				if (respuesta == false) {
					$(".alerta2").remove();
		        	$("#arrastreImagenArticulo").before("<div class='alert alert-warning alerta2 text-center'>Por favor cumple los requerimientos mencionados :).</div>");
				}
				else{
					$(".alerta2").remove();	
					console.log(respuesta);
					ruta = respuesta.slice(6)
					console.log(ruta);
			        $("#arrastreImagenArticulo").before("<div class='alert alert-success alerta2 text-center'>Imagen Seleccionada.</div>");
			        $("#arrastreImagenArticulo").html("<div id='imagenArticulo'><img src='"+ruta+"' class='img-thumbnail'></div>");
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        //alert(xhr.status);
		        //alert(thrownError);
		        $("#status").remove();
		        $("#arrastreImagenArticulo").before("<div class='alert alert-warning alerta2 text-center'>Oops creemos que ocurrió un error. Te sugerimos recargar la página :(.</div>");
		    }
		});

		return true;
	}
});

/*=====  End of SUBIR FOTO ARTICLE  ======*/
