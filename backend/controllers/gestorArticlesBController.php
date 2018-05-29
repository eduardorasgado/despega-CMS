<?php 

class gestorArticlesController
{
	//Mostrar imagenes en el article image section
	public function uploadImageController($datos)
	{
		//arreglo de propiedades
		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);

		if ($ancho < 800 || $alto < 400)
		{
			return false;
		}
		else
		{
			//obtener la extension del archivo
			$nameSplitted = explode(".",$datos["imagenTemporal"]);

			$extension = end($nameSplitted);

			//queda almacenado la extension de la imagen
			$noLastElement = array_pop($nameSplitted);

			//unir el array en string, del nombre pero ya 
			//sin la externsion(que fue quitada por el pop)
			$noExtension = implode(".", $nameSplitted);

			//quitar espacios
			$noSpaces = str_replace(" ", "_", $noExtension);

			//elegir un numero aleatorio
			$aleatorio = mt_rand(100,999);

			//crear nombre complejo ṕara subirlo al server
			$ruta = "../../views/images/articulos/article_".$noSpaces."_".$aleatorio;
		}
	}
}