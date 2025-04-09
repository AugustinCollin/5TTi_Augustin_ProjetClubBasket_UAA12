<?php 

require_once "Models/schoolModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/mesclub_Basket"){
    $school = selectMyclub_Basket($pdo);

    $title = "Mes clubs de basket";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
elseif ($uri === "/createclub_Basket")
{
        if (isset($_POST['btnEnvoi'])) {
            createclub_Basket($pdo);
            $recetteId = $pdo->lastInsertId();
            for ($i = 0; $i < count($_POST["options"]); $i++) {
                $optionclub_BasketId = $_POST["options"] [$i];
                ajouterOptionclub_Basket($pdo, $club_BasketId, $optionclub_BasketId);
            }
            header("location:/mesRecettes");
        }  
        $options = selectAllOptions($pdo);
        $title = "Ajout d'un club de basket";
        $template = "Views/Recettes/editOrCreateRecette.php";
        require_once("Views/base.php");
}

