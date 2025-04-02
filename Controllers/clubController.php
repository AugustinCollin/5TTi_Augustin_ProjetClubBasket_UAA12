<?php 

require_once "Models/schoolModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/mesEcoles"){
    $school = slectMyclub_Basket($pdo);

    $title = "Mes écoles";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
elseif ($uri === "/createSchool"){

}
elseif(isset($_GET["schoolId"]) && $uri === "/voirEcole?schoolId=" . $_GET["schoolId"])
{
    $club_Basket = selectOneclub_Basket($pdo);
    $option = slectionOptionclub_Basket($pdo);
    $title = "ajouter un club de basket";
    $template = "Views/basket/basket.php";
    require_once("Views/base.php");
}
