<?php 

require_once("../../models/gestorSlideBModel.php");
require_once("../../controllers/gestorSlideBController.php");


#CLASE Y METODOS ------------------------------------
class Ajax
{	
	public $nombreImagen;
	public $imagenTemporal;

	//Subir imagen del slide
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

	//Eliminar item slide
	public $idSlide;
	public $rutaSlide;

	public function eliminarSlideAjax()
	{
		$datos = [
			"idSlide" => $this->idSlide,
			"rutaSlide" => $this->rutaSlide,
		];

		$respuesta = slideControllers::deleteSlideController($datos);
		echo $respuesta;
	}

	//Actualizar Item Slide
	public $enviarId;
	public $enviarTitulo;
	public $enviarDescripcion;

	public function actualizarSlideAjax()
	{
		$datos = [
			"enviarId" => $this->enviarId,
			"enviarTitulo" => $this->enviarTitulo,
			"enviarDescripcion" => $this->enviarDescripcion,
		];

		$respuesta = slideControllers::updateSlideController($datos);
		echo $respuesta;
	}

	public $almacenarOrdenId = [];
	public $ordenItem = [];

	public function orderSlideAjax()
	{
		$datos = [
			"almacenarOrdenId" => $this->almacenarOrdenId,
			"ordenItem" => $this->ordenItem,
		];

		$respuesta = slideControllers::orderSlideAjaxController($datos);
		echo $respuesta;
	}


}

#OBJETOS -------------------------------------------

if (isset($_FILES["imagen"]["name"])) 
{
	#Instancia para subir
	$upload = new Ajax();
	$upload->nombreImagen = $_FILES["imagen"]["name"];
	$upload->imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$upload->gestorSlideAjax();
}

if (isset($_POST["idSlide"])) 
{
	#instancia para borrar
	$delete = new Ajax();
	$delete->idSlide = $_POST["idSlide"];
	$delete->rutaSlide = $_POST["rutaSlide"];
	$delete->eliminarSlideAjax();
}


if (isset($_POST["enviarId"])) 
{
	#instancia para el editor
	$editSlide = new Ajax();
	$editSlide->enviarId = $_POST["enviarId"];
	$editSlide->enviarTitulo = $_POST["enviarTitulo"];
	$editSlide->enviarDescripcion = $_POST["enviarDescripcion"];
	$editSlide->actualizarSlideAjax();
}

if (isset($_POST["almacenarOrdenId"])) {
	$ordered = new Ajax();
	$ordered->almacenarOrdenId = $_POST["almacenarOrdenId"];
	$ordered->ordenItem = $_POST["ordenItem"];
	$ordered->orderSlideAjax();
}