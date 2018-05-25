<?php 


class slideControllers
{
	//Para subir al server y mostrar la imagen slide con AJAX
	public function mostrarImagenController($datos)
	{
		//capturamos ancho y alto con la propiedad getimagesize
		//list() asgina una lista de variables en una sola operacion
		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
		
		if ($ancho < 1600 || $alto < 600) 
		{
			return false;
		}
		else
		{

			//obtener la extension del nombre del archivo
			$nameSplitted = explode(".", $datos['nombreImagen']);
			$extension = end($nameSplitted);

			//los arrays sin el ultimo elemento
			//array_pop quita el ultimo elemento de un array y lo almacena
			//en una variable. Sin embargo el array afectado es al mismo al
			//que se le retira un si mismo el ultimo elemento
			$noLastElement = array_pop($nameSplitted);
			//$noLastElement es la variable que porta el elemento desechado

			//unir array en un string
			//aqui nameSplitted ya no tiene el ultimo elemento
			$noExtension = implode("-", $nameSplitted);
			
			//quitar espacios
			$noSpaces = str_replace(" ", "_", $noExtension);

			//agarramos un numero random para el nombre
			$aleatorio = mt_rand(100,999);

			//ruta para guardar con nombre unidoa un numero aleatorio
			//y sin extension
			$ruta = "../../views/images/slide/slide_".$noSpaces."_".$aleatorio;


			//En caso que la imagen sea png
			if ($extension == "png")
			{	
				//agregamos extension debida
				$ruta = $ruta.".png";
				//crea una imagen a partir de un fichero o url
				$origen = imagecreatefrompng($datos["imagenTemporal"]);

				//cortar la imagen a 1600 x 600
				$cropped = self::cropImage($origen);

				//guardamos en fisico
				imagepng($cropped, $ruta);
				
				//guardar ruta de imagen y traer json de ella
				$jsonEnconded = self::bringJSON($ruta);
				if ($jsonEnconded)
				{
					return $jsonEnconded;
				}
				//en caso de fallar conexion a db
				return false;
			}

			//En caso que la imagen sea jpg
			else if ($extension == "jpeg" || $extension == "jpg" || $extension == "JPG") 
			{	
				$ruta = $ruta.".jpg";
				//variable donde guardaremos la imagen
				//crea una imagen a partir de un fichero o url
				$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

				//Cortar si se pasa de las proporciones
				//imagecrop recorta una imagen usando las 
				//coordenasdas, el tamaño x, y ancho y alto dados
				$cropped = self::cropImage($origen);

				//guardar los archivos en la carpeta del servidor
				imagejpeg($cropped,$ruta);

				//subir la ruta a la DB y traer un json de ella
				$jsonEnconded = self::bringJSON($ruta);
				if ($jsonEnconded)
				{
					return $jsonEnconded;
				}
				//En caso de fallar el acceso a la database
				return false;
			}
			else
			{
				//en caso de no tener ninguna extension de las anteriores
				return false;
			}
			
		}
	}

	public function showSlidesInViewController()
	{
		$response = slideModels::showSlidesInViewModel("slide");

		if ($response) {
			//regresando todos los slides en un json
			return $response;
		}
		return false;
	}

	//eliminar item del slide view
	public function deleteSlideController($datos)
	{	
		//eliminar ruta de la DB
		$response = slideModels::deleteSlideModel($datos, "slide");
		if ($response) {
			unlink($datos["rutaSlide"]);
			return true;
		}
		return false;
	}

	//actualizar item del slide view, receptor ajax
	public function updateSlideController($datos)
	{
		
		//guardando los datos actualizados
		$response = slideModels::updateSlideModel($datos, "slide");
		
		if ($response) {
			return true;
		}
		return false;
	}


	#UTILIDADES ----------------------------------------

	private function cropImage($origen)
	{
		$destiny = imagecrop($origen, [
									"x" => 0,
									"y" => 0,
									"width" => 1600,
									"height" => 600,
								]);
		return $destiny;
	}

	private function bringJSON($ruta)
	{
		if (slideModels::subirImagenSlideModel($ruta, "slide")) 
			{
				$respuesta = slideModels::mostrarImagenModel($ruta, "slide");
				
				$dataSlide = [
					"id" => $respuesta["id"],
					"ruta" => $respuesta["ruta"],
				];
				return json_encode($dataSlide);
			}
		return false;
	}

}