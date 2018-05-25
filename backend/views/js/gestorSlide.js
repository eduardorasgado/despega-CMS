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
	$('#columnasSlide').css({"background":"white","opacity":"1"});

	//almacenando el archivo en una variable
	var archivo = e.originalEvent.dataTransfer.files;
	var image = archivo[0];

	var imageSize = image.size;
	var imagetype = image.type;

	if (Number(imageSize) > 2000000) 
	{
		//rechazar si el archivo pesa mas de 2mb
		$("#columnasSlide").before("<div class='alert alert-warning alerta text-center'> El archivo excede el peso permitido: 2MB.</div>");
		return false;
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
		return false;	
	}

	//subir imagen al servidor
	if (Number(imageSize) < 2000000 && (imagetype == "image/jpeg" || imagetype == "image/png"))
	{
		var datos = new FormData();

		datos.append("imagen", image);

		//AJAX DE JQUERY
		$.ajax({
			url: "views/ajax/gestorSlide.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
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
					//ruta completa para poder eliminar con ajax el archivo del server
					rutaRaw = respuesta["ruta"];
					//recibir el json, obtener ruta y corta los primeros: ../../
					ruta = respuesta["ruta"].slice(6);
					//operadores ternarios, si no estan definidos mandar un espacio solamente
					titulo = (typeof(respuesta["titulo"]) !== 'undefined') ? respuesta["titulo"] : " ";
					descripcion = (typeof(respuesta["descripcion"]) !== 'undefined') ? respuesta["descripcion"] : " ";
					$(".alerta2").remove();
					$("#columnasSlide").before("<div class='alert alert-success alerta2 text-center'> Tu imagen se ha subido con exito</div>");		
					$("#columnasSlide").append("<li id='"+respuesta['id']+"' class='bloqueSlide'><span class='fa fa-times eliminarAjaxSlide' ruta='"+rutaRaw+"'></span><img src='"+ruta+"' class='handleImg'></li>");
					$("#ordenarTextSlide").append("<li id='item"+respuesta['id']+"'><span class='fa fa-pencil editarSlide' style='background:blue'></span><img src='"+ruta+"' style='float:left; margin-bottom:10px' width='80%'><h1>"+titulo+"</h1><p>"+descripcion+"</p></li>");					
					//$("#slideCarousel").append("<li><img src='"+ruta+"'><div class='slideCaption'><h3>"+titulo+"</h3><p>"+descripcion+"</p></div></li>");

					//alto del cotenedor punteado reestablecido
					$('#columnasSlide').css({"height":"auto"});
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        //alert(xhr.status);
		        //alert(thrownError);
		        $("#status").remove();
		        $("#columnasSlide").before("<div class='alert alert-warning alerta2 text-center'> Tu imagen no tiene las dimensiones adecuadas.</div>");
		    }
		});
	}

});

//AL NO DROPEAR EL ARCHIVO Y SALIR DEL AREA	
$('#columnasSlide').on("dragleave", function(e)
{
	//mostrar el patron al momento de llevar una imagen a  arrastrar
	$('#columnasSlide').css({"background":"white","opacity":"1"})

});

/*=====  End of VISUALIZACION DE IMAGEN ARRASTRADA  ======*/

/*===========================================
=            ELIMINAR ITEM SLIDE            =
===========================================*/

$(".eliminarSlide").click(function(){
	$(".alerta2").remove();
	//id que sustraemos para eliminar la ruta de la db
	idSlide = $(this).parent().attr("id");
	//ruta que ssutraemos para eliminar el archivo del server
	rutaSlide = $(this).attr("ruta");

	//antes de todo, confimacion de seguridad
	confirmacion = window.confirm("Estas a punto de borrar tu elemento");
	
	//en caso de aceptacion de eliminado
	if (confirmacion) {
		//borrando el item
		$(this).parent().remove();
		//borrando el item editor
		$("#item"+idSlide).remove();
		if ($('#columnasSlide').html() == 0) {
			$('#columnasSlide').css({"height":"150px"});
		}
		//Llamada al componente funcion para ejecutar ajax
		deleteLogic(idSlide, rutaSlide);
	}
});



/*=====  End of ELIMINAR ITEM SLIDE  ======*/

/*========================================================
=            ON CLICK PARA ELIMINAR ITEM AJAX            =
========================================================*/

//No se puede hacer .click en un elemento que aun no existe en la pagina
//como lo es el caso de los elementos ajax, para ello acudimos a esta funcion

$("#columnasSlide").on("click",".eliminarAjaxSlide", function(){
	$(".alerta2").remove();
  	idSlide = $(this).parent().attr("id");
  	rutaSlide = $(this).attr("ruta");
	confirmacion = window.confirm("Estas a punto de borrar tu elemento");
	
	if (confirmacion) {
		//borramos el item
		$(this).parent().remove();
		//borramos item editor con el id
		$("#item"+idSlide).remove();
		if ($('#columnasSlide').html() == 0) {
			$('#columnasSlide').css({"height":"150px"});
		}
		//Llamada al componente funcion para ejecutar ajax
		deleteLogic(idSlide, rutaSlide);		
	}
});

/*=====  End of ON CLICK PARA ELIMINAR ITEM AJAX  ======*/

/*======================================================
=            DELETE AJAX COMPONENT FUNCTION            =
======================================================*/

function deleteLogic(idSlide, rutaSlide){

		//Eliminar item de la base de datos
		var borrarItem = new FormData();

		//item para ajax con id para borrado de ruta
		borrarItem.append("idSlide", idSlide);

		//item para ajax con ruta para borrado del archivo del server
		borrarItem.append("rutaSlide", rutaSlide);

		//url porque esto se invoca en index.php desde TemplateCOntroller()
		$.ajax({
			url: 'views/ajax/gestorSlide.php',
			method: 'POST',
			data: borrarItem,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				if (respuesta == false) {
					$("#columnasSlide").before("<div class='alert alert-warning alerta2 text-center'> Algo salió mal, te sugerimos probar recargar la página.</div>");
				}
				else {
					$("#columnasSlide").before("<div class='alert alert-success alerta2 text-center'> La imagen se ha borrado exitosamente</div>");
				}
			}
		});
}

/*=====  End of DELETE AJAX COMPONENT FUNCTION  ======*/


/*=====================================================
=            EDITAR ITEM SLIDE ACTUAL PAGE            =
=====================================================*/

$(".editarSlide").click(function(){
	idSlide = $(this).parent().attr("id");
	//de span ir al padre y de ahi buscar un hijo con tag img y buscar atributo src
	rutaSlide = $(this).parent().children("img").attr("src");
	rutaTitulo = $(this).parent().children("h1").html();
	rutaDescripcion = $(this).parent().children("p").html();
	
	//reemplazar la caja editora off por la editora on
	$(this).parent().html("<img src='"+rutaSlide+"' class='img-thumbnail'><input id='enviarTitulo' type='text' class='form-control' placeholder='Título' value='"+rutaTitulo+"'><textarea id='enviarDescripcion' row='5' class='form-control' placeholder='Descripción'>"+rutaDescripcion+"</textarea><button class='btn btn-info pull-right' id='guardaritem"+idSlide+"' style='margin:10px'>Guardar</button>");
	console.log("here");
	$("#guardaritem"+idSlide).click(function(){
		//cortar el idSlide que viene con formato item+id
		enviarId = idSlide.slice(4);
		//capturando el value de la etiqueta input con id enviarTitulo
		enviarTitulo = $("#enviarTitulo").val();
		enviarDescripcion = $("#enviarDescripcion").val();
		console.log(enviarId, enviarTitulo, enviarDescripcion);
		actualizarSlideLogic(enviarId, enviarTitulo, enviarDescripcion);
	});

});

/*=====  End of EDITAR ITEM SLIDE ACTUAL PAGE  ======*/

/*======================================================
=            EDITAR ITEM SLIDE AJAX ELEMENT            =
======================================================*/

$("#ordenarTextSlide").on("click",".editarSlide", function(){
	idSlide = $(this).parent().attr("id");
	rutaSlide = $(this).parent().children("img").attr("src");
	//llamar hijos h1 y p y lo que esté en su html
	rutaTitulo = $(this).parent().children("h1").html();
	rutaDescripcion = $(this).parent().children("p").html();

	
	//reemplazar la caja editora off por la editora on
	$(this).parent().html("<img src='"+rutaSlide+"' class='img-thumbnail'><input id='enviarTitulo' type='text' class='form-control' placeholder='Título' value='"+rutaTitulo+"'><textarea id='enviarDescripcion' row='5' class='form-control' placeholder='Descripción'>"+rutaDescripcion+"</textarea><button class='btn btn-info pull-right' id='guardaritem"+idSlide+"' style='margin:10px'>Guardar</button>");
	
	$("#guardaritem"+idSlide).click(function(){
		//cortar el idSlide que viene con formato item+id
		enviarId = idSlide.slice(4);
		//capturando el value de la etiqueta input con id enviarTitulo
		enviarTitulo = $("#enviarTitulo").val();
		enviarDescripcion = $("#enviarDescripcion").val();

		actualizarSlideLogic(enviarId, enviarTitulo, enviarDescripcion);
	});
});

/*=====  End of EDITAR ITEM SLIDE AJAX ELEMENT  ======*/

/*===================================================================================
=            FUNCTION COMPONENT PARA ACTUALIZAR SLIDE DESPUES DE EDITADO            =
===================================================================================*/

function actualizarSlideLogic(enviarId, enviarTitulo, enviarDescripcion){
	
	var actualizarSlide = new FormData();

	actualizarSlide.append("enviarId", enviarId);
	actualizarSlide.append("enviarTitulo", enviarTitulo);
	actualizarSlide.append("enviarDescripcion", enviarDescripcion);
	console.log("AJAX");
	$.ajax({
			url: 'views/ajax/gestorSlide.php',
			method: 'POST',
			data: actualizarSlide,
			cache: false,
			contentType: false,
			processData: false,
			//dataType:"json",
			success: function(respuesta){
				if (respuesta == false) {
					console.log("operación fallida");
				}
				else {
					console.log("operacion exitosamente exitosa");
					console.log(respuesta);
				}
			}
		});
}

/*=====  End of FUNCTION COMPONENT PARA ACTUALIZAR SLIDE DESPUES DE EDITADO  ======*/
