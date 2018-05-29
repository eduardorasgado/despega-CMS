<?php 
//llamada a modelo y controlador
require_once("../../models/gestorArticlesBModel.php");
require_once("../../controllers/gestorArticlesBController.php");

# CLASES Y METODOS -------------------------------
class Ajax
{
	public $imagenTemporal;
	public $imagenType;
	//Subiendo la imagen del artuculo
	public function gestorArticulosAjax()
	{
		$datos = [
			"imagenTemporal" => $this->imagenTemporal,
			"imagenType" => $this->imagenType,
		];
		
		$respuesta = gestorArticlesController::uploadImageController($datos);

		echo $respuesta;
	}
}

# INSTANCIAS DE LA CLASE --------------------

if (isset($_FILES["imagenArticle"]["tmp_name"])) {
	$imageToArt = new Ajax();
	$imageToArt->imagenTemporal = $_FILES["imagenArticle"]["tmp_name"];
	$imageToArt->imagenType = $_POST["imagenArticleType"];
	$imageToArt->gestorArticulosAjax();
}