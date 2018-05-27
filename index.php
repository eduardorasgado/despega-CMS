<?php 
/*==========================================
=            INDEX.PHP FRONTEND            =
==========================================*/
//Models
require_once("models/gestorSlideFModel.php");

//Controllers
require_once("controllers/gestorSlideFController.php");
require_once("controllers/templateFController.php");

session_start();

$templateController = new TemplateController();
$templateController->template();


/*=====  End of INDEX.PHP FRONTEND  ======*/

