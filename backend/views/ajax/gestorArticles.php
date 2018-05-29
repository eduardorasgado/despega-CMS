<?php 

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
		
	}
}

# INSTANCIAS DE LA CLASE --------------------

if (isset($_POST["imagenArticle"])) {
	$imageToArt = new Ajax();
	$imageToArt->imagenTemporal = $_POST["imagenArticle"];
	$imageToArt->gestorArticulosAjax();
}