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
		
		echo $this->imagenTemporal;
	}
}

# INSTANCIAS DE LA CLASE --------------------

if (isset($_FILES["imagenArticle"]["tmp_name"])) {
	$imageToArt = new Ajax();
	$imageToArt->imagenTemporal = $_FILES["imagenArticle"]["tmp_name"];
	$imageToArt->gestorArticulosAjax();
}