<?php 
/*==========================================
=            INDEX.PHP FRONTEND            =
==========================================*/
require_once("controllers/templateFController.php");

session_start();

$templateController = new TemplateController();
$templateController->template();


/*=====  End of INDEX.PHP FRONTEND  ======*/

