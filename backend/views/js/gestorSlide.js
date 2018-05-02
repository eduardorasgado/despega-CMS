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

$('#columnasSlide').on("dragover", function(e)
{
	e.preventDefault();
	e.stopPropagation();

	//mostrar el patron al momento de llevar una imagen a  arrastrar
	$('#columnasSlide').css({"background":"gray","opacity":"0.2"})

});
$('#columnasSlide').on("dragleave", function(e)
{
	//mostrar el patron al momento de llevar una imagen a  arrastrar
	$('#columnasSlide').css({"background":"white"})

});

/*=====  End of VISUALIZACION DE IMAGEN ARRASTRADA  ======*/
