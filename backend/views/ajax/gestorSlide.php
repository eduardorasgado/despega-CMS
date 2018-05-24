<?php 

require_once("../../models/gestorSlideBModel.php");
require_once("../../controllers/gestorSlideBController.php");


#CLASE Y METODOS ------------------------------------
class Ajax
{
	//Subir imagen del slide
	public $nombreImagen;
	public $imagenTemporal;

	public function gestorSlideAjax()
	{
		$datos = [
			"nombreImagen" => $this->nombreImagen,
			"imagenTemporal" => $this->imagenTemporal
		];

		$respuesta = slideControllers::mostrarImagenController($datos);
		//Mandar imagen que estamos subiendo al JS gestorSlide
		echo $respuesta;
	}
}

#OBJETOS -------------------------------------------

$a = new Ajax();
$a->nombreImagen = $_FILES["imagen"]["name"];
$a->imagenTemporal = $_FILES["imagen"]["tmp_name"];
$a->gestorSlideAjax();