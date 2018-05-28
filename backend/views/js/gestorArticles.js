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
	image = this.files[0];
	//console.log(image);

	//validando tamaño de imagen
	
});

/*=====  End of SUBIR FOTO ARTICLE  ======*/
