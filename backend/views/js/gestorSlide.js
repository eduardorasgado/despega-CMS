/*====================================================================
=            AREA MINIMA DE CUADRO DE CONTENEDOR IMAGENES            =
====================================================================*/

//console.log($('#columnasSlide').html());

if ($('#columnasSlide').html() == 0) 
{
	//Si el box en linea punteada esta vacío, tener minimo 150 de alto
	$('#columnasSlide').css({"height":"150px"});
}
else
{
	$('#columnasSlide').css({"height":"auto"});
}


/*=====  End of AREA MINIMA DE CUADRO DE CONTENEDOR IMAGENES  ======*/


/*==========================================================
=            VISUALIZACION DE IMAGEN ARRASTRADA            =
==========================================================*/

//DESCARGAR A TRAVES DE JQUERY

//AL HACER HOVER CON EL ARCHIVO EN MANO
$('#columnasSlide').on("dragover", function(e)
{
	e.preventDefault();
	e.stopPropagation();

	//mostrar el patron al momento de llevar una imagen a  arrastrar
	$('#columnasSlide').css({"background":"gray","opacity":"0.2"})

});

//AL DROPEAR EL ARCHIVO
$('#columnasSlide').on("drop", function(e)
{
	e.preventDefault();
	e.stopPropagation();
	//mostrar el patron al momento de llevar una imagen a  arrastrar
	$('#columnasSlide').css({"background":"white"});

	//almacenando el archivo en una variable
	var archivo = e.originalEvent.dataTransfer.files;
	var image = archivo[0];

	var imageSize = image.size;
	var imagetype = image.type;

	if (Number(imageSize) > 2000000) 
	{
		//rechazar si el archivo pesa mas de 2mb
		$("#columnasSlide").before("<div class='alert alert-warning alerta text-center'> El archivo excede el peso permitido: 2MB.</div>");
	}
	else{
		$(".alerta").remove();
	}
	if (imagetype == "image/jpeg" || imagetype == "image/png") 
	{
		$(".alerta").remove();		
	}
	else
	{
		//rechazar si el archivo no es png o jpeg
		$("#columnasSlide").before("<div class='alert alert-warning alerta text-center'> Por favor sube una imagen con extension válida: PNG o JPG.</div>");		
	}

	//subir imagen al servidor
	if (Number(imageSize) < 2000000 && (imagetype == "image/jpeg" || imagetype == "image/png"))
	{
		var datos = new FormData();

		datos.append("imagen", image);

		$.ajax({
			url: "views/ajax/gestorSlide.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){
				//gif de carga
				$("#columnasSlide").before("<img src='views/images/status.gif' id='status'>");
			},
			success: function(respuesta){
				//cuando se envia la imagen
				//se remueve el gif
				$("#status").remove();

				if (respuesta == false)
				{
					//Si no cumple con dimensiones adecuadas
					$("#columnasSlide").before("<div class='alert alert-warning alerta2 text-center'> Tu imagen no tiene las dimensiones adecuadas.</div>");		

				}
				else
				{
					$(".alerta2").remove();
					$("#columnasSlide").before("<div class='alert alert-success alerta2 text-center'> Tu imagen se ha subido con exito</div>");		
					$("#columnasSlide").append("<li class='bloqueSlide'><span class='fa fa-times'></span><img src='views/images/slide/slide01.jpg' class='handleImg'></li>");
				}
			}
		});
	}

});

//AL NO DROPEAR EL ARCHIVO Y SALIR DEL AREA	
$('#columnasSlide').on("dragleave", function(e)
{
	//mostrar el patron al momento de llevar una imagen a  arrastrar
	$('#columnasSlide').css({"background":"white"})

});

/*=====  End of VISUALIZACION DE IMAGEN ARRASTRADA  ======*/
