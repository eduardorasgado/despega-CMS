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
