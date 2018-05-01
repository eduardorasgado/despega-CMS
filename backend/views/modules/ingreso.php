<!--=====================================
FORMULARIO DE INGRESO           
======================================-->

<div id="backIngreso">
	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

		<h1 id="tituloFormIngreso">INGRESO AL PANEL DE CONTROL</h1>
		
		<input class="form-control formIngreso" id="usuarioIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso">
		<input class="form-control formIngreso" id="passwordIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso">
		<?php 

		$ingresoUser = new ingresoAdminControllers();
		$ingresoUser->ingresarController();	

		 ?>
		<input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar">

	</form>
</div>

<!--==== end onf FORMULARIO INGRESO   =======-->