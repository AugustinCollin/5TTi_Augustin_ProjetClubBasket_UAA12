<?php 

require_once "Models/schoolModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/mesClub_basket"){
    $school = selectMyclub_Basket($pdo);

    $title = "Mes clubs de basket";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
elseif ($uri === "/createclub_Basket")
{
    //si on a rempli le formulaire est qu'on l'a validé
        if (isset($_POST['btnEnvoi'])) {
            createclub_Basket($pdo);
            //récupération du numéro de la dernière ligne dans la table des clubs de basket.
            $recetteId = $pdo->lastInsertId();
            // ajout des options liées au club de basket dans la table des équipes 
            // ne pas oublier que $_POST["options"] est un tableau ! => le parcourir et faire une écritur epour chaque élément trouvé
            for ($i = 0; $i < count($_POST["options"]); $i++) {
                $optionclub_BasketId = $_POST[""] [$i];
                //écriture dans la table des options 
                ajouterOptionclub_Basket($pdo, $club_BasketId, $optionclub_BasketId);
            }
            header("location:/mesRecettes");
        }  
        $options = selectAllOptions($pdo);
        $title = "Ajout d'un club de basket";
        $template = "Views/Recettes/editOrCreateRecette.php";
        require_once("Views/base.php");
}
//ceci n'est possible que si on dispose d'un id pour le club de basket => isset ($_GET["schoolId"])
elseif (isset($_GET["club_basketId"]) && $uri === "/Voirclub_Basket,club_BasketId=" . $_GET["club_BasketId"])
{
    //rechercher les données du club de basket concerné  ainsi qie les options correspondantes 
    $club_Basket = selectOneclub_Basket($pdo);
    $options = selectOptionclub_basket($pdo);
    $title = "ajout d'un club de basket";   //titre à afficher dans l'onglet de la page du navigateur 
    $template = "Views/basket/basket.php";  //chemin vers la vue demandée 
    require_once("Views/base.php"); //appel de la page de base qui sera remplie avec la vue demandée
}

