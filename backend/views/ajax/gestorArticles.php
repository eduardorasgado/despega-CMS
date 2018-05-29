<?php 
//llamada a modelo y controlador
require_once("../../models/gestorArticlesBModel.php");
require_once("../../controllers/gestorArticlesBController.php");

# CLASES Y METODOS -------------------------------
class Ajax
{
	public $imagenTemporal;
	//Subiendo la imagen del artuculo
	public function gestorArticulosAjax()
	{
		$datos = [
			"imagenTemporal" => $this->imagenTemporal,
		];
		
		$respuesta = gestorArticlesController::uploadImageController($datos);

		echo $respuesta;
	}
}

# INSTANCIAS DE LA CLASE --------------------

if (isset($_FILES["imagenArticle"]["tmp_name"])) {
	$imageToArt = new Ajax();
	$imageToArt->imagenTemporal = $_FILES["imagenArticle"]["tmp_name"];
	$imageToArt->gestorArticulosAjax();
}