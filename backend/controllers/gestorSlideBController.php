<?php 


class slideControllers
{
	//Para mostrar la imagen slide con AJAX
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

				//guardamos en fisico
				imagepng($origen, $ruta);
				
				//guardar ruta de imagen
				if (slideModels::subirImagenSlideModel($ruta, "slide")) {
					$respuesta = slideModels::mostrarImagenModel($ruta, "slide");

					$dataSlide = [
						"ruta" => $respuesta["ruta"],
					];

					return json_encode($dataSlide);
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

				//guardar los archivos en la carpeta del servidor
				imagejpeg($origen,$ruta);

				//sibir la ruta a la DB
				if (slideModels::subirImagenSlideModel($ruta, "slide")) {
					$respuesta = slideModels::mostrarImagenModel($ruta, "slide");
					
					$dataSlide = [
						"ruta" => $respuesta["ruta"],
					];
					return json_encode($dataSlide);
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
}