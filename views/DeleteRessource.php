<?php
require_once '../controller/RessourceController.php'; 
$ressourceController = new RessourceController();
$ressourceController->deleteRessource($_GET['id']);
header('Location:ListRessource.php');
?>
