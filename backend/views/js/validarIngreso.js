/*===============================================================
=            VALIDACION FORMULARIO DE ADMIN REGISTRO            =
===============================================================*/

function validarIngreso()
{
	var expression = /^[a-zA-Z0-9]*$/;
	if (!expression.test($('#usuarioIngreso').val()))
	{
		return false
	}
	else if (!expression.test($('#passwordIngreso').val()))
	{
		return false;
	}
	return true;
}

/*=====  End of VALIDACION FORMULARIO DE ADMIN REGISTRO  ======*/
